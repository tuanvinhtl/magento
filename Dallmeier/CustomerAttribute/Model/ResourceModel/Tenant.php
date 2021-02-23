<?php
namespace Dallmeier\CustomerAttribute\Model\ResourceModel;


class Tenant extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('tenant_register', 'id');
	}
	
}