<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Delete account</title>
</head>

<body>
    <div>
        <div class="col-12">
            <div class="row">
                <div class="container-fluid text-center">
                    <?php
                        require('../../../assets/config/config.php');
                        mysqli_set_charset($conn, 'utf8');
                        $id = $_REQUEST['id'];
                        $sql = "DELETE FROM `users` WHERE id = $id";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            echo "<div class='alert alert-success' role='alert'>
                                    <a href='../adminAbility/account.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <h4 class='alert-heading'>Account Deleted !</h4>
                                    <hr>
                                    <p class='mb-0'>Go back to account page in 3 second.</p>
                                  </div>";
                            header("refresh: 3; url = http://mungmee.ddns.net/pages/adminPages/adminAbility/account.php");
                        }
                    ?>
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
</body>

</html>