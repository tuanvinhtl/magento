<?php


namespace Dallmeier\VirtualTypeExample\Model;


use Dallmeier\VirtualTypeExample\Api\WarehouseManagementInterface;
use Dallmeier\VirtualTypeExample\Api\WarehouseRepositoryInterface;
use Magento\Framework\DataObject;

class WarehouseRepository implements WarehouseRepositoryInterface
{
    /**
     * @var WarehouseManagementInterface
     */
    protected WarehouseManagementInterface $warehouseManagement;

    public function __construct(WarehouseManagementInterface $warehouseManagement)
    {
        $this->warehouseManagement = $warehouseManagement;
    }

    public function newWarehouse(string $code): DataObject
    {
        return new DataObject($this->warehouseManagement->getWarehouseInfo($code));
    }
}
