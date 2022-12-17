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

if ($data_diri['level'] !== "Admin") {
    echo "<script>
                alert('Hak akses tidak diizinkan');
                document.location.href='logout.php';
              </script>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M Project | Admin</title>

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
    <!-- SIDEBAR -->
    <div class="container-fluid-md d-flex" style="background-color: #D23939; padding-left: 0px;">
        <div class="sidebar" id="side-nav">
            <div class="header justify-content-between">
                <a href="#">
                    <img class="img" src="image/Logo3.png" alt="logo" style="width: 125px; float:right; margin-top: 24px; margin-right: 8px;">
                </a>
                <!--HAMBURGER-->
                <div id="menu-button">
                    <input type="checkbox" id="menu-checkbox">
                    <label for="menu-checkbox" id="m-label">
                        <div id="hamburger"></div>
                    </label>
                </div>
                <!---HAMBURGER End-->
            </div>

            <!-- Profil -->
            <div class="profil">
                <img src="profil/2.jpg" alt="profi" class="rounded-circle">
                <h1>Ahmad Nur Cahyadi</h1>
            </div>
            <!-- Profil End -->

            <!-- Link -->
            <ul class="nav nav-tabs list-unstyled mt-4" role="tablist">
                <li class="nav-link">
                    <a href="#home" class="py-2 d-block" data-bs-toggle="tab"><i class="bi bi-house-door-fill"></i>
                        <span class="text"> Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#mhs" class="font py-2 d-block" data-bs-toggle="tab"><i class="bi bi-journal-bookmark-fill"></i>
                        <span class="text"> Mahasiswa</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#matkul" class="font py-2 d-block" data-bs-toggle="tab"><i class="bi bi-book-fill"></i>
                        <span class="text"> Mata Kuliah</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#krs" class="font py-2 d-block" data-bs-toggle="tab"><i class="bi bi-bookmark-star-fill"></i>
                        <span class="text"> KRS</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#about" class="font py-2 d-block" data-bs-toggle="tab"><i class="bi bi-gear-wide"></i>
                        <span class="text"> About</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="logout.php" class="font py-2 d-block"><i class="bi bi-door-open-fill"></i>
                        <span class="text"> Logout</span>
                    </a>
                </li>
            </ul>
            <!-- Link End -->
        </div>
    </div>
    <!-- SIDEBAR End -->

    <!-- CONTENT -->
    <div class="content tab-content">
        <!-- Tab Dashboard -->
        <div id="home" class="container-md tab-pane active" style="text-align: center;">
            <header>
                Selamat Datang
                <br>
                Ahmad Nur Cahyadi
            </header>
            <footer>
                <img src="image/Logo2.png" alt="logo">
            </footer>
        </div>
        <!-- Tab Dashboard End -->

        <!-- Tab Mahasiswa -->
        <!-- List Mahasiswa -->
        <div id="mhs" class="container-md tab-pane fade">
            <header>Data Mahasiswa</header>
            <div class="row-md mb-4">
                <div class="col-md">
                    <a href="#insertMhs" class="nav-link">
                        <i class="bi bi-plus-square-fill me-3"></i>
                        <span>Registrasi</span>
                    </a>
                </div>
            </div>
            <div class="row-sm">
                <div class="col-sm table-responsive">
                    <table class="table text-white">
                        <thead class="topTable">
                            <tr class="header">
                                <th scope="col">NIM</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">JK</th>
                                <th scope="col">Email</th>
                                <th scope="col">No.HP</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">SMT</th>
                                <th scope="col">IPK</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody class="contentTable text-dark">
                            <tr class="text-white">
                                <th scope="row">190511094</th>
                                <td>Ahmad Nur Cahyadi</td>
                                <td>L</td>
                                <td>arcanearlaze02@gmail.com</td>
                                <td>088707878053</td>
                                <td>Desa Kepuh Kecamatan Palimanan Kabupaten Cirebon</td>
                                <td>7</td>
                                <td>3.58</td>
                                <td><a href="#" class="text-dark">
                                        <i class="bi bi-pen-fill"></i>
                                    </a>
                                    <span class="text-dark mx-1" style="font-size: 9px;">|</span>
                                    <a href="#" class="text-dark">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="text-white">
                                <th scope="row">190511094</th>
                                <td>Ahmad Nur Cahyadi</td>
                                <td>L</td>
                                <td>arcanearlaze02@gmail.com</td>
                                <td>088707878053</td>
                                <td>Desa Kepuh Kecamatan Palimanan Kabupaten Cirebon</td>
                                <td>7</td>
                                <td>3.58</td>
                                <td><a href="#" class="text-dark">
                                        <i class="bi bi-pen-fill"></i>
                                    </a>
                                    <span class="text-dark mx-1" style="font-size: 9px;">|</span>
                                    <a href="#" class="text-dark">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer><img src="image/Logo2.png" alt="logo"></footer>
        </div>
        <!-- List Mahasiswa End -->
        <div class="content tab-content">
            <!-- Registrasi Mahasiswa -->
            <header id="InsertMhs" class="container-sm tab-pane fade">
                Registrasi Mahasiswa
            </header>
            <form action="input" class="container-sm">

            </form>
            <!-- Registrasi Mahasiswa End -->

        </div>
        <!-- Tab Mahasiswa End -->
        <!-- Tab Mata kuliah -->
        <!-- Tab Mata kuliah End -->
        <!-- Tab KRS -->
        <!-- Tab KRS End -->
        <!-- Tab About -->
        <!-- Tab About End -->
    </div>
    <!-- Js Bootstrap -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Js lokal -->
    <script src="folder_js/script-admin.js"></script>
</body>

</html>