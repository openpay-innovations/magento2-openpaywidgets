<?php
namespace Openpay\Widgets\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Logocatalog implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
                ['value' => 'grey', 'label' => __('Grey')],
                ['value' => 'white', 'label' => __('White')]
               
                
            ];
    }
}
