<?php 
    include('function.php');

    if(isset($_GET['idmatkul'])) {
        $id_matkul = $_GET['idmatkul'];

        if(hapus_matkul($id_matkul) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='admin.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='admin.php';
                </script>
            ";
        }
    }
?>