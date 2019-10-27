<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Документ без названия</title>
<?php
	include("Datas/import.html");
?>

<style type="text/css">
body {
    min-height: 2000px;
    background-color: #222;
}
.blockRedact {
    padding: 50px;
    border: 2px solid gold;
    margin: 50px 20%;
}
p {
    color: gold;
}
label {
    display: block;
}
input {
    width: 100%;
}
#productDescription {
    height: 300px;
    width: 100%;
}
.imgBlock {
    max-width: 100%;
    max-height: 33vw;
    min-width: 100%;
    min-height: 33vw;
}
</style>
</head>

<body>
	<?php
		include("Datas/Head.html");
	?>
<script type="text/javascript">
    var Datas;
    
    var activ;
    var activProduct;
    
	var requestURL = 'Data.json';
	var request = new XMLHttpRequest();
	$(function () {
    	request.open('GET', requestURL);
    	request.responseType = 'json';
        request.send();
        request.onload = function() {
            Datas = request.response;
            for (var chin in Datas.chin) {
                $('#selectDefault').append('<option value="' + Datas.chin[chin].text + '">' + Datas.chin[chin].text + '</option>');
            }
            for (var goods in Datas.goods) {
                $('#selectDefault').append('<option>' + Datas.goods[goods].text + '</option>');
            }
            
            $( "#selectDefault" ).change(function() {
                for (var chin in Datas.chin) {
                    if ($("#selectDefault").val() == Datas.chin[chin].text) {
                        activ = "chin";
                        activProduct = chin;
                        
                        $('#productText').val(Datas.chin[chin].text);
                        $('#cost_1').val(Datas.chin[chin].variant.NM.cost);
                        $('#cost_2').val(Datas.chin[chin].variant.NF.cost);
                        $('#cost_3').val(Datas.chin[chin].variant.BM.cost);
                        $('#cost_4').val(Datas.chin[chin].variant.BF.cost);
                        $('#img_1').attr("src", Datas.chin[chin].img.a);
                        $('#img_2').attr("src", Datas.chin[chin].img.b);
                        
                        $('.goods').hide(0);
                        $('.chin').show(0);
                    }
                }
                for (var goods in Datas.goods) {
                    if ($("#selectDefault").val() == Datas.goods[goods].text) {
                        activ = "goods";
                        activProduct = goods;
                        
                        $('#productText').val(Datas.goods[goods].text);
                        $('#goodsCost').val(Datas.goods[goods].cost);
                        $('#productDescription').val(Datas.goods[goods].description);
                        $('#productBuy').val(Datas.goods[goods].buy);
                        $('#img_1').attr("src", Datas.goods[goods].img);
                        
                        $('.chin').hide(0);
                        $('.goods').show(0);
                    }
                }
            });
        }
	});
    
    var save = function () {
        if(confirm("Уверены, что хотите сохранить изменения?")) {
            if ($("#selectDefault").val() != "Выберите товар") {
                if (activ == "chin") {
                    Datas[activ][activProduct].text = $('#productText').val();
                    Datas[activ][activProduct].variant.NM.cost = $('#cost_1').val();
                    Datas[activ][activProduct].variant.NF.cost = $('#cost_2').val();
                    Datas[activ][activProduct].variant.BM.cost = $('#cost_3').val();
                    Datas[activ][activProduct].variant.BF.cost = $('#cost_4').val();
                    $.ajax({
                        url: 'adminConsole.php',
                        type: 'POST',
                        data: {myJson: JSON.stringify(Datas), fileName: 'Data.json'}
                    });
                    alert('Saving!');
                }
                if (activ == "goods") {
                    Datas[activ][activProduct].text = $('#productText').val();
                    Datas[activ][activProduct].text = $('#goodsCost').val();
                    Datas[activ][activProduct].text = $('#productDescription').val();
                    Datas[activ][activProduct].text = $('#productBuy').val();
                    $.ajax({
                        url: 'adminConsole.php',
                        type: 'POST',
                        data: {myJson: JSON.stringify(Datas), fileName: 'Data.json'}
                    });
                    alert('Saving!');
                }
            }
        }
    }
</script>

<div class="blockRedact">
    <select id="selectDefault" size="1" name="">
        <option selected>Выберите товар</option>
    </select>
    
    <label class="chin goods" hidden="hide">
        <p>Текст товара:</p>
        <input id="productText" type="text" value="">
    </label>
    <div class="chin" id="chinCost" hidden="hide">
        <p>Цены шиншилл:</p>
        <table>
            <tr>
                <td>
                    <label>
                        <p>Не бонитированный самец:</p>
                        <input id="cost_1" type="text" value="">
                    </label>
                </td>
                <td>
                    <label>
                        <p>Не бонитированная самка:</p>
                        <input id="cost_2" type="text" value="">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <p>Бонитированный самец:</p>
                        <input id="cost_3" type="text" value="">
                    </label>
                </td>
                <td>
                    <label>
                        <p>Бонитированная самка:</p>
                        <input id="cost_4" type="text" value="">
                    </label>
                </td>
            </tr>
        </table>
    </div>
    <form class="chin goods" method="post" enctype="multipart/form-data" hidden="hide">
        <img class="imgBlock" id="img_1" src="">
        <input id="inputImg1" type="file" name="file">
        <input type="submit" value="Загрузить изображение">
    </form>
    <form class="chin" method="post" enctype="multipart/form-data" hidden="hide">
        <img class="imgBlock" id="img_2" src="">
        <input id="inputImg2" type="file" name="file">
        <input type="submit" value="Загрузить изображение">
    </form>
    <?php
  function can_upload($file){
	// если имя пустое, значит файл не выбран
    if($file['name'] == '')
		return 'Вы не выбрали файл.';
	
	/* если размер файла 0, значит его не пропустили настройки 
	сервера из-за того, что он слишком большой */
	if($file['size'] == 0)
		return 'Файл слишком большой.';
	
	// разбиваем имя файла по точке и получаем массив
	$getMime = explode('.', $file['name']);
	// нас интересует последний элемент массива - расширение
	$mime = strtolower(end($getMime));
	// объявим массив допустимых расширений
	$types = array('jpg', 'png', 'bmp', 'jpeg');
	
	// если расширение не входит в список допустимых - return
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';
	
	return true;
  }
  
  function make_upload($file){	
	// формируем уникальное имя картинки: случайное число и name
	$name = mt_rand(0, 10000) . $file['name'];
	copy($file['tmp_name'], 'MyImages/' . $name);
  }
    // если была произведена отправка формы
    if(isset($_FILES['file'])) {
      // проверяем, можно ли загружать изображение
      $check = can_upload($_FILES['file']);
    
      if($check === true){
        // загружаем изображение на сервер
        make_upload($_FILES['file']);
        echo "<strong>Файл успешно загружен!</strong>";
      }
      else{
        // выводим сообщение об ошибке
        echo "<strong>$check</strong>";  
      }
    }
    ?>
    
    <label class="goods" hidden="hide">
        <p>Цена товара:</p>
        <input id="goodsCost" type="text" value="">
    </label>
    <label class="goods" hidden="hide">
        <p>Описание товара:</p>
        <textArea id="productDescription" type="text" value=""></textArea>
    </label>
    <label class="goods" hidden="hide">
        <p>Формирование единицы:</p>
        <input id="productBuy" type="text" value="">
    </label>
    <button onClick="save()" class="chin goods" hidden="hide">Сохранить изменения</button>
</div>
<?php
    file_put_contents($_POST['fileName'], $_POST['myJson']);
?>
</body>
</html>