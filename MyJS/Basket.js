	function basketUpdate () {
		if (parseInt(getCookie("goods")) > 0) {
			$('#myGoods p.titleDream').hide(0);
			$('#clearBasket').show(0);
		}
		var points = 0;
		for (var i = 1; i <= getCookie("goods"); i++) {
			var chin = getCookie("product" + i.toString());
			var points = 0;
			for (var j = 1; j <= getCookie("goods"); j++) {
				if (chin == getCookie("product" + j.toString())) {
					points += 1;
				}
			}
			if (points != 0) {
				$('#' + getCookie("product" + i.toString()) + '_table').show(0);
			}
			$('#' + getCookie("product" + i.toString()) + '_points').html(points.toString());
		}
	}
	
	function oneMoreProduct (productId) {
		if (getCookie("goods") != undefined) {
			setCookie("goods", (parseInt(getCookie("goods")) + 1).toString());
		} else {
			setCookie("goods", "1");
		}
		setCookie("product" + getCookie("goods"), productId);
		basketUpdate();
	}
	
	
	        function cancelClick(clicked, number) {
        	    var point = 0;
        	    var allCost = 0;
            			deleteCookie("productPoints" + number.toString());
            			deleteCookie("productId" + number.toString());
            			deleteCookie("productVariant" + number.toString());
            			deleteCookie("productQuality" + number.toString());
        	            $(clicked).parents('.dreamTable').remove();
        	        for (var i = 0; i < $('.costVal').length; i++) {
        	            point++;
            	        allCost += parseInt($('.costVal').eq(i).text()) * parseInt($('.input_area').eq(i).val());
        	        }
        	    $('.allCost p.dreamCost').text(allCost + 'р')
        	    if (point == 0) {
    		        deleteCookie("goods");
                    $('p.titleDream').show(0);
                    $('#clearBasket, .allCost, #sendMessage').hide(0);
        	    }
        	};