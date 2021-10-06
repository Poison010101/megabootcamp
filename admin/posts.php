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
  <title>Categories</title>
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
              include('dbconnection.php');

              //getting data fromform
              $categoryid = $_POST['categoryname'];
              $title = $_POST['title'];
              $content = mysqli_real_escape_string($conn, $_POST['content']);
              $user_id = $_SESSION['id'];


              $fileinfo = PATHINFO($_FILES["image"]["name"]);
              $newFilename = $fileinfo['filename'] . "_" . time() . "." . $fileinfo['extension'];
              move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $newFilename);
              $location = "uploads/" . $newFilename;

              $sql = "INSERT INTO blog(category_id, user_id, title, content, featureimages, status)VALUES ('$categoryid','$user_id','$title','$content','$location','1')";
              if (mysqli_query($conn, $sql)) {
                echo "successfully !";
              } else {
                echo "Error: " . $sql . "" . mysqli_error($conn);
              }
            }

            ?>
            <form method="post" name='addsetting' action="" class=" border p-4" enctype="multipart/form-data">
              <fieldset>
                <legend>Add Posts</legend>
                <label>Category Name</label>
                <select class="form-select" name="categoryname">
                  <option selected>Choose options</option>
                  <?php 
                  $sql = "SELECT * from category order by id ASC";
                  include('dbconnection.php');
                  $query = mysqli_query($conn, $sql);
                  $count = mysqli_num_rows($query);
                  if ($count >= 1) {
                    while ($row = mysqli_fetch_array($query)) {
                      echo "<option value='".$row['id']."'>" . $row['name'] . "</option>";
                    }
                  }

                  ?>
                </select>
                <br />
                <label>Title</label>
                <input type="text" name="title" class="form-control">
                <br />
                <label>Content</label>
                <textarea class="form-control" name="content" rows="10"></textarea>
                <br />
                <label>Featured Image</label><br>
                <input type="file" class="form-control" id="file" name="image">
                <br>
                <input type="submit" name='submit' value="Add">
              </fieldset>
            </form>
          </div>
          <div class="col-xxl-8">
            <div class="table-responsive">
              <h2>Display of all Posts</h2>

              <?php
              $sql = "SELECT * from blog order by id DESC";

              include('dbconnection.php');

              $query = mysqli_query($conn, $sql);

              $count = mysqli_num_rows($query);
              if ($count >= 1) {
                echo "There are total $count records";
                echo "<table class='table table-striped table-sm'>
<tr><th>ID</th><th>Name</th><th>Description</th><th>Thumbnail</th><th>Action</th></tr>";

                while ($row = mysqli_fetch_array($query)) {
                  echo "<tr>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . $row['title'] . "</td>";
                  echo "<td>" . $row['content'] . "</td>";
                  echo "<td>" . $row['featureimages'] . "</td>";
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