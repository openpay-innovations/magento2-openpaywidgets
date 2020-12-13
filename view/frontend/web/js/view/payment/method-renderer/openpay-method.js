define(
    [
        'Magento_Checkout/js/view/payment/default',
        'jquery',
        'ko',
        'Magento_Checkout/js/model/quote',
        'Magento_Catalog/js/price-utils',
        'Magento_Checkout/js/model/totals'
    ],
    function (Component,$,ko,quote,priceUtils,totals) {
        'use strict';
        return Component.extend({
            initialize: function () {
                this._super();
            },

            defaults: {
                template: 'Openpay_Widgets/payment/openpay'
            },

            placeOrder: function (data, event) {
                var self = this;

                if (event) {
                    event.preventDefault();
                }

                if (this.validate()) {
                    this.isPlaceOrderActionAllowed(false);

                    this.getPlaceOrderDeferredObject()
                        .fail(
                            function () {
                                self.isPlaceOrderActionAllowed(true);
                            }
                        ).done(
                            function () {
                                if (self.redirectAfterPlaceOrder) {
                                    if (!location.origin) {
                                        location.origin = location.protocol + "//" + location.host;
                                    }
                                    window.location.replace(window.authenticationPopup.baseUrl + 'openpay/handoverurl/index');
                                    return false;
                                }
                            }
                        );

                    return true;
                }

                return false;
            },

            getInstructions: function () {
                return window.checkoutConfig.payment.instructions[this.item.method];
            },

            getEnabled: function () {
                var widgetEnabled = window.checkoutConfig.widgetEnabled;
                if (widgetEnabled !== 1) {
                    return 0;
                } else {
                    return 1;
                }
            },

            getInstalmentText: function () {
                var widgetEnabled = window.checkoutConfig.widgetEnabled;
                if (widgetEnabled !== 1) {
                    return '';
                }
                var widgetSettingConfig = window.checkoutConfig.widgetSetting;
                return widgetSettingConfig.instalment_text;
            },

            getRedirectText: function () {
                var widgetEnabled = window.checkoutConfig.widgetEnabled;
                if (widgetEnabled !== 1) {
                    return '';
                }
                var widgetSettingConfig = window.checkoutConfig.widgetSetting;
                return widgetSettingConfig.redirect_text;
            },

            getMonthText: function () {
                var widgetEnabled = window.checkoutConfig.widgetEnabled;
                if (widgetEnabled !== 1) {
                    return '';
                }
                var widgetSettingConfig = window.checkoutConfig.widgetSetting;
                return widgetSettingConfig.month_text;
            },
        });
    }
);
