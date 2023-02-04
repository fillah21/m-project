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

        $result = mysqli_query($conn, "SELECT id_matkul FROM krs WHERE id_matkul = '$id_matkul' AND id_user = '$deskripsi'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Mata Kuliah Sudah Diambil!!!');
                    document.location.href='mahasiswa.php';
                  </script>";
            exit;
        }

        if(tambah_krs($deskripsi, $id_matkul) > 0) {
            echo "
                <script>
                    alert('Mata Kuliah Berhasil Diambil');
                    document.location.href='mahasiswa.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Mata Kuliah Gagal Diambil');
                    document.location.href='mahasiswa.php';
                </script>
            ";
        }
    } elseif(isset($_GET['iduser'])) {
        $id_user = $_GET['iduser'];

        $jumlah = $_POST['jumlah'];
        $sks = $_POST['sks'];

        if($jumlah > $sks) {
            echo "
                <script>
                    alert('SKS yang diambil terlalu banyak');
                    document.location.href='mahasiswa.php';
                </script>
            ";
        } else {
            if(validasi_krs($id_user) > 0) {
                echo "
                    <script>
                        alert('Validasi Berhasil');
                        document.location.href='mahasiswa.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Validasi Gagal');
                        document.location.href='mahasiswa.php';
                    </script>
                ";
            }
        }
    }
?>