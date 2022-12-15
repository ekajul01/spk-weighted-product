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
	<title> Hasil Seleksi </title>
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
			<h3>Data</h3>
			<div class="box">
				<table border="1" cellpadding="5" class="table">
			        <thead align="center">
			            <tr>
			                <th rowspan="2">Alternatif</th>
			                <th colspan="<?= $jml_kri ?>" align="center">Kriteria</th>
			            </tr>
			            <tr>
			                <?php
								$query = $conn->query('SELECT nm_kri FROM kriteria') or die($conn->error);
								while ($row = $query->fetch_assoc()) {
			                ?>
			                <th><?= $row['nm_kri'] ?></th>
			                <?php
			                	}
			                ?>
			            </tr>
			        </thead>
			        <tbody>
			            <?php
			            	$query = $conn->query('SELECT nm_alt,data.kd_alt FROM data LEFT JOIN alternatif 
									ON data.kd_alt=alternatif.kd_alt GROUP BY data.kd_alt') or die($conn->error);
			            	foreach ($query as $row) {
			                $kd_alt = $row['kd_alt'];
			            ?>
			            <tr>
			                <td><?= $row['nm_alt'] ?></td>
								<?php
									$sql = $conn->query("SELECT * FROM data WHERE kd_alt=$kd_alt");
									while ($dt = mysqli_fetch_assoc($sql)) {
								?>
			                <td><?= $dt['nilai'] ?></td>
								<?php
									}
								?>
			            </tr> 
						<?php
			                }
						?>
			        </tbody>
			    </table>
			</div>

			<?php  
				//Menghitung jumlah bobot
				$i = 0;
				$sql = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY kd_kri");
				while($data = mysqli_fetch_array($sql)) {
					$i++;
					$bobottotal[$i] = $data['bobot'];
				}
				$jumlah =array_sum($bobottotal);
			?>
			<h3>Bobot</h3>
			<div class="box">
				<table border="1" cellpadding="5" class="table">
					<thead>
						<tr>
				            <th> Kode Kriteria</th>
				            <th> Nama Kriteria</th>
				            <th> Bobot Prefelensi </th>
				            <th> Atribut </th>
				            <th> Nilai </th>
				        </tr>
					</thead>
					<tbody>
						<?php 
				        	for ($nb = 1; $nb <= $jml_kri; $nb++) { 
				        	$row = mysqli_fetch_assoc($querykri);?>
				        <tr>
				        	<?php 
				            	$b = $row["bobot"];
				            	$hitung = $b/$jumlah;
				            ?>
				            <td> <?= $row["kd_kri"];?> </td>
				            <td> <?= $row["nm_kri"];?> </td>
				            <td> <?= $row["bobot"];?> </td>
				            <td> <?= $row["atribut"];?> </td>
				            <?php 
				            	if ($row["atribut"] == "Cost") {
				            	 	$pangkat[$nb] = $hitung * -1;
				            	} else{
				            		$pangkat[$nb] = $hitung * 1;
				            	}
				            ?>
				            <td> <?= round($pangkat[$nb], 4) ?></td>
				        </tr>
				        <?php } ?>
					</tbody>			        
				</table>
			</div>

			<?php 
				//Menghitung Vektor S
			    $i = 0;
			    $ttl_v = 0;
			    $s = [];
			    $query = mysqli_query($conn, 'SELECT kd_alt FROM alternatif');
			    foreach ($query as $row) {
			        $kd_alt = $row['kd_alt'];
			        $sql = mysqli_query($conn, "SELECT nilai FROM data WHERE kd_alt=$kd_alt");
			        $nb = 0;
			        $temp_s = 1;
			        foreach ($sql as $data) {
			            $nb++;
			            $temp_s *= pow($data['nilai'], $pangkat[$nb]);
			            $tmpl = $data['nilai']."<sup> $pangkat[$nb] </sup>";
			        }
			        $s[] = round($temp_s, 4);
			        $ttl_v += $s[$i];
			        $i++;
			    }
			?>
			<h3>Vector S</h3>
			<div class="box">
				<table border="1" cellpadding="5" class="table">
					<thead>
						<tr>
			                <th>Alternatif</th>
			                <th>Nilai</th>
			            </tr>
					</thead>
					<tbody>
						<?php
				            $query = mysqli_query($conn, "SELECT nm_alt FROM alternatif") or die($conn->error);
				            $z = 0;
				            for ($i = 0; $i < $jml_alt; $i++) {
				            	$row = mysqli_fetch_assoc($query);
			            ?>
			            <tr>
			                <td><?php echo $row['nm_alt'] ?></td>
			                <td><?php echo round($s[$i], 4); ?></td>
			            </tr>
			            <?php
				            }
			            ?>
					</tbody>			        
				</table>
			</div>

			<?php 
		    	//Menghitung Vektor V
			    for ($a = 1; $a <= $i; $a++) {
			        $v[$a] = $s[$a - 1] / $ttl_v;
			    }

			    //Proses Perankingan
			    for ($a = 1; $a <= $i; $a++) {
			        $rank[$a] = 1;
			        for ($b = 1; $b <= $i; $b++) {
			            if ($v[$a] < $v[$b]) {
			                $rank[$a]++;
			            }
			        }
			    }
		    ?>

		    <h3>Hasil Perankingan (Vector V) </h3>
		    <div class="box">
		    	<table border="1" cellpadding="5" class="table">
			        <thead>
			            <tr>
			                <th>Alternatif</th>
			                <th>Nilai</th>
			                <th>Ranking</th>
			            </tr>
			        </thead>
			        <tbody>
			            <?php
			            $query = mysqli_query($conn, "SELECT nm_alt FROM alternatif") or die($conn->error);
			            $z = 0;					
			            foreach ($query as $row) {
			                $z++;
			            ?>
			            <tr>
			                <td><?php echo $row['nm_alt'] ?></td>
			                <td><?php echo round($v[$z], 4)?></td>
			                <td><?php echo $rank[$z]; ?></td>
			            </tr>
			            <?php
				            }
			            ?>
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