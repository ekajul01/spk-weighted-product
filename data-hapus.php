<?php  
    require "function.php";
    $kode = $_GET["kd_data"];
    $hapus = mysqli_query($conn, "DELETE FROM data where kd_data = '$kode'");

    if($hapus){
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