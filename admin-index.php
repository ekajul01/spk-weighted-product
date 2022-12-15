<?php  
	session_start();
	require "function.php";
	if ($_SESSION['level'] != "admin") {
		header("location:login.php");
		exit;
	}
	$querykri = mysqli_query($conn, 'SELECT * FROM kriteria');
	$queryalt = mysqli_query($conn, 'SELECT * FROM alternatif');
	$queryusr = mysqli_query($conn, 'SELECT * FROM user WHERE level ="user"');
	$jml_kri = mysqli_num_rows($querykri);
	$jml_alt = mysqli_num_rows($queryalt);
	$jml_usr = mysqli_num_rows($queryusr);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font/css/all.css">
	<title> Dashboard </title>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href=""> Kelompok 6 </h1>
			<ul>
				<li><a href="admin-index.php"> Dashboard </a></li>
				<li><a href="kriteria.php"> Data Kriteria </a></li>
				<li><a href="alternatif.php"> Data Alternatif </a></li>				
				<li><a href="user.php"> Data User </a></li>					
				<li><a href="hasil-seleksi.php"> Hasil Seleksi </a></li>
				<li><a href="admin-change-password.php"> Ubah Password </a></li>
				<li><a href="admin-logout.php"> Logout </a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Dashboard</h3>
			<div class="box">
				<div class="col-3">
					<div class="panel-header">						
						<h3><i class="fa-solid fa-file-pen"></i> Daftar Kriteria </h3>
						<hr>
					</div>
					<div class="panel-body">
						<p><?php echo $jml_kri?></p>
						<hr>
					</div>
					<div class="panel-footer">
						<a href="kriteria.php"> Tabel Kriteria >> </a>
					</div>
				</div>
				<div class="col-3">
					<div class="panel-header">
						<h3><i class="fa-solid fa-file-contract"></i> Daftar Alternatif</h3>
						<hr>
					</div>
					<div class="panel-body">
						<p><?php echo $jml_alt?></p>
						<hr>
					</div>
					<div class="panel-footer">
						<a href="alternatif.php"> Tabel Alternatif >> </a>
					</div>
				</div>
				<div class="col-3">
					<div class="panel-header">
						<h3><i class="fa-solid fa-users"></i> Daftar User</h3>
						<hr>
					</div>
					<div class="panel-body">
						<p><?php echo $jml_usr?></p>
						<hr>
					</div>
					<div class="panel-footer">	
						<a href="user.php"> Tabel User >> </a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small> Copyright &copy; SPK Kelompok 6</small>
		</div>
	</footer>
</body>
</html>