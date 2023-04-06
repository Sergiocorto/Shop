<?php
include "../../../configs/db.php";
//проверяем наличие данных
if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['content']) && isset($_POST['category_id']) 
&& $_POST['id'] !="" && $_POST['title'] !="" && $_POST['description'] !="" && $_POST['content'] !="" && $_POST['category_id'] !="") {
    
    //Отправляем запрос на изменение записи в БД
    $sql = "UPDATE products SET title = '" . $_POST["title"] . "', description = '" . $_POST["description"] . "', content = '" . $_POST["content"] . "', category_id = '" . $_POST["category_id"] . "' WHERE products.id = '" . $_POST["id"] . "'";
    
    //Проверка на ошибку
    if ( !mysqli_query($connect, $sql) ) {
        echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
    } 
}
//открываем список продуктов
header("Location: /admin/products.php");

?>