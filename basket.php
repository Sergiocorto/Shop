<?php

include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
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
    <title>Basket</title>
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
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Count</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Options</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (isset($_COOKIE["basket"])){
                            $basket = json_decode($_COOKIE["basket"], true);

                            for ($i = 0; $i < count($basket["basket"]); $i++){
                                $sql = "SELECT * FROM products WHERE id=" . $basket["basket"][$i]['product_id'];
                                $result = $connect -> query($sql);
                                $product = mysqli_fetch_assoc($result);
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $product["id"] ?></th>
                                    <td><?php echo $product["title"] ?></td>
                                    <td><input type="text" oninput= "inputCount(this, <?php echo $product['id']?>)" name="count" value="<?php echo $basket["basket"][$i]['count']?>"></td>
                                    <td name="cost"><?php echo $basket["basket"][$i]['cost'] ?></td>
                                    <td><button onclick="deleteProductBasket(this, <?php echo $product['id']?>)" class="btn btl-danger">Delete</button></td>
                                </tr>
                            <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form id="order" action = "http://shop.local/modules/basket/add_order.php" method = "POST">
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input name = "name" type="text" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input name = "address" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input name = "phone" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <button name = "submit" type="submit" class="btn btn-succes btn-fill pull-right">Add Product</button>
                                        <div class="clearfix"></div>
                                        <span id="order_info"></span>
                                    </form>
                                </div>
                            </div>
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
<script src="js/main.js"></script>
</body>
</html>