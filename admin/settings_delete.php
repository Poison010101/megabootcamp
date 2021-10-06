<?php
include_once('inc_sessioncheck.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <title>Setting</title>
</head>

<body>

    <?php include('inc_welcomemenu.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include('inc_sidemenu.php'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
                <div class="row">
                    <div class="col-xxl-4">
                        <?php
                            include('dbconnection.php');
                            $id = $_GET['id']; // get id through query string
                            $delete = mysqli_query($conn, "delete from settings where id='$id'"); // delete query
                          if ($delete) {
                            mysqli_close($conn); // Close connection
                            header("location:settings.php"); // redirects to all records page
                            exit;
                          } else {
                            echo mysqli_error($conn);
                          }
                        ?>

                    </div>
                    <div class="col-xxl-8">
                
                    </div>
                </div>
            </main>
        </div>
    </div>


</body>

</html>