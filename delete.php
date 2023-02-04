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
    } elseif (isset($_GET['idmhs'])) {
        $id_mhs = $_GET['idmhs'];

        $data = query("SELECT foto FROM user WHERE id_user = '$id_mhs'") [0];

        $foto = $data['foto'];

        if(hapus_mhs($id_mhs) > 0) {
            if($foto != "default.png") {
                unlink("profil/$foto");
            }
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