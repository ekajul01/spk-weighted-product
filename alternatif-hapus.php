<?php  
    require "function.php";
    $kode = $_GET["kd_alt"];
    $hapus2 = mysqli_query($conn, "DELETE FROM data where kd_alt = '$kode'");

    if($hapus2){
        $hapus = mysqli_query($conn, "DELETE FROM alternatif where kd_alt = '$kode'");
        echo "
            <script>
                alert('data berhasil dihapus!');
                document.location.href = 'alternatif.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal dihapus!' mysqli_connect_error());
                document.location.href = 'alternatif.php';
            </script>
        ";
    }

?>