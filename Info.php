<!doctype html>
<html>
<head>
<title>ABFC - Информация о содержании</title>
<meta charset="utf-8">
<meta name="description" content="Узнать больше о содержании шиншилл, как кормить, поить, купать, роды и т.д.">
<meta name="keywords" content="Шиншиллы, содержание, кормить, поить, купать, роды">

<?php
	include("Datas/import.html");
?>

<script language="JavaScript" src="MyJS/device.js" type="text/javascript"></script>
<script type="text/jscript">
	$(function(){
		if(device.mobile()) {
			location.href = 'm/MInfo.php';
		}
});
</script>

<link href="../MyCss/infoCss.css" rel="stylesheet" type="text/css">

</head>
<body>
    <script type="text/javascript">
    var Info;
	var requestURL = 'm/Info.json';
	var request = new XMLHttpRequest();
	$(function () {
    	request.open('GET', requestURL);
    	request.responseType = 'json';
        request.send();
        request.onload = function() {
            Info = request.response;
            $('.infoDiv').click(function (event) {
                var index = $('.infoDiv').index(this);
                $('.infoAside').fadeOut(300, function () {
                    $('.infoAside').children().remove();
                    $('.infoAside').append('<h1 class="infoTitle">' + Info["theme_" + (index + 1).toString()].inside.title + '</h1>');
                    $('.infoAside').append('<p class="infoP">' + Info["theme_" + (index + 1).toString()].inside.text_1 + '</p>');
                    $('.infoAside').fadeIn(300);
                });
            });
        }
	});
	</script>
	<?php
		include("Datas/Dream.html");
	?>
	<?php
		include("Datas/TopButtons.html");
	?>
	<div style="height: 74px"></div>
<div id="mainBody">
    <table class="infoTable">
        <tr class="infoTr">
            <td class="infoTd">
    			<div class="infoDiv">
    				<h1 class="infoTheme">Клетки</h1>
    			</div>
    			<img class="infoImg" src="../MyImages/info/Image1.jpeg">
    		</td>
    		<td class="infoTd">
    			<div class="infoDiv">
    				<h1 class="infoTheme">Корма</h1>
    			</div>
    			<img class="infoImg" src="../MyImages/info/Image2.JPG">
    		</td>
    	</tr>
    	<tr class="infoTr">
    		<td class="infoTd">
    			<div class="infoDiv">
    				<h1 class="infoTheme">Температура</h1>
    			</div>
    			<img class="infoImg" src="../MyImages/info/Image3.jpeg">
    		</td>
    		<td class="infoTd">
    			<div class="infoDiv">
    				<h1 class="infoTheme">Купание</h1>
    			</div>
    			<img class="infoImg" src="../MyImages/info/Image4.jpg">
    		</td>
    	</tr>
    	<tr class="infoTr">
    		<td class="infoTd">
    			<div class="infoDiv">
    				<h1 class="infoTheme">Разведение</h1>
    			</div>
    			<img class="infoImg" src="../MyImages/info/Image5.jpg">
    		</td>
    		<td class="infoTd">
    			<div class="infoDiv">
    				<h1 class="infoTheme">Беременность</h1>
    			</div>
    			<img class="infoImg" src="../MyImages/info/Image6.jpg">
    		</td>
    	</tr>
    	<tr class="infoTr">
    		<td class="infoTd">
    			<div class="infoDiv">
    				<h1 class="infoTheme">Таблица веса</h1>
    			</div>
    			<img class="infoImg" src="../MyImages/info/Image7.jpg">
    		</td>
    		<td class="infoTd">
    			<div class="infoDiv">
    				<h1 class="infoTheme">Расчесывание</h1>
    			</div>
    			<img class="infoImg" src="../MyImages/info/Image8.jpeg">
    		</td>
		</tr>
	</table><div class="infoAside">
	    <h1 class="infoTitle">Выберите интересующий Вас раздел</h1>
	    <img class="infoLogo" src="../MyImages/main/Logo.png">
	</div>
	<?php
		include("Datas/Footer.html");
	?>
</div>
<script type="text/javascript">
	var timeScroll = 600;
	
	var item;
	var itemAside;
	var maxImg = 8;
	var activ = 0;
	var i;
	$('.img1').click(function() {
		for (var j = 0; j <= maxImg; j++) {
			if (j != activ) {
				$('#aside' + j).hide(0);
			}
		}
		if (activ != 1) {
			$('#aside' + activ).fadeOut(timeScroll/2, function() {
				$('#aside1').fadeIn(timeScroll/2);
			});
			activ = 1;
		}
	});
	
	$('.img2').click(function() {
		for (i = 0; i <= maxImg; i++) {
			if (i != activ) {
				$('#aside' + i).hide(0);
			}
		}
		if (activ != 2) {
			$('#aside' + activ).fadeOut(timeScroll/2, function() {
				$('#aside2').fadeIn(timeScroll/2);
			});
			activ = 2;
		}
	});
	
	$('.img3').click(function() {
		for (i = 0; i <= maxImg; i++) {
			if (i != activ) {
				$('#aside' + i).hide(0);
			}
		}
		if (activ != 3) {
			$('#aside' + activ).fadeOut(timeScroll/2, function() {
				$('#aside3').fadeIn(timeScroll/2);
			});
			activ = 3;
		}
	});
	
	$('.img4').click(function() {
		for (i = 0; i <= maxImg; i++) {
			if (i != activ) {
				$('#aside' + i).hide(0);
			}
		}
		if (activ != 4) {
			$('#aside' + activ).fadeOut(timeScroll/2, function() {
				$('#aside4').fadeIn(timeScroll/2);
			});
			activ = 4;
		}
	});
	
	$('.img5').click(function() {
		for (i = 0; i <= maxImg; i++) {
			if (i != activ) {
				$('#aside' + i).hide(0);
			}
		}
		if (activ != 5) {
			$('#aside' + activ).fadeOut(timeScroll/2, function() {
				$('#aside5').fadeIn(timeScroll/2);
			});
			activ = 5;
		}
	});
	
	$('.img6').click(function() {
		for (i = 0; i <= maxImg; i++) {
			if (i != activ) {
				$('#aside' + i).hide(0);
			}
		}
		if (activ != 6) {
			$('#aside' + activ).fadeOut(timeScroll/2, function() {
				$('#aside6').fadeIn(timeScroll/2);
			});
			activ = 6;
		}
	});
	
	$('.img7').click(function() {
		for (i = 0; i <= maxImg; i++) {
			if (i != activ) {
				$('#aside' + i).hide(0);
			}
		}
		if (activ != 7) {
			$('#aside' + activ).fadeOut(timeScroll/2, function() {
				$('#aside7').fadeIn(timeScroll/2);
			});
			activ = 7;
		}
	});
	
	$('.img8').click(function() {
		for (i = 0; i <= maxImg; i++) {
			if (i != activ) {
				$('#aside' + i).hide(0);
			}
		}
		if (activ != 8) {
			$('#aside' + activ).fadeOut(timeScroll/2, function() {
				$('#aside8').fadeIn(timeScroll/2);
			});
			activ = 8;
		}
	});
</script>
</body>
</html>
