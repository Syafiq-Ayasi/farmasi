<?php 

ob_start();
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi=new mysqli("localhost","root","","farmasi");

if($_SESSION['admin'] || $_SESSION['petugas'] || $_SESSION['dokter'] || $_SESSION['apoteker'] || $_SESSION['adminapoteker']){
        header("location:index.php");
    }else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Praktik Dokter | Login</title>
<link rel="icon" href="images/logo1.png" type="image/x-icon">

<!-- Font Icon -->
<link rel="stylesheet"
	href="fonts/material-icon/css/material-design-iconic-font.min.css">

<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
<!-- Sweet Alert -->
<link rel="stylesheet" href="assets/sweet_alert/sweetalert2.min.css">

</head>
<body>

	<div class="main">

		<!-- Sing in  Form -->
		<section class="sign-in">
			<div class="container">
				<div class="signin-content">
					<div class="signin-image">
						<figure>
							<img src="images/medical3.png" alt="sing up image">
						</figure>
					</div>

					<div class="signin-form">
						<h3 class="text-center">SIM Praktik Dokter</h3>
						<h3 class="form-title">Login</h3>
						<form method="POST" id="sign_in" class="register-form">
							<div class="form-group">
								<label for="username"><i
									class="zmdi zmdi-account material-icons-name"></i></label> <input
									type="text" name="username" id="username"
									placeholder="Username" required />		
							</div>

							<div class="form-group">
								<label for="password"><i class="zmdi zmdi-lock"></i></label> <input
									type="password" name="password" id="password"
									placeholder="Password" required/>
							</div>
							<div class="form-group">
								<input type="checkbox" name="remember-me" id="remember-me"
									class="agree-term" /> <label for="remember-me"
									class="label-agree-term"><span><span></span></span>Remember
									me</label>
							</div>
							<div class="form-group form-button">
								<input type="submit" name="login" id="login"
									class="form-submit" value="Log in" />
									
							</div>
						</form>
						<div class="social-login">
							<span class="social-label">Or login with</span>
							<ul class="socials">
								<li><a href="#"><i
										class="display-flex-center zmdi zmdi-facebook"></i></a></li>
								<li><a href="#"><i
										class="display-flex-center zmdi zmdi-twitter"></i></a></li>
								<li><a href="#"><i
										class="display-flex-center zmdi zmdi-google"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>

	<!-- JS -->
	<!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- Sweet Alert -->
<script src="assets/sweet_alert/sweetalert2.min.css"></script>


</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<?php

    if(isset($_POST['login'])){
        $username =mysqli_real_escape_string($koneksi,$_POST['username']);
        $password =mysqli_real_escape_string($koneksi,$_POST['password']);
        //$username = $_POST['username'];
        //$password = $_POST['password'];

        $sql=$koneksi->query("select * from tb_pengguna where username='$username' and password='$password'");
        $data=$sql->fetch_assoc();
        $ketemu=$sql->num_rows;

        if ($ketemu >=1){
            session_start();
				$userglobal=$data['level'];
				
            if($data['level']=="admin"){
                $_SESSION['admin']=$data['id'];
                header("location:index.php");
            }else if($data['level']=="petugas"){
                $_SESSION['petugas']=$data['id'];
                header("location:index.php");
            }else if($data['level']=="dokter"){
                $_SESSION['dokter']=$data['id'];
                header("location:index.php");
            }else if($data['level']=="apoteker"){
                $_SESSION['apoteker']=$data['id'];
                header("location:index.php");
            }else if($data['level']=="adminapoteker"){
                $_SESSION['adminapoteker']=$data['id'];
                header("location:index.php");
            }
        }else{
            ?>
			
			<script>
				Swal.fire({
					icon: 'error',
					title:'EROR!!!',
					text: 'Password atau Username yang Anda Inputkan Salah',
					
				})
			</script>
	</body>
</html>
            <?php
        }

    }
?>

<?php 

    }

?>

