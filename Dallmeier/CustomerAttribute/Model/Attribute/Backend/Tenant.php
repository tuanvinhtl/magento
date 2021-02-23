<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Dallmeier\CustomerAttribute\Model\Attribute\Backend;
use Magento\Framework\Exception\LocalizedException;

class Tenant extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{

      
    protected $_tenantFactory;

      /**
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    public function __construct(\Dallmeier\CustomerAttribute\Model\TenantFactory $tenantFactory)
    {
        $this->_tenantFactory = $tenantFactory;
    }

     /**
     * @param \Magento\Framework\DataObject $object
     * @return void
     */
    public function beforeSave($object)
    { 
      
        $value = $object->getData($this->getAttribute()->getAttributeCode());
        $tenant = $this->_tenantFactory->create();
        $resultColections =  $tenant->getCollection()->getData();

        foreach ($resultColections as $keyValues) {
            # code...
            if($keyValues['tenant_name'] === $value){
                throw new LocalizedException(
                    __(
                        'Please regis other tenant name'
                    )
                );
            }
        } 
    }



    //  /**
    //  * @param \Magento\Framework\DataObject $object
    //  * @return void
    //  */
    // public function afterSave($object)
    // { 
      
    //     $value = $object->getData($this->getAttribute()->getAttributeCode());
    //     $tenant = $this->_tenantFactory->create();

    //     $data = [
    //         'tenant_name'  => $value,
    //     ];
    
    //     $tenant->addData($data)->save();
       
    // }

}