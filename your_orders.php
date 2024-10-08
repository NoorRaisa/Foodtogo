<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION['user_id']))  //if usser is not login redirected baack to login page
{
	header('location:login.php');
} else {
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
		<style type="text/css" rel="stylesheet">
			table {
				width: 750px;
				border-collapse: collapse;
				margin: auto;

			}

			/* Zebra striping */
			tr:nth-of-type(odd) {
				background: #eee;
			}

			th {
				background: #ff3300;
				color: white;
				font-weight: bold;

			}

			td,
			th {
				padding: 10px;
				border: 1px solid #ccc;
				text-align: center;
				font-size: 14px;

			}

			/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
			@media only screen and (max-width: 760px),
			(min-device-width: 768px) and (max-device-width: 1024px) {

				table {
					width: 100%;
				}
			}
		</style>

	</head>

	<body>

		<!--header starts-->
		<header id="header" class="header-scroll top-header headrom">
			<!-- .navbar -->
			<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
				<div class="container">
					<button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
					<div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
						<ul class="nav navbar-nav">
							<li class="nav-item"> <a class="nav-link active" href="index.php" style="color: black;">Home <span class="sr-only">(current)</span></a> </li>
							<li class="nav-item"> <a class="nav-link active" href="restaurants.php" style="color: black;">Restaurants <span class="sr-only"></span></a> </li>

							<?php
							if (empty($_SESSION["user_id"])) {
								echo '<li class="nav-item"><a href="login.php" class="nav-link active"style="color: black;">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active"style="color: black;">Signup</a> </li>';
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

						<div class="col-xs-12 col-sm-12 col-md-12 ">
							<div class="bg-gray restaurant-entry">
								<div class="row">

									<table>
										<thead>
											<tr>

												<th>Item</th>
												<th>Quantity</th>
												<th>Price</th>
												<th>Status</th>
												<th>Date</th>
												<th>Action</th>

											</tr>
										</thead>
										<tbody>


											<?php
											// displaying current session user login orders 
											$query_res = mysqli_query($db, "select * from users_orders where u_id='" . $_SESSION['user_id'] . "'");
											if (!mysqli_num_rows($query_res) > 0) {
												echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
											} else {

												while ($row = mysqli_fetch_array($query_res)) {

											?>
													<tr>
														<td data-column="Item"> <?php echo $row['title']; ?></td>
														<td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
														<td data-column="price">BDT<?php echo $row['price']; ?></td>
														<td data-column="status">
															<?php
															$status = $row['status'];
															if ($status == "" or $status == "NULL") {
															?>
																<button type="button" class="btn btn-info" style="font-weight:bold;">Placed</button>
														<td data-column="Date"> <?php echo $row['date']; ?></td>
														<td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['o_id']; ?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
														</td>
													<?php
															}
															if ($status == "in process") { ?>
														<button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span>On the Way!</button>
														<td data-column="Date"> <?php echo $row['date']; ?></td>

													<?php
															}
															if ($status == "closed") {
													?>
														<button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true">Delivered</button>
														<td data-column="Date"> <?php echo $row['date']; ?></td>

													<?php
															}
													?>
													<?php
													if ($status == "rejected") {
													?>
														<button type="button" class="btn btn-danger"> <i class="fa fa-close"></i>Cancelled</button>
														<td data-column="Date"> <?php echo $row['date']; ?></td>

													<?php
													}
													?>






													</td>


													</tr>


											<?php }
											} ?>




										</tbody>
									</table>



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
<?php
}
?>