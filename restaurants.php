<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
$loc=$_SESSION["location"];
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!--header starts-->
    <header id="header" class="header-scroll top-header headrom">
        <!-- .navbar -->
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <div class="container">
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php" style="color: black;">Home <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php" style="color: black;">Restaurants <span class="sr-only"></span></a> </li>

                        <?php
                        if (empty($_SESSION["user_id"])) {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active" style="color: black;">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active" style="color: black;">Signup</a> </li>';
                        } else {


                            echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active"style="color: black;">Your Orders</a> </li>';
                            echo  '<li class="nav-item"><a href="logout.php" class="nav-link active"style="color: black;">Logout</a> </li>';
                        }

                        ?>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->
    </header>
    <div class="page-wrapper">
        <!-- top Links -->
        <div class="top-links">
            <div class="container">
                <ul class="row links">

                    <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick Your favorite food</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay online</a></li>
                </ul>
            </div>
        </div>
        <!---EI PORJONTO SHESH-->
        <!-- end:Top links -->
        <!-- start: Inner page hero -->
        <div class="inner-page-hero bg-image" data-image-src="images/img/res.jpeg">
            <div class="container"> </div>
            <!-- end:Container -->
        </div>
        <div class="result-show">
            <div class="container">
                <div class="row">


                </div>
            </div>
        </div>
        <!-- //results show -->
        <section class="restaurants-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">



                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                        <div class="bg-gray restaurant-entry">
                            <div class="row">
                                <?php $ress = mysqli_query($db, "select * from restaurant WHERE location= '$loc'");
                                while ($rows = mysqli_fetch_array($ress)) {


                                    echo ' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
															<div class="entry-logo">
																<a class="img-fluid" href="dishes.php?res_id=' . $rows['rs_id'] . '" > <img src="admin/Res_img/' . $rows['image'] . '" alt="Food logo"></a> 
															</div>
															<!-- end:Logo -->
															<div class="entry-dscr">
																<h5><a href="dishes.php?res_id=' . $rows['rs_id'] . '" >' . $rows['title'] . '</a></h5> <span>' . $rows['address'] . ' <a href="#">...</a></span>
																<ul class="list-inline">
																	<li class="list-inline-item"><i class="fa fa-check"></i> Min BDT 1000</li>
																	<li class="list-inline-item"><i class="fa fa-motorcycle"></i> 30 min</li>
																</ul>
															</div>
															<!-- end:Entry description -->
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
																<div class="right-content bg-white">
																	<div class="right-review">
																		 <a href="dishes.php?res_id=' . $rows['rs_id'] . '" class="btn theme-btn-dash">View Menu</a> </div>
																</div>
																<!-- end:right info -->
															</div>';
                                }


                                ?>

                            </div>
                            <!--end:row -->
                        </div>



                    </div>



                </div>
            </div>
    </div>
    </section>

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>