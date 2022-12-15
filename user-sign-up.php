<?php 
	require "function.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<title> Daftar Akun </title>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href=""> Kelompok 6 </h1>
			<ul>
				<li><a href="landing.php"> Halaman Depan </a></li>
				<li><a href="login.php"> Login </a></li>
				<li><a href="about-us.php"> About Us </a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<span id="signup">
		<div class="signup">
			<h2> Create Account </h2>
			<form method="post" action="">
				<p style="margin-bottom: 5px;">Nama</p>
				<input type="text" name="nama" placeholder="masukkan nama" class="input-control">

				<p style="margin-bottom: 5px;">Alamat</p>
				<input type="text" name="alamat" placeholder="masukkan alamat" class="input-control">

				<p style="margin-bottom: 5px;">No Telepon</p>
				<input type="text" name="notelp" placeholder="masukkan nomor telepon" class="input-control">

				<p style="margin-bottom: 5px;">Username</p>
				<input type="text" name="user" placeholder="masukkan username" class="input-control">

				<p style="margin-bottom: 5px;">Password</p>
				<input type="password" name="pass" placeholder="masukkan password" class="input-control">

				<button type="submit" name="daftar" class="btn"> Sign Up </button>
				<p style="margin-top: 10px; text-align: center;"> Sudah punya akun? <a href="login.php" style="color: #EA716D;"> Login </a></p>
			</form>
		</div>		
	</span>

	<!-- php -->
	<?php  
		if (isset($_POST['daftar'])) {
			$pelanggan = mysqli_query($conn, "INSERT INTO user
				VALUES('".$_POST['nama']."', 
						'".$_POST['alamat']."',
						'".$_POST['notelp']."', 
						'".$_POST['user']."',
						'".$_POST['pass']."',
						'user') ");
			if($pelanggan){
				echo "
				    <script>
				    	alert('daftar akun telah berhasil!');
				        document.location.href = 'login.php';
				    </script>
				";

			}else{
				echo "
				    <script>
				        alert('daftar akun gagal!' die($conn->error);
				        document.location.href = 'login.php';
				    </script>
				";
			}
		}
	?>

	<!-- footer -->
	<footer>
		<div class="container">
			<small> Copyright &copy; SPK Kelompok 6</small>
		</div>
	</footer>
</body>
</html>