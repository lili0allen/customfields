<?php
class EasyMode_Customfields_Block_Adminhtml_Customgroups extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
	{
		$this->_controller = 'adminhtml_customgroups';
		$this->_blockGroup = 'customfields';
		$this->_headerText = Mage::helper('customfields')->__('Group Manager');
		$this->_addButtonLabel = Mage::helper('customfields')->__('Add Group');
		parent::__construct();
	}

	
}