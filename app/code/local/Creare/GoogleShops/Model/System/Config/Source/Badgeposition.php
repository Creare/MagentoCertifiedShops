<?php

class Creare_GoogleShops_Model_System_Config_Source_Badgeposition {
	public function toOptionArray()
	  {
		return array(
		  array('value' => 'BOTTOM_RIGHT', 'label' => Mage::helper('googleshops')->__('Bottom Right')),
		  array('value' => 'BOTTOM_LEFT', 'label' => Mage::helper('googleshops')->__('Bottom Left')),
		  array('value' => 'TOP_RIGHT', 'label' => Mage::helper('googleshops')->__('Top Right')),
		  array('value' => 'TOP_LEFT', 'label' => Mage::helper('googleshops')->__('Top Left')),
		 // and so on...
		);
	  }
}