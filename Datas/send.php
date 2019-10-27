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
            header('Refresh: 0; URL=http://abfc.h1n.ru/Back_call.php');
        } else { 
            ?><script type="text/jscript">
                alert("При отправке сообщения возникла ошибка. Пожалуйста, повторите сообщение еще раз.");
            </script><?php
            header('Refresh: 0; URL=http://abfc.h1n.ru/Back_call.php');
        }
                            
/*$nameOr = ["Балабанова Д.Д.", "Биденко А.А.", "Горних Д.Е.", "Гребенкин А.Р.", "Копцев М.А.", "Красных Е.Н.", "Лисин Н.А.", "Медведев С.А.", "Осмолко С.А.", "Остапчук А.В.", "Резюков Д.Д.",
"Солонарь В.Е.", "Сырейщиков Р.А."];
$names = ["Балабанова Д.Д.", "Биденко А.А.", "Горних Д.Е.", "Гребенкин А.Р.", "Копцев М.А.", "Красных Е.Н.", "Лисин Н.А.", "Медведев С.А.", "Осмолко С.А.", "Остапчук А.В.", "Резюков Д.Д.",
"Солонарь В.Е.", "Сырейщиков Р.А."];
$emails = ["balabanova.daria15@gmail.com", "alexbidenko1998@gmail.com", "heartlesskotik@mail.ru", "akimgrebenkin21@gmail.com", "koptseff.mikhail@yandex.ru", "elenakrasnyh2000@gmail.com",
"lisin.nikolai1999@yandex.ru", "mctepa@bk.ru", "hiddenevil@protonmail.ch", "artem.ostapchukkk@mail.ru", "rezyukov99@gmail.com", "hidanblw@gmail.com", "rombiks200@yandex.ru"];
$error = false;
do {
    $error = false;
    shuffle($names);
    for ($i = 0; $i < 13; $i++) {
        if ($names[$i] == $nameOr[$i]) $error = true;
    }
} while ($error);
for ($i = 0; $i < 13; $i++) {
    if (mail($emails[$i], "Тайный Санта!", "С приближающимся новым годом тебя! Радость и веселье ждет каждого из нас. Одному из твоих друзей предстоит подарить счастье тебе, а взамен... ".$names[$i]." - имя того человека, для кого ты будешь Тайным Сантой. Торопись, времени осталось мало, и помни - никто на свете не должен знать, кому ты сделаешь свой подарок! Удачи и неси добро людям:)","From: abfc@abfc.h1n.ru \r\n")){ 
        mail("alexbidenko1998@gmail.com", "Тайный Санта! Copy", "С приближающимся новым годом тебя! Радость и веселье ждет каждого из нас. Одному из твоих друзей предстоит подарить счастье тебе, а взамен... ".$names[$i]." - имя того человека, для кого ты будешь Тайным Сантой. Торопись, времени осталось мало, и помни - никто на свете не должен знать, кому ты сделаешь свой подарок! Удачи и неси добро людям:)","From: abfc@abfc.h1n.ru \r\n");?><script type="text/jscript">
            alert("Сообщение успешно отправлено!");
        </script><?php
        header('Refresh: 0; URL=http://abfc.h1n.ru/Back_call.php');
    }
}*/

    }
?>