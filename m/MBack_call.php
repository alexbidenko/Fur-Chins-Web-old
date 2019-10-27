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

<script language="JavaScript" src="../MyJS/device.js" type="text/javascript"></script>
<script type="text/jscript">
	$(function(){
		if(!device.mobile()) {
			location.href = '../Back_call.php';
		}
});
</script>

<link href="../m/MyCss/mback_call.css" rel="stylesheet" type="text/css">

<style type="text/css">
</style>

<script type="text/jscript">
	var mGoods = angular.module('mGoods', []);
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
	<div>
						<form action="MBack_call.php" method="post">
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
							<img class="checkbox" src="../MyImages/main/checkbox.png"><h1> Прикрепить содержимое корзины</h1>
							<label>
								<h1>Текст сообщения</h1>
								<textarea class="inputArea" name="message" style="height: 500px" required></textarea>
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
						<?php
                        if(!isset($_POST['name']) and !isset($_POST['tel']) and !isset($_POST['email']) and !isset($_POST['title']) and !isset($_POST['message'])){
                        } else {
                            $name = $_POST['name'];
                            $tel = $_POST['tel'];
                            $email = $_POST['email'];
                            $title = $_POST['title'];
                            $message = $_POST['message'];
                            $basketArea = $_POST['basketArea'];
                            $name = htmlspecialchars($name);
                            $tel = htmlspecialchars($tel);
                            $email = htmlspecialchars($email);
                            $title = htmlspecialchars($title);
                            $message = htmlspecialchars($message);
                            $basketArea = htmlspecialchars($basketArea);
                            $name = urldecode($name);
                            $tel = urldecode($tel);
                            $email = urldecode($email);
                            $title = urldecode($title);
                            $message = urldecode($message);
                            $basketArea = urldecode($basketArea);
                            $name = trim($name);
                            $tel = trim($tel);
                            $email = trim($email);
                            $title = trim($title);
                            $message = trim($message);
                            $basketArea = trim($basketArea);
                            if (mail("furchinchillas@gmail.com", $title, "Имя: ".$name." E-mail: ".$email." Телефон: ".$tel." Содержимое корзины: ".$basketArea." Сообщение: ".$message ,"From: abfc@abfc.h1n.ru \r\n")){ 
                                ?><script type="text/jscript">
	                                alert("Сообщение успешно отправлено!");
                                </script><?php
                            } else { 
                                ?><script type="text/jscript">
	                                alert("При отправке сообщения возникла ошибка. Пожалуйста, повторите сообщение еще раз.");
                                </script><?php
                            }
                        }
                        ?>
	<?php
		include("Datas/Footer.html");
	?>
	</div>
	</div>
</body>
</html>
