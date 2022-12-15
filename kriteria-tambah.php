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
	<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
	<title> Kriteria Tambah </title>
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
			<h3>Kriteria Tambah</h3>
			<div class="box">
				<form method="post" action="">
					<p style="margin-bottom: 5px;">Nama Kriteria</p>
					<input type="text" name="nm" class="input-control" required>
					
					<p style="margin-bottom: 5px;">Atribut</p>
					<select name="at" class="input-control" required>
						<option value=""> -- Pilih -- </option>
						<option value="Benefit"> Benefit </option>
						<option value="Cost"> Cost </option>
					</select>
					
					<p style="margin-bottom: 5px;">Bobot</p>
					<select name="bbt" class="input-control" required>
						<option value=""> -- Pilih -- </option>
						<option value="1"> Sangat Rendah </option>
						<option value="2"> Rendah </option>
						<option value="3"> Cukup </option>
						<option value="4"> Tinggi </option>
						<option value="5"> Sangat Tinggi </option>
					</select>

					<p style="margin-bottom: 5px;">Deskripsi</p>
					<textarea name="deskripsi" class="input-control" required></textarea><br>
					<button type="submit" name="submit" class="tambah"> Tambah Data</button>
				</form>				
			</div>
		</div>
	</div>

	<!-- php -->
		<?php  
			if (isset($_POST['submit'])) {
				$kriteria = mysqli_query($conn, "INSERT INTO kriteria
					VALUES('', 
							'".$_POST['nm']."',
							'".$_POST['at']."',
							'".$_POST['bbt']."',
							'".$_POST['deskripsi']."') ");
				if($kriteria){
					echo "
					    <script>
					    	alert('data berhasil ditambahkan!');
					        document.location.href = 'kriteria.php';
					    </script>
					";

				}else{
					echo "
					    <script>
					        alert('data gagal ditambahkan!');
					        document.location.href = 'kriteria.php';
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
	<script>
        CKEDITOR.replace( 'deskripsi' );
    </script>		
</body>
</html>