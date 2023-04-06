<?php
//проверяем есть ли ПОСТ запрос
if( isset( $_POST ) and $_SERVER["REQUEST_METHOD"]=="POST" ){
    //проверяем существует ли КУКИ
    if(isset($_COOKIE["basket"])){
        $basket = json_decode($_COOKIE["basket"], true);
        //проходим по масиву
        for ($i=0; $i<count($basket["basket"]); $i++){
            //ищем совпадение по ИД и удаляем запись есть оно есть
            if ($basket["basket"][$i]["product_id"] == $_POST["id"]){
                unset($basket["basket"][$i]);
                sort($basket["basket"]);

            }
        }
        $jsonProduct = json_encode($basket);

        setcookie("basket", "", 0, "/");
        //Создаем cookie
        setcookie("basket", $jsonProduct, time()+60*60, "/");

        echo $jsonProduct;
    }

}

?>
