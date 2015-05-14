<?php
class EasyMode_Customfields_Block_Adminhtml_Customfields_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('customfields_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle(Mage::helper('customfields')->__('Field Information'));
	}

	protected function _beforeToHtml()
	{
		$this->addTab('form_section', array(
				'label'		=> Mage::helper('customfields')->__('Field Information'),
				'title'		=> Mage::helper('customfields')->__('Field Information'),
				'content'	=> $this->getLayout()->createBlock('customfields/adminhtml_customfields_edit_tab_form')->toHtml(),
			));

		return parent::_beforeToHtml();
	}

}