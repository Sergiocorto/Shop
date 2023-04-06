<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
    
    if (isset($_POST["submit"])) {
        //Отправляем запрос на добавление записи в БД
        $sql = "INSERT INTO products (title, description, content, category_id) VALUES ('" . $_POST["title"] . "', '" . $_POST["description"] . "', '" . $_POST["content"] . "', '" . $_POST["category_id"] . "')";
        if ($connect->query($sql)) {
            header("Location: /admin/products.php");
        } else {
            echo "ERROR";
        }
    }
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Add Product</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />
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
                        <li class="breadcrumb-item"><a href="/admin/products.php">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                    </ol>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Add Product</h4>
                                </div>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form method = "POST">
                                                            <div class="row">
                                                                <div class="col-md-5 pr-1">
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input name = "title" type="text" class="form-control" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 pr-1">
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <input name = "description" type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Content</label>
                                                                        <textarea name = "content" rows="4" cols="80" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Category ID</label>
                                                                        <select class="form-control" name = "category_id">
                                                                            <option value = 0>Не выбрано</option>
                                                                            <?php
                                                                                $sql = "SELECT * FROM categories";
                                                                                $result = $connect->query($sql);
                                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                                    echo "<option value ='" . $row["id"] . "'>" . $row["title"] . "</option>";
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button name = "submit" type="submit" value = "1" class="btn btn-succes btn-fill pull-right">Add Product</button>
                                                            <div class="clearfix"></div>
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
            </div>
        </div>
    </div>
</body>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php"; ?>
</html>