<?php

namespace Dallmeier\CustomerSections\CustomerData;
use Magento\Customer\CustomerData\SectionSourceInterface;

class CustomSection implements SectionSourceInterface
{

    /**
     * @return array
     */
    public function getSectionData()
    {
        return [
            'msg' =>'Data from section',
        ];
    }
}
