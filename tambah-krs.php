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

    if ($data_diri['level'] !== "User") {
        echo "<script>
                alert('Hak akses tidak diizinkan');
                document.location.href='logout.php';
            </script>";
        exit;
    }

    if(isset($_GET['idmatkul'])) {
        $id_matkul = $_GET['idmatkul'];

        if(tambah_krs($deskripsi, $id_matkul) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href='mahasiswa.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Ditambahkan');
                    document.location.href='mahasiswa.php';
                </script>
            ";
        }
    }
?>