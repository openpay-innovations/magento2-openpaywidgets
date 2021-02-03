var config = {
    "paths":{
        'openpay': 'https://widgets.openpay.com.au/lib/openpay-widgets.min'
    },
    map: {
        '*': {
            products: 'Openpay_Widgets/js/view/product/openpay-products',
            'Aopen_Openpay/js/view/payment/method-renderer/openpay-method':'Openpay_Widgets/js/view/payment/method-renderer/openpay-method'
        }
    },
    config: {
		mixins: {
    		'Magento_Checkout/js/view/summary/shipping': {
    			'Openpay_Widgets/js/view/cart/summary/shipping-mixin': true
    		},
        }
	}
};