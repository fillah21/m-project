<?php 
    include('function.php');

    $id_admin = $_GET['idadmin'];

    if(turun_level($id_admin) > 0) {
        echo "
            <script>
                alert('Admin Berhasil Diturunkan');
                document.location.href='admin.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Admin Gagal Diturunkan');
                document.location.href='admin.php';
            </script>
        ";
    }
?>