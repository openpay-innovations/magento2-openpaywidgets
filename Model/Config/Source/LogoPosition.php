<?php
namespace Openpay\Widgets\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class LogoPosition implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
        		['value' => 'right', 'label' => __('Right')],
                ['value' => 'left', 'label' => __('Left')]
                
            ];
    }
}
