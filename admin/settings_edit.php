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
                            $query = mysqli_query($conn, "select * from settings where id='$id'"); // select query
                            $data = mysqli_fetch_array($query); // fetch data
                        if (isset($_POST['update'])) // when click on Update button
                        {
                          $name = $_POST['name'];
                          $value = $_POST['value'];

                          $edit = mysqli_query($conn, "update settings set name='$name', value='$value' where id='$id'");

                          if ($edit) {
                            mysqli_close($conn); // Close connection
                            header("location:settings.php"); // redirects to all records page
                            exit;
                          } else {
                            echo mysqli_error($conn);
                          }
                        }

                        ?>
                        <form method="post" name='editsetting' action="" class=" border p-4">
                            <fieldset>
                                <legend>Add Setting</legend>
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $data['name'] ?>">
                                <br />
                                <label>Value</label>
                                <input type="text" name="value" class="form-control" value="<?php echo $data['value'] ?>">
                                <br />
                                <input type="submit" name='update' value="Update">
                            </fieldset>
                        </form>
                    </div>
                    <div class="col-xxl-8">
                        <div class="table-responsive">
                            <h2>Display of all Settings</h2>

                            <?php
                            $sql = "SELECT * from settings order by id DESC";

                            include('dbconnection.php');

                            $query = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($query);
                            if ($count >= 1) {
                                echo "There are total $count records";
                                echo "<table class='table table-striped table-sm'>
<tr><th>ID</th><th>Name</th><th>Value</th><th>Action</th></tr>";

                                while ($row = mysqli_fetch_array($query)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['value'] . "</td>";
                                echo "<td><a class='btn btn-primary btn-sm' href='settings_edit.php?id=" . $row['id'] . "'>EDIT</a> <a class='btn btn-danger btn-sm' href='settings_delete.php?id=" . $row['id'] . "'>DELETE</a></td>";
                                }

                                echo "</table>";
                            } else {
                                echo "No records Found";
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


</body>

</html>