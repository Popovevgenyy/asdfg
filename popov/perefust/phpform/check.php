<?php
    $name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
    $nomer = filter_var(trim($_POST['nomer']),FILTER_SANITIZE_STRING);
    
    

    if(mb_strlen($name) < 5 || mb_strlen($name) > 90) {
        echo "Недопустимая длина имени";
        exit();
    } else if(mb_strlen($nomer) < 3 || mb_strlen($nomer) > 50) {
        echo "Недопустимая длина телефона";
        exit();
    }
    $mysql = new mysqli('localhost', 'root', '', 'lerning_center');
    $mysql->query("INSERT INTO `zakaz` (`name`, `nomer`)
    VALUES('$name', '$nomer')");

    $mysql->close();

    header('Location: /');
?>