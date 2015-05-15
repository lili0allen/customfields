<?php
class EasyMode_Customfields_Block_Adminhtml_Customfields_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('customfieldsGrid');
		$this->setDefaultSort('customfields_id');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
		$this->setUseAjax(true);

	}

	protected function _prepareCollection()
	{
		$collection = Mage::getModel('customfields/customfields')->getCollection()->joinGroupsTable();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}

	protected function _prepareColumns()
	{
		
		$this->addColumn('customfields_id', array(
			'header'	=> Mage::helper('customfields')->__('ID'),
			'align'		=> 'right',
			'width'		=> '50px',
			'index'		=> 'customfields_id',
			));

		$this->addColumn('title', array(
			'header'	=> Mage::helper('customfields')->__('Title'),
			'align'		=> 'left',
			'index'		=> 'title',
			));

		$this->addColumn('group_title', array(
			'header'	=> Mage::helper('customfields')->__('Group'),
			'align'		=> 'left',
			'index'		=> 'group_title',
			));

		$this->addColumn('content', array(
			'header'	=> Mage::helper('customfields')->__('Content'),
			'align'		=> 'left',
			'index'		=> 'content',
			));




		return parent::_prepareColumns();
	}

	public function getRowUrl($row)
	{
		return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	}

	public function getGridUrl()
	{
		return $this->getUrl('*/*/grid', array('_current' => true));
	}

}