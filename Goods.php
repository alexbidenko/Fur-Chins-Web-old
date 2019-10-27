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

<script language="JavaScript" src="MyJS/device.js" type="text/javascript"></script>
<script type="text/jscript">
	$(function(){
		if(device.mobile()) {
			location.href = 'm/MGoods.php';
		}
});
</script>

<link href="../MyCss/goodsCss.css" rel="stylesheet" type="text/css">

<style type="text/css">
</style>

<script type="text/jscript">
	var mGoods = angular.module('mGoods', []);
	mGoods.controller('jsonDecode', function($scope, $http) {
		$http.get('m/Data.json').success(function(data) {
			$scope.Goods = data;
        	var nowCounter = 0;
        	var product;
			for (var keyChin in data.goods) {
			    product = data.goods[keyChin];
	
			    var block = $('<table class="block"><tr></tr></table>');
			    var bl1 = $('<td class="setBlockImage">' +
    				'<div class="blockImage">' +
    				    '<img class="imgBuying" src="' + product.img + '">' +
    				'</div>' +
				'</td>');
				var bl2 = $('<td class="setBlockImage">' +
        			'<p class="titleBuying">' + product.text + '</p>' +
    				'<p class="infoText">' + product.description + '</p>' +
    				'<label class="toBuyLabel">' +
    					'<h2 class="buy" id="' + product.id + '">Купить ' + product.buy.toLowerCase() + ' за ' + product.cost + 'р</h2>' +
    				'</label>' +
    		    '</td>');
    		    $('#jsonDecode').append(block);
				if (nowCounter % 2 == 0) {
				    $('.block tr').eq(nowCounter).append(bl1);
				    $('.block tr').eq(nowCounter).append(bl2);
				} else {
				    $('.block tr').eq(nowCounter).append(bl2);
				    $('.block tr').eq(nowCounter).append(bl1);
				}
				var basketAnim = function () {
				    var timeOut = 200;
				    var basketAnimColor = "#888";
    		        $('.basketButton').addClass('basketAnim');
    		        $('.basketButton').css("background-color", basketAnimColor);
    		        setTimeout(function () {
    		            $('.basketButton').css("background-color", "black");
        		        setTimeout(function () {
        		            $('.basketButton').removeClass('basketAnim');
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
    				
    				setCookie("numberProduct" + getCookie("goods"), getCookie("goods"));
                    setCookie("productPoints" + getCookie("goods"), "1");
                    setCookie("productId" + getCookie("goods"), product.id);
                    setCookie("productText" + getCookie("goods"), product.text);
                    setCookie("productVariant" + getCookie("goods"), "");
                    setCookie("productCost" + getCookie("goods"), product.cost);
                    setCookie("productImg" + getCookie("goods"), product.img.toString());
    			}
			} else {
				setCookie("goods", "1");
				
            	setCookie("numberProduct" + getCookie("goods"), getCookie("goods"));
            	setCookie("productPoints" + getCookie("goods"), "1");
            	setCookie("productId" + getCookie("goods"), product.id);
            	setCookie("productText" + getCookie("goods"), product.text);
                setCookie("productVariant" + getCookie("goods"), "");
            	setCookie("productCost" + getCookie("goods"), product.cost);
            	setCookie("productImg" + getCookie("goods"), product.img.toString());
			}
		};
		$scope.nowCounter = 0;
		$scope.counterFun = function () {
		    $scope.nowCounter = parseInt($scope.nowCounter) + 1;
		}
	});
</script>
</head>
<body ng-app="mGoods">
	<?php
		include("Datas/Dream.html");
	?>
	<?php
		include("Datas/TopButtons.html");
	?>
	<div style="height: 74px"></div>
<div id="mainBody">
	<div id="jsonDecode" ng-controller="jsonDecode" ></div>
	<?php
		include("Datas/Footer.html");
	?>
</div>
<script type="text/javascript">
	var timeScroll = 600;
</script>
</body>
</html>
