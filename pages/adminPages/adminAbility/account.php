<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../../assets/css/sidebar.css" rel="stylesheet" type="text/css">
    <title>Account</title>
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
                    <a href="../index_admin.php">Administrator</a>
                </li>
                <li>
                    <a class="text-uppercase" href="../index_admin.php"><i class="fa fa-tachometer pr-2"
                            aria-hidden="true"></i> Dashboard</a>
                </li>
                <li>
                    <a class="text-uppercase active" href="account.php"><i class="fa fa-address-book-o pr-2"
                            aria-hidden="true"></i> Account</a>
                </li>
                <li>
                    <a class="text-uppercase" href="product.php"><i class="fa fa-shopping-cart pr-2"
                            aria-hidden="true"></i> Product</a>
                </li>
                <li>
                    <a class="text-uppercase text-success" href="../../../index.php"><i class="fa fa-home pr-2"
                            aria-hidden="true"></i> View live site</a>
                </li>
                <li>
                    <a class="text-uppercase text-danger" href="../../../querys/logoff_process.php"><i
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
                        <h1>Account</h1>
                        <a href="#menu-toggle" class="btn btn-danger" id="menu-toggle">Close menu</a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form action="account.php" method="POST">
                            <div class="input-group">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                    name="keyword">
                                <div class="input-group-append">
                                    <select id="inputfilter" name="se_filter" class="form-control">
                                        <option selected="true" value="">Choose Filter...</option>
                                        <option value="firstname">Firstname</option>
                                        <option value="lastname">Lastname</option>
                                        <option value="email">Email</option>
                                        <option value="phonenumber">Phonenumber</option>
                                        <option value="user_address">address</option>
                                    </select>
                                    <button class="btn btn-outline-success" type="submit"
                                        name="admin_search">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="row">
                            <?php
                            require('../../../assets/config/config.php');
                            mysqli_set_charset($conn, "utf8");
                            if(isset($_POST['admin_search'])){
                                $se_filter          = "";
                                $search_keyword     = $_POST['keyword'];

                                if($_POST['se_filter'] == null){
                                    $se_filter = "firstname";
                                }else{
                                    $se_filter = $_POST['se_filter'];   
                                }

                                $sql = "SELECT `id`,`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `city`, `country`, `user_address`,
                                        LOCATE('$search_keyword',`$se_filter`)  
                                        FROM `users`
                                        WHERE LOCATE('$search_keyword',`$se_filter`) > 0";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0){
                                    $num_rows = mysqli_num_rows($result);
                                    echo "<div class='col-12 col-md-12 col-lg-12 mt-4 mb-3'>
                                    <h4 class='text-uppercase font-weight-bold text-center'>We have <spane class='badge badge-success mx-2 align-middle'>$num_rows</spane> result for your keyword '$search_keyword'</h4>
                                          </div>";

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id         = $row['id'];
                                        $fname      = $row['firstname'];
                                        $lname      = $row['lastname'];
                                        $email      = $row['email'];
                                        $phone      = $row['phonenumber'];
                                        $gender     = $row['gender'];
                                        $city       = $row['city'];
                                        $country    = $row['country'];
                                        $address    = $row['user_address'];

                                        echo "<div class='col-12 col-md-6 col-lg-3 mb-3 d-flex justify-content-center'>
                                                <div class='card border-primary'>
                                                    <div class='card-header bg-transparent border-primary text-center'>
                                                        <h5 class='card-title'>".$fname." ".$lname."</h5>
                                                    </div>
                                                    <div class='card-body'>
                                                        <span class='align-middle h5'>Email : </span>
                                                        <h5 class='float-right'>$email</h5>
                                                    </div>
                                                    <div class='card-body'>
                                                        <span class='align-middle h5'>Phone : </span>
                                                        <h5 class='float-right'>$phone</h5>
                                                    </div>
                                                    <div class='card-body'>
                                                        <span class='align-middle h5'>Gender : </span>
                                                        <h5 class='float-right'>$gender</h5>
                                                    </div>
                                                    <div class='card-body'>
                                                        <span class='align-middle h5'>City : </span>
                                                        <h5 class='float-right'>$city</h5>
                                                    </div>
                                                    <div class='card-body'>
                                                        <span class='align-middle h5'>Country : </span>
                                                        <h5 class='float-right'>$country</h5>
                                                    </div>
                                                    <div class='card-body border-top text-center'>
                                                        <span class='align-middle h5'>Address</span>
                                                    </div>
                                                    <div class='card-body'>
                                                        <h5>$address</h5>
                                                    </div>
                                                    <div class='card-body border-top'>
                                                        <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal'>
                                                            <i class='fa fa-trash pr-2' aria-hidden='true'></i>Delete
                                                        </button>
                                                        <div id='myModal' class='modal fade' role='dialog'>
                                                            <div class='modal-dialog modal-lg modal-dialog-centered'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header bg-danger'>
                                                                        <h4 class='modal-title'>Do you want to delete ?</h4>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                        <p>Please make sure that you didn't select the worng one.</p>
                                                                    </div>
                                                                    <div class='modal-footer'>
                                                                        <a href='../adminQuerys/deleteaccount.php?id=$id' class='btn btn-danger'>
                                                                            <i class='fa fa-trash pr-2' aria-hidden='true'></i>Delete
                                                                        </a>
                                                                        <button type='button' class='btn btn-info' data-dismiss='modal'>Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href='../adminQuerys/editaccount.php?id=$id' class='btn btn-warning float-right'>
                                                            <i class='fa fa-pencil pr-2' aria-hidden='true'></i>Edit
                                                        </a>
                                                    </div>
                                                </div>
                                              </div>";
                                    }
                                }else{
                                    $num_rows = "0";
                                    echo "<div class='col-12 col-md-12 col-lg-12 mt-4 mb-3'>
                                            <h4 class='text-uppercase font-weight-bold text-center'>We have <spane class='badge badge-danger mx-2 align-middle'>$num_rows</spane> result for your keyword '$search_keyword'</h4>
                                          </div>";
                                }

                                //echo "<div class='row'> Button clicked"." filter ".$se_filter." keyword ".$search_keyword."</div>";
                            }else{
                                $sql = "SELECT `id`,`firstname`, `lastname`, `email`, `phonenumber`, `gender`, `city`, `country`, `user_address`  
                                        FROM `users`";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0){
                                    $num_rows = mysqli_num_rows($result);
                                    echo "<div class='col-12 col-md-12 col-lg-12 mt-4 mb-3'>
                                            <h4 class='text-uppercase font-weight-bold text-center'><spane class='badge badge-success mx-2 align-middle'>$num_rows</spane> Account in database.</h4>
                                          </div>";

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id         = $row['id'];
                                        $fname      = $row['firstname'];
                                        $lname      = $row['lastname'];
                                        $email      = $row['email'];
                                        $phone      = $row['phonenumber'];
                                        $gender     = $row['gender'];
                                        $city       = $row['city'];
                                        $country    = $row['country'];
                                        $address    = $row['user_address'];

                                        echo "<div class='col-12 col-md-6 col-lg-3 mb-3 d-flex justify-content-center'>
                                                <div class='card border-primary'>
                                                    <div class='card-header bg-transparent border-primary text-center'>
                                                        <h5 class='card-title'>".$fname." ".$lname."</h5>
                                                    </div>
                                                    <div class='card-body'>
                                                        <span class='align-middle h5'>Email : </span>
                                                        <h5 class='float-right'>$email</h5>
                                                    </div>
                                                    <div class='card-body'>
                                                        <span class='align-middle h5'>Phone : </span>
                                                        <h5 class='float-right'>$phone</h5>
                                                    </div>
                                                    <div class='card-body'>
                                                        <span class='align-middle h5'>Gender : </span>
                                                        <h5 class='float-right'>$gender</h5>
                                                    </div>
                                                    <div class='card-body'>
                                                        <span class='align-middle h5'>City : </span>
                                                        <h5 class='float-right'>$city</h5>
                                                    </div>
                                                    <div class='card-body'>
                                                        <span class='align-middle h5'>Country : </span>
                                                        <h5 class='float-right'>$country</h5>
                                                    </div>
                                                    <div class='card-body border-top text-center'>
                                                        <span class='align-middle h5'>Address</span>
                                                    </div>
                                                    <div class='card-body'>
                                                        <h5>$address</h5>
                                                    </div>
                                                    <div class='card-body border-top'>
                                                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal'>
                                                        <i class='fa fa-trash pr-2' aria-hidden='true'></i>Delete
                                                    </button>
                                                    <div id='myModal' class='modal fade' role='dialog'>
                                                        <div class='modal-dialog modal-lg modal-dialog-centered'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header bg-danger'>
                                                                    <h4 class='modal-title'>Do you want to delete ?</h4>
                                                                </div>
                                                            <div class='modal-body'>
                                                                <p>Please make sure that you didn't select the worng one.</p>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <a href='../adminQuerys/deleteaccount.php?id=$id' class='btn btn-danger'>
                                                                    <i class='fa fa-trash pr-2' aria-hidden='true'></i>Delete
                                                                </a>
                                                                <button type='button' class='btn btn-info' data-dismiss='modal'>Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                        <a href='../adminQuerys/editaccount.php?id=$id' class='btn btn-warning float-right'>
                                                            <i class='fa fa-pencil pr-2' aria-hidden='true'></i>Edit
                                                        </a>
                                                    </div>
                                                </div>
                                              </div>";
                                    }
                                }
                            }
                            mysqli_close($conn);
                        ?>
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