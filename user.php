<?php  
	session_start();
	require "function.php";
	if ($_SESSION['level'] != "admin") {
		header("location:login.php");
		exit;
	}
	$queryusr = mysqli_query($conn, 'SELECT * FROM user WHERE level = "user"');
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
	<title> Daftar User </title>
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
			<h3>User</h3>
			<div class="box">
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="30px"> No </th>
							<th> Nama </th>
							<th> Alamat </th>
							<th> No telepon </th>
							<th> Username </th>
							<th> Password </th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
				        <?php while ($row = mysqli_fetch_assoc($queryusr)) : ?>
						<tr>
							<td> <?php echo $i; ?> </td>
							<td> <?php echo $row['nama'];?> </td>
							<td> <?php echo $row['alamat'];?> </td>
							<td> <?php echo $row['notelp'];?> </td>
							<td> <?php echo $row['username'];?> </td>
							<td> <?php echo $row['password'];?> </td>
						</tr>
						<?php $i++; ?>
				        <?php endwhile; ?>				        
					</tbody>
				</table>				
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