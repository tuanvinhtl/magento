<?php

namespace Dallmeier\ReferentBlock\Block;

use Magento\Framework\View\Element\Template;

class AdditionalInfo extends Template
{
    
    protected $_tenantFactory;

    protected $customerSession;
    protected $customerRepositoryInterface;
        /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\App\Http\Context $httpContext
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface,
        \Dallmeier\CustomerAttribute\Model\TenantFactory $tenantFactory,
        array $data = []
    ) {

        parent::__construct($context, $data);
        $this->httpContext = $httpContext;
        $this->customerRepositoryInterface = $customerRepositoryInterface;
        $this->customerSession = $customerSession;
        $this->_tenantFactory = $tenantFactory;
    }

    public function _prepareLayout()
    {

        $customerId=$this->customerSession->getCustomer()->getId();
        $customer = $this->customerRepositoryInterface->getById($customerId);
        $customerAttributeData = $customer->__toArray();


        // $customerAttributeData['custom_attributes']['tenant_name']['value'];
           
        $tenant = $this->_tenantFactory->create();

        $tenantRequested =$customerAttributeData['custom_attributes']['tenant_name']['value'];

        $resultColections =  $tenant->getCollection()->getItemByColumnValue('tenant_name',$tenantRequested);


        if($resultColections === null){

            $data = [
                'tenant_name'  => $tenantRequested,
                'customer_id'  => $customerId,
                'last_login_at' => time()
            ];
        
            $tenant->addData($data)->save();
        }



     
        
        
        return $customerAttributeData['custom_attributes'] ;
    }
    
}

