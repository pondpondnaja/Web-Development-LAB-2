 
<?php
    session_start();
?>
<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Validation</title>
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
            <form action="querys/search.php" method="POST" class="form-inline my-lg-0 mr-2">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                    name="keyword">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
            </form>
            <?php
                if(!empty($_SESSION['user_login']) and $_SESSION['status'] == 'Admin'){
                    $user_name = $_SESSION['user'];
                    $user_name_de = $_SESSION['user_login'];
                    echo "<form action='adminPages/index_admin.php' class='form-inline my-lg-0 mr-2'>
                            <button class='btn btn-success my-2 my-sm-0 text-uppercase' type='submit'>
                                <i class='fa fa-home pr-2' aria-hidden='true'></i>Go to Admin Page</button>
                        </form>
                        <form class='form-inline my-lg-0 mr-2'>
                            <a href='accountdetail.php?user=$user_name' class='btn btn-primary my-2 my-sm-0 text-uppercase'>$user_name_de</a>
                        </form>";
                }else if(!empty($_SESSION['user_login'])){
                    $user_name = $_SESSION['user'];
                    $user_name_de = $_SESSION['user_login'];
                    echo "<form class='form-inline my-lg-0 mr-2'>
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
    <?php
        require('../assets/config/config.php');
        mysqli_set_charset($conn, "utf8");
        if ($conn->connect_error) {
            die("Connect error: " . $conn->connect_error);
        }
        if (isset($_POST['check'])) {
            $fname          = $_POST['firstname'];
            $lname          = $_POST['lastname'];
            $email          = $_POST['email'];
            $phone          = $_POST['phone'];
            $gender         = $_POST['gender'];
            $city           = $_POST['city'];
            $country        = $_POST['country'];
            $address        = $_POST['address'];
            $password       = $_POST['password'];
            $repassword     = $_POST['repassword'];

            $sql = "SELECT `email` FROM `users` WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<div class='alert mt-5 mb-5'>
                        <a href='register.php' class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</a>
                        <div class='text-center mt-5'>
                            <span>
                                This email '$email' is already exist please user another one.
                                <a class='text-warning'><i class='fa fa-exclamation-triangle pl-2' aria-hidden='true'></i></a>
                            </span>
                        </div>
                        <div class='text-center mt-3'>
                            <a href='register.php' class='btn btn-warning text-uppercase'>Go back to edit</a>
                        </div>
                     </div>";
            } else if($password != $repassword){
                echo "<div class='alert mt-5 mb-5'>
                        <a href='register.php' class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</a>
                        <div class='text-center mt-5'>
                            <span>
                                Password didn't match, please enter password again.
                                <a class='text-warning'><i class='fa fa-exclamation-triangle pl-2' aria-hidden='true'></i></a>
                            </span>
                        </div>
                        <div class='text-center mt-3'>
                            <a href='register.php' class='btn btn-warning text-uppercase'>Go back to edit</a>
                        </div>
                     </div>";
            }else{
                $gendercheck = "";
                if($gender == 'male'){
                    $gendercheck = "<label class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='gender' value='$gender' checked required>
                                <span class='form-check-label'> Male</span>
                              </label>";
                }else{
                    $gendercheck = "<label class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='gender' value='$gender' checked required>
                                <span class='form-check-label'> Female</span>
                              </label>";
                }
                echo "
                <div class='login-form mt-5 mb-5'>
                <div class='container'>
                    <div class='row justify-content-center'>
                        <div class='col-12 col-md-8 col-lg-8'>
                            <div class='card'>
                                <div class='card-header text-uppercase'>
                                    <form action='register.php' method='POST'>
                                        <button class='float-left btn btn-outline-primary mt1 text-uppercase'>Edit</button>
                                    </form>
                                    <h4 class='card-title mt-2 text-center text-uppercase'>Confirm your infomation</h4>
                                </div>
                                <article class='card-body'>
                                    <form action='../querys/registerconnect.php' method='POST'>
                                        <div class='form-row'>
                                            <div class='col form-group'>
                                                <label for='fname'>First name </label>
                                                <input type='text' class='form-control' id='fname' name='firstname' readonly required value='$fname'>
                                            </div>
                                            <div class='col form-group'>
                                                <label>Last name</label>
                                                <input type='text' class='form-control' id='lname' name='lastname' readonly required value='$lname'>
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <label>Phone number</label>
                                            <input type='text' class='form-control' id='phone' name='phone' readonly required value='$phone'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Email address</label>
                                            <input type='email' class='form-control' id='email' name='email' readonly required value='$email'>
                                            <small class='form-text text-muted'>We'll never share your email with anyone
                                                else.</small>
                                        </div>
                                        <div class='form-group'>
                                            $gendercheck
                                        </div>
                                        <div class='form-row'>
                                            <div class='form-group col-md-6'>
                                                <label>City</label>
                                                <input type='text' id='city' name='city' class='form-control' readonly required value='$city'>
                                            </div>
                                            <div class='form-group col-md-6'>
                                                <label>Country</label>
                                                <select id='inputState' name='country' class='form-control' readonly required value='$country'>
                                                    <option selected='true'>$country</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class='form-row'>
                                            <div class='form-group col-12 col-md-12 col-lg-12'>
                                                <label>Address</label>
                                                <textarea class='form-control' name='address' id='address'
                                                    rows='3' readonly required value='$address'>$address</textarea>
                                            </div>
                                        </div>
                                        <div class='form-row'>
                                            <div class='col form-group'>
                                                <label>Password </label>
                                                <input type='password' id='password' name='password' class='form-control' readonly required value='$password'>
                                            </div>
                                            <div class='col form-group'>
                                                <label>Repeat Password</label>
                                                <input type='password' id='repassword' name='repassword'class='form-control' readonly required value='$repassword'>
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <button type='submit' name='create' class='btn btn-success btn-block'> Register </button>
                                        </div>
                                        <small class='text-muted'>By clicking the 'Register' button, you confirm that you accept
                                            our <br> Terms of use and Privacy Policy.
                                        </small>
                                    </form>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            }
        }
        if(isset($_POST['user_edit'])){
            $fname          = $_POST['firstname'];
            $lname          = $_POST['lastname'];
            $email          = $_POST['email'];
            $phone          = $_POST['phone'];
            $gender         = $_POST['gender'];
            $city           = $_POST['city'];
            $country        = $_POST['country'];
            $address        = $_POST['address'];
            $check_pass     = hash('sha512',$_POST['savepass']);

            $user_real_email = $_REQUEST['user'];
            $user_id = $_REQUEST['id'];

            $sql = "SELECT `id`,`email` FROM `users` WHERE email = '$email'";
            $sql_check_pass = "SELECT `user_password` FROM `users` WHERE email = '$user_real_email' AND user_password = '$check_pass'";

            $result = mysqli_query($conn, $sql);
            $pass_result = mysqli_query($conn,$sql_check_pass);

            $row1 = mysqli_num_rows($pass_result);
            $row = mysqli_fetch_assoc($result);
            
            $email_data = $row['email'];
            $id_data = $row['id'];

            if(strcmp($email_data,$email) == 0 and strcmp($id_data,$user_id) != 0){
                echo "<div class='alert mt-5 mb-5'>
                        <a href='accountdetail.php?user=$user_real_email' class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</a>
                        <div class='text-center mt-5'>
                            <span>
                                This email '$email' is already used please enter another one.
                                <a class='text-warning'><i class='fa fa-exclamation-triangle pl-2' aria-hidden='true'></i></a>
                            </span>
                        </div>
                        <div class='text-center mt-3'>
                            <a href='accountdetail.php?user=$user_real_email' class='btn btn-warning text-uppercase'>Go back to edit</a>
                        </div>
                     </div>";
            }else if(mysqli_num_rows($pass_result) == 0){
                echo "<div class='alert mt-5 mb-5'>
                        <a href='accountdetail.php?user=$user_real_email' class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</a>
                        <div class='text-center mt-5'>
                            <span>
                                Password didn't match, please enter password again.
                                <a class='text-warning'><i class='fa fa-exclamation-triangle pl-2' aria-hidden='true'></i></a>
                            </span>
                        </div>
                        <div class='text-center mt-3'>
                            <a href='accountdetail.php?user=$user_real_email' class='btn btn-warning text-uppercase'>Go back to edit</a>
                        </div>
                     </div>";
            }else{
                $gendercheck = "";
                if($gender == 'male'){
                    $gendercheck = "<label class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='gender' value='$gender' checked required>
                                <span class='form-check-label'> Male</span>
                              </label>";
                }else{
                    $gendercheck = "<label class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='gender' value='$gender' checked required>
                                <span class='form-check-label'> Female</span>
                              </label>";
                }
                echo "
                <div class='login-form mt-5 mb-5'>
                <div class='container'>
                    <div class='row justify-content-center'>
                        <div class='col-12 col-md-8 col-lg-8'>
                            <div class='card'>
                                <div class='card-header text-uppercase'>
                                    <form action='accountdetail.php?user=$user_real_email' method='POST'>
                                        <button class='float-left btn btn-outline-primary mt1 text-uppercase'>Edit</button>
                                    </form>
                                    <h4 class='card-title mt-2 text-center text-uppercase'>Confirm your infomation</h4>
                                </div>
                                <article class='card-body'>
                                    <form action='../querys/updateaccount.php?id=$user_id' method='POST'>
                                        <div class='form-row'>
                                            <div class='col form-group'>
                                                <label for='fname'>First name </label>
                                                <input type='text' class='form-control' id='fname' name='firstname' readonly required value='$fname'>
                                            </div>
                                            <div class='col form-group'>
                                                <label>Last name</label>
                                                <input type='text' class='form-control' id='lname' name='lastname' readonly required value='$lname'>
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <label>Phone number</label>
                                            <input type='text' class='form-control' id='phone' name='phone' readonly required value='$phone'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Email address</label>
                                            <input type='email' class='form-control' id='email' name='email' readonly required value='$email'>
                                            <small class='form-text text-muted'>We'll never share your email with anyone
                                                else.</small>
                                        </div>
                                        <div class='form-group'>
                                            $gendercheck
                                        </div>
                                        <div class='form-row'>
                                            <div class='form-group col-md-6'>
                                                <label>City</label>
                                                <input type='text' id='city' name='city' class='form-control' readonly required value='$city'>
                                            </div>
                                            <div class='form-group col-md-6'>
                                                <label>Country</label>
                                                <select id='inputState' name='country' class='form-control' readonly required value='$country'>
                                                    <option selected='true'>$country</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class='form-row'>
                                            <div class='form-group col-12 col-md-12 col-lg-12'>
                                                <label>Address</label>
                                                <textarea class='form-control' name='address' id='address'
                                                    rows='3' readonly required value='$address'>$address</textarea>
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <button type='submit' name='update' class='btn btn-success btn-block'>Submit</button>
                                        </div>
                                        <small class='text-muted'>Please make sure before click the 'Submit' button.</small>
                                    </form>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            }
        }
        ?>
    </div>
    <script src="https://use.fontawesome.com/4283dcca0d.js"></script>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'
        integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'>
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'
        integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'>
    </script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'
        integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'>
    </script>
    <footer id='sticky-footer' class='py-4 bg-dark text-white-50'>
        <div class='container text-center'>
            <small>Copyright &copy; Mungmee Headphone</small>
            <small class='ml-2'><?php echo date('d-m-Y H:i:s'); ?></small>
        </div>
    </footer>
</body>

</html>