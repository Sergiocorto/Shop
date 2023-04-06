<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

    //Выоводим список товаров   
    $sql_product = "SELECT * FROM products WHERE id =" . $_GET["id"];    
    $result_product = $connect->query( $sql_product );
    $row_product = mysqli_fetch_assoc( $result_product );
    $categoryResult = $connect->query( "SELECT *FROM categories WHERE id=" . $row_product["category_id"] );
    $category = mysqli_fetch_assoc($categoryResult); 
                        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
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
                                <a href="/?category_id=<?php echo $category["id"] ?>">
                                    <?php echo $category["title"] ?>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $row_product["title"] ?></li>
                        </ol>
                    </nav>
                    <div class = "row">
                        <div class = "col-12">
                            <div class = "card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $row_product["title"]?>
                                    </h5>
                                    <p class="card-text"><?php echo $row_product["description"]?></p>
                                    <p class="card-text"><?php echo $row_product["content"]?></p>
                                    <a href="#" class="btn btn-primary">В корзину</a>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>