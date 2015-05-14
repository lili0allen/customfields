<?php

class EasyMode_Customfields_Adminhtml_CustomgroupsController extends Mage_Adminhtml_Controller_Action
{
	protected function _initAction()
	{
		$this->loadLayout()
			->_setActiveMenu('customfields/customgroups')
			->_addBreadcrumb(Mage::helper('adminhtml')->__('Groups Manager'), Mage::helper('adminhtml')->__('Groups Manager'));

		return $this;
	}

	public function indexAction()
	{
		$this->_initAction()->renderLayout();
	}

	 public function editAction()
    {
        $customgroupsId     = $this->getRequest()->getParam('id');
        $customgroupsModel  = Mage::getModel('customfields/customgroups')->load($customgroupsId);
 

        if ($customgroupsModel->getId() || $customgroupsId == 0) {
 
            Mage::register('customgroups_data', $customgroupsModel);
 
            $this->loadLayout();
            $this->_setActiveMenu('customfields/customgroups');
           
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Group Manager'), Mage::helper('adminhtml')->__('Group Manager'));
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Group News'), Mage::helper('adminhtml')->__('Group News'));
           
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
           
            $this->_addContent($this->getLayout()->createBlock('customfields/adminhtml_customgroups_edit'))
                ->_addLeft($this->getLayout()->createBlock('customfields/adminhtml_customgroups_edit_tabs'));
               
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
                $customgroupsModel = Mage::getModel('customfields/customgroups');
               
                $customgroupsModel->setId($this->getRequest()->getParam('id'))
                    ->setTitle($postData['title'])
                    ->setDescription($postData['description']);
                 
                $customgroupsModel->save();
               
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('customfields')->__('Group was successfully saved'));
                Mage::getSingleton('adminhtml/session')->setCustomgroupsData(false);
 
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setCustomgroupsData($this->getRequest()->getPost());
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
                $customgroupsModel = Mage::getModel('customfields/customgroups');
               
                $customgroupsModel->setId($this->getRequest()->getParam('id'))
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
               $this->getLayout()->createBlock('customfields/adminhtml_customgroups_grid')->toHtml()
        );
    }
}