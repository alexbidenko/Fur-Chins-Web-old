<!doctype html>
<html>
<head>
<title>ABFC - Купить шиншиллу</title>
<meta charset="utf-8">
<meta name="description" content="Купить шиншилл и меховых шиншилл прошедших оценку экспертов">
<meta name="keywords" content="Шиншиллы, купить, оцененные шиншиллы">

	<?php
		include("Datas/import.html");
	?>

<script language="JavaScript" src="../MyJS/device.js" type="text/javascript"></script>
<script type="text/jscript">
	$(function(){
		if(!device.mobile()) {
			location.href = '../Buying.php';
		}
});
</script>

<link href="../m/MyCss/mbuyingCss.css" rel="stylesheet" type="text/css">
<?php
include("Datas/TopButtons.html");
include("Datas/Dream.html");
echo '<div id="mainBody">';
include("Datas/Head.html");
	
echo '<p class="SuperBuying">Все стандарты линий разведения Дании, Германии, Польши, Прибалтики</p>';
$fileData = file_get_contents("Data.json");
$goodsData = json_decode($fileData, true);
foreach ($goodsData['chin'] as $keyProduct => $product) {
	echo '<div class="block">
        <p class="titleBuying">'.$product['text'].'</p>
        <div class="block">
            <div id="chinPhoto'.$keyProduct.'" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
              <div class="carousel-inner">';
    foreach($product['img'] as $img) {
                echo '<div class="carousel-item '.(($img==$product['img']['a'])?'active':'').'">
                  <img class="d-block w-100 img-fluid" src="'.$img.'">
                </div>';
    }
    echo          '</div>
              <a class="carousel-control-prev" href="#chinPhoto'.$keyProduct.'" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" style="transform: scale(3, 3);" aria-hidden="true"></span>
              </a>
              <a class="carousel-control-next" href="#chinPhoto'.$keyProduct.'" role="button" data-slide="next">
                <span class="carousel-control-next-icon" style="transform: scale(3, 3);" aria-hidden="true"></span>
              </a>
            </div>
        </div>
        <table  class="tableInfo">
            <tr>
                <td class="tableMainText TLTd" onclick=\'oneMore("'.$keyProduct.'", "NM", "notBronze")\'>
                    <p class="textInfo">Не прошедший оценку</p>
                    <p class="textInfo">Самец</p>
                    <p class="textCost">'.$product['variant']['NM']['cost'].'</p>
                </td>
                <td class="tableMainText" onclick=\'oneMore("'.$keyProduct.'", "NF", "notBronze")\'>
                    <p class="textInfo">Не прошедшая оценку</p>
                    <p class="textInfo">Самка</p>
                    <p class="textCost">'.$product['variant']['NF']['cost'].'</p>
                </td>
            </tr>
            <tr>
                <td class="tableMainText" onclick="switchSelectorQuality(this)">
                    <div class="tapToSelection">
                        <p class="textInfo">Прошедший оценку</p>
                        <p class="textInfo">Самец</p>
                        <p class="textCost">от '.$product['variant']['BM']['cost']['bronze'].'</p>
                    </div>
                    <div class="selectionQuality" hidden="hidden">
                        <p class="variantQuality" style="background-color: rgba(255, 215, 0, 0.5)"  onclick=\'oneMore("'.$keyProduct.'", "BM", "gold")\'>
                        Золото '.$product['variant']['BM']['cost']['gold'].'<span hidden="hidden">gold</span></p>
                        <p class="variantQuality" style="background-color: rgba(192, 192, 192, 0.5)"  onclick=\'oneMore("'.$keyProduct.'", "BM", "silver")\'>
                        Серебро '.$product['variant']['BM']['cost']['silver'].'<span hidden="hidden">silver</span></p>
                        <p class="variantQuality" style="background-color: rgba(205, 127, 50, 0.2)"  onclick=\'oneMore("'.$keyProduct.'", "BM", "bronze")\'>
                        Бронза '.$product['variant']['BM']['cost']['bronze'].'<span hidden="hidden">bronze</span></p>
                    </div>
                </td>
                <td class="tableMainText BRTd" onclick="switchSelectorQuality(this)">
                    <div class="tapToSelection">
                        <p class="textInfo">Прошедший оценку</p>
                        <p class="textInfo">Самец</p>
                        <p class="textCost">от '.$product['variant']['BF']['cost']['bronze'].'</p>
                    </div>
                    <div class="selectionQuality" hidden="hidden">
                        <p class="variantQuality" style="background-color: rgba(255, 215, 0, 0.5)"  onclick=\'oneMore("'.$keyProduct.'", "BF", "gold")\'>
                        Золото '.$product['variant']['BF']['cost']['gold'].'<span hidden="hidden">gold</span></p>
                        <p class="variantQuality" style="background-color: rgba(192, 192, 192, 0.5)"  onclick=\'oneMore("'.$keyProduct.'", "BF", "silver")\'>
                        Серебро '.$product['variant']['BF']['cost']['silver'].'<span hidden="hidden">silver</span></p>
                        <p class="variantQuality" style="background-color: rgba(205, 127, 50, 0.2)"  onclick=\'oneMore("'.$keyProduct.'", "BF", "bronze")\'>
                        Бронза '.$product['variant']['BF']['cost']['bronze'].'<span hidden="hidden">bronze</span></p>
                    </div>
                </td>
            </tr>
        </table>
        <div class="border"></div>
    </div>';
}
echo '<script type="text/jscript">
    $(window).resize(function () {
	    for (var i = 0; i < $(".np1Image").lenght; i++) {
	        $(".np1Image").eq(i).css({"top" : $(".blockImage").eq(i).offset().top + $(".blockImage").eq(i).height() / 2 - 60});
	        $(".np2Image").eq(i).css({"top" : $(".blockImage").eq(i).offset().top + $(".blockImage").eq(i).height() / 2 - 60});
	    }
	});
    </script>';
