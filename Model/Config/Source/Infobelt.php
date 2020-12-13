<?php
namespace Openpay\Widgets\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Infobelt implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
                ['value' => 'homepage', 'label' => __('Home Page')],
                ['value' => 'acrossthesite', 'label' => __('Across the Site')],
                ['value' => 'off', 'label' => __('Off')]
            ];
    }
}

