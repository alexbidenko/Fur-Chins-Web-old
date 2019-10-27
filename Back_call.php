<!doctype html>
<html>
<head>
<title>ABFC - Форма связи</title>
<meta charset="utf-8">
<meta name="description" content="Страница для связи с заводчиком для оформления заказа или узнать больше">
<meta name="keywords" content="Шиншиллы, связаться, заказать">

<?php
	include("Datas/import.html");
?>

<script language="JavaScript" src="MyJS/device.js" type="text/javascript"></script>
<script type="text/jscript">
	$(function(){
		if(device.mobile()) {
			location.href = 'm/MBack_call.php';
		}
});
</script>

<link href="../MyCss/back_call.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php
		include("Datas/Dream.html");
	?>
	<?php
		include("Datas/TopButtons.html");
	?>
	<div style="height: 74px"></div>
<div id="mainBody">
	<div>
		<div class="block">
		<section id="section_1">
			<table style="width: 100%">
				<tr>
					<td style="padding: 0 30px 0 30px">
						<form action="Datas/send.php" method="post" id="Back_call">
							<label>
								<h1>Ваше имя</h1>
								<input class="inputArea" type="text" name="name" required>
							</label>
							<label>
								<h1>Ваш номер телефона</h1>
								<input class="inputArea" type="tel" name="tel" required>
							</label>
							<label>
								<h1>Ваш email</h1>
								<input class="inputArea" type="email" name="email" required>
							</label>
							<label>
								<h1>Тема сообщения</h1>
								<input class="inputArea" type="text" name="title" required>
							</label>
							<img class="checkbox" src="../MyImages/main/checkbox.png"><h1> Прикрепить к письму содержимое корзины</h1>
							<label>
								<h1>Текст сообщения</h1>
								<textarea class="inputArea" name="message" style="height: 200px" required></textarea>
							</label>
							<input class="inputArea" type="text" id="basketArea" name="basketArea" value="" hidden="hide">
							
                            <script type="text/jscript">
                            	$(function () {
                            	    $('.inputButton').click(function () {
                                	    for (var i = 1; i <= getCookie("goods"); i++) {
                                		    if (getCookie("productText" + i.toString()) != undefined) {
                                		       	var text = $('#basketArea').val();
                                		       	$('#basketArea').val(text + ", " + getCookie("productText" + i.toString()) + " " + getCookie("productVariant" + i.toString()) + " x" + getCookie("productPoints" + i.toString()));
                                		    }
                                		}
                            	    })
                            	    
                            	    $('.checkbox').click(function () {
                            	        if ($(this).attr("src") == "../MyImages/main/checkbox.png") {
                            	            $(this).removeAttr("src");
                            	        } else {
                            	            $(this).attr("src", "../MyImages/main/checkbox.png");
                            	        }
                            	    });
                            	});
                            </script>
							<input class="inputButton" type="submit" name="submit" value="Отправить сообщение">
						</form>
					</td>
					<td class="setBlockImage">
						<div class="blockImage">
							<img class="imgBuying" id="image1" src="../MyImages/backcall/Image1.jpg">
						</div>
					</td>
				</tr>
			</table>
		</section>
		</div>
	<?php
		include("Datas/Footer.html");
	?>
	</div>
	</div>
<script type="text/javascript">
	var timeScroll = 600
</script>
</body>
</html>
