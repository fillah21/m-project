<?php 
    include('function.php');

    if (!isset($_COOKIE['project'])) {
        echo "<script>
                        alert('Silahkan Login terlebih dahulu');
                        document.location.href='login.php';
                    </script>";
        exit;
    }
    
    $deskripsi = deskripsi($_COOKIE['project']);
    
    $data_diri = query("SELECT * FROM user WHERE id_user = $deskripsi")[0];

    if ($data_diri['level'] !== "Admin") {
        echo "<script>
                alert('Hak akses tidak diizinkan');
                document.location.href='logout.php';
            </script>";
        exit;
    }

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