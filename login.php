<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>login</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

	<link rel="stylesheet" href="css/login.css">

	<style type="text/css">
		#buttn {
			color: #fff;
			background-color: #ff3300;
		}
	</style>
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
	<link href="css/animsition.min.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">

</head>

<body>
	<?php
	include("connection/connect.php"); //INCLUDE CONNECTION
	error_reporting(0); // hide undefine index errors
	session_start(); // temp sessions
	if (isset($_POST['submit']))   // if button is submit
	{
		$username = $_POST['username'];  //fetch records from login form
		$password = $_POST['password'];

		if (!empty($_POST["submit"]))   // if records were not empty
		{
			$loginquery = "SELECT * FROM users WHERE username='$username' && password='" . md5($password) . "'"; //selecting matching records
			$result = mysqli_query($db, $loginquery); //executing
			$row = mysqli_fetch_array($result);

			if (is_array($row))  // if matching records in the array & if everything is right
			{
				$_SESSION["user_id"] = $row['u_id']; // put user id into temp session
				$_SESSION["location"] = $row['location'];
				$success = "Login Successful";
				header("refresh:1;url=index.php"); // redirect to index.php page

			} else {
				$message = "Invalid Username or Password!"; // throw error
			}
		}
	}
	?>
	<header id="header" class="header-scroll top-header headrom">
		<!-- .navbar -->
		<nav class="navbar navbar-light" style="background-color: #ffffff;">
			<div class="container">
				<button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
				<div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
					<ul class="nav navbar-nav">
						<li class="nav-item"> <a class="nav-link active" href="index.php" style="color: black;">Home <span class="sr-only">(current)</span></a> </li>
						<li class="nav-item"> <a class="nav-link active" href="restaurants.php" style="color: black;">Restaurants <span class="sr-only"></span></a> </li>


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
	<div class="container-fluid">
		<div class="pen-title">
			<br>
			<h1 style="color:black; font-style:italic;">Login Form</h1>
		</div>
		<!-- Form Module-->
		<div class="module form-module">
			<div class="toggle">

			</div>
			<div class="form">
				<center>
					<h2>Login to your account</h2>
				</center>
				<center>
					<div class="thumbnail"><img src="./admin/images/admin.png" /></div>
				</center>
				<center><span style="color:red;"><?php echo $message; ?></span></center>
				<center><span style="color:green;"><?php echo $success; ?></span></center>
				<form action="" method="post">
					<input type="text" placeholder="Username" name="username" />
					<input type="password" placeholder="Password" name="password" />
					<input type="submit" id="buttn" name="submit" value="Login" />
				</form>
			</div>

			<div class="cta">Not registered?<a href="registration.php" style="color:#f30;"> Create an account</a></div>
		</div>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>







</body>

</html>