include("Datas/Footer.html");
echo '</div>';
?>
<script type="text/jscript">
function switchSelectorQuality(elem) {
    if ($(elem).children('.selectionQuality').attr("hidden") == "hidden") {
        $(elem).children('.tapToSelection').attr("hidden", "hidden");
        $(elem).children('.selectionQuality').removeAttr("hidden");
    } else {
        $(elem).children('.tapToSelection').removeAttr("hidden");
        $(elem).children('.selectionQuality').attr("hidden", "hidden");
    }
}
function oneMore (id, variant, quality) {
			if (getCookie("goods") !== undefined) {
        		var oldGoods = getCookie("goods");
        		var findProduct = false;
    			for (var i = 1; i <= oldGoods; i++) {
    			    if (getCookie("productId" + i.toString()) == id && getCookie("productVariant" + i.toString()) == variant
    			    && getCookie("productQuality" + i.toString()) == quality) {
    			        var points = parseInt(getCookie("productPoints" + i.toString())) + 1;
			            setCookie("productPoints" + i.toString(), points);
			            findProduct = true;
    			    }
    			}
    			if (!findProduct) {
            		deleteCookie("goods");
            		setCookie("goods", (parseInt(oldGoods) + 1).toString());
    				
                    setCookie("productPoints" + getCookie("goods"), "1");
                    setCookie("productId" + getCookie("goods"), id);
                    setCookie("productVariant" + getCookie("goods"), variant);
                    setCookie("productQuality" + getCookie("goods"), quality);
    			}
			} else {
				setCookie("goods", "1");
				
            	setCookie("productPoints" + getCookie("goods"), "1");
                setCookie("productId" + getCookie("goods"), id);
                setCookie("productVariant" + getCookie("goods"), variant);
                setCookie("productQuality" + getCookie("goods"), quality);
			}
};


