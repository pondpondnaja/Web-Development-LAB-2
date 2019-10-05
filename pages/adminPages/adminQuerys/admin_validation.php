<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../../assets/css/sidebar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Validation</title>
</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="../index_admin.php">Administrator</a>
                </li>
                <li>
                    <a class="active text-uppercase" href="../index_admin.php"><i class="fa fa-tachometer pr-2"
                            aria-hidden="true"></i> Dashboard</a>
                </li>
                <li>
                    <a class="text-uppercase" href="../adminAbility/account.php"><i class="fa fa-address-book-o pr-2"
                            aria-hidden="true"></i> Account</a>
                </li>
                <li>
                    <a class="text-uppercase" href="../adminAbility/product.php"><i class="fa fa-shopping-cart pr-2"
                            aria-hidden="true"></i> Product</a>
                </li>
                <li>
                    <a class="text-uppercase text-danger" href="../../querys/logoff_process.php"><i
                            class="fa fa-sign-out pr-2" aria-hidden="true"></i> log off</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Confirm Account</h1>
                        <a href="#menu-toggle" class="btn btn-danger mb-3" id="menu-toggle">Close menu</a>
                    </div>
                </div>
                <div class="row">
                    <?php
                        $id = $_REQUEST['id'];
                        if(isset($_POST['admin_check'])){
                            $fname      = $_POST['firstname'];
                            $lname      = $_POST['lastname'];
                            $email      = $_POST['email'];
                            $phone      = $_POST['phone'];
                            $gender     = $_POST['gender'];
                            $city       = $_POST['city'];
                            $country    = $_POST['country'];
                            $address    = $_POST['address'];
                        
                            echo "<div class='col-12 col-md-12 col-lg-12'>
                                    <div class='login-form mt-5 mb-5'>
                                        <div class='container'>
                                            <div class='row justify-content-center'>
                                                <div class='col-12 col-md-10 col-lg-10'>
                                                    <div class='card'>
                                                        <div class='card-header text-uppercase'>
                                                            <form action='editaccount.php?id=$id' method='POST'>
                                                                <button
                                                                    class='float-left btn btn-outline-success mt1 text-uppercase'>Back</button>
                                                            </form>
                                                            <h4 class='card-title mt-2 text-center text-uppercase'>Confirm Account</h4>
                                                        </div>
                                                        <article class='card-body'>
                                                            <form action='registerconnect.php?id=$id' method='POST'>
                                                                <div class='form-row'>
                                                                    <div class='col form-group'>
                                                                        <label for='fname'>First name </label>
                                                                        <input value='$fname' type='text' class='form-control' id='fname' name='firstname' readonly required>
                                                                    </div>
                                                                    <div class='col form-group'>
                                                                        <label>Last name</label>
                                                                        <input value='$lname' type='text' class='form-control' id='lname' name='lastname' readonly required>
                                                                    </div>
                                                                </div>
                                                                <div class='form-group'>
                                                                    <label>Phone number</label>
                                                                    <input value='$phone' type='text' class='form-control' id='phone' name='phone' readonly required>
                                                                </div>
                                                                <div class='form-group'>
                                                                    <label>Email address</label>
                                                                    <input value='$email' type='email' class='form-control' id='email' name='email' readonly required>
                                                                    <small class='form-text text-muted'>We'll never share your email with anyone else.</small>
                                                                </div>
                                                                <div class='form-group' readonly>
                                                                    <label class='form-check form-check-inline'>
                                                                        <input class='form-check-input' type='radio' name='gender' value='$gender' checked readonly>
                                                                        <span class='form-check-label'>$gender</span>
                                                                    </label>
                                                                </div>
                                                                <div class='form-row'>
                                                                    <div class='form-group col-md-6'>
                                                                        <label>City</label>
                                                                        <input value='$city' type='text' id='city' name='city' class='form-control' readonly required>
                                                                    </div>
                                                                <div class='form-group col-md-6'>
                                                                    <label>Country</label>
                                                                        <select id='inputState' name='country' class='form-control' readonly required>
                                                                            <option selected='true'>$country</option>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class='form-row'>
                                                                <div class='form-group col-12 col-md-12 col-lg-12'>
                                                                    <label>Address</label>
                                                                    <textarea class='form-control' name='address' id='address'
                                                                        rows='3' readonly required>$address</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='form-group mt-2'>
                                                            <button type='submit' name='admin_submit' class='btn btn-block btn-success'> 
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