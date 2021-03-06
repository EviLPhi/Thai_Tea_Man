<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="assets\img\favicon.ico">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aplikasi Thai Tea Man </title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/login.css">
</head>
 
<body>
	<!-- Pesan dari proses login -->
	<?php 
	session_start();
	if(isset($_SESSION['jabatan'])){
		if ($_SESSION['jabatan'] == 'kasir') {
			header('Location:./petugas/index.php');
		}
		elseif($_SESSION['jabatan'] == 'admin'){
			header('Location: ./admin/index.php');
		}
	}

	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo '<script language="javascript">alert("Login gagal! username dan password salah!")</script>';
		}else if($_GET['pesan'] == "logout"){
			echo '<script language="javascript">alert("Anda telah berhasil logout")</script>';
		}else if($_GET['pesan'] == "belum_login"){
			echo '<script language="javascript">alert("Anda harus login")</script>';
		}
	}
	?>
<div class="wrapper fadeInDown">
  <div id="formContent">
	  <br><br>
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="assets\img\Logo_Full.svg" id="icon" alt="User Icon" />
	</div>

    <!-- Login Form -->
    <form action="proses/login-proses.php" method="POST" autocomplete="off">
	  <input type="text" id="login" class="fadeIn second" name="nama" placeholder="Username" autofocus required>
	  <input type="password" id="password" class="fadeIn third validate" name="password" placeholder="password" required>	
	  <span toggle="#password" class="fadeIn third fa fa-fw fa-eye field-icon toggle-password"></span>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <!-- <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div> -->

  </div>
</div>
</body>

<!-- <body class="login">
	<div class="card w-50 mx-auto mt-5"><a href="utama.php"></a>
	
		<h5 class="card-header">Login</h5>
		
		<div class="card-body">
			<form action="proses/login-proses.php" method="POST" autocomplete="off">
				<div class="form-group">
					<label for="nama">Username</label>
					<input type="text" name="nama" class="form-control" placeholder="Username" autofocus>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-primary btn-block">Masuk</button>
			</form>
		</div>
		</div>
	
</body> -->
<script>
$('.toggle-password').on('click', function() {
  $(this).toggleClass('fa-eye fa-eye-slash');
  let input = $($(this).attr('toggle'));
  if (input.attr('type') == 'password') {
    input.attr('type', 'text');
  }
  else {
    input.attr('type', 'password');
  }
});
</script>
</html>