<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
    $page = "products";
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin panel</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="/admin" class="simple-text">
                        Shop
                    </a>
                </div>
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/nav.php"; ?>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Products</h4>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href = "options/products/add.php" type="button" class="btn btn-secondary">Add</a>
                                    </div>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Cateegory</th>
                                            <th>Options</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM products";
                                                $result = $connect->query($sql);
                                                while( $row = mysqli_fetch_assoc($result)){
                                                    ?>
                                                    <tr>
                                                        <td> <?php echo $row["id"]?> </td>
                                                        <td> <?php echo $row["title"]?> </td>
                                                        <td> <?php echo $row["description"]?> </td>
                                                        <td> <?php echo $row["category_id"]?> </td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <a href = "options/products/edit.php?id=<?php echo $row["id"]?>" type="button" class="btn btn-secondary">Edit</a>
                                                                <a href = "options/products/delete.php?id=<?php echo $row["id"]?>" type="button" class="btn btn-secondary">Delete</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php"; ?>

</html>
