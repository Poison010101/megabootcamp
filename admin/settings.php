<?php
include_once('inc_sessioncheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css"/>
    <title>Setting</title>
</head>
<body>
    <div class="container">
      <?php include('inc_welcomemenu.php');?>
        <div class="row">
            <div class="col-xxl-4">
                <h2>Add Settings</h2>

                <?php
                if(isset($_POST['submit']))
                {
                    //getting data fromform
                    $nm = $_POST['name'];
                    $val = $_POST['value'];

                    //sql
                    $sql = "INSERT INTO settings(name, value) VALUES ('$nm', '$val')";

                    //db connection
                    include('dbconnection.php');

                    //query
                    $query  = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                    if($query)
                    {
                        echo "Data Inserted Successfully";
                    }
                    else{
                        echo "Something Error";
                    }


                }

                ?>
                <form method="post" name='addsetting' action="settings.php">
                    <fieldset><legend>Add Setting</legend>
                    <label>Name</label>
                    <input type="text" name="name">
                    <br/>
                    <label>Value</label>
                    <input type="text" name="value">
                    <br/>
                    <input type="submit" name='submit' value="Add">
                    </fieldset>
</form>



                </form>
                
            
            
          </div>
            <div class="col-xxl-8">
            <h2>Dispaly All Settings</h2>
            
            <?php
                $sql = "SELECT * from settings order by id DESC";

                include('dbconnection.php');

                $query=mysqli_query($conn, $sql);

                $count = mysqli_num_rows($query);
                if($count>=1)
                {
                    echo "There are total $count records";
                    echo "<table class='table'><tr><th>ID</th><th>Name</th><th>Value</th>Action</th></tr>";

                    while($row = mysqli_fetch_array($query))
                    {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['value']."</td>";
                        echo "<td>EDIT | DELETE</td>";
                    }

                    echo "</table>";

                }
                else{
                    echo "No records Found";
                }

            ?>
            
            </div>
        </div>

        <div class="col-xxl-12">Footer</div>

    </div>
   
    
</body>
</html>