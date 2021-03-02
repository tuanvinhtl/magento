<?php


namespace Dallmeier\VirtualTypeExample\Api;


interface WarehouseManagementInterface
{
    public function getWarehouseInfo(string $code): array;
}
