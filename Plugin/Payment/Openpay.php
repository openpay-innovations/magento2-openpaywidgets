<?php
namespace Openpay\Widgets\Plugin\Payment;

class Openpay
{
	protected $helper;
	
	/*
	 *@var \Magento\Framework\App\State
	*/
	protected $_state;


	public function __construct(
		\Openpay\Widgets\Helper\Data $helper,
		\Magento\Framework\App\State $state
	) {
		$this->helper = $helper;
		$this->_state = $state;
	}

	public function afterGetTitle(\Aopen\Openpay\Model\Openpay $subject, $result){
		
		if ($this->helper->isCheckoutWidgetEnabled() && $this->_state->getAreaCode()!== 'adminhtml') {
			$result .= '<span class="learn-more"><opy-learn-more-button></opy-learn-more-button></span>';
		}

		return $result;
	}
	
}