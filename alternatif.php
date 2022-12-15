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
	<title> Alternatif </title>
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
			<h3>Daftar Alternatif</h3>
			<div class="box">
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="50px"> Kode </th>
							<th> Nama Alternatif </th>
							<th> Alamat </th>
							<th> No telepon </th>
							<th width="200px"> Aksi </th>
						</tr>
					</thead>
					<tbody>
				        <?php while ($row = mysqli_fetch_assoc($queryalt)) : ?>
						<tr>
							<td> <?php echo $row['kd_alt'];?> </td>
							<td> <?php echo $row['nm_alt'];?> </td>
							<td> <?php echo $row['alamat_alt'];?> </td>
							<td> <?php echo $row['notelp_alt'];?> </td>
							<td> 
								<a href="alternatif-edit.php?kd_alt=<?= $row["kd_alt"];?>"><span id="edit"><i class="fa-solid fa-pen-to-square"></i> Edit  </span></a>
								<a href="alternatif-hapus.php?kd_alt=<?= $row["kd_alt"];?>"><span id="hapus"><i class="fa-solid fa-trash"></i> Hapus </span></a>
							</td>
						</tr>
				        <?php endwhile; ?>				        
					</tbody>
				</table>				
				<p><a href="alternatif-tambah.php"><span id="tambah"> <i class="fa-solid fa-plus"></i>  Tambah Alternatif </span></a></p><br>
			</div>

			<h3>Nilai Alternatif</h3>
			<div class="box">
				<table border="1" cellspacing="0" class="table">
					<?php $kd = mysqli_query($conn, "SELECT kd_data, nm_alt, nm_kri, nilai 
						FROM data a, kriteria b, alternatif c 
						WHERE a.kd_alt = c.kd_alt
						AND a.kd_kri = b.kd_kri "); 
					?>
					<thead>
						<tr>
							<th width="50px"> No </th>
							<th> Alternatif </th>
							<th> Kriteria </th>
							<th> Nilai </th>
							<th width="200px"> Aksi </th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1;?>
				        <?php while ($row = mysqli_fetch_assoc($kd)) : ?>
						<tr>
							<td> <?php echo $i;?> </td>
							<td> <?php echo $row['nm_alt'];?> </td>
							<td> <?php echo $row['nm_kri'];?> </td>
							<td> <?php echo $row['nilai'];?> </td>
							<td> 
								<a href="data-edit.php?kd_data=<?= $row["kd_data"];?>"><span id="edit"><i class="fa-solid fa-pen-to-square"></i> Edit  </span></a>
								<a href="data-hapus.php?kd_data=<?= $row["kd_data"];?>"><span id="hapus"><i class="fa-solid fa-trash"></i> Hapus </span></a>
							</td>
						</tr>
						<?php $i++ ?>
				        <?php endwhile; ?>				        
					</tbody>
				</table>				
				<p><a href="data-tambah.php"><span id="tambah"> <i class="fa-solid fa-plus"></i>  Tambah Nilai Alternatif </span></a></p><br>
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