<?php
class EasyMode_Customfields_Block_Adminhtml_Customfields extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
	{
		$this->_controller = 'adminhtml_customfields';
		$this->_blockGroup = 'customfields';
		$this->_headerText = Mage::helper('customfields')->__('Field Manager');
		$this->_addButtonLabel = Mage::helper('customfields')->__('Add Field');
		parent::__construct();
	}


	
}