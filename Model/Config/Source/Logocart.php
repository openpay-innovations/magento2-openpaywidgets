<?php
namespace Openpay\Widgets\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Logocart implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
        		['value' => 'grey-on-amberbg', 'label' => __('Grey Logo with Amber Background')],
                ['value' => 'grey', 'label' => __('Grey')]
               
                
            ];
    }
}