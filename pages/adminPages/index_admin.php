<?php
    session_start();
    if(empty($_SESSION['user_login']) or $_SESSION['status'] != 'Admin'){
        header("Location: ../login.php?");
        exit;
    }
?>
<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../assets/css/sidebar.css" rel="stylesheet" type="text/css">
    <title>Administrator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index_admin.php">Administrator</a>
                </li>
                <li>
                    <a class="active text-uppercase" href="index_admin.php"><i class="fa fa-tachometer pr-2"
                            aria-hidden="true"></i> Dashboard</a>
                </li>
                <li>
                    <a class="text-uppercase" href="adminAbility/account.php"><i class="fa fa-address-book-o pr-2"
                            aria-hidden="true"></i> Account</a>
                </li>
                <li>    
                    <a class="text-uppercase" href="adminAbility/product.php"><i class="fa fa-shopping-cart pr-2"
                            aria-hidden="true"></i> Product</a>
                </li>
                <li>
                    <a class="text-uppercase text-success" href="../../index.php"><i class="fa fa-home pr-2"
                            aria-hidden="true"></i> View live site</a>
                </li>
                <li>
                    <a class="text-uppercase text-danger" href="../../querys/logoff_process.php"><i
                            class="fa fa-sign-out pr-2" aria-hidden="true"></i> log off</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Dashboard</h1>
                        <p>Welcome back Admin <strong><?=$_SESSION['user_login']?></strong>.</p>
                        <a href="#menu-toggle" class="btn btn-danger mb-3" id="menu-toggle">Close menu</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 mt-2">
                        <div class="card">
                            <header class="card-header">
                                <a href="adminAbility/product.php"
                                    class="float-right btn btn-outline-primary mt1 text-uppercase">View all</a>
                                <span class="text-left card-title align-middle h3">All Product</span>
                            </header>
                            <div class="card-body">
                                <?php
                                    require('../../assets/config/config.php');
                                    mysqli_set_charset($conn, "utf8");
                                    $sql = "SELECT COUNT(product_type) FROM product WHERE product_type = 1";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $promo = $row['COUNT(product_type)'];

                                        if($promo == 0){
                                            echo "<span class='align-middle h5'>Promotion : </span>
                                                  <h4 class='float-right'><spane class='badge badge-danger'>$promo</spane></h4>";  
                                        }else{
                                            echo "<span class='align-middle h5'>Promotion : </span>
                                                  <h4 class='float-right'><spane class='badge badge-primary'>$promo</spane></h4>";  
                                        }             
                                    }else{
                                        echo "<span class='align-middle h5'>Promotion : </span>
                                              <h5 class='float-right'>0</h5>";    
                                    }
                                    mysqli_close($conn);
                                ?>
                            </div>
                            <div class="card-body">
                                <?php
                                    require('../../assets/config/config.php');
                                    mysqli_set_charset($conn, "utf8");
                                    $sql = "SELECT COUNT(product_type) FROM product WHERE product_type = 2";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $hothit = $row['COUNT(product_type)'];

                                        if($hothit == 0){
                                            echo "<span class='align-middle h5'>Hot hit : </span>
                                                  <h4 class='float-right'><spane class='badge badge-danger'>$hothit</spane></h4>";  
                                        }else{
                                            echo "<span class='align-middle h5'>Hot hit : </span>
                                                  <h4 class='float-right'><spane class='badge badge-primary'>$hothit</spane></h4>";  
                                        }       
                                    }else{
                                        echo "<span class='align-middle h5'>Hot hit : </span>
                                              <h5 class='float-right'>0</h5>";    
                                    }
                                    mysqli_close($conn);
                                ?>
                            </div>
                            <div class="card-body">
                                <?php
                                    require('../../assets/config/config.php');
                                    mysqli_set_charset($conn, "utf8");
                                    $sql = "SELECT COUNT(product_type) FROM product WHERE product_type = 3";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0){
                                        $row = mysqli_fetch_assoc($result);
                                        $hotnew = $row['COUNT(product_type)'];

                                        if($hotnew == 0){
                                            echo "<span class='align-middle h5'>Hot new : </span>
                                                  <h4 class='float-right'><spane class='badge badge-danger'>$hotnew</spane></h4>";  
                                        }else{
                                            echo "<span class='align-middle h5'>Hot new : </span>
                                                  <h4 class='float-right'><spane class='badge badge-primary'>$hotnew</spane></h4>";  
                                        }       
                                    }else{
                                        echo "<span class='align-middle h5'>Hot new : </span>
                                              <h5 class='float-right'>0</h5>";    
                                    }
                                    mysqli_close($conn);
                                ?>
                            </div>
                            <div class="card-body">
                                <?php
                                    require('../../assets/config/config.php');
                                    mysqli_set_charset($conn, "utf8");
                                    $sql = "SELECT COUNT(product_type) FROM product WHERE product_type = 4";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0){
                                        $row = mysqli_fetch_assoc($result);
                                        $nomal = $row['COUNT(product_type)'];

                                        if($nomal == 0){
                                            echo "<span class='align-middle h5'>Nomal : </span>
                                                  <h4 class='float-right'><spane class='badge badge-danger'>$nomal</spane></h4>";  
                                        }else{
                                            echo "<span class='align-middle h5'>Nomal : </span>
                                                  <h4 class='float-right'><spane class='badge badge-primary'>$nomal</spane></h4>";  
                                        }          
                                    }else{
                                        echo "<span class='align-middle h5'>Nomal : </span>
                                              <h5 class='float-right'>0</h5>";    
                                    }
                                    mysqli_close($conn);
                                ?>
                            </div>
                            <div class="card-body border-top">
                                <?php
                                    require('../../assets/config/config.php');
                                    mysqli_set_charset($conn, "utf8");
                                    $sql = "SELECT COUNT(*) FROM `product`";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0){
                                        $row = mysqli_fetch_assoc($result);
                                        $sum = $row['COUNT(*)'];

                                        if($sum == 0){
                                            echo "<span class='align-middle h5'>All product summation : </span>
                                                  <h4 class='float-right'><spane class='badge badge-danger'>$sum</spane></h4>";  
                                        }else{
                                            echo "<span class='align-middle h5'>All product summation : </span>
                                                  <h4 class='float-right'><spane class='badge badge-success'>$sum</spane></h4>";  
                                        }               
                                    }else{
                                        echo "<span class='align-middle h5'>All product summation : </span>
                                              <h5 class='float-right' style='color: #ff0000;'>Error</h5>";    
                                    }
                                    mysqli_close($conn);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 mt-2">
                        <div class="card">
                            <header class="card-header">
                                <a href="adminAbility/account.php"
                                    class="float-right btn btn-outline-primary mt1 text-uppercase">View all</a>
                                <span class="text-left card-title align-middle h3">All Account</span>
                            </header>
                            <div class="card-body">
                                <?php
                                    require('../../assets/config/config.php');
                                    mysqli_set_charset($conn, "utf8");
                                    $sql = "SELECT COUNT(*) FROM users WHERE role = 0";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $admin = $row['COUNT(*)'];

                                        if($admin == 0){
                                            echo "<span class='align-middle h5'>Administrator : </span>
                                                  <h4 class='float-right'><spane class='badge badge-danger'>$admin</spane></h4>";  
                                        }else{
                                            echo "<span class='align-middle h5'>Administrator : </span>
                                                  <h4 class='float-right'><spane class='badge badge-info'>$admin</spane></h4>";  
                                        }            
                                    }else{
                                        echo "<span class='align-middle h5'>Administrator : </span>
                                              <h5 class='float-right'>0</h5>";    
                                    }
                                    mysqli_close($conn);
                                ?>
                            </div>
                            <div class="card-body">
                                <?php
                                    require('../../assets/config/config.php');
                                    mysqli_set_charset($conn, "utf8");
                                    $sql = "SELECT COUNT(*) FROM users WHERE role = 1";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $users = $row['COUNT(*)'];

                                        if($users == 0){
                                            echo "<span class='align-middle h5'>Users : </span>
                                                  <h4 class='float-right'><spane class='badge badge-danger'>$users</spane></h4>";  
                                        }else{
                                            echo "<span class='align-middle h5'>Users : </span>
                                                  <h4 class='float-right'><spane class='badge badge-primary'>$users</spane></h4>";  
                                        }          
                                    }else{
                                        echo "<span class='align-middle h5'>users : </span>
                                              <h5 class='float-right'>0</h5>";    
                                    }
                                    mysqli_close($conn);
                                ?>
                            </div>
                            <div class="card-body">
                                <?php
                                    require('../../assets/config/config.php');
                                    mysqli_set_charset($conn, "utf8");
                                    $sql = "SELECT COUNT(gender) FROM `users` WHERE gender = 'male'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $male = $row['COUNT(gender)'];

                                        if($male == 0){
                                            echo "<span class='align-middle h5'>Male : </span>
                                                  <h4 class='float-right'><spane class='badge badge-danger'>$male</spane></h4>";  
                                        }else{
                                            echo "<span class='align-middle h5'>Male : </span>
                                                  <h4 class='float-right'><spane class='badge badge-primary'>$male</spane></h4>";  
                                        }             
                                    }else{
                                        echo "<span class='align-middle h5'>users : </span>
                                              <h5 class='float-right'>0</h5>";    
                                    }
                                    mysqli_close($conn);
                                ?>
                            </div>
                            <div class="card-body">
                                <?php
                                    require('../../assets/config/config.php');
                                    mysqli_set_charset($conn, "utf8");
                                    $sql = "SELECT COUNT(gender) FROM `users` WHERE gender = 'female'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $female = $row['COUNT(gender)'];

                                        if($female == 0){
                                            echo "<span class='align-middle h5'>Female : </span>
                                                  <h4 class='float-right'><spane class='badge badge-danger'>$female</spane></h4>";  
                                        }else{
                                            echo "<span class='align-middle h5'>Female : </span>
                                                  <h4 class='float-right'><spane class='badge badge-primary'>$female</spane></h4>";  
                                        }                
                                    }else{
                                        echo "<span class='align-middle h5'>users : </span>
                                              <h5 class='float-right'>0</h5>";    
                                    }
                                    mysqli_close($conn);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- Menu Toggle Script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://use.fontawesome.com/4283dcca0d.js"></script>
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