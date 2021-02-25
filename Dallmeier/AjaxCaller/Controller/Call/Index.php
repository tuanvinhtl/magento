<?php
namespace Dallmeier\AjaxCaller\Controller\Call;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_resultJsonFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        JsonFactory  $resultJsonFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_resultJsonFactory  = $resultJsonFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $result  = $this->_resultJsonFactory->create();
        if ($this->getRequest()->isAjax()) {
            $test=[
                'Firstname' => 'What is your firstname',
                'Email' => 'What is your emailId',
                'Lastname' => 'What is your lastname',
                'Country' => 'Your Country'
            ];
            return $result->setData($test);
        }
    }
}
