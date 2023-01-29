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
        <!-- Detail KRS -->
        <div class="container-sm tab-pane active" id="detailKrs">
            <h2>Detail KRS</h2>
            <div class="container-sm" id="detailMenu">
                <p>Detail Mahasiswa</p>
                <form action="">
                    <fieldset>
                        <div>
                            <span>NIM</span>
                            <p>:</p>
                            <input type="text" readonly value="NIM" name="nim">
                        </div>
                        <div>
                            <span>Nama</span>
                            <p>:</p>
                            <input type="text" readonly value="Nama" name="nama">
                        </div>
                        <div>
                            <span>Semester</span>
                            <p>:</p>
                            <input type="text" readonly value="Semester" name="semester">
                        </div>
                        <div>
                            <span>IPK</span>
                            <p>:</p>
                            <input type="text" readonly value="IPK" name="ipk">
                        </div>
                    </fieldset>
                </form>
                <p class="mt-3">Daftar Mata Kuliah Yang Diajukan</p>
                <div class="table-responsive" id="krsMhs">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mata Kuliah</th>
                                <th scope="col">SKS</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Pemrograman Bergerak</th>
                                <td>3</td>
                                <td class="btn-delete-krs"><a href="#delete-krs"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">Sistem Pakar</th>
                                <td>3</td>
                                <td class="btn-delete-krs"><a href="#delete-krs"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">Riset Operasi</th>
                                <td>3</td>
                                <td class="btn-delete-krs"><a href="#delete-krs"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">Big Data</th>
                                <td>3</td>
                                <td class="btn-delete-krs"><a href="#delete-krs"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">Kecerdasan Buatan</th>
                                <td>3</td>
                                <td class="btn-delete-krs"><a href="#delete-krs"><i class="bi bi-trash"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="toggleKrs">
                    <button type="button" class="btn btn-outline-danger btn-sm me-2" id="beforeKrs">
                        <a href="admin.php">BACK</a>
                    </button>
                    <button type="button" class="btn btn-outline-danger btn-sm me-2" id="upKrs">
                        <a href="#">UNBLOCK</a>
                    </button>
                </div>
            </div>
            <footer><img src="image/Logo2.png" alt="logo"></footer>
        </div>

        <!-- Delete Krs -->
        <div class="container-sm text-center delete-krs">
            <h3>CONFIRM</h3>
            <span></span>
            <p>Apakah anda yakin ingin menghapusnya?</p>
            <span></span>
            <div class="d-flex ms-auto">
                <button type="button" class="btn btn-outline-primary btn-sm me-2">
                    <a href="admin.php">Yes</a>
                </button>
                <button type="button" class="btn btn-outline-danger btn-sm back-krs">
                    <a href="admin.php">No</a>
                </button>
            </div>
        </div>
        <!-- Delete Krs End -->
        <!-- Detail KRS End -->
    </div>

    <!-- Js Bootstrap -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Js lokal -->
    <script src="folder_js/script-admin.js"></script>
</body>

</html>