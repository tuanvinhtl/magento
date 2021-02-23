<?php
namespace Dallmeier\CustomerAttribute\Model\ResourceModel\Tenant;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'tenant_id';
	protected $_eventPrefix = 'dallmeier_customer_attribute_tenant_collection';
	protected $_eventObject = 'tenant_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Dallmeier\CustomerAttribute\Model\Tenant', 'Dallmeier\CustomerAttribute\Model\ResourceModel\Tenant');
	}

}