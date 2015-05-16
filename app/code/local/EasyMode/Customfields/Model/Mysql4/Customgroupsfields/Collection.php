<?php

class EasyMode_Customfields_Model_Mysql4_Customgroupsfields_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public $sort_field;
    public $sort_order;

    public function _construct()
    {
        parent::_construct();
        $this->_init('customfields/customgroupsfields');
    }
    

    public function addGroupFilter($group_id, $sort_field='id', $sort_order='DESC')
    {
        switch ($sort_field) {
            case 'id':
                $this->sort_field='table_1.customfields_id';
                break;
            case 'title':
                $this->sort_field='table_1.title';
                break;
            default:
                $this->sort_field='table_1.customfields_id';
                break;
        }

        switch ($sort_order) {
            case 'ASC':
                $this->sort_order='ASC';
                break;
            case 'asc':
                $this->sort_order='ASC';
                break;
            case 'DESC':
                $this->sort_order='DESC';
                break;
            case 'desc':
                $this->sort_order='DESC';
                break;
            default:
                $this->sort_order='DESC';
                break;
        }

        $this->getSelect()->join(
        	array('table_1'=>$this->getTable('customfields/customfields')),
        	'main_table.customfields_id = table_1.customfields_id AND table_1.customgroups_id = '.$group_id.' ORDER BY '.$this->sort_field.' '.$this->sort_order,
        	array('*')
        	);

        return $this;
    }

}