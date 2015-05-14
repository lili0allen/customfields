<?php

class EasyMode_Customfields_Adminhtml_CustomfieldsController extends Mage_Adminhtml_Controller_Action
{
	protected function _initAction()
	{
		$this->loadLayout()
			->_setActiveMenu('customfields/items')
			->_addBreadcrumb(Mage::helper('adminhtml')->__('Field Manager'), Mage::helper('adminhtml')->__('Field Manager'));

		return $this;
	}

	public function indexAction()
	{
		$this->_initAction();

		//$this->_addContent($this->getLayout()->createBlock('customfields/adminhtml_customfields'));
		$this->renderLayout();
	}

	 public function editAction()
    {
        $customfieldsId     = $this->getRequest()->getParam('id');
        $customfieldsModel  = Mage::getModel('customfields/customfields')->load($customfieldsId);
 

        if ($customfieldsModel->getId() || $customfieldsId == 0) {
 
            Mage::register('customfields_data', $customfieldsModel);
 
            $this->loadLayout();
            $this->_setActiveMenu('customfields/items');
           
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Field Manager'), Mage::helper('adminhtml')->__('Field Manager'));
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Field News'), Mage::helper('adminhtml')->__('Field News'));
           
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
           
            $this->_addContent($this->getLayout()->createBlock('customfields/adminhtml_customfields_edit'))
                ->_addLeft($this->getLayout()->createBlock('customfields/adminhtml_customfields_edit_tabs'));
               
            $this->renderLayout();
        } else {



            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('customfields')->__('Item does not exist'));
            $this->_redirect('*/*/');
        }
    }
   
    public function newAction()
    {
        $this->_forward('edit');
    }
   
    public function saveAction()
    {
        if ( $this->getRequest()->getPost() ) {
            

            
            try {
                $postData = $this->getRequest()->getPost();
                $customfieldsModel = Mage::getModel('customfields/customfields');
                $customgroupsfieldsModel = Mage::getModel('customfields/customgroupsfields');
               
                $customfieldsModel->setId($this->getRequest()->getParam('id'))
                    ->setTitle($postData['title'])
                    ->setContent($postData['content']);

                $customfieldsModel->save();

                $customgroupsfieldsModel->setId($this->getRequest()->getParam('id'))
                    ->setCustomgroupsId($postData['customgroups_id'])
                    ->setCustomfieldsId($customfieldsModel->getId());

                $customgroupsfieldsModel->save();
               
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully saved'));
                Mage::getSingleton('adminhtml/session')->setCustomfieldsData(false);
 
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setCustomfieldsData($this->getRequest()->getPost());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }




        }
        $this->_redirect('*/*/');
    }
   
    public function deleteAction()
    {
        if( $this->getRequest()->getParam('id') > 0 ) {
            try {
                $customfieldsModel = Mage::getModel('customfields/customfields');
               
                $customfieldsModel->setId($this->getRequest()->getParam('id'))
                    ->delete();
                   
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }
    /**
     * Product grid for AJAX request.
     * Sort and filter result for example.
     */
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
               $this->getLayout()->createBlock('customfields/adminhtml_customfields_grid')->toHtml()
        );
    }
}