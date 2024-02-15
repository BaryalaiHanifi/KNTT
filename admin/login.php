<?php include('../config/constants.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Recipe Website-login</title>
	<link rel="stylesheet" type="text/css" href="../css/backend.css">
	<link rel="stylesheet" type="text/css" href="../css/frontend.css">
</head>
<body style="background-image:
       linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
       url(../images/contact-back.webp);
       height: 60vh;
       background-size: cover;
       background-position: center;
       color: white;">

	<div class="login">
		<h1 class="text-center">Login</h1><br>
		<?php
		if (isset($_SESSION['login'])){
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		}if (isset($_SESSION['no-login-message'])){
			echo $_SESSION['no-login-message'];
			unset($_SESSION['no-login-message']);
		}
		
		?>
	
		<!--start login-->
		<div class="contact-form">
        <form id="contact-form" method="post" action="">
            <input type="text" name="username" class="form-control" placeholder="Your username..." required>
            <br>
            <input type="password" name="password" class="form-control" placeholder="Your password..." required>
            <br>
            <input type="submit" name="submit" class="form-control submit" value="Enter">
            <br>
            </form>
       </div>
		<!--end login-->
		<p class="text-center">Created by-Baryalai Hanifi & Kadija Amiri</p>
	</div>
</body>
</html>
<?php
	//check whether the submit button is clicked or not
	if (isset($_POST['submit'])) {
		//process for form
		//1.get data from the form
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		//2.write query
		$sql="SELECT * FROM tbl_admin WHERE
			username='$username' AND password='$password'";
		//execute query
		$result = mysqli_query($conn,$sql);
		//3.check whether the user exists or not
		$count=mysqli_num_rows($result);
		if ($count==1)
		{
			//user is availabe
			$_SESSION['login'] = "<div class='success'>Logged in successfully...</div>";
			$_SESSION['user'] = $username;//check whether the user is logged in or not logout will unset it
			//redirect to home page/dashboard
			header('location:'.SITEURL.'admin/index.php');
		}else{

			//user is not availabele
			$_SESSION['login'] = "<div class='error text-center'>Username or password did not match...</div>";
			//redirect to home page/dashboard
			header('location:'.SITEURL.'admin/login.php');

		}
	}




  ?>