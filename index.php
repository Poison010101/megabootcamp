<!DOCTYPE html>
<html>
<head>
  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Index</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- <link href="css/mystyle.css" rel="stylesheet"> -->
</head>
<body>
    <div class="container">
        <!-- logo and banner section  -->
        <?php include_once('inc_banner.php');?>
        <!-- logo and banner section  -->
       <?php include('inc_menu.php');?>

        <div class="row">
            <!-- slider open -->
            <div class="col-xxl-6">
                    <?php
                    include('admin/dbconnection.php');

                    $dataslider="SELECT * from blog order by id DESC limit 0,1";
                    $query = mysqli_query($conn, $dataslider);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <img src="<?=$row['featureimages'];?>" class="img-fluid" alt="<?=$row['title']; ?>">
                        <h3><a href="blogdetails.php?id=<?=$row['id'];?>&cid=<?=$row['category_id'];?>"><?=$row['title']; ?></a></h3>
                        <p><?=substr($row['content'], 0, 250); ?>
                    <?php
                    }
                    
                    ?>
            
            </div>
            <!-- slider close -->
            <div class="col-xxl-6">
            <?php
                    include('admin/dbconnection.php');

                    $datainfour="SELECT * from blog order by id DESC limit 1,5";
                    $query = mysqli_query($conn, $datainfour);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>

                        <div class="row">
                    <div class="col-xxl-3 col-lg-6 col-md-6">
                    <img src="<?=$row['featureimages'];?>" class="img-fluid img-thumbnail" alt="<?=$row['title']; ?>">
                    </div>
                    <div class="col-xxl-9 col-lg-6 col-md-6">
                    <h4><a href="blogdetails.php?id=<?=$row['id'];?>&cid=<?=$row['category_id'];?>"><?=$row['title']; ?></a> </h4>
                    <p><?=substr($row['content'], 0, 150); ?>

                    </div>
                </div>

                    <?php
                    }
                    
                    ?>
               
              
            </div>
                    <hr class="mt-3">
            <div class="row mt-3">
            <?php
                    include('admin/dbconnection.php');

                    $datainfour="SELECT * from category order by id DESC limit 0,4";
                    $query = mysqli_query($conn, $datainfour);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <img src="<?=$row['thumbnail'];?>" class="img-fluid img-thumbnail rounded-circle" alt="<?=$row['name']; ?>">
                        <h4 class="text-center"><a href="category.php?id=<?=$row['id'];?>"><?=$row['name']; ?></a> </h4>
                    <p class="text-center"><?=substr($row['description'], 0, 150); ?>

                </div>

                    <?php
                    }
                    
                    ?>
            </div>
            <?php require_once('inc_footer.php');?>
        </div>
    </div>


<script src="js/bootstrap.js" ></script>
    </body>
    </html>