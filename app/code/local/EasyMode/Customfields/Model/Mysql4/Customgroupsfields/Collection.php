<?php

class EasyMode_Customfields_Model_Mysql4_Customgroupsfields_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('customfields/customgroupsfields');
    }

    public function joinFieldsTable()
    {
    	$this->getSelect()->join(
    		array('FieldsTable'=>$this->getTable('customfields/customgroups')),
    		'main_table.customgroups_id = FieldsTable.customgroups_id',
    		array('*'));

    	return $this;
    }

    public function joinGroupsTable()
    {
    	$this->getSelect()->join(
    		array('GroupsTable'=>$this->getTable('customfields/customfields')),
    		'main_table.customfields_id = GroupsTable.customfields_id',
    		array('*'));

    	return $this;
    }

}