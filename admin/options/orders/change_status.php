<?php

include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
//проверяем наличие данных
if (isset( $_POST ) and $_SERVER["REQUEST_METHOD"]=="POST") {
//отправляем запрос на изменение статуса
    $sql = "UPDATE `orders` SET `status` = '" . $_POST["status"] . "' WHERE `orders`.`id` ='" . $_POST["id"] . "'";
    $result = $connect->query($sql);
    
    if ($connect->query($sql)) {
        echo "Status changed!";
    }else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
?>