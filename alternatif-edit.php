<?php  
	session_start();
	require "function.php";
	if ($_SESSION['level'] != "admin") {
		header("location:login.php");
		exit;
	}
	$queryalt = mysqli_query($conn, 'SELECT * FROM alternatif');
	$jml_alt = mysqli_num_rows($queryalt);
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
	<title> Alternatif Edit </title>
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
			<h3>Alternatif Edit</h3>
			<div class="box">
				<?php
				    $data_edit= mysqli_query($conn, "SELECT * FROM alternatif WHERE kd_alt = '".$_GET['kd_alt']."' ");
				    $row = mysqli_fetch_array($data_edit);
			    ?>
			    <form action="" method="post">
				    <p style="margin-bottom: 5px;">Kode Alternatif</p>
					<input type="text" name="kd_alt" class="input-control" value="<?php echo $row['kd_alt']?>" readonly>

					<p style="margin-bottom: 5px;">Nama Alternatif</p>
					<input type="text" name="nm" class="input-control" value="<?php echo $row['nm_alt']?>" required>

					<p style="margin-bottom: 5px;">Alamat</p>
					<input type="text" name="almt" class="input-control" value="<?php echo $row['alamat_alt']?>" required>

					<p style="margin-bottom: 5px;">No Telepon</p>
					<input type="text" name="notelp" class="input-control" value="<?php echo $row['notelp_alt']?>" required>
					
					<button type="submit" name="edit" class="edit"> Ubah Data</button>
			    </form>
			</div>
		</div>
	</div>

	<!-- php -->
		<?php 
			if(isset($_POST['edit'])){
				$update = mysqli_query($conn, "UPDATE alternatif SET
						   	nm_alt = '".$_POST['nm']."', 
						   	alamat_alt = '".$_POST['almt']."',
						   	notelp_alt = '".$_POST['notelp']."'
					    WHERE kd_alt = '".$_GET['kd_alt']."' ");
				if($update){
					echo "
					    <script>
					        alert('data berhasil diubah!');
					        document.location.href = 'alternatif.php';
					    </script>
					";

				}else{
					echo "
					    <script>
					        alert('data gagal diubah!');
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