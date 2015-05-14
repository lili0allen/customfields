<?php
class EasyMode_Customfields_Block_Adminhtml_Customgroups_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form();
		$this->setForm($form);


		$fieldset = $form->addFieldset('customgroups_form', array('legend'=>Mage::helper('customfields')->__('Group Information')));

		$fieldset->addField('title','text', array(
			'label'		=> Mage::helper('customfields')->__('Title'),
			'class'		=> 'required-entry',
			'required'	=> true,
			'name'		=> 'title',
			));

        $fieldset->addField('description', 'editor', array(
            'name'      => 'description',
            'label'     => Mage::helper('customfields')->__('Description'),
            'title'     => Mage::helper('customfields')->__('Description'),
            'required'  => false,
        ));

        
       
        if ( Mage::getSingleton('adminhtml/session')->getCustomgroupsData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getCustomgroupsData());
            Mage::getSingleton('adminhtml/session')->getCustomgroupsData(null);
        } elseif ( Mage::registry('customgroups_data') ) {
            $form->setValues(Mage::registry('customgroups_data')->getData());
        }
        return parent::_prepareForm();
	}

    


}