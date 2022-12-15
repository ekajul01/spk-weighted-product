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
	<title> Kriteria Edit </title>
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
			<h3>Kriteria Edit</h3>
			<div class="box">
				<?php
				    $data_edit= mysqli_query($conn, "SELECT * FROM kriteria WHERE kd_kri = '".$_GET['kd_kri']."' ");
				    $row = mysqli_fetch_array($data_edit);
			    ?>
			    <form action="" method="post">
				    <p style="margin-bottom: 5px;">Kode Kriteria</p>
					<input type="text" name="kd_kri" class="input-control" value="<?php echo $row['kd_kri']?>" readonly>

					<p style="margin-bottom: 5px;">Nama Kriteria</p>
					<input type="text" name="nm" class="input-control" value="<?php echo $row['nm_kri']?>" required>
					
					<p style="margin-bottom: 5px;">Atribut</p>
					<select name="at" class="input-control" required>
						<option value=""> -- Pilih -- </option>
						<option value="Benefit" <?php echo ($row['atribut'] == "Benefit")? 'selected':''?>> Benefit </option>
						<option value="Cost"<?php echo ($row['atribut'] == "Cost")? 'selected':''?>> Cost </option>
					</select>
					
					<p style="margin-bottom: 5px;">Bobot</p>
					<select name="bbt" class="input-control" required>
						<option value=""> -- Pilih -- </option>
						<option value="1" <?php echo ($row['bobot'] == 1)? 'selected':''?>> Sangat Rendah </option>
						<option value="2" <?php echo ($row['bobot'] == 2)? 'selected':''?>> Rendah </option>
						<option value="3" <?php echo ($row['bobot'] == 3)? 'selected':''?>> Cukup </option>
						<option value="4" <?php echo ($row['bobot'] == 4)? 'selected':''?>> Tinggi </option>
						<option value="5" <?php echo ($row['bobot'] == 5)? 'selected':''?>> Sangat Tinggi </option>
					</select>

					<p style="margin-bottom: 5px;">Deskripsi</p>
					<textarea name="deskripsi" class="input-control" required> <?php echo $row['deskripsi']?> </textarea><br>
					<button type="submit" name="edit" class="edit"> Ubah Data</button>
			    </form>
			    </div>
		</div>
	</div>

	<!-- php -->
		<?php 
			if(isset($_POST['edit'])){
				$update = mysqli_query($conn, "UPDATE kriteria SET
						   	nm_kri = '".$_POST['nm']."', 
						   	atribut = '".$_POST['at']."',
						   	bobot = '".$_POST['bbt']."',
						   	deskripsi = '".$_POST['deskripsi']."'
					    WHERE kd_kri = '".$_GET['kd_kri']."' ");
				if($update){
					echo "
					    <script>
					        alert('data berhasil diubah!');
					        document.location.href = 'kriteria.php';
					    </script>
					";

				}else{
					echo "
					    <script>
					        alert('data gagal diubah!');
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