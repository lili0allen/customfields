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
}