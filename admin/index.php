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
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $password=md5($_POST['password']);

            // sql statement to check username and password
            $sql="SELECT * FROM users WHERE username='$username' AND password='$password' AND status='1'";
            //include connection
            include('dbconnection.php');
            //executing query
            $query=mysqli_query($conn, $sql) or die(mysqli_error($conn));
            //counting number of rows
            $count=mysqli_num_rows($query);
            if($count==1){
                //trying to find the role of the user
                while($row=mysqli_fetch_array($query))
                {
                    $role=$row['role'];
                    //creating a session
                    $_SESSION["name"]=$row['username'];
                    $_SESSION["role"]=$row['role'];
                    
                    switch($role)
                    {
                        case 1:
                            {
                 //redirection after successful login
                header("Location: admindashboard.php");
                break;

                            }
                            case 2:{
                                header("Location:editordashboard.php");
                                break;
                            }
                            default:
                            {
                                header("Location: userdashboard.php");
                            }
                    }

                }
               
            }
            //connection close
            mysqli_close($conn);

        }
    ?>
    <form action="" method="POST" name="login">
        <label>username</label>
        <input type="text" name="username">

        <label>Password</label>
        <input type="password" name="password">

        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>