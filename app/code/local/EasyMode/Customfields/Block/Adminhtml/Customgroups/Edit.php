<?php
class EasyMode_Customfields_Block_Adminhtml_Customgroups_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct()
	{
		parent::__construct();

		$this->_objectId = 'id';

		$this->_blockGroup = 'customfields';
		$this->_controller = 'adminhtml_customgroups';

		$this->_updateButton('save','label', Mage::helper('customfields')->__('Save Group'));
		$this->_updateButton('delete','label', Mage::helper('customfields')->__('Delete Group'));


	}

	public function getHeaderText()
	{
		if(Mage::registry('customgroups_data') && Mage::registry('customgroups_data')->getId()){
			return Mage::helper('customfields')->__("Edit Group '%s'", $this->htmlEscape(Mage::registry('customgroups_data')->getTitle()));
		}else{
			return Mage::helper('customfields')->__('Add Group');
		}
	}



	

}