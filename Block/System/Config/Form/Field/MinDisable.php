<?php
namespace Openpay\Widgets\Block\System\Config\Form\Field;

use Magento\Framework\Data\Form\Element\AbstractElement;

class MinDisable extends \Magento\Config\Block\System\Config\Form\Field
{
	protected $helper;

	public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Openpay\Widgets\Helper\Data $helper,
		array $data = []
	) {
		$this->helper = $helper;
		parent::__construct($context, $data);
    }

    protected function _getElementHtml(AbstractElement $element)
    {
        $element->setData('readonly', 1);
        $element->setData('value', $this->helper->getMinTotal());
        return $element->getElementHtml();
    }
}
