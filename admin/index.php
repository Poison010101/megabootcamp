<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body class="bg-dark">
    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // sql statement to check username and password
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND status='1'";
        //include connection
        include('dbconnection.php');
        //executing query
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        //counting number of rows
        $count = mysqli_num_rows($query);
        if ($count == 1) {
            //trying to find the role of the user
            while ($row = mysqli_fetch_array($query)) {
                $role = $row['role'];
                //creating a session
                $_SESSION["name"] = $row['username'];
                $_SESSION["role"] = $row['role'];
                $_SESSION["id"] = $row['id'];

                switch ($role) {
                    case 1: {
                            //redirection after successful login
                            header("Location: admindashboard.php");
                            break;
                        }
                    case 2: {
                            header("Location:editordashboard.php");
                            break;
                        }
                    default: {
                            header("Location: userdashboard.php");
                        }
                }
            }
        }
        //connection close
        mysqli_close($conn);
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
                        <form action="" method="POST" name="login">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" name="username">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password">
                                <label for="floatingPassword">Password</label>
                            </div>

                            <div class="d-grid">
                                <input type="submit" name="submit" value="Login" class="btn btn-primary btn-login text-uppercase fw-bold">
                            </div>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>