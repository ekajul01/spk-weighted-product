<?php  
	session_start();
	require "function.php";
	if ($_SESSION['level'] != "admin") {
		header("location:login.php");
		exit;
	}
	$querykri = mysqli_query($conn, 'SELECT * FROM kriteria');
	$jml_kri = mysqli_num_rows($querykri);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font/css/all.css">
	<title> Kriteria Details </title>
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
			<h3>Kriteria Details</h3>
			<div class="box">
				<?php
				    $data_view= mysqli_query($conn, "SELECT * FROM kriteria WHERE kd_kri = '".$_GET['kd_kri']."' ");
				    $row = mysqli_fetch_array($data_view);
			    ?>

			    <p style="margin-bottom: 5px;">Kode Kriteria</p>
				<input type="text" name="kd" class="input-control" value="<?php echo $row['kd_kri']?>" readonly>

				<p style="margin-bottom: 5px;">Nama Kriteria</p>
				<input type="text" name="nm" class="input-control" value="<?php echo $row['nm_kri']?>" readonly>
				
				<p style="margin-bottom: 5px;">Atribut</p>
				<input type="text" name="at" class="input-control" value="<?php echo $row['atribut']?>" readonly>
				
				<p style="margin-bottom: 5px;">Bobot</p>
				<input type="text" name="bbt" class="input-control" value="<?php echo $row['bobot']?>" readonly>

				<p style="margin-bottom: 5px;">Deskripsi</p>
				<textarea class="input-control" rows="10"readonly> <?php echo $row['deskripsi']?> </textarea>
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