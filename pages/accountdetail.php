<?php
    session_start();
    if(empty($_SESSION['user_login'])){
        header("Location: login.php");
        exit;
    }
?>
<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <?php
        $user_name_de = $_SESSION['user_login'];
        echo "<title>$user_name_de profile</title>";
    ?>
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
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="product.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="contact.php">Contact us</a>
                </li>
            </ul>
            <form action="../querys/search.php" method="POST" class="form-inline my-lg-0 mr-2">
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
            <div class="row mt-4">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="container-fluid">
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
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="row">
                        <?php
                        require('../assets/config/config.php');
                        mysqli_set_charset($conn, 'utf8');
                        $user = $_REQUEST['user'];
                        $gender_check = "";
                        $sql = "SELECT * FROM `users` WHERE `email` = '$user'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            $row        = mysqli_fetch_array($result);
                            $id         = $row['id'];
                            $fname      = $row['firstname'];
                            $lname      = $row['lastname'];
                            $email      = $row['email'];
                            $phone      = $row['phonenumber'];
                            $gender     = $row['gender'];
                            $city       = $row['city'];
                            $country    = $row['country'];
                            $address    = $row['user_address'];
            
                            if($gender == "male"){
                                $gender_check = "<label class='form-check form-check-inline'>
                                                    <input class='form-check-input' type='radio' name='gender' value='male' required checked>
                                                    <span class='form-check-label'> Male </span>
                                                </label>
                                                <label class='form-check form-check-inline'>
                                                    <input class='form-check-input' type='radio' name='gender' value='female' required>
                                                    <span class='form-check-label'> Female</span>
                                                </label>";
                            }else{
                                $gender_check = "<label class='form-check form-check-inline'>
                                                    <input class='form-check-input' type='radio' name='gender' value='male' required>
                                                    <span class='form-check-label'> Male </span>
                                                </label>
                                                <label class='form-check form-check-inline'>
                                                    <input class='form-check-input' type='radio' name='gender' value='female' required checked>
                                                    <span class='form-check-label'> Female</span>
                                                </label>";
                            }

                            echo "<div class='col-12 col-md-12 col-lg-12'>
                                    <div class='login-form'>
                                        <div class='container-fluid'>
                                            <div class='row justify-content-center'>
                                                <div class='col-12 col-md-12 col-lg-12'>
                                                    <div class='card'>
                                                        <div class='card-header text-uppercase'>
                                                            <h4 class='card-title mt-2 text-center text-uppercase'>Edit Account</h4>
                                                        </div>
                                                        <article class='card-body'>
                                                            <form action='validation.php?user=$user&id=$id' method='POST'>
                                                                <div class='form-row'>
                                                                    <div class='col form-group'>
                                                                        <label for='fname'>First name </label>
                                                                        <input value='$fname' type='text' class='form-control' id='fname' name='firstname' onkeyup='saveValue(this);'required>
                                                                    </div>
                                                                    <div class='col form-group'>
                                                                        <label>Last name</label>
                                                                        <input value='$lname' type='text' class='form-control' id='lname' name='lastname' onkeyup='saveValue(this);' required>
                                                                    </div>
                                                                </div>
                                                                <div class='form-group'>
                                                                    <label>Phone number</label>
                                                                    <input value='$phone' type='text' class='form-control' id='phone' name='phone' onkeyup='saveValue(this);' required>
                                                                </div>
                                                                <div class='form-group'>
                                                                    <label>Email address</label>
                                                                    <input value='$email' type='email' class='form-control' id='email' name='email' onkeyup='saveValue(this);' required>
                                                                    <small class='form-text text-muted'>We'll never share your email with anyone else.</small>
                                                                </div>
                                                                <div class='form-group'>
                                                                    $gender_check   
                                                                </div>
                                                                <div class='form-row'>
                                                                    <div class='form-group col-md-6'>
                                                                        <label>City</label>
                                                                        <input value='$city' type='text' id='city' name='city' class='form-control' onkeyup='saveValue(this);' required>
                                                                    </div>
                                                                <div class='form-group col-md-6'>
                                                                    <label>Country</label>
                                                                        <select id='inputState' name='country'
                                                                            class='form-control selectpicker border-dark'
                                                                            title='Product Type'required vaule='$country' 
                                                                            data-style='border-info'
                                                                            data-live-search='true'>
                                                                            <option id='United Kingdom'>United Kingdom</option>
                                                                            <option id='Russia'>Russia</option>
                                                                            <option id='United States'>United States</option>
                                                                            <option id='German'>German</option>
                                                                            <option id='Thailand'>Thailand</option>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class='form-row'>
                                                                <div class='form-group col-12 col-md-12 col-lg-12'>
                                                                    <label>Address</label>
                                                                    <textarea class='form-control' name='address' id='address'
                                                                        rows='3' onkeyup='saveValue(this);' required>$address</textarea>
                                                                </div>
                                                            </div>
                                                            <div class='form-row'>
                                                                <div class='form-group col-12 col-md-12 col-lg-12 text-center'>
                                                                    <label class='font-weight-bold'>Enter the password to save edit</label>
                                                                    <input type='password' class='form-control border-danger text-center' name='savepass' id='savepass' required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='form-group mt-2 mb-5'>
                                                            <button type='submit' name='user_edit' class='btn btn-primary btn-block btn-warning'> 
                                                                <i class='fa fa-hdd-o pr-2' aria-hidden='true'></i>
                                                                    Save Edit 
                                                                <i class='fa fa-hdd-o pl-2' aria-hidden='true'></i>
                                                            </button>
                                                        </div>
                                                </form>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
                    ?>
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
    <script src="../assets/js/bootstrap-select.js"></script>
    <script>
    $( document ).ready(function(){
        var country = "<?php echo $country?>";
        console.log(country);
        $('.selectpicker').selectpicker('val',country);
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
            $('.selectpicker').selectpicker('mobile');
        }
    });
    </script>
</body>

</html>