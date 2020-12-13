require([
	'jquery',
], function ( $ ) {
		var element = $('opy-product-page');
		var product_type = element.attr('product-type');
 
		$(document).ready(function($) {
			updatePrice();

			$('body').on('click change', $('form#product_addtocart_form'), function (e) {
				updatePrice();
			});
		});

		function updatePrice()
		{
			if (product_type == "bundle" && $("[data-price-type=minPrice]:first").text() != "") {
				var priceTxt = $("[data-price-type=minPrice]:first").text();
			} else if ($("[data-price-type=finalPrice]:first").text() != "") {
				var priceTxt = $("[data-price-type=finalPrice]:first").text();
			} else {
				var priceTxt = $('span.price-final_price > span.price-wrapper > span.price:first').text();
			}
			
			var actualPrice = priceTxt.match(/[\d\.]+/g);
		
			if(actualPrice != null){
				if (actualPrice[1]) {
					variantPrice = actualPrice[0] + actualPrice[1];
				} else {
					variantPrice = actualPrice[0];
				}

				var price = parseFloat(Math.round(variantPrice * 100) / 100);

				element.attr('amount', price);

			}
		}
	}
);