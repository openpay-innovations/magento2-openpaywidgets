<?php
namespace Openpay\Widgets\Plugin\Block\Product;

class ListProduct
{
    public function __construct(
        \Openpay\Widgets\Helper\Data $helper
    ) {
        $this->helper = $helper;
    }

    public function aroundGetProductDetailsHtml(
        \Magento\Catalog\Block\Product\ListProduct $subject,
        \Closure $proceed,
        \Magento\Catalog\Model\Product $product
    ) {
        if ($this->helper->isEnabled() && $this->helper->isCatalogWidgetEnabled()) {
            $result = '';
            $openpayTag = '';
            $renderer = $subject->getDetailsRenderer($product->getTypeId());

            if ($renderer) {
                $renderer->setProduct($product);
                $result = $renderer->toHtml();
            }

            if ($this->helper->isCatalogLogo()) {
                $openpayTag = '<span><opy-product-listing amount="'.$product->getFinalPrice().'" logo="'.$this->helper->getCatalogLogo().'" hide-logo="false"></opy-product-listing></span>';
            } else {
                $openpayTag = '<span><opy-product-listing amount="'.$product->getFinalPrice().'" hide-logo="true"></opy-product-listing></span>';
            }

            return $openpayTag.$result;
        }

        $proceed($product);
    }
}
