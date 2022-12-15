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
	<title> Kriteria </title>
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
			<h3>Kriteria</h3>
			<div class="box">
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="30px"> No </th>
							<th> Nama </th>
							<th> Atribut </th>
							<th> Bobot </th>
							<th width="250px"> Aksi </th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
				        <?php while ($row = mysqli_fetch_assoc($querykri)) : 
				        	$nb = $row["bobot"];?>
						<tr>
							<td> <?php echo $i;?> </td>
							<td> <?php echo $row['nm_kri'];?> </td>
							<td> <?php echo $row['atribut'];?> </td>
							<td> 
								<?php 
				            		if ($nb == 5) {
				            			echo "Sangat tinggi";
				            		}elseif ($nb == 4) {
				            			echo "Tinggi";
				            		}elseif ($nb == 3) {
				            			echo "Cukup";
				            		}elseif ($nb == 2) {
				            			echo "Rendah";
				            		}else{
				            			echo "Sangat rendah";
				            		}
				            	?>
				            </td>
							<td> 
								<a href="kriteria-details.php?kd_kri=<?= $row["kd_kri"];?>"><span id="details"><i class="fa-solid fa-pen-to-square"></i> Details </span></a>
								<a href="kriteria-edit.php?kd_kri=<?= $row["kd_kri"];?>"><span id="edit"><i class="fa-solid fa-pen-to-square"></i> Edit  </span></a>
								<a href="kriteria-hapus.php?kd_kri=<?= $row["kd_kri"];?>"><span id="hapus"><i class="fa-solid fa-trash"></i> Hapus </span></a>
							</td>
						</tr>
				        <?php $i++; ?>
				        <?php endwhile; ?>				        
					</tbody>
				</table>				
				<p><a href="kriteria-tambah.php"><span id="tambah"> <i class="fa-solid fa-plus"></i>  Tambah Data </span></a></p><br>
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