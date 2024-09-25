<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed
$loc=$_SESSION["location"]
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
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="home">

    <!--header starts-->
    <header id="header" class="header-scroll top-header headrom">
        <!-- .navbar -->
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php"style="color: black;" >Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php"style="color: black;">Restaurants <span class="sr-only"></span></a> </li>
                            
                        
							<?php
                            if (empty($_SESSION["user_id"])) // if user is not login
                            {
                                echo '<li class="nav-item"><a href="login.php" class="nav-link active"style="color: black;">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active"style="color: black;">Signup</a> </li>';
                            } else {
                                //if user is login

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
    <!-- banner part starts -->
    <section class="hero bg-image" data-image-src="images/img/main.jpeg">
        <div class="hero-inner">
            <div class="container text-center hero-text font-white">
                <h1>Order Delivery & Take-Out </h1>


            </div>
        </div>
        <!--end:Hero inner -->
    </section>
    <!-- banner part ends -->



    <!-- Popular block starts -->
    <section class="popular">
        <div class="container-fluid">
            <div class="title text-xs-center m-b-30">
                <h2>Popular Dishes of the Month</h2>
                <p class="lead">The easiest way to your favourite food</p>
            </div>
            <div class="row">



                <?php
                // fetch records from database to display popular first 3 dishes from table
                $query_res = mysqli_query($db, "select restaurant.rs_id,restaurant.title as t1,dishes.title as t2,slogan,price,img from dishes INNER JOIN restaurant on dishes.rs_id=restaurant.rs_id where restaurant.location='$loc' LIMIT 3");
                while ($r = mysqli_fetch_array($query_res)) {

                    echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
														<div class="food-item-wrap">
															   <div class="figure-wrap bg-image" data-image-src="admin/Res_img/dishes/' . $r['img'] . '">
																<div class="distance"><i class="fa fa-pin"></i>1240m</div>
																<div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
																<div class="review pull-right"><a href="#">198 reviews</a> </div>
															</div>
															<div class="content">
																<h5><a href="dishes.php?res_id=' . $r['rs_id'] . '">' . $r['t1'] . '</a></h5>
                                                                <div class="product-name">' . $r['t2'] . '</div>
																<div class="product-name">' . $r['slogan'] . '</div>
																<div class="price-btn-block"> <span class="price">BDT' . $r['price'] . '</span> <a href="dishes.php?res_id=' . $r['rs_id'] . '" class="btn theme-btn-dash pull-right">Order Now</a> </div>
															</div>
															
														</div>
												</div>';
                }


                ?>

            </div>
        </div>

        <!-- How it works block ends -->
        <!-- Featured restaurants starts -->
        <section class="featured-restaurants">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="title-block pull-left">
                            <h4>Featured restaurants</h4>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <!-- restaurants filter nav starts -->
                        <div class="restaurants-filter pull-right">
                            <nav class="primary pull-left">
                                <ul>
                                    <li><a href="#" class="selected" data-filter="*">all</a> </li>
                                    <?php
                                    // display categories here    ///shob categor show
                                    $res = mysqli_query($db, "select * from res_category");
                                    while ($row = mysqli_fetch_array($res)) {
                                        echo '<li><a href="#" data-filter=".' . $row['c_name'] . '"> ' . $row['c_name'] . '</a> </li>';
                                    }
                                    ?>

                                </ul>
                            </nav>
                        </div>
                        <!-- restaurants filter nav ends -->
                    </div>
                </div>
                <!-- restaurants listing starts -->
                <div class="row">
                    <div class="restaurant-listing">


                        <?php  //fetching records from table and filter using html data-filter tag  ////category choose kore resturant show
                        $ress = mysqli_query($db, "select * from restaurant WHERE location='$loc'");
                        while ($rows = mysqli_fetch_array($ress)) {
                            // fetch records from res_category table according to catgory ID
                            $query = mysqli_query($db, "select * from res_category where c_id='" . $rows['c_id'] . "' ");
                            $rowss = mysqli_fetch_array($query);

                            echo ' <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant all ' . $rowss['c_name'] . '">
														<div class="restaurant-wrap">
															<div class="row">
																<div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
																	<a class="restaurant-logo" href="dishes.php?res_id=' . $rows['rs_id'] . '" > <img src="admin/Res_img/' . $rows['image'] . '" alt="Restaurant logo"> </a>
																</div>
																<!--end:col -->
																<div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
																	<h5><a href="dishes.php?res_id=' . $rows['rs_id'] . '" >' . $rows['title'] . '</a></h5> <span>' . $rows['address'] . '</span>
																	<div class="bottom-part">
																		<div class="cost"><i class="fa fa-check"></i> Min BDT 10,00</div>
																		<div class="mins"><i class="fa fa-motorcycle"></i> 30 min</div>
																		<div class="ratings"> <span>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star-o"></i>
																			</span> (122) </div>
																	</div>
																</div>
																<!-- end:col -->
															</div>
															<!-- end:row -->
														</div>
														<!--end:Restaurant wrap -->
													</div>';
                        }


                        ?>




                    </div>
                </div>
                <!-- restaurants listing ends -->

            </div>
        </section>


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