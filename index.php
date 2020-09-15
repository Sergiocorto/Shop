<?php

include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

//setcookie("basket", "", 0, "/");
$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$cat = substr( stristr($url, "category_id="), -1);
if ( isset( $_GET ["category_id"] ) ) {
    $sql_cat = "SELECT * FROM categories WHERE id =" . $_GET["category_id"];
    $category = mysqli_fetch_assoc ( $connect -> query ( $sql_cat ) );

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    
<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";
?>  
    

    <div class = "container">
        <div class="row m-2">
        <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/parts/cat_nav.php";
        ?>
            <div class="col-9">
                <div class = "container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item">
                                <?php 
                                    if ( isset( $_GET ["category_id"] ) ) {
                                        echo $category["title"];
                                    }
                                ?>
                            </li>
                        </ol>
                    </nav>
                    <div class = "row" id="products">
                        <?php
                            //Выоводим список товаров
                            if (isset($_GET["category_id"])) {
                                $sql = "SELECT * FROM products WHERE category_id =" . $_GET["category_id"] . " LIMIT 6";
                            }else {
                                $sql = "SELECT * FROM products LIMIT 6";
                            }
                            
                            $result = $connect->query($sql);
                            while( $row = mysqli_fetch_assoc($result)){
                                include "parts/product_card.php";
                            }
                        ?>  
                    </div>
                    <div class = "container">
                        <div class = "row">
                            <div class = "col-4 offset-4">
                                <form id="form" action = "http://shopweb.zzz.com.ua/modules/products/get_more_products.php" method = "POST">
                                    <input type="hidden" value="<?php echo $url; ?>" id="url">
                                    <input type="hidden" value="1" id="current-page">
                                    <button type="submit" class="btn btn-primary btn-lg" id="show-more">Показать еще</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class = "container">
                        <a class = "row offset-4">
                            <nav aria-label="...">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <form class="pag-form" action = "http://shopweb.zzz.com.ua/modules/products/get_more_products.php" method = "POST">
                                            <input type="hidden" value="<?php echo $url; ?>" name="url">
                                            <input type="hidden" value="0" name="current-page">
                                            <a class="page-link" type="submit"><<</a>
                                        </form>
                                    </li>
                                    <?php
                                        if (isset($_GET["category_id"])) {
                                            $sql = "SELECT * FROM products WHERE category_id =" . $_GET["category_id"];
                                        }else {
                                            $sql = "SELECT * FROM products";
                                        }

                                        $result = $connect->query($sql);
                                        $numProducts = mysqli_num_rows($result);
                                        $numPages = $numProducts/6;
                                        $lastPage = floor($numPages);
                                        $numberPage = 1;

                                        while ($numPages >= 0) {
                                            ?>
                                            <li class="page-item">
                                                <form class="pag-form" action = "http://shopweb.zzz.com.ua/modules/products/get_more_products.php" method = "POST">
                                                    <input type="hidden" value="<?php echo $url; ?>" name="url">
                                                    <input type="hidden" value="<?php echo $numberPage-1; ?>" name="current-page">
                                                    <a class="page-link" type="submit"><?php echo $numberPage; ?></a>
                                                </form>

                                            </li>
                                            <?php
                                            $numberPage++;
                                            $numPages--;
                                        }
                                    ?>
                                    <li class="page-item">
                                        <form class="pag-form" action = "http://shopweb.zzz.com.ua/modules/products/get_more_products.php" method = "POST">
                                            <input type="hidden" value="<?php echo $url; ?>" name="url">
                                            <input type="hidden" value="<?php echo $lastPage; ?>" name="current-page">
                                            <a class="page-link" type="submit">>></a>
                                        </form>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>