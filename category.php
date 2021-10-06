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
                <div class="row">
                <?php 
                    include('admin/dbconnection.php');
                    $id = $_GET['id']; // get id through query string
                    $query = mysqli_query($conn, "select * from blog where category_id='$id' "); // select query
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="card col-xl-4">
                        <div class="card-body">
                        <img src="<?=$row['featureimages'];?>" class="card-img-top img-fluid" alt="<?=$row['title']; ?>">

                            <h5 class="card-title"><?=$row['title']; ?></h5>
                            <p class="card-text"><?=substr($row['content'],0,120); ?></p>
                            <a href="blogdetails.php?id=<?=$row['id'];?>&cid=<?=$row['category_id'];?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <?php
                    }
                    
                    ?>
                </div>
               
            </div>
            <div class="col-xxl-4">
                    <h4>Recent Posts</h4>
                    <?php 
                    include('admin/dbconnection.php');
                    $query = mysqli_query($conn, "SELECT * from blog order by id DESC limit 0,10"); // select query
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