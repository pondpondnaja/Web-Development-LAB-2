<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/v4-shims.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Redireacting...</title>
</head>

<body>
    <?php
        session_start();
        require ('../assets/config/config.php');
        mysqli_set_charset($conn,"utf8");
        if(isset($_POST['login'])){
            $user = $_POST['user'];
            $pass = hash('sha512',$_POST['pass']);

            if($user != "" and $pass != ""){
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT users.id,users.firstname,users.user_password,users.gender,users.role,
                            (SELECT SUM(user_cart.quantity) FROM user_cart WHERE user_cart.user_id = users.id) AS Totalquantity
                        FROM `users`
                        WHERE email = '$user'";

                $result = mysqli_query($conn, $sql);
                if(!$result){
                    die("Could not login ! <a href='../pages/login.php'>Login again</a>");
                }
                $row = mysqli_fetch_array($result);
                if($pass == $row['user_password'] and $row['role'] == '1'){
                    $_SESSION['user'] = $user;
                    $_SESSION['user_login'] = $row['firstname'];
                    $_SESSION['status'] = 'User';
                    $_SESSION['user_id'] = $row['id']; 
                    $_SESSION['user_item'] = $row['Totalquantity'];
                    $_SESSION['gender'] = $row['gender'];

                    $username = $_SESSION['user_login'];

                    echo "<div class='col-12 col-md-12 col-lg-12 d-flex justify-content-center my-5'>
                            <div class='card border-success'>
                                <div class='card-header border-success text-center bg-success'>
                                    <h5 class='card-title my-auto font-weight-bold'>
                                        <i class='fa fa-sign-in pr-2'  aria-hidden='true'></i>Welcome back $username
                                    </h5>
                                </div>
                                <div class='card-body'>
                                    <h5 class='card-text text-center'>We'll redirect you to Home page in 5 second</h5>
                                    <h5 class='card-text text-center'>if you're still in this page please click button down here.</h5>
                                    <h5 class='card-text text-center text-success'><i class='fa fa-arrow-down' aria-hidden='true'></i></h5>
                                </div>
                                <div class='card-body border-top text-center'>
                                    <a class='btn btn-outline-success' href='../index.php'>
                                        <i class='fa fa-home pr-2' aria-hidden='true'></i>Home page
                                    </a>
                                </div>
                            </div>
                        </div>";
                    header("refresh: 5; url = ../index.php");
                    exit;
                }else if($pass == $row['user_password'] and $row['role'] == '0'){
                    $_SESSION['user'] = $user;
                    $_SESSION['user_login'] = $row['firstname'];
                    $_SESSION['status'] = 'Admin';
                    $_SESSION['user_id'] = $row['id']; 
                    $_SESSION['user_item'] = $row['Totalquantity'];
                    $_SESSION['gender'] = $row['gender'];

                    $adminname = $_SESSION['user_login'];
                    echo "<div class='col-12 col-md-12 col-lg-12 d-flex justify-content-center my-5'>
                            <div class='card border-success'>
                                <div class='card-header border-success text-center bg-success'>
                                    <h5 class='card-title my-auto font-weight-bold'>
                                    <i class='fas fa-sign-in-alt pr-2'></i>Welcome back Admin $adminname
                                    </h5>
                                </div>
                                <div class='card-body'>
                                    <h5 class='card-text text-center'>We'll redirect you to Administrator page in 5 second</h5>
                                    <h5 class='card-text text-center'>if you're still in this page please click button down here.</h5>
                                    <h5 class='card-text text-center'><i class='fas fa-cog fa-spin'></i></h5>
                                    <h5 class='card-text text-center text-success'><i class='fa fa-arrow-down' aria-hidden='true'></i></h5>
                                </div>
                                <div class='card-body border-top text-center'>
                                    <a class='btn btn-outline-success' href='../pages/adminPages/index_admin.php'>
                                        <i class='fa fa-home pr-2' aria-hidden='true'></i>Administrator page
                                    </a>
                                </div>
                            </div>
                        </div>";
                    header("refresh: 5; url = ../pages/adminPages/index_admin.php");
                }else{
                    echo "<div class='alert mt-5 mb-5'>
                        <a href='../pages/login.php' class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</a>
                        <div class='text-center mt-5'>
                            <span>
                                Username or Password didn't match, please enter username and password again.
                                <a class='text-warning'><i class='fa fa-exclamation-triangle pl-2' aria-hidden='true'></i></a>
                            </span>
                        </div>
                        <div class='text-center mt-3'>
                            <a href='../pages/login.php' class='btn btn-warning text-uppercase'>
                                <i class='fa fa-arrow-left pr-2' aria-hidden='true'></i>Go to login page
                            </a>
                        </div>
                     </div>";
                }
            }
        }
    ?>
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
</body>

</html>