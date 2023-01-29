<?php
    include("function.php");

    if (!isset($_COOKIE['project'])) {
        echo "<script>
                        alert('Silahkan Login terlebih dahulu');
                        document.location.href='login.php';
                    </script>";
        exit;
    }

    $deskripsi = deskripsi($_COOKIE['project']);

    $data_diri = query("SELECT * FROM user WHERE id_user = $deskripsi")[0];

    $data_mahasiswa = query("SELECT * FROM user WHERE level = 'User'");

    $data_admin = query("SELECT * FROM user WHERE level = 'Admin'");

    $data_matkul = query("SELECT * FROM mata_kuliah");

    $jumlah_mahasiswa = jumlah_data("SELECT * FROM user WHERE level = 'User'");


    if ($data_diri['level'] !== "Admin") {
        echo "<script>
                alert('Hak akses tidak diizinkan');
                document.location.href='logout.php';
            </script>";
        exit;
    }

    // Proses tambah mata kuliah
    if (isset($_POST["submit_matkul"])) {
        if (tambah_matkul($_POST) > 0) {
            echo "
                <script>
                alert('Mata Kuliah Berhasil Ditambahkan');
                document.location.href='admin.php';
                </script>
            ";
        } else {
            echo "<script>
                    alert('Mata Kuliah Gagal Ditambahkan!');
                    document.location.href='admin.php';
                    </script>";
        }
    }
    // Tambah mata kuliah selesai

    // Proses tambah mahasiswa
    if (isset($_POST["submit_mahasiswa"])) {
        if (register($_POST) > 0) {
            echo "
                <script>
                alert('Registrasi Berhasil');
                document.location.href='admin.php';
                </script>
            ";
        } else {
            echo "<script>
                    alert('Registrasi Gagal');
                    </script>";
        }
    }
    // Tambah mahasiswa selesai

    // Proses tambah admin
    if (isset($_POST["submit_admin"])) {
        if (register_admin($_POST) > 0) {
            echo "
                <script>
                alert('Registrasi Admin Berhasil');
                document.location.href='admin.php';
                </script>
            ";
        } else {
            echo "<script>
                    alert('Registrasi Admin Gagal');
                    </script>";
        }
    }
    // Tambah admin selesai


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M Project | Admin</title>
    <link rel="Icon" href="image/Logo.png">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />

    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Rubik:wght@300&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Css lokal -->
    <link rel="stylesheet" href="folder_css/admin.css" />
</head>

<body>
    <!-- CONTENT -->
    <div class="content tab-content" id="content">
        <!-- Edit data matkul -->
        <div class="container-sm tab-pane active" id="editMk">
            <h3>Edit Mata Kuliah</h3>
            <form action="">
                <fieldset>
                    <input type="text" placeholder="Kode" name="kode">
                    <input type="text" placeholder="Nama Mata Kuliah" name="namaMatkul">
                    <select name="semester">
                        <option value="" disabled selected hidden>Semester</option>
                        <option value="1" class="select-jk">1</option>
                        <option value="2" class="select-jk">2</option>
                        <option value="3" class="select-jk">3</option>
                        <option value="4" class="select-jk">4</option>
                        <option value="5" class="select-jk">5</option>
                        <option value="6" class="select-jk">6</option>
                        <option value="7" class="select-jk">7</option>
                        <option value="7" class="select-jk">8</option>
                    </select>
                    <input type="text" placeholder="SKS" name="sks">
                    <button type="submit" class="btn" id="closeEditMk">
                        <a href="admin.php">UPDATE</a>
                    </button>
                    <button type="reset" class="btn" id="backEditMk">
                        <a href="admin.php">BACK</a>
                    </button>
                </fieldset>
            </form>
        </div>
        <!-- Edit data matkul End -->
    </div>
    <!-- CONTENT END -->

    <!-- Js Bootstrap -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Js lokal -->
    <script src="folder_js/script-admin.js"></script>
</body>

</html>