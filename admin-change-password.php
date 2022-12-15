<?php  
	session_start();
	require "function.php";
	if ($_SESSION['level'] != "admin") {
		header("location:login.php");
		exit;
	}
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
	<title> Ubah Password </title>
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
			<h3>Ubah Password</h3>
			<div class="box">
			    <form action="" method="post">
				    <p style="margin-bottom: 5px;">Password Lama</p>
					<input type="password" name="passlama" class="input-control" required>

					<p style="margin-bottom: 5px;">Password Baru</p>
					<input type="password" name="passbaru" class="input-control" required>
					
					<button type="submit" name="ubah" class="edit"> Ubah Password</button>
			    </form>
			    </div>
		</div>
	</div>

	<!-- php -->
	<?php
	    if(isset($_POST['ubah'])){

	    	if(!empty($_POST['passbaru'])){

	    		if($_POST['passbaru'] != $_POST['passlama']){

		    		$update = mysqli_query($conn, "UPDATE user SET
			    	password = '".$_POST['passbaru']."'
			    	WHERE username = '".$_SESSION['username']."'");

				    if($update){
			            echo "
			                <script>
			                    alert('password berhasil diubah!');
			                    document.location.href = 'admin-change-password.php';
			                </script>
			            ";

			        }else{
			            echo "
			                <script>
			                    alert('password gagal diubah!');
			                    document.location.href = 'admin-change-password.php';
			                </script>
			            ";
			        }
	    		}else{
					echo "
				        <script>
			                alert('password baru tidak boleh sama dengan password lama!');
		                    document.location.href = 'admin-change-password.php';
			            </script>
			        ";
				}

	    	}else{
			    echo "
		            <script>
	                    alert('password baru tidak boleh kosong!');
		                    document.location.href = 'admin-change-password.php';
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