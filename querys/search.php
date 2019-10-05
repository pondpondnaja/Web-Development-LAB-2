<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Search Result</title>
</head>

<body>
    <!-- NAV SECTION -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Mungmee Headphone</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="../pages/product.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="../pages/contact.php">Contact us</a>
                </li>
            </ul>
            <form action="search.php" method="POST" class="form-inline my-lg-0 mr-2">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                    name="keyword">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
            </form>
            <?php
                if(!empty($_SESSION['user_login']) and $_SESSION['status'] == 'Admin'){
                    $user_name = $_SESSION['user'];
                    $user_name_de = $_SESSION['user_login'];
                    $user_id =$_SESSION['user_id'];
                    $user_item = $_SESSION['user_item'];

                    echo "<form action='../pages/adminPages/index_admin.php' class='form-inline my-lg-0 mr-2'>
                            <button class='btn btn-success my-2 my-sm-0 text-uppercase' type='submit'>
                                <i class='fa fa-home pr-2' aria-hidden='true'></i>Go to Admin Page</button>
                        </form>
                        <form class='form-inline my-lg-0 mr-2'>
                            <a href='../pages/cartinfo.php?id=$user_id' class='btn btn-outline-primary my-2 my-sm-0 text-uppercase'>
                                <spane class='h5'>
                                    <i class='fa fa-shopping-cart pr-2' aria-hidden='true'></i>
                                    <span class='badge badge-success'>$user_item</span>
                                </spane>
                            </a>
                        </form>
                        <form class='form-inline my-lg-0 mr-2'>
                            <a href='../pages/accountdetail.php?user=$user_name' class='btn btn-primary my-2 my-sm-0 text-uppercase'>$user_name_de</a>
                        </form>";
                }else if(!empty($_SESSION['user_login'])){
                    $user_name = $_SESSION['user'];
                    $user_name_de = $_SESSION['user_login'];
                    echo "<form class='form-inline my-lg-0 mr-2'>
                            <a href='../pages/accountdetail.php?user=$user_name' class='btn btn-primary my-2 my-sm-0 text-uppercase'>$user_name_de</a>
                        </form>";
                }else{
                    echo "<form action='../pages/accountdetail.php' class='form-inline my-lg-0 mr-2'>
                            <button class='btn btn-outline-primary my-2 my-sm-0 text-uppercase' type='submit'>Account</button>
                        </form>
                        <form action='../pages/register.php' class='form-inline my-lg-0'>
                            <button class='btn btn-outline-primary my-2 my-sm-0 text-uppercase' type='submit'>Register</button>
                        </form>";
                }
            ?>
        </div>
    </nav>
    <!-- END NAV SECTION -->
    <div class="col-12">
        <div class="container">
            <div class="row">
                <?php
                    require('../assets/config/config.php');
                    if (isset($_POST['search'])){
                        $search_keyword = $_POST['keyword'];
                        mysqli_set_charset($conn, "utf8");
                        $sql = "SELECT `id`,`header`,`sub_header`,`img`,`nomal_price`,`new_price`,LOCATE('$search_keyword',header) 
                                FROM `product`
                                WHERE LOCATE('$search_keyword',header)>0
                                ORDER BY product_type ASC";
                        $result = mysqli_query($conn, $sql);
                        $textmore = 'More info';
                        $checkprice = "";
                        $img_path = "../assets/uploads/";
                        //echo $search_keyword;
                        if (mysqli_num_rows($result) > 0) {
                            $num_rows = mysqli_num_rows($result);
                            echo "<div class='col-12 col-md-12 col-lg-12 mt-4 mb-3'>
                                    <h4 class='text-uppercase font-weight-bold text-center'>
                                        We have  
                                        <spane class='badge badge-success mx-2 align-middle'>$num_rows</spane>  
                                        result for your keyword '$search_keyword'
                                    </h4>
                                  </div>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id         = $row['id'];
                                $header     = $row['header'];
                                $sub_header = $row['sub_header'];
                                $img        = $row['img'];
                                $nomal      = $row['nomal_price'];
                                $new        = $row['new_price'];
                                
                                if($new == null){
                                    $checkprice = "<div class='card-body border-top text-center'>
                                                        <span class='h6'>
                                                            Price : ".number_format($nomal)."
                                                        </span>
                                                    </div>";
                                }else{
                                    $checkprice = "<div class='card-body border-top'>
                                                        <div class='align-middle my-auto'>
                                                            <span class='float-left h6'>
                                                                <del class='price-old'>
                                                                    Price : ".   number_format($nomal)."
                                                                </del>
                                                            </span>
                                                            <span class='float-right h6' style='color: #fc0303;'>
                                                                Price : ".number_format($new)."
                                                            </span>
                                                        </div>
                                                    </div>";
                                }

                                echo "<div class='col-12 col-md-6 col-lg-3 mb-3 d-flex justify-content-center'>
                                        <form action='addtocart.php?id=$id' method='POST'>
                                            <div class='card h-100'>
                                            <img class='card-img-top img-fluid' src = '$img_path$img' alt = '$header' style = 'height: 17rem;'/>
                                            <div class='card-body' style='height: 7rem;'>
                                                <div class='text-center'>
                                                    <a class ='text-uppercase font-weight-bold' href='../pages/productinfo.php?id=$id'>$textmore</a>
                                                </div>
                                                <h5 class='card-title text-center'>$header</h5>
                                            </div>
                                            <div class='card-body' style='height: 5rem;'>
                                                <p class='card-text text-center'>$sub_header</p>
                                            </div>
                                            $checkprice
                                            <div class='card-body border-top border-success'>
                                                <button name='addtocart' class='btn btn-success text-uppercase form-control'>
                                                    <i class='fa fa-cart-arrow-down pr-2' aria-hidden='true'></i>Order
                                                </button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>";
                            }
                        }else{
                            echo "<div class='text-center'>
                                    <a href='../pages/product.php'>We didn't have result for $search_keyword</a>
                                  </div>";
                        }
                    }
                    mysqli_close($conn);
                    ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
    <script src="https://use.fontawesome.com/4283dcca0d.js"></script>
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; Mungmee Headphone</small>
            <small class="ml-2"><?php echo date("d-m-Y H:i:s"); ?></small>
        </div>
    </footer>
</body>

</html>