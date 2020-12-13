<?php
namespace Openpay\Widgets\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\View\LayoutInterface;
use Openpay\Widgets\Helper\Data;

class ConfigProvider implements ConfigProviderInterface
{
    protected $layout;
    protected $helper;
    
    public function __construct(
        LayoutInterface $layout,
        Data $helper
    ) {
        $this->layout = $layout;
        $this->helper = $helper;
    }

    public function getConfig()
    {
        $config = [];
        $config['widgetEnabled'] = (int) $this->helper->isCheckoutWidgetEnabled();
        if ($this->helper->isCheckoutWidgetEnabled()) {
            $config['widgetSetting'] = $this->getConfigsetting();
            return $config;
        } else {
            return $config;
        }
    }
    
    protected function getConfigsetting()
    {
        return[
            'instalment_text' => $this->helper->getInstalmentText(),
            'redirect_text' => $this->helper->getRedirectText(),
            'month_text' => $this->helper->getMonthText()
        ];
    }
}
