<?php
    session_start();
    require ('assets/config/config.php');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $pro_id = 14;
    $user_id = $_SESSION['user_id'];
    $default_quantity = 1;

    $sql = "SELECT * FROM `user_cart` WHERE `user_id` = 26 AND `product_id` = 14";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
        $pro_id  = $row['product_id'];
        $quantity = $row['quantity'];

        echo "Already have product inside cart ".$user_id." ".$pro_id." ".$quantity."<br>";

        if(isset($_POST['quantity'])){
            $add_qu = $_POST['quantity'];
            $quantity = $quantity + $add_qu;
        }else{
            $quantity = $quantity + $default_quantity;
        }

        $sql_update = "UPDATE `user_cart` 
                       SET `quantity`= $quantity 
                       WHERE `user_id` = 26 AND `product_id` = 14";

        if(mysqli_query($conn, $sql_update)){
            echo "update quantity";
        }
    }
?>