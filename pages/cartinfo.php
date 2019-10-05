<?php
    session_start();
    require('../assets/config/config.php');
    mysqli_set_charset($conn, "utf8");

    if(empty($_SESSION['user_login'])){
        header("Location: login.php");
        exit;
    }
    if(isset($_POST['button_update_plus'])){
        $set_quantity = $_POST['quantity'];
        $user_id = $_REQUEST['id'];
        $pro_id  = $_REQUEST['product_id'];

        $sql_update = "UPDATE `user_cart` 
                       SET `quantity`= $set_quantity
                       WHERE `user_id` = $user_id AND `product_id` = $pro_id";

        $result = mysqli_query($conn,$sql_update);

        if($result){
            $old_quantity = $_SESSION['user_item'];
            $_SESSION['user_item'] = $old_quantity + 1;
            header("refresh: 0;");
        }else{
            echo "fail";
        }
    }else if(isset($_POST['button_update_minus'])){
        $set_quantity = $_POST['quantity'];
        $user_id = $_REQUEST['id'];
        $pro_id  = $_REQUEST['product_id'];

        $sql_update = "UPDATE `user_cart` 
                       SET `quantity`= $set_quantity
                       WHERE `user_id` = $user_id AND `product_id` = $pro_id";

        $result = mysqli_query($conn,$sql_update);

        if($result){
            $old_quantity = $_SESSION['user_item'];
            $_SESSION['user_item'] = $old_quantity - 1;
            header("refresh: 0;");
        }else{
            echo "fail";
        }
    }
