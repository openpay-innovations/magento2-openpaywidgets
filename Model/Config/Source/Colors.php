<?php
namespace Openpay\Widgets\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Colors implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
        		['value' => 'amber', 'label' => __('Amber')],
                ['value' => 'grey', 'label' => __('Grey')],
                ['value' => 'white', 'label' => __('White')]
                
            ];
    }
}
