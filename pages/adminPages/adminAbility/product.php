<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../../assets/css/sidebar.css" rel="stylesheet" type="text/css">
    <title>Product</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
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
                    <a class="text-uppercase" href="account.php"><i class="fa fa-address-book-o pr-2"
                            aria-hidden="true"></i> Account</a>
                </li>
                <li>
                    <a class="text-uppercase active" href="product.php"><i class="fa fa-shopping-cart pr-2"
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
                        <h1>Product</h1>
                        <a href="#menu-toggle" class="btn btn-danger" id="menu-toggle">Close menu</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class='container-fluid'>
                        <ul class='nav nav-tabs'>
                            <li class='nav-item'>
                                <a href='#aboutPlace' class='nav-link active text-capitalize' role='tab'
                                    data-toggle='tab'>
                                    <i class="fa fa-list-ul pr-2" aria-hidden="true"></i>list all product
                                </a>
                            </li>
                            <li class='nav-item'>
                                <a href='#addproduct' class='nav-link text-capitalize' role='tab' data-toggle='tab'>
                                    <i class="fa fa-plus-square pr-2" aria-hidden="true"></i>add product
                                </a>
                            </li>
                        </ul>
                        <div class='tab-content mb-5'>
                            <div id='aboutPlace' class='tab-pane in active mt-4' role='tabpanel1'>
                                <div class="row">
                                    <?php
                                    require('../../../assets/config/config.php');
                                    mysqli_set_charset($conn, "utf8");
                                    $sql = "SELECT * FROM `product` ORDER BY product_type ASC";
                                    $result = mysqli_query($conn, $sql);
                                    $textmore = 'More info';
                                    $Edit     = 'Edit';
                                    $Delete   = 'Delete';
                                    $checkprice = "";
                                    $img_path = "../../../assets/uploads/";
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id         = $row['id'];
                                            $header     = $row['header'];
                                            $sub_header = $row['sub_header'];
                                            $img        = $row['img'];
                                            $nomal      = $row['nomal_price'];
                                            $new        = $row['new_price'];

                                            if($new == null){
                                                $checkprice = "<div class='card-body border-top text-center'>
                                                                    <span class='h6'>
                                                                        Price : ".number_format($nomal)."
                                                                    </span>
                                                                </div>";
                                            }else{
                                                $checkprice = "<div class='card-body border-top'>
                                                                    <div class='align-middle my-auto'>
                                                                        <span class='float-left h6'>
                                                                            <del class='price-old'>
                                                                                Price : ".   number_format($nomal)."
                                                                            </del>
                                                                        </span>
                                                                        <span class='float-right h6' style='color: #fc0303;'>
                                                                            Price : ".number_format($new)."
                                                                        </span>
                                                                    </div>
                                                                </div>";
                                            }

                                            echo "<div class='col-12 col-md-6 col-lg-3 mb-3 d-flex justify-content-center'>
                                                    <div class='card h-100'>
                                                        <img class='card-img-top img-fluid' src ='$img_path$img' alt='$header' style='height: 17rem;'/>
                                                        <div class='card-body' style='height: 9rem;'>
                                                            <div class='text-center'>
                                                                <a class='text-uppercase font-weight-bold' href='../../productinfo.php?id=$id'>$textmore</a>
                                                            </div>
                                                            <h5 class='card-title text-center'>$header</h5>
                                                        </div>
                                                        <div class='card-body'style='height: 5rem;'>
                                                            <p class='card-text text-center'>$sub_header</p>
                                                        </div>
                                                        $checkprice
                                                        <div class='card-body border-top'>
                                                            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal'>
                                                                <i class='fa fa-trash pr-2' aria-hidden='true'></i>$Delete
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
                                                                            <a href='../adminQuerys/deleteproduct.php?id=$id' class='btn btn-danger'>
                                                                                <i class='fa fa-trash pr-2' aria-hidden='true'></i>Delete
                                                                            </a>
                                                                            <button type='button' class='btn btn-info' data-dismiss='modal'>Cancel</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class='btn btn-warning text-uppercase float-right'>
                                                                <i class='fa fa-pencil pr-2' aria-hidden='true'></i>$Edit
                                                            </a>    
                                                        </div>
                                                    </div>
                                                </div>";
                                        }
                                    }
                                    mysqli_close($conn);
                                ?>
                                </div>
                            </div>
                            <div id='addproduct' class='tab-pane' role='tabpanel2'>
                                <form action="../adminQuerys/addproduct.php" method="POST" enctype="multipart/form-data">
                                    <div class="row mt-2">
                                        <div class='col-12 col-md-8 col-lg-8 mb-3'>
                                            <div class="row mt-2">
                                                <div class="col-12 col-md-12 col-lg-12">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input border-success"
                                                            id="inputGroupFile03"
                                                            name="header_imgupload"
                                                            aria-describedby="inputGroupFileAddon03"
                                                            onchange="readURL(this);" required/>
                                                        <label class="custom-file-label" for="inputGroupFile03"
                                                            id='texturl'>Choose image</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12 col-md-12 col-lg-12">
                                                    <img id="imgpre" class='fit-image' src="http://placehold.it/500x500"
                                                        alt="Product image" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-12 col-md-4 col-lg-4 mb-3'>
                                            <div class='card mt-2'>
                                                <header class='card-header bg-primary'>
                                                    <div class="form-row">
                                                        <div class="col form-group my-auto">
                                                            <input type="text"
                                                                class="form-control text-center font-weight-bold"
                                                                name="header" placeholder='Product name' required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-2">
                                                        <div class="col form-group my-auto">
                                                            <input type="text"
                                                                class="form-control text-center font-weight-bold"
                                                                name="product_nickname" placeholder='Product nickname' required>
                                                        </div>
                                                    </div>
                                                </header>
                                                <div class='card-body border-top'>
                                                    <div class='mt-4'>
                                                        <div class="form-row">
                                                            <div class="col form-group my-auto">
                                                                <input type="text"
                                                                    class="float-right col-12 col-md-12 col-lg-12 form-control text-center"
                                                                    name="nomal_price" placeholder='Nomal price' required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='mt-4'>
                                                        <div class="form-row">
                                                            <div class="col form-group my-auto">
                                                                <input type="text"
                                                                    class="float-right col-12 col-md-12 col-lg-12 form-control text-center border-danger text-danger"
                                                                    name="new_price" placeholder='New price'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Multiple selection Headphone type -->
                                                    <div class='mt-4'>
                                                        <div class="form-row">
                                                            <div class="col my-auto text-dark">
                                                                <select multiple class="selectpicker w-100 form-control"
                                                                    title="Headphone Type" name="headphone_type"
                                                                    required>
                                                                    <option>Fullsize Headphone</option>
                                                                    <option>TrueWireless Headphone</option>
                                                                    <option>Onear Headphone</option>
                                                                    <option>Inear Headphone</option>
                                                                    <option>Eadbud Headphone</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End -->
                                                    <!-- selection Product type -->
                                                    <div class='mt-4'>
                                                        <div class="form-row">
                                                            <div class="col my-auto">
                                                                <select id="inputProduct" name="product_type"
                                                                    class="form-control selectpicker"
                                                                    title="Product Type" required>
                                                                    <option>Promotion</option>
                                                                    <option>Hot hit</option>
                                                                    <option>Hot new</option>
                                                                    <option>Nomal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End -->
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-left border-right border-top border-bottom rounded px-3 py-3">
                                        <div class="row mt-2 mb-4">
                                            <div class="col-12 col-md-12 col-lg-12 text-center">
                                                <span class="text-uppercase h3 font-weight-bold">Review scetion</span>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12 col-md-12 col-lg-12">
                                                <input type="text" class='mt-2 form-control text-center'
                                                    placeholder="Review title" name='title' required />
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-12">
                                                <textarea type="text" class='mt-2 form-control text-center'
                                                    placeholder="Review starter" name='header_text' required></textarea>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-12 text-center">
                                                <img id="review_img" src="http://placehold.it/500x500" alt='header'
                                                    class='img-thumnail img-fluid mt-4 w-50' />
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class='col-12 col-md-5 col-lg-5 mt-4'>
                                                        <div>
                                                            <h4 class='text-center font-weight-bold'>
                                                                การออกแบบและบรรจุภัณฑ์
                                                            </h4>
                                                        </div>
                                                        <div class='mt-4 ml-3'>
                                                            <textarea type="text" class='mt-2 form-control text-center'
                                                                placeholder="Product description" name='description' rows="15"
                                                                required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class='col-12 col-md-7 col-lg-7 text-center'>
                                                        <div class="row">
                                                            <div class="col-12 col-md-12 col-lg-12">
                                                                <div class="custom-file">
                                                                    <input type="file"
                                                                        class="custom-file-input border-success"
                                                                        id="inputGroupFile03"   
                                                                        name="img_thum"
                                                                        aria-describedby="inputGroupFileAddon03"
                                                                        onchange="readURL_de(this);" required />
                                                                    <label class="custom-file-label"
                                                                        for="inputGroupFile03" id='texturl_de'>Choose
                                                                        image</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-12 col-md-12 col-lg-12">
                                                                <img id="de_img" class='fit-image'
                                                                    src="http://placehold.it/500x500"
                                                                    alt="Product image" name='thumnail'/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-lg-12">
                                                    <div class="form-group">
                                                        <button type="submit" name="check_pro"
                                                            class="btn btn-warning btn-block text-uppercase font-weight-bold">
                                                            <i class="fa fa-plus-square pr-2" aria-hidden="true"></i>
                                                            Add Product
                                                            <i class="fa fa-plus-square pl-2" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
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
    <script src="../../../assets/js/bootstrap-select.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        console.log($("#menu-toggle").text().trim());
        if($("#menu-toggle").text().trim() == 'Close menu'){
            $("#menu-toggle").text("Open menu");
            $("#menu-toggle").attr('class','btn btn-success');
        }else{
            $("#menu-toggle").text("Close menu");
            $("#menu-toggle").attr('class','btn btn-danger');
        }
    });
    </script>
    <script>
    $(function() {
        $('.selectpicker').selectpicker();
    });
    </script>
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var fileName = input.files[0].name;
            console.log(fileName);
            reader.onload = function(e) {
                $('#imgpre').attr('src', e.target.result);
                $('#review_img').attr('src', e.target.result);
                $('#texturl').attr('class', 'custom-file-label bg-success text-light border-success');
            };
            document.getElementById('texturl').innerHTML = fileName;
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
    <script>
    function readURL_de(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var fileName = input.files[0].name;
            console.log(fileName);
            reader.onload = function(e) {
                $('#de_img').attr('src', e.target.result);
                $('#texturl_de').attr('class', 'custom-file-label bg-success text-light border-success');
            };
            document.getElementById('texturl_de').innerHTML = fileName;
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>

</html>