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

<script language="JavaScript" src="MyJS/device.js" type="text/javascript"></script>
<script type="text/jscript">
	$(function(){
		if(device.mobile()) {
			location.href = 'm/MBuying.php';
		}
});
</script>

<link href="../MyCss/buyingCss.css" rel="stylesheet" type="text/css">

<style type="text/css">
</style>

<script type="text/jscript">

function oneMore (id, variant, quality) {
    if (getCookie("goods") !== undefined) {
    	var oldGoods = getCookie("goods");
    	var findProduct = false;
    	for (let i = 1; i <= oldGoods; i++) {
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
function switchSelectorQuality(elem) {
    if ($(elem).children('.selectionQuality').attr("hidden") == "hidden") {
        $(elem).children('.tapToSelection').attr("hidden", "hidden");
        $(elem).children('.selectionQuality').removeAttr("hidden");
    } else {
        $(elem).children('.tapToSelection').removeAttr("hidden");
        $(elem).children('.selectionQuality').attr("hidden", "hidden");
    }
}
</script>
</head>
<body>
	<?php
		include("Datas/Dream.html");
	?>
    <?php
    	include("Datas/TopButtons.html");
    ?>
	<div style="height: 74px"></div>
<div>
    <p class="SuperBuying">Все стандарты линий разведения Дании, Германии, Польши, Прибалтики</p>
	<div id="mainBody" class="container-fluid">
	    <div class="row" id="create-block">
	        
	    </div>
	</div>
	<?php
		include("Datas/Footer.html");
	?>
</div>
<script type="text/javascript">
	var timeScroll = 600;
	var mainBody = new Vue({
	    el: '#mainBody',
	    data: {
	        Datas: {}
	    },
	    created() {
	        axios.get('../m/Data.json').then(response => {
                this.Datas = response.data;
                
            	var nowCounter = 0;
            	var product;
            	var topValue;
    			for (var keyChin in this.Datas.chin) {
    			    product = this.Datas.chin[keyChin];
    			    
    			    var bl1_content = `<div class="col-6 p-0">
            				<div id="chinPhoto` + keyChin + `" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
                              <div class="carousel-inner">`;
                    for (let img in product.img) {
                        bl1_content += `<div class="carousel-item ` + ((product.img.a == product.img[img])?"active":"") + `">
                                  <img class="d-block w-100 img-fluid" style="height: 450px" src="` + product.img[img] + `">
                                </div>`;
                    }
                    bl1_content += `</div>
                              <a class="carousel-control-prev" href="#chinPhoto` + keyChin + `" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              </a>
                              <a class="carousel-control-next" href="#chinPhoto` + keyChin + `" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              </a>
                            </div>
                        </div>`;
    	
    			    var bl1 = $(bl1_content);
    				var bl2 = $('<div  class="col-6 p-4">' +
    					'<table  class="tableInfo" id="' + product.id + '">' +
    						'<tr>' +
    							'<td colspan="2">' +
    								'<p class="titleBuying">' + product.text + '</p>' +
    							'</td>' +
    						'</tr>' +
    						'<tr>' +
    							'<td class="tableMainText TLTd" onclick=\'oneMore("' + keyChin + '", "NM", "notBronze")\'>' +
    								'<p class="textInfo">Не прошедший оценку</p>' +
    								'<p class="textInfo">Самец</p>' +
    								'<p class="textCost">' + product.variant.NM.cost + '</p>' +
    							'</td>' +
    							'<td class="tableMainText" onclick=\'oneMore("' + keyChin + '", "NF", "notBronze")\'>' +
    								'<p class="textInfo">Не прошедшая оценку</p>' +
    								'<p class="textInfo">Самка</p>' +
    								'<p class="textCost">' + product.variant.NF.cost + '</p>' +
    							'</td>' +
    						'</tr>' +
    						'<tr>' +
    							'<td class="tableMainText" onclick="switchSelectorQuality(this)">' +
    								'<div class="tapToSelection">' +
                                        '<p class="textInfo">Прошедший оценку</p>' +
                                        '<p class="textInfo">Самец</p>' +
                                        '<p class="textCost">от ' + product['variant']['BM']['cost']['bronze'] + '</p>' +
                                    '</div>' +
                                    '<div class="selectionQuality" hidden="hidden">' +
                                        '<p class="variantQuality" style="background-color: rgba(255, 215, 0, 0.5)"  onclick=\'oneMore("' + keyChin + '", "BM", "gold")\'>' +
                                        'Золото ' + product['variant']['BM']['cost']['gold'] + '<span hidden="hidden">gold</span></p>' +
                                        '<p class="variantQuality" style="background-color: rgba(192, 192, 192, 0.5)"  onclick=\'oneMore("' + keyChin + '", "BM", "silver")\'>' +
                                        'Серебро ' + product['variant']['BM']['cost']['silver'] + '<span hidden="hidden">silver</span></p>' +
                                        '<p class="variantQuality" style="background-color: rgba(205, 127, 50, 0.2)"  onclick=\'oneMore("' + keyChin + '", "BM", "bronze")\'>' +
                                        'Бронза ' + product['variant']['BM']['cost']['bronze'] + '<span hidden="hidden">bronze</span></p>' +
                                    '</div>' +
    							'</td>' +
    							'<td class="tableMainText BRTd" onclick="switchSelectorQuality(this)">' +
    								'<div class="tapToSelection">' +
                                        '<p class="textInfo">Прошедшая оценку</p>' +
                                        '<p class="textInfo">Самка</p>' +
                                        '<p class="textCost">от ' + product['variant']['BF']['cost']['bronze'] + '</p>' +
                                    '</div>' +
                                    '<div class="selectionQuality" hidden="hidden">' +
                                        '<p class="variantQuality" style="background-color: rgba(255, 215, 0, 0.5)"  onclick=\'oneMore("' + keyChin + '", "BF", "gold")\'>' +
                                        'Золото ' + product['variant']['BF']['cost']['gold'] + '<span hidden="hidden">gold</span></p>' +
                                        '<p class="variantQuality" style="background-color: rgba(192, 192, 192, 0.5)"  onclick=\'oneMore("' + keyChin + '", "BF", "silver")\'>' +
                                        'Серебро ' + product['variant']['BF']['cost']['silver'] + '<span hidden="hidden">silver</span></p>' +
                                        '<p class="variantQuality" style="background-color: rgba(205, 127, 50, 0.2)"  onclick=\'oneMore("' + keyChin + '", "BF", "bronze")\'>' +
                                        'Бронза ' + product['variant']['BF']['cost']['bronze'] + '<span hidden="hidden">bronze</span></p>' +
                                    '</div>' +
    							'</td>' +
    						'</tr>' +
    					'</table>' +
    				'</div>');
    				if (nowCounter % 2 == 0) {
    				    $('#create-block').append(bl1);
    				    $('#create-block').append(bl2);
    				} else {
    				    $('#create-block').append(bl2);
    				    $('#create-block').append(bl1);
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
            		nowCounter = nowCounter + 1;
    			}
	        });
	    }
	});
</script>
</body>
</html>
