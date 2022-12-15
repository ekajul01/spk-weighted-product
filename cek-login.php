<?php 
session_start();

include 'function.php';

$username = $_POST['user'];
$password = $_POST['pass'];

$login = mysqli_query($conn,"select * from user where username='$username' and password='$password'");

$cek = mysqli_num_rows($login);

if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin-index.php");
 
	// cek jika user login sebagai user
	}else if($data['level']=="user"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "user";
		// alihkan ke halaman dashboard user
		header("location:user-index.php");
 	
	}else{ 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	

}else{
	header("location:login.php?pesan=gagal");
}

?>