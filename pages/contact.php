<?php
    session_start();
?>
<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Contact us</title>
</head>

<body>
    <!-- NAV SECTION -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark z-index">
        <a class="navbar-brand" href="index.php">Mungmee Headphone</a>
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
                    <a class="nav-link text-uppercase" href="product.php">Product</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-uppercase" href="contact.php">Contact us <span
                            class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form action="../querys/search.php" method="POST" class="form-inline my-lg-0 mr-2">
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
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12 col-md-7 col-lg-7">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1RAUjWP2EColOJfTfiLcY_mx7u0EWeHMi"
                    title="My address" width="100%" height="650px" frameborder="0" style="border:0"
                    allowfullscreen></iframe>
            </div>
            <div class="col-12 col-md-5 col-lg-5">
                <div class="container-fluid">
                    <form action="mailer.php" method="POST">
                        <div class="form-row">
                            <h2 class="text-uppercase font-weight-bold">Contact us</h2>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col form-group">
                                <label>First name </label>
                                <input type="text" class="form-control" name="fname" placeholder="">
                            </div>
                            <div class="col form-group">
                                <label>Last name</label>
                                <input type="text" class="form-control" name="lname" placeholder=" ">
                            </div>
                        </div>
                        <div class="form-row form-group" style="padding-left: 5px; padding-right: 5px">
                            <label>Telephone number</label>
                            <input type="text" class="form-control" name="phone" placeholder=" ">
                        </div>
                        <div class="form-row form-group" style="padding-left: 5px; padding-right: 5px">
                            <label>E-mail</label>
                            <input type="text" class="form-control" name="email" placeholder=" ">
                        </div>
                        <div class="form-row form-group" style="padding-left: 5px; padding-right: 5px">
                            <label>Message</label>
                            <textarea class="form-control" name="message" aria-label="With textarea"
                                style="height: 15rem;"></textarea>
                        </div>
                        <div class="form-row form-group" style="padding-left: 5px; padding-right: 5px">
                            <button class="btn btn-primary text-uppercase" name="contact" type="submit">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; Mungmee Headphone</small>
            <small class="ml-2"><?php echo date("d-m-Y H:i:s");?></small>
        </div>
    </footer>
</body>

</html>