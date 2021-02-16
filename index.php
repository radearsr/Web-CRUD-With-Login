<?php 

session_start();

	include("web_page/konek_login.php");
	include("web_page/functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{

			//read from database
			$query = "select * from users where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: web_page/index_data.php");
						die;
					}
				}
			}
			
			echo "        
        <script>
          alert('Password Atau Alamat Email Yang Anda Masukkan Salah');
        </script>
        ";
      
		}else
		{
			echo '      
        <script>
          alert("Password Atau Alamat Email Yang Anda Masukkan Salah");
        </script>
      ';      
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
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
    <div class="container-login100" style="background-color:#EBEDEF;">
      <div class="wrap-login100">
        <form class="login100-form validate-form" method="post">
          <span class="login100-form-logo">
            <img src="web_page/assets/images/ft_profile.jpg" alt="" width="72" height="80">
          </span>

          <div class="wrap-input100 validate-input">
            <input class="input100" type="email" name="email" autocomplete="off" placeholder="Alamat Email">
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
          </div>

          <div class="wrap-input100 validate-input">
            <input class="input100" type="password" name="password" autocomplete="off" placeholder="Password">
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
          </div>
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
              Login
            </button>
          </div>
          <div class="text-center p-t-90">
            <p class="txt1">
              Anda Belum Memiliki Akun?
              <style type="text/css">
                .clrmode{
                  color: #EBEDEF;
                  font-weight: bold;
                }
                a:hover{
                  color: #282923;
                }
              </style>
              <a class="clrmode" href="signup.php">
                 Daftar
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