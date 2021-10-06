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
  <title>Users Management</title>
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
            if (isset($_POST['submit'])) {
              //getting data fromform
              $username = $_POST['username'];
              $password = md5($_POST['password']);
              $email = $_POST['email'];
              $role = $_POST['role'];
              $status = $_POST['status'];

              //sql
              $sql = "INSERT INTO users(username, password, email, role, status) VALUES ('$username', '$password', '$email', '$role', '$status')";

              //db connection
              include('dbconnection.php');

              //query
              $query  = mysqli_query($conn, $sql) or die(mysqli_error($conn));

              if ($query) {
                echo "Data Inserted Successfully";
              } else {
                echo "Something Error";
              }
            }

            ?>
            <form method="post" name='addsetting' action="users.php" class=" border p-4">
              <fieldset>
                <legend>Add User</legend>
                <label>UserName</label>
                <input type="text" name="username" class="form-control">
                <br />
                <label>Password</label>
                <input type="text" name="password" class="form-control">
                <br />
                <label>E-mail</label>
                <input type="email" name="email" class="form-control">
                <br />
                <label>Role</label>
                <select class="form-select" name="role">
                  <option selected>Choose options</option>
                  <option value="1">Admin</option>
                  <option value="2">Editor</option>
                  <option value="3">User</option>
                </select>
                <br>
                <label>Status</label>
                <select class="form-select" name="status">
                  <option selected>Choose options</option>
                  <option value="1">Active</option>
                  <option value="0">Not Active</option>
                </select>
                <br>
                <input type="submit" name='submit' value="Add">
              </fieldset>
            </form>
          </div>
          <div class="col-xxl-8">
            <div class="table-responsive">
              <h2>Display of all Users</h2>

              <?php
              $sql = "SELECT * from users order by id ASC";

              include('dbconnection.php');

              $query = mysqli_query($conn, $sql);

              $count = mysqli_num_rows($query);
              if ($count >= 1) {
                $sn='1';
                echo "There are total $count records";
                echo "<table class='table table-striped table-sm'>
<tr><th>ID</th><th>Username</th><th>E-mail</th><th>Role</th><th>Action</th></tr>";

                while ($row = mysqli_fetch_array($query)) {
                  echo "<tr>";
                  echo "<td>" . $sn. "</td>";
                  echo "<td>" . $row['username'] . "</td>";
                  echo "<td>" . $row['email'] . "</td>";
                  echo "<td>" . $row['role'] . "</td>";
                  echo "<td><a class='btn btn-primary btn-sm' href='users_edit.php?id=" . $row['id'] . "'>EDIT</a> <a class='btn btn-danger btn-sm' href='users_delete.php?id=" . $row['id'] . "'>DELETE</a></td>";
                  $sn++;
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