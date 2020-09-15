<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
//проверяем есть ли ПОСТ запрос

$sql = "SELECT * FROM products WHERE id=" . $_POST["id"];
$result = $connect ->query($sql);
$product = mysqli_fetch_assoc($result);


if( isset( $_POST ) and $_SERVER["REQUEST_METHOD"]=="POST" ){
    //проверяем существует ли КУКИ
    if(isset($_COOKIE["basket"])){
        $basket = json_decode($_COOKIE["basket"], true);
        
        //проходим по масиву
        for ($i=0; $i<count($basket["basket"]); $i++){
            //ищем совпадение по ИД и кол-во и общую стоимость когда запись найдена оно есть
            if ($basket["basket"][$i]["product_id"] == $_POST["id"]){
                if($_POST["count"] == ""){
                    $basket["basket"][$i]["count"] = "";
                    $basket["basket"][$i]["cost"] = 0;   
                }else {
                    $basket["basket"][$i]["count"] = $_POST["count"];
                    $basket["basket"][$i]["cost"] = $basket["basket"][$i]["count"] * $product["cost"];
                }
                

                echo json_encode($basket["basket"][$i]["cost"]);
            }
        }
        $jsonProduct = json_encode($basket);

        setcookie("basket", "", 0, "/");
        //Создаем cookie
        setcookie("basket", $jsonProduct, time()+60*60, "/");

        
    }

}

?>