/*$(function () {
    $('body').click(function () {
        if($(this) != $('.selectionQuality')) {
        $('.tapToSelection').removeAttr("hidden");
        $('.selectionQuality').attr("hidden", "hidden");
        }
    });
	var mGoods = angular.module('mGoods', ["ngRoute"]);
	mGoods.controller('jsonDecode', function($scope, $http) {
		$http.get('Data.json').success(function(data) {
			$scope.Goods = data;
        	var nowCounter = 0;
        	var product;
			for (var keyChin in data.chin) {
			    product = data.chin[keyChin];
    		    
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
    		    $('.tableMainText').eq(nowCounter * 4).click(function() {
    		        oneMore(data.chin[$(this).parents('.tableInfo').attr("id")], data.chin[$(this).parents('.tableInfo').attr("id")].variant.NM);
    		        basketAnim();
    		        $('.toBasket').remove();
    		        var toBasket = $('<p class="toBasket" hidden="hide">Товар добавлен в корзину</p>');
    		        $(this).append(toBasket);
        		    $('.toBasket').offset({top: $(this).offset().top + $(this).outerHeight() - $('.toBasket').outerHeight(), left: $(this).offset().left});
        		    $('.toBasket').css("width", $(this).outerWidth());
    		        $( window ).scroll(function() {
    		            $('.toBasket').remove();
    		        });
    		    });
    		    $('.tableMainText').eq(nowCounter * 4 + 1).click(function() {
    		        oneMore(data.chin[$(this).parents('.tableInfo').attr("id")], data.chin[$(this).parents('.tableInfo').attr("id")].variant.NF);
    		        basketAnim();
    		        $('.toBasket').remove();
    		        var toBasket = $('<p class="toBasket" hidden="hide">Товар добавлен в корзину</p>');
    		        $(this).append(toBasket);
        		    $('.toBasket').offset({top: $(this).offset().top + $(this).outerHeight() - $('.toBasket').outerHeight(), left: $(this).offset().left});
        		    $('.toBasket').css("width", $(this).outerWidth());
    		        $( window ).scroll(function() {
    		            $('.toBasket').remove();
    		        });
    		    });
    		    $('.tableMainText').eq(nowCounter * 4 + 2).click(function() {
    		        oneMore(data.chin[$(this).parents('.tableInfo').attr("id")], data.chin[$(this).parents('.tableInfo').attr("id")].variant.BM);
    		        basketAnim();
    		        $('.toBasket').remove();
    		        var toBasket = $('<p class="toBasket" hidden="hide">Товар добавлен в корзину</p>');
    		        $(this).append(toBasket);
        		    $('.toBasket').offset({top: $(this).offset().top + $(this).outerHeight() - $('.toBasket').outerHeight(), left: $(this).offset().left});
        		    $('.toBasket').css("width", $(this).outerWidth());
    		        $( window ).scroll(function() {
    		            $('.toBasket').remove();
    		        });
    		    });
    		    $('.tableMainText').eq(nowCounter * 4 + 3).click(function() {
    		        oneMore(data.chin[$(this).parents('.tableInfo').attr("id")], data.chin[$(this).parents('.tableInfo').attr("id")].variant.BF);
    		        basketAnim();
    		        $('.toBasket').remove();
    		        var toBasket = $('<p class="toBasket" hidden="hide">Товар добавлен в корзину</p>');
    		        $(this).append(toBasket);
        		    $('.toBasket').offset({top: $(this).offset().top + $(this).outerHeight() - $('.toBasket').outerHeight(), left: $(this).offset().left});
        		    $('.toBasket').css("width", $(this).outerWidth());
    		        $( window ).scroll(function() {
    		            $('.toBasket').remove();
    		        });
    		    });
        		
			}
			
			$(".blockImage").click(function () {
			    for (var keyChin in data.chin) {
    			    if ($(this).children(".imgBuying").attr("src") == data.chin[keyChin].img.a) {
    			        $(this).children(".imgBuying").attr("src", data.chin[keyChin].img.b);
    			    } else if ($(this).children(".imgBuying").attr("src") == data.chin[keyChin].img.b) {
    			        $(this).children(".imgBuying").attr("src", data.chin[keyChin].img.a);
    			    }
			    }
			});
		}).error(function(data) {
	    });
	});
	$("#clearBasket").click(function() {
		for(var i = 1; i <= getCookie("goods"); i++) {
			$("#" + getCookie("product" + i.toString()) + "_table").hide(0);
			deleteCookie("product" + i.toString());
			$("#myGoods p.titleDream").show(0);
			$("#clearBasket").hide(0);
		}
	});
	$(".tableMainText").click(function() {
		oneMoreProduct(event.target.id);
	});
});*/
</script>
</head>
<body>
</body>
</html>