<?php
namespace Openpay\Widgets\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class InfoIcons implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
                ['value' => '', 'label' => __('None')],
                ['value' => 'grey', 'label' => __('Grey')],
                ['value' => 'amber', 'label' => __('Amber')],
                ['value' => 'white', 'label' => __('White')]
            ];
    }
}
