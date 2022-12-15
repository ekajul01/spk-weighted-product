<?php  
    require "function.php";
    $kode = $_GET["kd_kri"];
    $hapus = mysqli_query($conn, "DELETE FROM kriteria where kd_kri = '$kode'");

    if($hapus){
        echo "
            <script>
                alert('data berhasil dihapus!');
                document.location.href = 'kriteria.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal dihapus!');
                document.location.href = 'kriteria.php';
            </script>
        ";
    }

?>