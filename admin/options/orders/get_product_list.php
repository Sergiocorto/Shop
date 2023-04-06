<?php

$basket = json_decode($row["products"], true);
$orderPrice = 0;
for ($i = 0; $i < count($basket["basket"]); $i++){
    $sqlBasket = "SELECT * FROM products WHERE id=" . $basket["basket"][$i]['product_id'];
    $resultBasket = $connect -> query($sqlBasket);
    $product = mysqli_fetch_assoc($resultBasket);
    ?>
    
    <span> <?php echo $product["title"]?> - <?php echo $basket["basket"][$i]['count']?></span></br>
    
    <?php
    $orderPrice = $orderPrice + $basket["basket"][$i]['cost'];        
}

?>