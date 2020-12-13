define([
   'jquery',
   'Magento_Checkout/js/view/summary/abstract-total',
   'Magento_Checkout/js/model/quote'
], function ($, Component, quote) {
    'use strict';
    return function (shipping) {
        return shipping.extend({
            getValue: function () {
                var grantTotal = this.totals()['grand_total'];
                $('opy-cart').attr('amount', grantTotal);
            }
        });
    }
});