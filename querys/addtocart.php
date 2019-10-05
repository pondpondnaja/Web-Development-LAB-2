<?php
    session_start();
    if(empty($_SESSION['user_login'])){
        header("Location: ../pages/login.php");
        exit;
    }
?>
<!DOCTYPE html5>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css" media="screen">
    <title>Add to cart</title>
</head>
<body>
    <div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 my-5">
                    <?php
                        require ('../assets/config/config.php');
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        mysqli_set_charset($conn,"utf8");

                        $pro_id = $_REQUEST['id'];
                        $user_id = $_SESSION['user_id'];
                        $default_quantity = 1;

                        $sql = "SELECT * 
                                FROM `user_cart` 
                                WHERE `user_id` = $user_id AND `product_id` = $pro_id";

                        $result = mysqli_query($conn, $sql);

                        if(isset($_POST['addtocart'])){
                            if(mysqli_num_rows($result) > 0){
                                $row = mysqli_fetch_assoc($result);
                                $user_id = $row['user_id'];
                                $pro_id  = $row['product_id'];
                                $quantity = $row['quantity'];

                                //echo "Already have product inside cart ".$user_id." ".$pro_id." ".$quantity."<br>";
                                $set_quantity = 0;
                                $add_qu = 0;
                                
                                if(isset($_POST['quantity'])){
                                    $add_qu = $_POST['quantity'];
                                    $set_quantity = $quantity + $add_qu;
                                }else{
                                    $set_quantity = $set_quantity + $default_quantity;
                                }

                                $sql_update = "UPDATE `user_cart` 
                                               SET `quantity`= $set_quantity 
                                               WHERE `user_id` = $user_id AND `product_id` = $pro_id";

                                if(mysqli_query($conn,$sql_update)){
                                    echo "<div class='col-12 col-md-12 col-lg-12 d-flex justify-content-center'>
                                            <div class='card border-success'>
                                                <div class='card-header bg-transparent border-success text-center'>
                                                    <h5 class='card-title'><i class='fa fa-check' aria-hidden='true'></i> Add to cart complete</h5>
                                                </div>
                                                <div class='card-body bg-success'>
                                                    <h5 class='card-text'>We'll redirect you to product page in 1 second</h5>
                                                </div>
                                                <div class='card-body border-top text-center'>
                                                    <a class='btn btn-outline-success' href='../pages/product.php'>
                                                        <i class='fa fa-home' aria-hidden='true'></i> Product page
                                                    </a>
                                                </div>
                                            </div>
                                      </div>";

                                    $old_quantity_item = $_SESSION['user_item'];
                                    $_SESSION['user_item'] = $old_quantity_item + $add_qu;
                                    session_write_close();
                                    header("refresh: 0.5; url = ../pages/product.php");
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                                mysqli_close($conn);

                            }else{
                                $quantity = 0;  
                                
                                if(isset($_POST['quantity'])){
                                    $quantity = $_POST['quantity']; 
                                }else{
                                    $quantity = $quantity + $default_quantity;
                                }

                                $sql_new = "INSERT INTO `user_cart`(`user_id`, `product_id`, `quantity`) 
                                            VALUES ($user_id,$pro_id,$quantity)";

                                if(mysqli_query($conn,$sql_new)){ 
                                    echo "<div class='col-12 col-md-12 col-lg-12 d-flex justify-content-center'>
                                            <div class='card border-success'>
                                                <div class='card-header bg-transparent border-success text-center'>
                                                    <h5 class='card-title'><i class='fa fa-check' aria-hidden='true'></i> Add to cart complete</h5>
                                                </div>
                                                <div class='card-body bg-success'>
                                                    <h5 class='card-text'>We'll redirect you to product page in 1 second</h5>
                                                </div>
                                                <div class='card-body border-top text-center'>
                                                    <a class='btn btn-outline-success' href='../pages/product.php'>
                                                        <i class='fa fa-home' aria-hidden='true'></i> Product page
                                                    </a>
                                                </div>
                                            </div>
                                      </div>";
                                    //echo "Create new one";
                                    $old_quantity_item = $_SESSION['user_item'];
                                    $_SESSION['user_item'] = $old_quantity_item + 1;
                                    session_write_close();
                                    header("refresh: 0.5; url = ../pages/product.php");
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                                mysqli_close($conn);
                            }    
                        }else if(isset($_POST['delete_product'])){
                            
                            $sql_search = "SELECT `quantity` FROM `user_cart` WHERE `user_id` = $user_id AND `product_id` = $pro_id";
                            
                            $se_result = mysqli_query($conn,$sql_search);

                            if(mysqli_num_rows($result) > 0){
                                $row        = mysqli_fetch_array($result);
                                $old_quantity_se = $row['quantity'];

                                $sql_del_stmt = "DELETE FROM `user_cart` WHERE `user_id` = $user_id AND `product_id` = $pro_id";

                                if(mysqli_query($conn,$sql_del_stmt)){
                                    echo "<div class='col-12 col-md-12 col-lg-12 d-flex justify-content-center'>
                                            <div class='card border-success'>
                                                <div class='card-header bg-transparent border-success text-center'>
                                                    <h5 class='card-title'><i class='fa fa-check' aria-hidden='true'></i> Remove complete</h5>
                                                </div>
                                                <div class='card-body bg-success'>
                                                    <h5 class='card-text'>We'll redirect you to cart page in 1 second</h5>
                                                </div>
                                                <div class='card-body border-top text-center'>
                                                    <a class='btn btn-outline-success' href='../pages/cartinfo.php?id=$user_id'>
                                                        <i class='fa fa-home' aria-hidden='true'></i> Product page
                                                    </a>
                                                </div>
                                            </div>
                                        </div>";
            
                                    $old_quantity_item = $_SESSION['user_item'];
                                    $_SESSION['user_item'] = $old_quantity_item - $old_quantity_se;
                                    session_write_close();
                                    header("refresh: 0.5; url = ../pages/cartinfo.php?id=$user_id");
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
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