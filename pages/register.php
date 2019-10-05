<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Register</title>
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
                    <a class="nav-link text-uppercase" href="product.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="contact.php">Contact us</a>
                </li>
            </ul>
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
    <div class="login-form mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="card-header text-uppercase">
                            <form action="login.php" method="POST">
                                <button class="float-right btn btn-outline-primary mt1 text-uppercase">login</button>
                            </form>
                            <h4 class="card-title mt-2 text-uppercase">Sign up</h4>
                        </div>
                        <article class="card-body">
                            <form action="validation.php" method="POST">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for='fname'>First name </label>
                                        <input type="text" class="form-control" id="fname" name="firstname" onkeyup='saveValue(this);' required>
                                    </div>
                                    <div class="col form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" id="lname" name="lastname" onkeyup='saveValue(this);' required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="text" class="form-control" id="phone" name="phone" onkeyup='saveValue(this);' required>
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" onkeyup='saveValue(this);' required>
                                    <small class="form-text text-muted">We'll never share your email with anyone
                                        else.</small>
                                </div>
                                <div class="form-group">
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="male" required>
                                        <span class="form-check-label"> Male </span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="female" required>
                                        <span class="form-check-label"> Female</span>
                                    </label>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>City</label>
                                        <input type="text" id="city" name="city" class="form-control" onkeyup='saveValue(this);' required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Country</label>
                                        <select id='inputState' name='country'
                                            class='form-control selectpicker'
                                            title='Choose country'required data-live-search='true'
                                            data-style="border-info">
                                            <option>United Kingdom</option>
                                            <option>Russia</option>
                                            <option>United States</option>
                                            <option>German</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-12 col-lg-12">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" id="address"
                                            rows="3" onkeyup='saveValue(this);' required></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Password </label>
                                        <input type="password" id="password" name="password" class="form-control" onkeyup='saveValue(this);' required>
                                    </div>
                                    <div class="col form-group">
                                        <label>Repeat Password</label>
                                        <input type="password" id="repassword" name="repassword"class="form-control" onkeyup='saveValue(this);' required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="check" class="btn btn-primary btn-block"> Register </button>
                                </div>
                                <small class="text-muted">By clicking the 'Register' button, you confirm that you accept
                                    our <br> Terms of use and Privacy Policy.
                                </small>
                            </form>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="../assets/js/bootstrap-select.js"></script>
    <script>
    $( document ).ready(function(){
        $('.selectpicker').selectpicker();
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
            $('.selectpicker').selectpicker('mobile');
        }
    });
    </script>
    <script type="text/javascript">
        document.getElementById("fname").value = getSavedValue("fname");  
        document.getElementById("lname").value = getSavedValue("lname"); 
        document.getElementById("phone").value = getSavedValue("phone");
        document.getElementById("email").value = getSavedValue("email");
        document.getElementById("city").value = getSavedValue("city");
        document.getElementById("address").value = getSavedValue("address");
        
        $(function() {
            $('#inputState').change(function() {
                localStorage.setItem('inputState', this.value);
            });
            if(localStorage.getItem('inputState')){
                $('.selectpicker').selectpicker('val',localStorage.getItem('inputState'));
            }
        });

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 

            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)){
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }
    </script>

    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; Mungmee Headphone</small>
            <small class="ml-2"><?php echo date("d-m-Y H:i:s");?></small>
        </div>
    </footer>
</body>

</html>