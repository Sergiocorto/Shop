<?php

    include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
    //проверяем наличие данных
    if (isset($_GET["id"])) {

        //Отправляем запрос на удаление записи в БД
        $sql = "DELETE FROM products WHERE products.id =" . $_GET["id"];

        //Проверка на ошибку
        if (!mysqli_query($connect, $sql)) {
            echo "<h2>ERROR</h2>";
        }
    }

    //открываем список продуктов
    header("Location: /admin/products.php");

?>