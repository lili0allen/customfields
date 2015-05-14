<?php
class EasyMode_Customfields_Block_Customfields extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getCustomfields()     
     { 
        if (!$this->hasData('customfields')) {
            $this->setData('customfields', Mage::registry('customfields'));
        }
        return $this->getData('customfields');
        
    }
}