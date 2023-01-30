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
    <div class="container-fluid-md d-flex" style="background-color: #D23939; padding-left: 0px;">
    <div class="content tab-content" id="content">
        <!-- List Edit Data Admin -->
        <div class="container-sm active" id="editr">
            <h3>Edit Data Admin</h3>
            <button type="reset" class="btn back">
                <a href="admin.php"><i class="bi bi-x-circle-fill"></i></a>
            </button>
            <form action="">
                <fifieldset>
                    <input type="text" placeholder="Username" name="username" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <input type="password" placeholder="Konformasi Password" name="password2" required>
                    <input type="text" placeholder="Nama" name="nama" required>
                    <select name="jenis kelamin" required>
                        <option value="" disabled selected hidden>Jenis Kelamin</option>
                        <option value="Laki-laki" class="select-jk">Laki-laki</option>
                        <option value="Perempuan" class="select-jk">Perempuan</option>
                    </select>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="text" placeholder="No. Telp" name="noTelp" required>
                    <textarea name="alamat" cols="25" rows="7" placeholder="Alamat" required></textarea>
                    <img src="profil/aku.jpg">
                    <div class="input-group mb-3 uploadFoto">
                        <input type="file" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-sm">
                        <a href="admin.php">Update</a>
                    </button>
                </fieldset>
            </form>
        </div>
    </div>
    </div>
    <!-- CONTENT END -->

    <!-- Js Bootstrap -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Js lokal -->
    <script src="folder_js/script-admin.js"></script>
</body>

</html>