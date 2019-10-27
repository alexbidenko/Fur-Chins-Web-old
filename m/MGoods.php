<!doctype html>
<html>
<head>
<title>ABFC - Дополнительные товары</title>
<meta charset="utf-8">
<meta name="description" content="Выбрать товары для шиншилл, корма, сено, поилки и расчески">
<meta name="keywords" content="Шиншиллы, товары, корма, сено, поилки, расчески">

	<?php
		include("Datas/import.html");
	?>

<script language="JavaScript" src="../MyJS/device.js" type="text/javascript"></script>
<script type="text/jscript">
	$(function(){
		if(!device.mobile()) {
			location.href = '../Goods.php';
		}
});
</script>

<link href="../m/MyCss/mgoodsCss.css" rel="stylesheet" type="text/css">

<style type="text/css">
</style>

<script type="text/jscript">
	var mGoods = angular.module('mGoods', []);
	mGoods.controller('jsonDecode', function($scope, $http) {
		$http.get('Data.json').success(function(data) {
			$scope.Goods = data;
        	var nowCounter = 0;
        	var product;
			for (var keyChin in data.goods) {
			    product = data.goods[keyChin];
	
			    var block = $('<div class="block">' +
        			'<p class="titleBuying">' + product.text + '</p>' +
    				'<div class="blockImage">' +
    				    '<img class="imgBuying" src="' + product.img + '">' +
    				'</div>' +
    				'<p class="infoText">' + product.description + '</p>' +
    				'<label class="buyLabel">' +
    					'<h2 class="buy" id="' + product.id + '">Купить ' + product.text.toLowerCase() + ' за ' + product.cost + 'р</h2>' +
    				'</label>' +
        			'<div class="border"></div>' +
    		    '</div>');
    		    $('#jsonDecode').append(block);
    		    
    		    var basketAnim = function () {
				    var timeOut = 200;
				    var basketAnimColor = "#888";
    		        $('.mMenuImg').addClass('basketAnim');
    		        $('.mMenuImg').css("background-color", basketAnimColor);
    		        setTimeout(function () {
    		            $('.mMenuImg').css("background-color", "black");
        		        setTimeout(function () {
        		            $('.mMenuImg').removeClass('basketAnim');
                        }, timeOut);
                    }, timeOut);
				}
    		    $('.buy').eq(nowCounter).click(function() {
    		        oneMore(data.goods[$(this).attr("id")]);
    		        basketAnim();
    		    });
        		nowCounter = nowCounter + 1;
			}
		}).error(function(data) {
	    });
		var oneMore = function (product) {
			if (getCookie("goods") != undefined) {
        		var oldGoods = getCookie("goods");
        		var findProduct = false;
    			for (var i = 1; i <= oldGoods; i++) {
    			    if (getCookie("productId" + i.toString()) == product.id) {
    			        var points = parseInt(getCookie("productPoints" + i.toString())) + 1;
			            setCookie("productPoints" + i.toString(), points);
			            findProduct = true;
    			    }
    			}
    			if (!findProduct) {
            		deleteCookie("goods");
            		setCookie("goods", (parseInt(oldGoods) + 1).toString());
    				
                    setCookie("productPoints" + getCookie("goods"), "1");
                    setCookie("productId" + getCookie("goods"), product.id);
    			}
			} else {
				setCookie("goods", "1");
				
            	setCookie("productPoints" + getCookie("goods"), "1");
            	setCookie("productId" + getCookie("goods"), product.id);
			}
		};
	});
</script>
</head>
<body ng-app="mGoods">
	<?php
		include("Datas/TopButtons.html");
	?>
	<?php
		include("Datas/Dream.html");
	?>
<div id="mainBody">
	<?php
		include("Datas/Head.html");
	?>
	
	<div id="jsonDecode" ng-controller="jsonDecode"></div>
	<?php
		include("Datas/Footer.html");
	?>
	</div>
</body>
</html>
