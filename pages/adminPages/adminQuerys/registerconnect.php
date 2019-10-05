<!DOCTYPE html5>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/style.css" media="screen">
    <title>Redirect</title>
</head>
<body>
    <div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 my-5">
                    <?php
                        require ('../../../assets/config/config.php');
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $id = $_REQUEST['id'];
                        if(isset($_POST['admin_submit'])){
                            $firstname 		= $_POST['firstname'];
	                        $lastname 		= $_POST['lastname'];
	                        $email 			= $_POST['email'];
                            $phonenumber	= $_POST['phone'];
                            $gender         = $_POST['gender'];
                            $city           = $_POST['city'];
                            $country        = $_POST['country'];
                            $address        = $_POST['address'];
                         
                            mysqli_set_charset($conn,"utf8");

                            $sql = "UPDATE `users` 
                                    SET `firstname`='$firstname',`lastname`='$lastname',
                                        `email`='$email',`phonenumber`='$phonenumber',
                                        `gender`='$gender',`city`='$city',`country`='$country',
                                        `user_address`='$address'
                                    WHERE id = $id";

                            if (mysqli_query($conn,$sql)){ 
                                echo "<div class='col-12 col-md-12 col-lg-12 d-flex justify-content-center'>
                                        <div class='card border-success'>
                                            <div class='card-header bg-transparent border-success text-center'>
                                                <h5 class='card-title my-auto'><i class='fa fa-check' aria-hidden='true'></i> Edit account completed !</h5>
                                            </div>
                                            <div class='card-body bg-success'>
                                                <h5 class='card-text'>Go back to account page in 3 second</h5>
                                            </div>
                                            <div class='card-body border-top text-center'>
                                                <a class='btn btn-outline-success' href='../adminAbility/account.php'><i class='fa fa-address-book-o pr-2' aria-hidden='true'></i> Account page</a>
                                            </div>
                                        </div>
                                  </div>";
                                header("refresh: 3; url = ../index_admin.php");
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                            mysqli_close($conn);
                        }
                    ?>
                </div>
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
</body>
</html>