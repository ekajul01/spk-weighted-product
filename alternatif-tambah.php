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
	<title> Alternatif Tambah </title>
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
			<h3>Alternatif Tambah</h3>
			<div class="box">
				<form method="post" action="">
					<p style="margin-bottom: 5px;">Nama Alternatif</p>
					<input type="text" name="nm" class="input-control" required>

					<p style="margin-bottom: 5px;">Alamat</p>
					<input type="text" name="almt" class="input-control" required>

					<p style="margin-bottom: 5px;">No Telepon</p>
					<input type="text" name="notelp" class="input-control" required>

					<button type="submit" name="submit" class="tambah"> Tambah Data</button>
				</form>				
			</div>
		</div>
	</div>

	<!-- php -->
		<?php  
			if (isset($_POST['submit'])) {
				$alt = mysqli_query($conn, "INSERT INTO alternatif
					VALUES('', 
							'".$_POST['nm']."',
							'".$_POST['almt']."',
							'".$_POST['notelp']."') ");
				if($alt){
					echo "
					    <script>
					    	alert('data berhasil ditambahkan!');
					        document.location.href = 'tambah.php';
					    </script>
					";

				}else{
					echo "
					    <script>
					        alert('data gagal ditambahkan!');
					        document.location.href = 'alternatif.php';
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