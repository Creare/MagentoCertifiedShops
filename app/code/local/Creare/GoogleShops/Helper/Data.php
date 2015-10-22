<?php

class Creare_GoogleShops_Helper_Data extends Mage_Core_Helper_Abstract {
	
	// Congif XML Paths
	const XML_PATH_CERTIFIED_SHOP_ID = 'google/certifiedshops/trusted_store_id';
	const XML_PATH_BADGE_POSITION = 'google/certifiedshops/badge_position';
	const XML_PATH_LOCALE = 'google/certifiedshops/locale';
	const XML_PATH_GOOGLE_SHOPPING_ACCOUNT_ID = 'google/certifiedshops/google_shopping_account_id';
	const XML_PATH_GOOGLE_SHOPPING_COUNTRY = 'google/certifiedshops/google_shopping_country';
	const XML_PATH_GOOGLE_SHOPPING_LANGUAGE = 'google/certifiedshops/google_shopping_language';
	const XML_PATH_ESTIMATED_SHIPPING_DELAY = 'google/certifiedshops/estimated_shipping';
	const XML_PATH_ESTIMATED_DELIVERY_DELAY = 'google/certifiedshops/estimated_delivery';
	
	// Get the Shop ID from Config
	public function getShopId() {
		return Mage::getStoreConfig(self::XML_PATH_CERTIFIED_SHOP_ID);
	}
	
	// Get the Badge Position from Config
	public function getBadgePosition() {
		return Mage::getStoreConfig(self::XML_PATH_BADGE_POSITION);
	}
	
	// Get the Locale from Config
	public function getLocale() {
		return Mage::getStoreConfig(self::XML_PATH_LOCALE);
	}
	
	// Get the Google Shopping Account Id from Config
	public function getGoogleShoppingAccountId() {
		return Mage::getStoreConfig(self::XML_PATH_GOOGLE_SHOPPING_ACCOUNT_ID);
	}
	
	// Get the Google Shopping Country from Config
	public function getGoogleShoppingCountry() {
		return Mage::getStoreConfig(self::XML_PATH_GOOGLE_SHOPPING_COUNTRY);
	}
	
	// Get the Google Shopping Language from Config
	public function getGoogleShoppingLanguage() {
		return Mage::getStoreConfig(self::XML_PATH_GOOGLE_SHOPPING_LANGUAGE);
	}
	
	// Get the Estimated Shipping Delay from Config
	public function getEstimatedShippingDelay() {
		return Mage::getStoreConfig(self::XML_PATH_ESTIMATED_SHIPPING_DELAY);
	}
	
	// Get the Estimated Delivery Delay from Config
	public function getEstimatedDeliveryDelay() {
		return Mage::getStoreConfig(self::XML_PATH_ESTIMATED_DELIVERY_DELAY);
	}
	
	
}