<?php
class EasyMode_Customfields_Block_Adminhtml_Customfields_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct()
	{
		parent::__construct();

		$this->_objectId = 'id';

		$this->_blockGroup = 'customfields';
		$this->_controller = 'adminhtml_customfields';

		$this->_updateButton('save','label', Mage::helper('customfields')->__('Save Field'));
		$this->_updateButton('delete','label', Mage::helper('customfields')->__('Delete Field'));


	}

	public function getHeaderText()
	{
		if(Mage::registry('customfields_data') && Mage::registry('customfields_data')->getId()){
			return Mage::helper('customfields')->__("Edit Field '%s'", $this->htmlEscape(Mage::registry('customfields_data')->getTitle()));
		}else{
			return Mage::helper('customfields')->__('Add Field');
		}
	}

	protected function _prepareLayout()
    {
        $return = parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
        return $return;
    }

	

}