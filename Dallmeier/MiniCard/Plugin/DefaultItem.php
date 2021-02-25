<?php


namespace Dallmeier\MiniCard\Plugin;

use Magento\Quote\Model\Quote\Item;

class DefaultItem
{
    public function beforeGetItemData(\Magento\Checkout\CustomerData\DefaultItem $subject, Item $item)
    {
        return [$item];
    }
}
