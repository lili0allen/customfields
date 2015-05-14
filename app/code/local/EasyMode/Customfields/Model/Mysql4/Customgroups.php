<?php

class EasyMode_Customfields_Model_Mysql4_Customgroups extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the customfields_id refers to the key field in your database table.
        $this->_init('customfields/customgroups', 'customgroups_id');
    }
}