<?php
namespace Dallmeier\CustomerAttribute\Model;

class Tenant extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'dallmeier_customerAttribute_tenant';

	protected $_cacheTag = 'dallmeier_customerAttribute_tenant';

	protected $_eventPrefix = 'dallmeier_customerAttribute_tenant';

	protected function _construct()
	{
		$this->_init('Dallmeier\CustomerAttribute\Model\ResourceModel\Tenant');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}