?>
<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        $user_name_de = $_SESSION['user_login'];
        echo "<title>$user_name_de cart</title>";
    ?>
    <link href="../assets/css/cartinfo.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- NAV SECTION -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Mungmee Headphone</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-uppercase" href="../index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="product.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="contact.php">Contact us</a>
                </li>
            </ul>
            <form action="querys/search.php" method="POST" class="form-inline my-lg-0 mr-2">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                    name="keyword">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">
                    <i class="fa fa-search pr-2" aria-hidden="true"></i>Search
                </button>
            </form>
            <?php
                if(!empty($_SESSION['user_login']) and $_SESSION['status'] == 'Admin'){
                    $user_name = $_SESSION['user'];
                    $user_name_de = $_SESSION['user_login'];
                    $user_id =$_SESSION['user_id'];
                    $user_item = $_SESSION['user_item'];

                    echo "<form action='adminPages/index_admin.php' class='form-inline my-lg-0 mr-2'>
                            <button class='btn btn-success my-2 my-sm-0 text-uppercase' type='submit'>
                                <i class='fa fa-home pr-2' aria-hidden='true'></i>Go to Admin Page</button>
                        </form>
                        <form class='form-inline my-lg-0 mr-2'>
                            <a href='cartinfo.php?id=$user_id' class='btn btn-outline-primary my-2 my-sm-0 text-uppercase'>
                                <spane class='h5'>
                                    <i class='fa fa-shopping-cart pr-2' aria-hidden='true'></i>
                                    <span class='badge badge-success'>$user_item</span>
                                </spane>
                            </a>
                        </form>
                        <form class='form-inline my-lg-0 mr-2'>
                            <a href='accountdetail.php?user=$user_name' class='btn btn-primary my-2 my-sm-0 text-uppercase'>$user_name_de</a>
                        </form>";
                }else if(!empty($_SESSION['user_login'])){
                    $user_name = $_SESSION['user'];
                    $user_name_de = $_SESSION['user_login'];
                    $user_item = $_SESSION['user_item'];
                    $user_id =$_SESSION['user_id'];

                    echo "<form class='form-inline my-lg-0 mr-2'>
                            <a href='cartinfo.php?id=$user_id' class='btn btn-outline-primary my-2 my-sm-0 text-uppercase'>
                                <spane class='h5'>
                                    <i class='fa fa-shopping-cart pr-2' aria-hidden='true'></i>
                                    <span class='badge badge-success'>$user_item</span>
                                </spane>
                            </a>
                        </form>
                        <form class='form-inline my-lg-0 mr-2'>
                            <a href='accountdetail.php?user=$user_name' class='btn btn-primary my-2 my-sm-0 text-uppercase'>$user_name_de</a>
                        </form>";
                }else{
                    echo "<form action='accountdetail.php' class='form-inline my-lg-0 mr-2'>
                            <button class='btn btn-outline-primary my-2 my-sm-0 text-uppercase' type='submit'>Account</button>
                        </form>
                        <form action='register.php' class='form-inline my-lg-0'>
                            <button class='btn btn-outline-primary my-2 my-sm-0 text-uppercase' type='submit'>Register</button>
                        </form>";
                }
            ?>
        </div>
    </nav>
    <!-- END NAV SECTION -->
    <div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="container-fluid mt-2 mb-5">
                    <?php
                            if(empty($_SESSION['user_login'])){
                                echo"<div class='login-form'>
                                    <div class='row justify-content-center'>
                                        <div class='col-12 col-md-12 col-lg-12'>
                                            <div class='card'>
                                                <div class='card-header border-left border-right border-top border-dark'>
                                                    <h3 class='text-uppercase text-center font-weight-bold'>login</h3>
                                                </div>
                                                <div class='card-body bg-light border-bottom border-left border-right border-top border-dark'>
                                                    <form action='../querys/login_process.php' method='POST'>
                                                        <div class='form-group row'>
                                                            <label for='user_name'
                                                                class='col-12 col-md-12 col-lg-12 col-form-label text-md-left'>
                                                                Username / E-mail
                                                            </label>
                                                            <div class='col-12 col-md-12 col-lg-12'>
                                                                <input type='text' id='user_name' class='form-control'
                                                                name='user' required autofocus>
                                                            </div>
                                                        </div>
                                                        <div class='form-group row'>
                                                            <label for='user_name'
                                                                class='col-12 col-md-12 col-lg-12 col-form-label text-md-left'>
                                                                Password
                                                            </label>
                                                        <div class='col-12 col-md-12 col-lg-12'>
                                                            <input type='password' id='password' class='form-control'
                                                                name='pass' required autofocus>
                                                        </div>
                                                    </div>
                                                    <div class='form-group row mt-4'>
                                                        <div class='col-12 col-md-12 col-lg-12'>
                                                            <button class='btn btn-primary text-center text-uppercase form-control' name='login'>
                                                                <i class='fa fa-sign-in pr-2' aria-hidden='true'></i>login
                                                            </button>
                                                        </div>  
                                                    </div>
                                                </form>
                                            </div>
                                            <div class='card-body'>
                                                <a href='login.php' class='btn btn-success text-center text-uppercase form-control'>
                                                    <i class='fa fa-shopping-cart pr-2' aria-hidden='true'></i>My cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            }else{
                                $gretting = "";
                                $filter_user = "";
                                $name = $_SESSION['user_login'];
                                $status = $_SESSION['status'];
                                $user = $_SESSION['user'];
                                $user_id =$_SESSION['user_id'];
                                    
                                if($_SESSION['gender'] == 'male'){
                                    $gretting = "<label for='greting'
                                                    class='col-12 col-md-12 col-lg-12 col-form-label text-center'>
                                                    Mr.$name
                                                </label>";
                                }else{
                                    $gretting = "<label for='greting'
                                                    class='col-12 col-md-12 col-lg-12 col-form-label text-center'>
                                                    Ms.$name
                                                </label>";
                                }
                                if($_SESSION['status'] == 'Admin'){
                                    $filter_user = "<label for='user_name'
                                                        class='col-12 col-md-12 col-lg-12 col-form-label text-center font-weight-bold text-uppercase'>
                                                        Welcome back $status 
                                                    </label>";
                                }else{
                                    $filter_user = "<label for='user_name'
                                                        class='col-12 col-md-12 col-lg-12 col-form-label text-center font-weight-bold text-uppercase'>
                                                        Welcome back
                                                    </label>";
                                }

                                echo"<div class='login-form'>
                                    <div class='row justify-content-center'>
                                        <div class='col-12 col-md-12 col-lg-12'>
                                            <div class='card'>
                                                <div class='card-header border-left border-right border-top border-dark'>
                                                    <h3 class='text-uppercase text-center font-weight-bold'>Welcome back</h3>
                                                </div>
                                                <div class='card-body bg-light border-bottom border-left border-right border-top border-dark'>
                                                    <form action='querys/login_process.php' method='POST'>
                                                        <div class='form-group row'>
                                                            $filter_user
                                                        </div>
                                                        <div class='form-group row'>
                                                            $gretting
                                                        </div>
                                                    <div class='form-group row mt-4'>
                                                        <div class='col-12 col-md-12 col-lg-12'>
                                                            <a href='accountdetail.php?user=$user' class='btn btn-primary text-center text-uppercase form-control'>
                                                                <i class='fa fa-user pr-2' aria-hidden='true'></i>profile
                                                            </a>
                                                        </div> 
                                                        <div class='col-12 col-md-12 col-lg-12 mt-2'>
                                                            <a href='../querys/logoff_process.php' class='btn btn-danger text-center text-uppercase form-control'>
                                                                <i class='fa fa-sign-out pr-2' aria-hidden='true'></i>log off
                                                            </a>
                                                        </div>  
                                                    </div>
                                                </form>
                                            </div>
                                            <div class='card-body'>
                                                <a href='cartinfo.php?id=$user_id' class='btn btn-success text-center text-uppercase form-control'>
                                                    <i class='fa fa-shopping-cart pr-2' aria-hidden='true'></i>My cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            }
                        ?>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-6">
                    <div class="container-fluid mt-2 mb-5">
                        <div class="card">
                            <header class="card-header text-center">
                                <span class="text-uppercase h5">item</span>
                            </header>
                            <?php
                                require('../assets/config/config.php');
                                mysqli_set_charset($conn, "utf8");
                                $user_id = $_REQUEST['id'];

                                $sqlst_mt = "SELECT product.*,user_cart.*
                                             FROM product
                                             INNER JOIN user_cart ON user_cart.product_id = product.id
                                             WHERE user_cart.user_id = $user_id";

                                $result = mysqli_query($conn, $sqlst_mt);
                                $img_path = "../assets/uploads/"; 
                                if(mysqli_num_rows($result) > 0){
                                    while ($row = mysqli_fetch_assoc($result)){
                                        $id         = $row['id'];
                                        $header     = $row['header'];
                                        $sub_header = $row['sub_header'];
                                        $img        = $row['img'];
                                        $nomal      = $row['nomal_price'];
                                        $new        = $row['new_price'];

                                        echo "<div class='container-fluid'>
                                                <div class='row'>
                                                    <div class='col-12 col-md-12 col-lg-12 mt-3'>
                                                        <div class='card border-success'>
                                                            <div class='card-horizontal'>
                                                                <div class='img-square-wrapper'>
                                                                    <img class='fit-image-cart' src='$img_path$img' alt='Card image cap'>
                                                                </div>
                                                            <div class='card-body'>
                                                                <h4 class='card-title'>$header</h4>
                                                                <p class='card-text'>$sub_header</p>
                                                                <span class='float-left h6 my-auto'>
                                                                    <a href='productinfo.php?id=$id'>
                                                                        <i class='fa fa-search-plus pr-2' aria-hidden='true'></i>More info
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class='card-footer border-top border-success'>
                                                            <div class='row'>
                                                                <div class='col-12 col-md-12 col-lg-12'>
                                                                    <form action='../querys/addtocart.php?id=$id' method='POST' class='py-auto'>
                                                                        <button type='submit' class='btn btn-danger h5 float-right' name='delete_product'>
                                                                            <i class='fa fa-trash' aria-hidden='true'></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="container-fluid mt-2 mb-5">
                        <div class="card">
                            <header class="card-header text-center">
                                <span class="text-uppercase h5">price</span>
                            </header>
                            <?php
                                    require('../assets/config/config.php');
                                    mysqli_set_charset($conn, "utf8");
                                    $user_id = $_REQUEST['id'];
                                    $total_price = 0;

                                    $sqlst_mt = "SELECT product.nomal_price,product.new_price,user_cart.quantity,user_cart.product_id,
	                                                (SELECT (IF(product.new_price IS NULL , 
                                                                   product.nomal_price*user_cart.quantity , product.new_price*user_cart.quantity))
                                                     FROM product WHERE product.id = user_cart.product_id) AS Total
                                                FROM product
                                                INNER JOIN user_cart ON user_cart.product_id = product.id
                                                WHERE user_cart.user_id = $user_id";

                                    $result = mysqli_query($conn, $sqlst_mt);
                                    if(mysqli_num_rows($result) > 0){
                                        while ($row = mysqli_fetch_assoc($result)){
                                            $nomal      = $row['nomal_price'];
                                            $new        = $row['new_price'];
                                            $total      = $row['Total'];
                                            $qunatity   = $row['quantity'];
                                            $pro_id     = $row['product_id'];

                                            $total_price += $total; 

                                            if($new == null){
                                                echo "<div class='card-body border-top border-success'>
                                                        <div class='row'>
                                                            <div class='col-12 col-md-6 col-lg-6 my-auto'>
                                                                <form action='cartinfo.php?id=$user_id&product_id=$pro_id' method='POST'>
                                                                    <div class='input-group'>
                                                                        <span class='input-group-btn'>
                                                                            <button type='submit' class='plus-btn btn-lg btn btn-success' 
                                                                                    name='button_update_plus'>
                                                                                <i class='fa fa-plus' aria-hidden='true'></i>
                                                                            </button>
                                                                        </span>
                                                                        <input type='text' id='quantity' name='quantity' 
                                                                            class='form-control input-number text-center font-weight-bold' 
                                                                            value='$qunatity' min='1' max='100'>
                                                                        <span class='input-group-btn'>
                                                                            <button type='submit' class='minus-btn btn-lg btn btn-danger' 
                                                                                    name='button_update_minus'>
                                                                                <i class='fa fa-minus' aria-hidden='true'></i>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                </form>        
                                                            </div>
                                                            <div class='col-12 col-md-6 col-lg-6 my-auto'>
                                                                <div class='align-middle text-right'>
                                                                    <div>
                                                                        <span class='h5'>
                                                                            Price : ".   number_format($nomal)."
                                                                        </span>
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                    </div>";
                                            }else{
                                                echo "<div class='card-body border-top border-success'>
                                                        <div class='row'>
                                                            <div class='col-12 col-md-6 col-lg-6 my-auto'>
                                                                <form action='cartinfo.php?id=$user_id&product_id=$pro_id' method='POST'>
                                                                    <div class='input-group'>
                                                                        <span class='input-group-btn'>
                                                                            <button type='submit' class='plus-btn btn-lg btn btn-success' 
                                                                                    name='button_update_plus'>
                                                                                <i class='fa fa-plus' aria-hidden='true'></i>
                                                                            </button>
                                                                        </span>
                                                                        <input type='text' id='quantity' name='quantity' 
                                                                            class='form-control input-number text-center font-weight-bold' 
                                                                            value='$qunatity' min='1' max='100'>
                                                                        <span class='input-group-btn'>
                                                                            <button type='submit' class='minus-btn btn-lg btn btn-danger' 
                                                                                    name='button_update_minus'>
                                                                                <i class='fa fa-minus' aria-hidden='true'></i>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                </form>        
                                                            </div>
                                                            <div class='col-12 col-md-6 col-lg-6'>
                                                                <div class='align-middle my-auto text-right'>
                                                                    <div>
                                                                        <span class='h5'>
                                                                            <del class='price-old'>
                                                                                Price : ".   number_format($nomal)."
                                                                            </del>
                                                                        </span>
                                                                    </div>
                                                                <div>
                                                                    <span class='h5 text-danger'>
                                                                        ".number_format($new)."
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";
                                            }
                                        }
                                        echo "<div class='card-body border-top border-success'>
                                                <div class='align-middle my-auto'>
                                                    <span class='float-left h5'>
                                                        Total price :
                                                    </span>
                                                    <span class='float-right h5 text-success'>
                                                        ".number_format($total_price)."
                                                    </span>
                                                </div>
                                            </div>
                                            <div class='card-body border-top text-right'>
                                                <a class='btn btn-warning' href='ordercomplete.php'>
                                                    Order<i class='fa fa-arrow-circle-right pl-2' aria-hidden='true'></i>
                                                </a>
                                            </div>";
                                    }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; Mungmee Headphone</small>
            <small class="ml-2"><?php echo date("d-m-Y H:i:s");?></small>
        </div>
    </footer>
    <script src="https://use.fontawesome.com/4283dcca0d.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $('.minus-btn').on('click', function(e){
            //e.preventDefault();
            var $this = $(this);
            var $input = $this.closest('div').find('input');
            var value = parseInt($input.val());
 
            if (value > 1) {
                value = value - 1;
            } else {
                value = 0;
            }
 
            $input.val(value);
        });
 
        $('.plus-btn').on('click', function(e) {
            //e.preventDefault();
            var $this = $(this);
            var $input = $this.closest('div').find('input');
            var value = parseInt($input.val());
 
            if (value < 100) {
                value = value + 1;
            } else {
                value =100;
            }
 
            $input.val(value);
        });
    });
    </script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        console.log($("#menu-toggle").text().trim());
        if ($("#menu-toggle").text().trim() == 'Close menu') {
            $("#menu-toggle").text("Open menu");
            $("#menu-toggle").attr('class', 'btn btn-success');
        } else {
            $("#menu-toggle").text("Close menu");
            $("#menu-toggle").attr('class', 'btn btn-danger');
        }
    });
    </script>
</body>

</html>