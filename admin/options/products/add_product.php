<?php

include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
var_dump($_POST['title']);
//проверяем наличие данных
if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['content']) && isset($_POST['category_id']) 
&& $_POST['title'] !="" && $_POST['description'] !="" && $_POST['content'] !="" && $_POST['category_id'] !="") {
    
    //Отправляем запрос на добавление записи в БД
    $sql = "INSERT INTO products (title, description, content, category_id) VALUES ('" . $_POST["title"] . "', '" . $_POST["description"] . "', '" . $_POST["content"] . "', '" . $_POST["category_id"] . "')";

    //Проверка на ошибку
    if ( !mysqli_query($connect, $sql) ) {
        echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
    }
    
}
//открываем список продуктов
//header("Location: /admin/products.php");

?>