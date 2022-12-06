<?php 
    include ("function.php");

    if(!isset($_COOKIE['project'])) {
        echo "<script>
                alert('Silahkan Login terlebih dahulu');
                document.location.href='login.php';
              </script>";
        exit;
    }

    $deskripsi = deskripsi($_COOKIE['project']);

    $data_diri = query("SELECT * FROM user WHERE id_user = $deskripsi") [0];

    $jumlah_sks = cek_sks($data_diri['ipk']);

    if($data_diri['level'] !== "User") {
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
    <title>M-PROJECT | Mahasiswa</title>
    <link rel="stylesheet" href="folder_css/mhs.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <!--SIDEBAR MAHASISWA-->
    <div class="container-fluid d-flex" style="min-height: 100vh; background-color: #D23939; padding-left: 0px;">
        <div class="sidebar" id="side-nav">
            <div class="header justify-content-between">
                <a href="#">
                    <img class="img" src="image/Logo2.png" alt="" style="width: 155px; float:right; margin-right: 13px;">
                </a>
                <!--HAMBURGER-->
                <div id="menu-button">
                    <input type="checkbox" id="menu-checkbox">
                        <label for="menu-checkbox" id="m-label">
                            <div id="hamburger"></div>
                        </label>
                </div>
                <!---HAMBURGER SELESAI-->
            </div>

            <ul class="nav nav-tabs list-unstyled mt-5" role="tablist">
                <li class="nav-link">
                    <a href="#home" class="py-2 d-block" data-bs-toggle="tab"><i class="bi bi-house-door-fill"></i>
                        <span class="text"> Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#krs" class="font py-2 d-block" data-bs-toggle="tab"><i class="bi bi-bookmark-star-fill"></i> 
                        <span class="text"> Buat KRS</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#biodata" class="font py-2 d-block" data-bs-toggle="tab"><i class="bi bi-person-lines-fill"></i> 
                        <span class="text"> Biodata</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#about" class="font py-2 d-block" data-bs-toggle="tab"><i class="bi bi-gear-wide"></i> 
                        <span class="text"> About</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="logout.php" class="font py-2 d-block" ><i class="bi bi-door-open-fill"></i>
                        <span class="text"> Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <!--CONTENT MAHASISWA-->
        <div class="content tab-content">
            <!--DASHBOARD-->
            <div id="home" class="container tab-pane active" style="text-align: center;">
                <span style="font-size:65px; color: #FFFF;">Selamat Datang <br> <i class="fw-bold"><?php echo $data_diri['nama'];?></i> <br> di</span>
                <br>
                <img class="img" src="image/Logo2.png" alt="" style="width: 400px;">
            </div>

            <!--AKADEMIK KRS-->
            <div id="krs" class="container tab-pane fade">
                <h3 class="mt-4 text-white">BUAT KRS</h3>
                    <div class="box mt-3">
                        <h5>Detail Mahasiswa</h5>
                        <div class="row mt-1">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="nim" class="col-sm-4 col-form-label">NIM</label>
                                    <span>: <?php echo $data_diri['no_induk'];?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label for="smt" class="col-sm-4 col-form-label">Semester</label>
                                    <span>: <?php echo $data_diri['semester'];?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="nama" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                    <span>: <?php echo $data_diri['nama'];?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label for="ipk" class="col-sm-4 col-form-label">IPK</label>
                                    <span>: <?php echo $data_diri['ipk'];?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="fakultas" class="col-sm-4 col-form-label">Fakultas/Prodi</label>
                                    <span>: Teknik/Teknik Informatika</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label for="sks" class="col-sm-4 col-form-label">Jumlah SKS</label>
                                    <span>: <?php echo $jumlah_sks;?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="box mt-3">
                        <h5>Daftar Mata Kuliah Yang Diajukan</h5>
                        <table class="table">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Mata Kuliah</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">SKS</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <tr>
                                    <td>101</td>
                                    <td>Pemrograman Bergerak</td>
                                    <td>Ganjil</td>
                                    <td>3</td>
                                    <td>
                                    <input type="checkbox" id="cek-sks">
                                    <label for="cek-sks" onclick="return confirm('Apakah Yakin Ingin Pilih Ini?')">Pilih KRS</label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>

            <!--BIODATA-->
            <div id="biodata" class="container tab-pane fade">
                <h3 class="mt-4 text-white">BIODATA MAHASISWA</h3>
                    <div class="box mt-3">
                        <div class="row mt-1">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="id_mhs" class="col-sm-4 col-form-label">ID Mahasiswa</label>
                                    <span>: 1332</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="nim" class="col-sm-4 col-form-label">NIM</label>
                                    <span>: <?php echo $data_diri['no_induk'];?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="nama" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                    <span>: <?php echo $data_diri['nama'];?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                                    <span>: <?php echo $data_diri['email'];?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="fakultas" class="col-sm-4 col-form-label">Fakultas/Prodi</label>
                                    <span>: Teknik/Teknik Informatika</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="smt" class="col-sm-4 col-form-label">Semester</label>
                                    <span>: <?php echo $data_diri['semester'];?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="ipk" class="col-sm-4 col-form-label">IPK</label>
                                    <span>: <?php echo $data_diri['ipk'];?></span>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <!--ABOUT-->
            <div id="about" class="container tab-pane fade">
                <h3 class="mt-4 text-white">M-PROJECT</h3>
                <div class="box mt-3">
                    <div class="row mt-1">
                        <span style="text-align: center;">M-Project merupakan aplikasi pengisian KRS online berbasis webdroid yang mana adalah hasil dari tugas akhir Mata Kuliah Pemrograman Bergerak</span>
                    </div>
            </div>
        </div>
    </div>

    <!--Javascript-->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="folder_js/script-mhs.js"></script>
</body>
</html>