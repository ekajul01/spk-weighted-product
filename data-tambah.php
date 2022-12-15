<?php  
	session_start();
	require "function.php";
	if ($_SESSION['level'] != "admin") {
		header("location:login.php");
		exit;
	}
	$querykri = mysqli_query($conn, 'SELECT * FROM kriteria');
	$jml_kri = mysqli_num_rows($querykri);
	$querykd = mysqli_query($conn, 'SELECT * FROM data');
	$qdt = mysqli_fetch_assoc($querykd);
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
	<title> Data Tambah </title>
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
			<h3>Tambah Nilai Alternatif</h3>
			<?php $des = mysqli_query($conn, "SELECT nm_kri, deskripsi FROM kriteria"); 
			$no=1;?>
			<div class="box">
				<i class="fa-solid fa-circle-info"></i> Info !!!<br>
				<?php while($rd = mysqli_fetch_assoc($des)) { ?>
					<br>
					<p> <?php echo $rd['nm_kri']; ?> </p>
					<p> <?php echo $rd['deskripsi']; ?> </p>
				<?php $no++ ?>
				<?php } ?>
			</div>

			<div class="box">
				<form action="" method="post">
					<tr>
						<td> Alternatif </td>
						<?php $query1 = mysqli_query($conn, "SELECT * FROM alternatif"); ?>
						<td> 
							<select name="alt" class="input-control" required>
								<option value="">-- Pilih --</option>
								<?php
				                	foreach ($query1 as $row) {
				                ?>
							  	<option value="<?= $row["kd_alt"];?>"> <?= $row["nm_alt"];?></option>
							  	<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td> Kriteria </td>
						<?php $query2 = mysqli_query($conn, "SELECT * FROM kriteria"); ?>
						<td> 
							<select name="kri" class="input-control" required>
								<option value="">-- Pilih --</option>
								<?php
				                	foreach ($query2 as $row) {
				                ?>
							  	<option value="<?= $row["kd_kri"];?>"> <?= $row["nm_kri"];?></option>
							  	<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td> Nilai </td>
						<td> <input type="text" name="nilai_data" class="input-control"></td>
					</tr>
				<button type="submit" name="submit" class="tambah">Simpan</button>
			</div>
		</div>
	</div>

	<!-- php -->
		<?php 		
			if (isset($_POST['submit'])) {
				$alt = $_POST['alt'];
				$kri = $_POST['kri'];
				$ndt = $_POST['nilai_data'];
				$dataa = mysqli_query($conn, "INSERT INTO data
						VALUES ('',
								'$alt',
								'$kri',
								'$ndt')");
				echo "
					<script>
				    	alert('data berhasil ditambahkan!');
				        document.location.href = 'alternatif.php';
				    </script>
				";
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