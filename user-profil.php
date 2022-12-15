<?php  
	session_start();
	require "function.php";
	if ($_SESSION['level'] != "user") {
		header("location:login.php");
		exit;
	}	
	$queryusr = mysqli_query($conn, 'SELECT * FROM user');
	$jml_usr = mysqli_num_rows($queryusr);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<title> Dashboard </title>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href=""> Kelompok 6 </h1>
			<ul>
				<li><a href="user-index.php"> Dashboard </a></li>
				<li><a href="user-profil.php"> Profil </a></li>
				<li><a href="user-logout.php"> Logout </a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Profil</h3>
			<div class="box">
				<?php
				    $data_edit= mysqli_query($conn, "SELECT * FROM user WHERE username = '".$_SESSION['username']."' ");
				    $row = mysqli_fetch_array($data_edit);
			    ?>
			    <form action="" method="post">
					<p style="margin-bottom: 5px;">Nama </p>
					<input type="text" name="nm" class="input-control" value="<?php echo $row['nama']?>" required>

					<p style="margin-bottom: 5px;">Alamat</p>
					<input type="text" name="almt" class="input-control" value="<?php echo $row['alamat']?>" required>

					<p style="margin-bottom: 5px;">No Telepon</p>
					<input type="text" name="notelp" class="input-control" value="<?php echo $row['notelp']?>" required>
					
					<button type="submit" name="editprofil" class="edit"> Ubah Profil</button>
			    </form>
		    </div>

	    <!-- php -->
	    <?php 
			if(isset($_POST['editprofil'])){
				$update = mysqli_query($conn, "UPDATE user SET
						   	nama = '".$_POST['nm']."', 
						   	alamat = '".$_POST['almt']."',
						   	notelp = '".$_POST['notelp']."'
					    WHERE username = '".$_SESSION['username']."' ");
				if($update){
					echo "
					    <script>
					        alert('profil berhasil diperbaharui!');
					        document.location.href = 'user-profil.php';
					    </script>
					";

				}else{
					echo "
					    <script>
					        alert('profil gagal diperbaharui!');
					        document.location.href = 'user-profil.php';
					    </script>
					";
				}
			}
		?>

		    <h3>Change Password</h3>
			<div class="box">
				<form action="" method="post">
					<p style="margin-bottom: 5px;">Password Lama </p>
					<input type="password" name="passlama" class="input-control" placeholder="masukkan password lama" required>

					<p style="margin-bottom: 5px;">Password Baru </p>
					<input type="password" name="passbaru" class="input-control" placeholder="masukkan password baru" required>

					<button type="submit" name="ubahpassword" class="edit"> Ubah Password </button>
				</form>
		    </div>
		</div>
	</div>

	<!-- php -->
	<?php
	    if(isset($_POST['ubahpassword'])){

	    	if(!empty($_POST['passbaru'])){

	    		if($_POST['passbaru'] != $_POST['passlama']){

		    		$update = mysqli_query($conn, "UPDATE user SET
			    	password = '".$_POST['passbaru']."'
			    	WHERE username = '".$_SESSION['username']."'");

				    if($update){
			            echo "
			                <script>
			                    alert('password berhasil diubah!');
			                    document.location.href = 'user-profil.php';
			                </script>
			            ";

			        }else{
			            echo "
			                <script>
			                    alert('password gagal diubah!');
			                    document.location.href = 'user-profil.php';
			                </script>
			            ";
			        }
	    		}else{
					echo "
				        <script>
			                alert('password baru tidak boleh sama dengan password lama!');
		                    document.location.href = 'user-profil.php';
			            </script>
			        ";
				}

	    	}else{
			    echo "
		            <script>
	                    alert('password baru tidak boleh kosong!');
		                    document.location.href = 'user-profil.php';
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