<?php

class Creare_GoogleShops_Model_System_Config_Source_Deliverytime {
	public function toOptionArray()
	  {
		return array(
		  array('value' => '3 days', 'label' => Mage::helper('googleshops')->__('3 Days')),
		  array('value' => '5 days', 'label' => Mage::helper('googleshops')->__('5 Days')),
		  array('value' => '7 days', 'label' => Mage::helper('googleshops')->__('7 Days')),
		 // and so on...
		);
	  }
}