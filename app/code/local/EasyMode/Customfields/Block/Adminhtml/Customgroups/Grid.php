<?php
class EasyMode_Customfields_Block_Adminhtml_Customgroups_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('customgroupsGrid');
		$this->setDefaultSort('customgroups_id');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
		$this->setUseAjax(true);

	}

	protected function _prepareCollection()
	{
		$collection = Mage::getModel('customfields/customgroups')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}

	protected function _prepareColumns()
	{
		$this->addColumn('customgroups_id', array(
			'header'	=> Mage::helper('customfields')->__('ID'),
			'align'		=> 'right',
			'width'		=> '50px',
			'index'		=> 'customgroups_id',
			));

		$this->addColumn('title', array(
			'header'	=> Mage::helper('customfields')->__('Title'),
			'align'		=> 'left',
			'index'		=> 'title',
			));

		$this->addColumn('description', array(
			'header'	=> Mage::helper('customfields')->__('Description'),
			'align'		=> 'left',
			'index'		=> 'description',
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