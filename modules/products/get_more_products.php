<?php

include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
//проверяем наличие запросов
if( isset ( $_POST["url"] ) && isset ( $_POST["currentPage"] ) ) {
    //переменные для определения номера страницы
    $pageNum = $_POST["currentPage"];
    $offset = $pageNum * 6;
    //проверяем нужно ли выбирать товар определенной категории и создаем соответствующий запрос в БД
    if( stristr( $_POST["url"], "category_id=" ) ) {
        $cat = substr( stristr($_POST["url"], "category_id="), -1);

        $sql = "SELECT * FROM products WHERE category_id =" . $cat . " LIMIT 6 OFFSET " . $offset;
    } else {
        $sql = "SELECT * FROM products LIMIT 6 OFFSET " . $offset;
    }
}

$result = $connect -> query($sql);
//выводим результат на страницу
while ($row = mysqli_fetch_assoc($result)){
    include $_SERVER['DOCUMENT_ROOT'] . "/parts/product_card.php";
}
?>
