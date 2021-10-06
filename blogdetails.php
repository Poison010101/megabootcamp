<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.css" rel="stylesheet">

</head>
<body>
<div class="container">
        <!-- logo and banner section  -->
        <?php include_once('inc_banner.php');?>
        <!-- logo and banner section  -->
       <?php include('inc_menu.php');?>

        <div class="row">
            <div class="col-xxl-8">
                <?php 
                    include('admin/dbconnection.php');
                    $id = $_GET['id']; // get id through query string
                    $cid = $_GET['cid'];
                    $query = mysqli_query($conn, "select * from blog where id='$id' AND category_id='$cid' "); // select query
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <img src="<?=$row['featureimages'];?>" class="img-fluid" alt="<?=$row['title']; ?>">
                        <h3><?=$row['title']; ?> </h3>
                        <p><?=$row['content']; ?>
                    <?php
                    }
                    
                    ?>
            </div>
            <div class="col-xxl-4">
                    <h4>Other related Posts</h4>
                    <?php 
                    include('admin/dbconnection.php');
                    $cid = $_GET['cid'];
                    $query = mysqli_query($conn, "select * from blog where category_id='$cid' "); // select query
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <h3><a href="blogdetails.php?id=<?=$row['id'];?>&cid=<?=$row['category_id'];?>"><?=$row['title']; ?></a>  </h3>
                    <?php
                    }
                    
                    ?>

            </div>
        </div>
</div>
    
</body>
</html>