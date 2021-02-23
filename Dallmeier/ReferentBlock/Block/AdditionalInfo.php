<?php

namespace Dallmeier\ReferentBlock\Block;

use Dallmeier\CustomerAttribute\Model\TenantFactory;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Http\Context;
use Magento\Framework\View\Element\Template;

class AdditionalInfo extends Template
{
    protected $_tenantFactory;
    protected $customerSession;
    protected $httpContext;
    protected $customerRepositoryInterface;

    /**
     * @param Template\Context $context
     * @param Context $httpContext
     * @param Session $customerSession
     * @param CustomerRepositoryInterface $customerRepositoryInterface
     * @param TenantFactory $tenantFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Context $httpContext,
        Session $customerSession,
        CustomerRepositoryInterface $customerRepositoryInterface,
        TenantFactory $tenantFactory,
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

        $tenant = $this->_tenantFactory->create();

        $tenantRequested =$customerAttributeData['custom_attributes']['tenant_name']['value'];

        $resultCollections =  $tenant->getCollection()->getItemByColumnValue('tenant_name', $tenantRequested);

        if ($resultCollections === null) {
            $data = [
                'tenant_name'  => $tenantRequested,
                'customer_id'  => $customerId,
                'last_login_at' => time()
            ];

            $tenant->addData($data)->save();
        }

        return $customerAttributeData['custom_attributes'];
    }
}
