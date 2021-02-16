<?php 
session_start();

	include("web_page/konek_login.php");
	include("web_page/functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
	
		$firstname 	  = $_POST['firstname'];
		$lastname 	  = $_POST['lastname'];
		$email 		  = $_POST['email'];
		$password     = $_POST['password'];
		$nama_lengkap = $firstname." ".$lastname;

		if(!empty($nama_lengkap) && !empty($password) && !is_numeric($nama_lengkap))
		{

			//Menyimpan Data Sign up Ke Database
			$user_id = random_num(20);
			$query = "insert into users (user_id,nama_lengkap,email,password) values ('$user_id','$nama_lengkap','$email','$password')";

			mysqli_query($con, $query);

			header("Location: index.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>SignUp</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="web_page/assets-login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="web_page/assets-login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="web_page/assets-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="web_page/assets-login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="web_page/assets-login/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="web_page/assets-login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="web_page/assets-login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="web_page/assets-login/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="web_page/assets-login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="web_page/assets-login/css/util.css">
  <link rel="stylesheet" type="text/css" href="web_page/assets-login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

<div class="limiter">
		<div class="container-login100" style="background-color:#ECECEC;">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-34 p-t-27">
						Form Daftar
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<label style="color:#EBEDEF;">Nama Depan</label>
						<input class="input100" type="text" name="firstname">
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<label style="color:#EBEDEF;">Nama Belakang</label>
						<input class="input100" type="text" name="lastname">
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<label style="color:#EBEDEF;">Alamat Email</label>
						<input class="input100" type="email" name="email">
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<label style="color:#EBEDEF;">Password</label>
						<input class="input100" type="password" name="password">
					</div>

		          	<div class="container-login100-form-btn">
			            <button class="login100-form-btn" type="submit">
			              Daftar
			            </button>
			         </div>
		          	<div class="text-center p-t-90">
		          		<p class="txt1">
		          			Anda Sudah Memiliki Akun?
		          			<style type="text/css">
		          				.clrmode{
		          					color: #EBEDEF;
		          					font-weight: bold;
		          				}
		          				a:hover{
		          					color: #282923;
		          				}
		          			</style>
		          			<a class="clrmode" href="index.php">
		          			   Login
		          			</a>
		          		</p>
		          	</div>
				</form>
			</div>
		</div>
	</div>

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="web_page/assets-login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="web_page/assets-login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="web_page/assets-login/vendor/bootstrap/js/popper.js"></script>
  <script src="web_page/assets-login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="web_page/assets-login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="web_page/assets-login/vendor/daterangepicker/moment.min.js"></script>
  <script src="web_page/assets-login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="web_page/assets-login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="web_page/assets-login/js/main.js"></script>

</body>
</html>




<!-- <!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link type="icon" href="web_page/assets/images/ft_profile.jpg">
	<link rel="stylesheet" type="text/css" href="web_page/assets-login/css/bootstrap.min.css">
</head>
<body>

<form  method="post">
		<div class="container">

			<div calss="row">
				
					<h1> Daftar </h1>
					<p>Isi Kolom Berikut Dengan Lengkap</p>
					<hr class="mb-3">
					<label for="firstname"><p>Nama Depan</p></label>
					<input class="form-control" id="firstname" type="text" name="firstname" required>

					<label for="lastname"><p>Nama Belakang</p></label>
					<input class="form-control" id="lastname" type="text" name="lastname" required>

					<label for="email"><p>Alamat Email</p></label>
					<input class="form-control" id="email" type="email" name="email" required>

					<label for="password"><p>Password</p></label>
					<input class="form-control" id="password" type="password" name="password" required>
					<hr class="mb-3">
					<input class="w-100 btn-lg btn btn-primary" type="submit" id="register" name="create" value="Sign Up">

				<p>Anda Sudah Memiliki Akun?  <a class="link" href="index.php">Login</a></p>
			</div>
		</div>
	</form>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
	$(function(){
		$('#button').click(function(){
		Swal.fire(
		  'Good job!',
		  'You clicked the button!',
		  'success'
		)
		});

	});

</script>
</html> -->