<?php

class EasyMode_Customfields_Model_Customfields extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('customfields/customfields');
    }
}