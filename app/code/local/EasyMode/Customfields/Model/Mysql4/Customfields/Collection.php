<?php

class EasyMode_Customfields_Model_Mysql4_Customfields_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('customfields/customfields');
    }

    public function addTitleFilter($title)
    {
        $this->getSelect()->where('title = ?', $title);
        return $this;
    }

    public function addIdFilter($id)
    {
        $this->getSelect()->where('customfields_id = ?', $id);
        return $this;
    }

     public function joinGroupsTable()
    {

        $this->getSelect()->joinLeft(
            array('table_1'=>$this->getTable('customfields/customgroups')),
            'main_table.customgroups_id = table_1.customgroups_id',
            array('group_title'=>'table_1.title')
            );
        return $this;
    }

}