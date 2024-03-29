<?php

namespace Openpay\Widgets\Plugin\Payment;

class Openpay {

    protected $helper;

    /*
     * @var \Magento\Framework\App\State
     */
    protected $_state;
    protected $request;

    public function __construct(
            \Openpay\Widgets\Helper\Data $helper,
            \Magento\Framework\App\State $state,
            \Magento\Framework\App\RequestInterface $request
    ) {
        $this->helper = $helper;
        $this->_state = $state;
        $this->request = $request;
    }

    public function afterGetTitle(\Openpay\Payment\Model\Openpay $subject, $result) {
        if ($this->helper->isCheckoutWidgetEnabled() && $this->_state->getAreaCode() !== 'adminhtml' && ($this->request->getFullActionName() !== 'checkout_onepage_success') && ($this->request->getActionName() !== 'reside')) {
            $result .= ' <img src="https://static.openpay.com.au/brand/logo/amber-lozenge-logo.svg" width="75px" class="payment-icon opy-chk-logo"/> <span class="learn-more"><opy-learn-more-button></opy-learn-more-button></span> ';
        }
        return $result;
    }

}
