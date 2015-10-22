<?php

class Creare_GoogleShops_Block_Js extends Mage_Core_Block_Template {
	
	// Thankyou page Module_Controller_Action path
	const THANKYOU_PAGE_PATH = 'checkout_onepage_success';
	// Thankyou page Module_Controller_Action path
	const PRODUCT_PAGE_PATH = 'catalog_product_view';
	
	public function __construct() {
		// Load template depending on page type
		$this->setTemplate('creare/googleshops/'.$this->getJsTemplate().'.phtml');
	}
	
	// Get the template to load
	private function getJsTemplate() {
		// If product
		if($this->getPagePath() == self::PRODUCT_PAGE_PATH) return 'product';
		// If Success 
		if($this->getPagePath() == self::THANKYOU_PAGE_PATH) return 'success';
		// else return standard
		return 	'standard';
	}
	
	// Get the current page's Module_Controller_Action page
	public function getPagePath() {
		return Mage::app()->getRequest()->getModuleName().'_'.Mage::app()->getRequest()->getControllerName().'_'.Mage::app()->getRequest()->getActionName();
	}
	
	// Return if the module is active
	public function isEnabled() {
		$enabled = Mage::getStoreConfig('google/certifiedshops/active');
		return ($enabled==='1')?true:false;
	}

	//
	// PAGE SPECIFIC FUNCTIONS
	//
	
	// Return the current products SKU, if there is a product in the registry
	public function getCurrentProductSku() {
		if(Mage::registry('current_product')) {
			return Mage::registry('current_product')->getSku();
		}
		return '';
	}
	
	// Return object containing the last order
	public function getOrder() {
		return Mage::getModel('sales/order')->load(Mage::getSingleton('checkout/session')->getLastOrderId());
	}
	
	// Return object containing order item objects (objektz in yo' objektz)
	public function getOrderItems($_order) {
		return $_order->getAllItems();	
	}
	
	// Return object containing customer from last order
	public function getCustomer($_order) {
	 	return Mage::getModel('customer/customer')->load($_order->getCustomerId());	
	}
	
	// Return the base url without protocol
	public function getFormattedBaseUrl() {
		return str_replace('/', '', str_replace('http://', '', Mage::getBaseUrl()));
	}
	
	// Return the country for the shipping address from this order, if theres no shipping address, return from the billing address instead
	public function getOrderCountry($_order) {
		if($_order->getShippingAddressId() != '') {

			$shipping_address = Mage::getModel('sales/order_address')->load($_order->getShippingAddressId());
			return $shipping_address->getCountry();
		} else {
			$billing_address = Mage::getModel('sales/order_address')->load($_order->getBillingAddressId());
			return $billing_address->getCountry();
		}
	}
	
	public function getEstimatedShippingData($_order) {
		$order_date = $_order->getCreatedAt();
		$estimated_time = Mage::helper('googleshops')->getEstimatedShippingDelay();
		
		return date("Y-m-d", strtotime($order_date. ' + '.$estimated_time));
	}
	
	public function getEstimatedDeliveryData($_order) {
		$order_data = $_order->getCreatedAt();
		
		$estimated_time = Mage::helper('googleshops')->getEstimatedDeliveryDelay();
		
		return date("Y-m-d", strtotime($order_date. ' + '.$estimated_time));
	}
	
	// If order contains virtuals, return Y, if not return N
	public function isVirtual($_order) {
		return ($_order->getIsVirtual() == '0')? "N":"Y";	
	}
	
	// See if any of the items have been backordered, is so return Y, if not return N
	public function orderHasPreorders($_items) {
		$count = 0;
		foreach($_items as $_item) {
			$count = $count + (float)$_item->getQtyBackordered();
		}
		return ($count>0)?'Y':'N';
	}
	
}