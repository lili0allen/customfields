<?php

class EasyMode_Customfields_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getOptionGroupId(){
		$option = array();
        //get the field id
        $customfields_id = Mage::app()->getRequest()->getParam('id');
        //get the group instance from the joint table
       $thegroup = Mage::getModel('customfields/customgroupsfields')->load($customfields_id,'customfields_id');
        //get the group instance from the group table
       $group = Mage::getModel('customfields/customgroups')->load($thegroup->getCustomgroupsId(),'customgroups_id');

        return $group->getCustomgroupsId();
	}

	public function getOptionGroup(){

		$option = array();

        $option[] = array(
            'value' => '',
            'label' => Mage::helper('customfields')->__('-------- Please select a group --------'),
        );

        $groups = Mage::getModel('customfields/customgroups')->getCollection();
        foreach ($groups as $value) {
            $option[] = array(
                'value' => $value->getCustomgroupsId(),
                'label' => $value->getTitle(),
            );
        }
        

        return $option;


	}

    
}