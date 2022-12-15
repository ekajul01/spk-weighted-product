<?php  
	$conn = mysqli_connect("localhost","root","","spk-kelompok6-wp");

	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}
?>
