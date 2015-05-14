<?php
class EasyMode_Customfields_Block_Adminhtml_Customfields_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form();
		$this->setForm($form);

  $form->setHtmlIdPrefix('customfields');
  $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig(array('tab_id' => 'form_section'));
  $wysiwygConfig["files_browser_window_url"] = Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg_images/index');
  $wysiwygConfig["directives_url"] = Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg/directive');
  $wysiwygConfig["directives_url_quoted"] = Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg/directive');
  $wysiwygConfig["widget_window_url"] = Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/widget/index');
  $wysiwygConfig["files_browser_window_width"] = (int) Mage::getConfig()->getNode('adminhtml/cms/browser/window_width');
  $wysiwygConfig["files_browser_window_height"] = (int) Mage::getConfig()->getNode('adminhtml/cms/browser/window_height');
  $plugins = $wysiwygConfig->getData("plugins");
  $plugins[0]["options"]["url"] = Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/system_variable/wysiwygPlugin');
  $plugins[0]["options"]["onclick"]["subject"] = "MagentovariablePlugin.loadChooser('".Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/system_variable/wysiwygPlugin')."', '{{html_id}}');";
  $plugins = $wysiwygConfig->setData("plugins",$plugins);




		$fieldset = $form->addFieldset('customfields_form', array('legend'=>Mage::helper('customfields')->__('Field Information')));

		$fieldset->addField('title','text', array(
			'label'		=> Mage::helper('customfields')->__('Title'),
			'class'		=> 'required-entry',
			'required'	=> true,
			'name'		=> 'title',
			));

    //if ($this->getRequest()->getParam('id') || count(Mage::helper('customfields')->getOptionGroupId()) > 1){
      $fieldset->addField('customgroups_id', 'select', array(
        'label' => Mage::helper('customfields')->__('Group'),
        'name' => 'customgroups_id',
        'values' => Mage::helper('customfields')->getOptionGroup(),


      ));
    //}   

        $fieldset->setData('customgroups_id', Mage::helper('customfields')->getOptionGroupId());


    $fieldset->addField('content', 'editor', array(
        'name'      => 'content',
        'label'     => Mage::helper('customfields')->__('Content'),
        'title'     => Mage::helper('customfields')->__('Content'),
        'style'     => 'width:600px; height:200px;',
        'config'    => $wysiwygConfig,
        'required'  => true,
        'wysiwyg'   => true,
    ));




        
       
        if ( Mage::getSingleton('adminhtml/session')->getCustomfieldsData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getCustomfieldsData());
            Mage::getSingleton('adminhtml/session')->setCustomfieldsData(null);
        } elseif ( Mage::registry('customfields_data') ) {
            $form->setValues(Mage::registry('customfields_data')->getData());
        }
        return parent::_prepareForm();
	}

    

}