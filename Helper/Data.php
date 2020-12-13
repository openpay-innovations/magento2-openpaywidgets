<?php
namespace Openpay\Widgets\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    const XML_PATH_ENABLED = 'widgets/general/enable';
    const XML_PATH_REGION = 'widgets/general/region';
    const XML_PATH_TIERS = 'widgets/general/tiers';
    const XML_PATH_MIN = 'payment/openpay/minimum';
    const XML_PATH_MAX = 'payment/openpay/maximum';
    // const XML_PATH_MIN = 'payment/openpay/min_order_total';
    // const XML_PATH_MAX = 'payment/openpay/max_order_total';

    const XML_PATH_HEADER_INFOBELT = 'widgets/header/infobelt';
    const XML_PATH_HEADER_COLOR = 'widgets/header/color';
    const XML_PATH_HEADER_STICKY= 'widgets/header/sticky';

    const XML_PATH_PRODUCT_ENABLED = 'widgets/product/enable';
    const XML_PATH_LOGO_PRODUCT = 'widgets/product/productlogo';

    const XML_PATH_CATALOG_ENABLED = 'widgets/catalog/enable';
    const XML_PATH_CATALOG_LOGO = 'widgets/catalog/logo';
    const XML_PATH_LOGO_CATALOG = 'widgets/catalog/cataloglogo';

    const XML_PATH_CART_ENABLED = 'widgets/cart/enable';
    const XML_PATH_LOGO_CART = 'widgets/cart/cartlogo';

    const XML_PATH_CHECKOUT_ENABLED = 'widgets/checkout/enable';
    const XML_PATH_INSTALMENT_TEXT = 'widgets/checkout/instalment';
    const XML_PATH_REDIRECT_TEXT = 'widgets/checkout/redirect';

    const XML_PATH_LANDING_PAGE = 'widgets/landing/page';
    const XML_PATH_CUSTOM_CSS = 'widgets/openpaycustomcss/addcustomcss';

    protected $scopeConfig;

    protected $currency;

    protected $request;

    protected $pageRepository;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Directory\Model\Currency $currency,
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Cms\Api\PageRepositoryInterface $pageRepository
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->currency = $currency;
        $this->request = $request;
        $this->pageRepository = $pageRepository;
        parent::__construct($context);
    }

    public function isEnabled()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue(self::XML_PATH_ENABLED, $storeScope);
    }

    public function getRegion()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_REGION, $storeScope);
        }
        
        return false;
    }

    public function getCurrency()
    {
        if ($this->isEnabled()) {
            return $this->currency->getCurrencySymbol();
        }
        
        return false;
    }

    public function getTiers()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_TIERS, $storeScope);
        }
        
        return false;
    }


    public function getMinTotal()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_MIN, $storeScope);
        }
        
        return false;
    }

    public function getMaxTotal()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_MAX, $storeScope);
        }
        
        return false;
    }

    public function getHeaderWidgetInfobelt()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_HEADER_INFOBELT, $storeScope);
        }
        
        return false;
    }

    public function getHeaderWidgetColor()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_HEADER_COLOR, $storeScope);
        }
        
        return false;
    }

    public function getHeaderWidgetSticky()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_HEADER_STICKY, $storeScope);
        }
        
        return false;
    }




    public function isProductWidgetEnabled()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_PRODUCT_ENABLED, $storeScope);
        }
        
        return false;
    }

    public function getProductLogo()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_LOGO_PRODUCT, $storeScope);
        }
        
        return false;
    }


    public function isCatalogWidgetEnabled()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_CATALOG_ENABLED, $storeScope);
        }
        
        return false;
    }


    public function isCatalogLogo()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_CATALOG_LOGO, $storeScope);
        }
        
        return false;
    }

    public function getCatalogLogo()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_LOGO_CATALOG, $storeScope);
        }
        
        return false;
    }

    public function isCartWidgetEnabled()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_CART_ENABLED, $storeScope);
        }
        
        return false;
    }

    public function getCartLogo()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_LOGO_CART, $storeScope);
        }
        
        return false;
    }

    public function isCheckoutWidgetEnabled()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_CHECKOUT_ENABLED, $storeScope);
        }
        
        return false;
    }

    public function getInstalmentText()
    {
        if ($this->isCheckoutWidgetEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_INSTALMENT_TEXT, $storeScope);
        }
        
        return false;
    }

    public function getCustomCSS()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_CUSTOM_CSS, $storeScope);
        }
        
        return false;
    }

    public function getRedirectText()
    {
        if ($this->isCheckoutWidgetEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_REDIRECT_TEXT, $storeScope);
        }
        
        return false;
    }

    public function getMonthText()
    {
        if ($this->isCheckoutWidgetEnabled()) {
            $tiers = explode(',', $this->getTiers());
            $tiersmin = sizeof($tiers);
            if ($this->getRegion() == 'AU') {
                if ($tiersmin == 1) {
                    return __('Spread the cost over <span>%1</span> months.', min($tiers), max($tiers));
                } else {
                    return __('Spread the cost over <span>%1-%2</span> months.', min($tiers), max($tiers));
                }
                return __('Spread the cost over <span>%1-%2</span> months.', min($tiers), max($tiers));
            } else {
                if ($tiersmin == 1) {
                    return __('Pay over <span>%1</span> interest free <br>monthly instalments.', min($tiers), max($tiers));
                } else {
                    return __('Pay over <span>%1-%2</span> interest free <br>monthly instalments.', min($tiers), max($tiers));
                }
            }
        }
        
        return false;
    }

    public function getLandingPage()
    {
        if ($this->isEnabled()) {
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
            return $this->scopeConfig->getValue(self::XML_PATH_LANDING_PAGE, $storeScope);
        }

        return false;
    }

    public function isLangingPage()
    {
        if ($this->isEnabled()) {
            if ($this->getCurrentPageUrlKey() && $this->getCurrentPageUrlKey() === $this->getLandingPage()) {
                return true;
            }
        }

        return false;
    }

    public function getCurrentPageUrlKey()
    {
        try {
            $pageId = $this->request->getParam('page_id', $this->request->getParam('id', false));
            $page = $this->pageRepository->getById($pageId);
            return $page->getIdentifier();
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
            return false;
        }
    }
}
