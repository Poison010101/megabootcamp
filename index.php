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
                <img src="https://dummyimage.com/960x750/000/fff" alt="slider" class="img-fluid">
            </div>
            <!-- slider close -->
            <div class="col-xxl-6">
                <div class="row">
                    <div class="col-xxl-3 col-lg-6 col-md-6">
                        <img src="https://dummyimage.com/150x150/000/fff" alt="first image" class="img-fluid img-thumbnail">
                    </div>
                    <div class="col-xxl-9 col-lg-6 col-md-6">
                        description
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-lg-6 col-md-6">
                        <img src="https://dummyimage.com/150x150/000/fff" alt="second image" class="img-fluid img-thumbnail">
                    </div>
                    <div class="col-xxl-9 col-lg-6 col-md-6">
                        description
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-lg-6 col-md-6">
                        <img src="https://dummyimage.com/150x150/000/fff" alt="third image" class="img-fluid img-thumbnail">
                    </div>
                    <div class="col-xxl-9 col-lg-6 col-md-6">
                        description
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-lg-6 col-md-6">
                        <img src="https://dummyimage.com/150x150/000/fff" alt="fourth image" class="img-fluid img-thumbnail">
                    </div>
                    <div class="col-xxl-9 col-lg-6 col-md-6">
                        description
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <img src="https://dummyimage.com/310x310/000/fff" alt="first image" class="img-fluid img-thumbnail rounded-circle">
                        <h3>Title</h3>
                        <p>description</p>

                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <img src="https://dummyimage.com/310x310/000/fff" alt="first image" class="img-fluid img-thumbnail rounded-circle">
                    <h3>Title</h3>
                    <p>description</p>

                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <img src="https://dummyimage.com/310x310/000/fff" alt="first image" class="img-fluid img-thumbnail rounded-circle">
                <h3>Title</h3>
                <p>description</p>

                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <img src="https://dummyimage.com/310x310/000/fff" alt="first image" class="img-fluid img-thumbnail rounded-circle">
                <h3>Title</h3>
                <p>description</p>

                </div>
            </div>
           <?php require_once('inc_footer.php');?>
        </div>
    </div>

<script src="js/bootstrap.js" ></script>
    </body>
    </html>