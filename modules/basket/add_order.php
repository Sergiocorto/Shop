<?php

include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/configs/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/modules/telegram/send_message.php";

//проверяем наличие данных
if (isset( $_POST ) and $_SERVER["REQUEST_METHOD"]=="POST") {

    $sql = "SELECT * FROM users LIKE '" . $_POST["phone"] . "'";
    $userId = 0;
    $result = $connect->query($sql);
    
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        $userId = $user["id"];
    }else {
        $sql = "INSERT INTO `users`(`login`, `phone`) VALUES ('" . $_POST["name"] . "', '" . $_POST["phone"] ."')";
        
        if ($connect->query($sql)) {
            echo "User add!";
            $userId = $connect->insert_id;
        }else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    }

    //Отправляем запрос на добавление записи в БД
    $sql = "INSERT INTO orders (user_id, name, address, phone, products) VALUES ('" . $userId . "', '" . $_POST["name"] . "', '" . $_POST["address"] . "', '" . $_POST["phone"] . "', '" . $_COOKIE["basket"] . "')";

    //Проверка на ошибку
    if (mysqli_query($connect, $sql) ) {
        setcookie("basket", "", 0, "/");

        echo "Заказ оформлен</br>
            <a href='/'>На главную</a>";
        
        message_to_telegram("Пришел новый ");

    }else{
        echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
    }
}
?>
