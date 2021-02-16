<?php 

session_start();

  include("konek_db_admin.php");
  include("fungsi_db_admin.php");


  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_GET['id']))
  {
    //something was posted
    $id = $_GET['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password))
    {

      //read from database
      $query = "select * from admin where username = '$username' limit 1";
      $result = mysqli_query($konek, $query);

      if($result)
      {
        if($result && mysqli_num_rows($result) > 0)
        {

          $data_admin = mysqli_fetch_assoc($result);
          
          if($data_admin['password'] === $password)
          {

            $_SESSION['id'] = $data_admin['id'];
            echo "<center><h1>KLIK LANJUT UNTUK EDIT</h1></center>";
            echo "<center><a class='btn btn-success' href='index_data.php?page=edit_dt_admin&id=".$id."'>LANJUT</a></center>";           
            die;
          }
        }
      }
      
      echo "        
        <script>
          alert('Username Atau Password Salah');
        </script>
        ";
      
    }else
    {
      echo '      
        <script>
          alert("Username Atau Password Salah");
        </script>
      ';      
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" href="web_page/assets/images/ft_profile.jpg">    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="assets_login_admin/css/bootstrap.min.css">

    <link href="assets_login_admin/css/signin.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="post">
    <center><h1>Halaman Khusus ADMIN</h1></center>    
    <label for="inputEmail" class="visually-hidden">Username</label>
    <input name="username" type="text" autocomplete="off" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input name="password" type="password" autocomplete="off" id="inputPassword" class="form-control" placeholder="Password" required>
    <br>
    <button class="w-100 btn btn-lg btn-primary"  type="submit">
      LOGIN
    </button>
    <br>
    <a class="w-100 btn btn-lg btn-warning" href="index_data.php?page=tmp_revisi">Kembali</a>
  </form>
</main>


    
  </body>
</html>
