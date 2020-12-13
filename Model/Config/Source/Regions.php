<?php
namespace Openpay\Widgets\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Regions implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
                ['value' => 'AU', 'label' => __('Australia')],
                ['value' => 'UK', 'label' => __('United Kingdom')]
            ];
    }
}
