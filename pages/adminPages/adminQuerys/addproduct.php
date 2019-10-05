<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
        require('../../../assets/config/config.php');
        mysqli_set_charset($conn, 'utf8');
        
        $FileDir = $_SERVER['DOCUMENT_ROOT']."/WebDev/assets/uploads/";
        $header_img = basename($_FILES["header_imgupload"]["name"]);
        $thumnail_img = basename($_FILES["img_thum"]["name"]);

        $headerFilePath = $FileDir . $header_img;
        $headerfileType = pathinfo($headerFilePath,PATHINFO_EXTENSION);
        
        $thumnailFilePath = $FileDir . $thumnail_img;
        $thumnailfileType = pathinfo($thumnailFilePath,PATHINFO_EXTENSION);

        if(isset($_POST['check_pro'])){
            $p_name = $_POST['header'];
            $p_nickname = $_POST['product_nickname'];
            $no_price = $_POST['nomal_price'];
            $ne_price = $_POST['new_price'];
            $head_type = $_POST['headphone_type'];
            $p_type = $_POST['product_type'];
            $re_title = $_POST['title'];
            $re_decrip = $_POST['header_text'];
            $de = $_POST['description'];

            $allowTypes = array('jpg','png','jpeg','gif','pdf');

            if(in_array($headerfileType, $allowTypes) and in_array($thumnailfileType, $allowTypes)){   
                if(move_uploaded_file($_FILES["header_imgupload"]["tmp_name"], $headerFilePath) and 
                   move_uploaded_file($_FILES["img_thum"]["tmp_name"], $thumnailFilePath)){
                    
                    $pro_check = "";

                    if(strcmp($p_type,"Promotion") == 0){
                        $pro_check = 1;
                    }else if((strcmp($p_type,"Hot hit") == 0)){
                        $pro_check = 2;
                    }else if((strcmp($p_type,"Hot new") == 0)){
                        $pro_check = 3;
                    }else if((strcmp($p_type,"Nomal") == 0)){
                        $pro_check = 4;
                    }

                    if($ne_price == null){
                        $sql = "INSERT INTO `product`(`product_type`, `nomal_price`, 
                                        `headphone_type`, `header`, `sub_header`, `header_text`,
                                        `title`, `description`, `img`, `thumnail`) 
                                VALUES ($pro_check,$no_price,'$head_type',
                                       '$p_name','$p_nickname','$re_decrip','$re_title',
                                       '$de','$header_img','$thumnail_img')";
                    }else{
                        $sql = "INSERT INTO `product`(`product_type`, `nomal_price`, `new_price`, 
                                        `headphone_type`, `header`, `sub_header`, `header_text`,
                                        `title`, `description`, `img`, `thumnail`) 
                                VALUES ($pro_check,$no_price,$ne_price,'$head_type',
                                       '$p_name','$p_nickname','$re_decrip','$re_title',
                                       '$de','$header_img','$thumnail_img')";
                    } 
                    
                    if (mysqli_query($conn,$sql)){ 
                                echo "<div class='col-12 col-md-12 col-lg-12 d-flex justify-content-center my-5'>
                                        <div class='card border-success'>
                                            <div class='card-header bg-transparent border-success text-center'>
                                                <h5 class='card-title'><i class='fa fa-check' aria-hidden='true'></i> Add product complete</h5>
                                            </div>
                                            <div class='card-body bg-success'>
                                                <h5 class='card-text'>We'll redirect you to product page in 5 second</h5>
                                            </div>
                                            <div class='card-body border-top text-center'>
                                                <a class='btn btn-outline-success' href='../adminAbility/product.php'><i class='fa fa-home' aria-hidden='true'></i> Home page</a>
                                            </div>
                                        </div>
                                  </div>";
                                header("refresh: 5; url = ../adminAbility/product.php");
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                }else{
                    echo "<div class='col-12 col-md-12 col-lg-12 d-flex justify-content-center my-5'>
                            <div class='card border-success'>
                                <div class='card-header bg-transparent border-success text-center'>
                                    <h5 class='card-title'><i class='fa fa-check' aria-hidden='true'></i> Permission denied</h5>
                                </div>
                                <div class='card-body bg-success'>
                                    <h5 class='card-text'>Permission to read and write was denied please contact admin</h5>
                                </div>
                                <div class='card-body border-top text-center'>
                                    <a class='btn btn-outline-success' href='../../contact.php'><i class='fa fa-home' aria-hidden='true'></i> Contact page</a>
                                </div>
                            </div>
                        </div>";
                }
            }else{
                echo "We recomment .jpeg or .png file."; 
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
    <!-- Menu Toggle Script -->
    <script src="https://use.fontawesome.com/4283dcca0d.js"></script>
</body>

</html>