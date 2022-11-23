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
    <link href="https://fonts.googleapis.com/css2?family=Finger+Paint&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">


    <!-- Css lokal -->
    <link rel="stylesheet" href="folder_css/admin.css" />
</head>

<body>
    <!--SIDEBAR MAHASISWA-->
    <div class="container-fluid d-flex" style="min-height: 100vh; background-color: #D23939; padding-left: 0px;">
        <div class="sidebar" id="side-nav">
            <div class="header justify-content-between">
                <a href="#">
                    <img class="img" src="image/Logo2.png" alt=""
                        style="width: 155px; float:right; margin-right: 13px;">
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
                    <a href="#mhs" class="font py-2 d-block" data-bs-toggle="tab"><i class="bi bi-journals"></i>
                        <span class="text"> Data Mahasiswa</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#matkul" class="font py-2 d-block" data-bs-toggle="tab"><i class="bi bi-book"></i>
                        <span class="text"> Data Mata Kuliah</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#krs" class="font py-2 d-block" data-bs-toggle="tab"><i
                            class="bi bi-bookmark-star-fill"></i>
                        <span class="text"> Data KRS</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#registrasi" class="font py-2 d-block" data-bs-toggle="tab"><i
                            class="bi bi-person-add"></i>
                        <span class="text"> Registrasi akun</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#biodata" class="font py-2 d-block" data-bs-toggle="tab"><i
                            class="bi bi-person-lines-fill"></i>
                        <span class="text"> Biodata</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#about" class="font py-2 d-block" data-bs-toggle="tab"><i class="bi bi-gear-wide"></i>
                        <span class="text"> About</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#" class="font py-2 d-block" data-bs-toggle="tab"><i class="bi bi-door-open-fill"></i>
                        <span class="text"> Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- SIDEBAR selesai -->

        <!-- CONTENT -->
        <div class="content tab-content">
            <!-- Tab Dashboard -->
            <div id="home" class="container tab-pane active" style="text-align: center;">
                <span style="font-size:65px; color: #FFFF;">Selamat Datang <br> <i class="fw-bold">Eka Nurseva
                        Saniyah</i> <br>
                    di</span>
                <br>
                <img class="img" src="image/Logo2.png" alt="" style="width: 400px;">
            </div>
            <!-- Tab Dashboard selesai -->

            <!-- Tab Data Mahasiswa -->
            <div id="mhs" class="container tab-pane fade">
                <div class="row mb-2">
                    <div class="col">
                        <a class="icon-plus ms-2" href="#insertMhs">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="#EA7A7A"
                                class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                            </svg>
                            Insert
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table text-white">
                            <thead class="topTable">
                                <tr class="header">
                                    <th scope="col">NIM</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">PRODI</th>
                                    <th scope="col">SMT</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="contentTable text-dark">
                                <tr class="text-white">
                                    <th scope="row">190511094</th>
                                    <td>Ahmad Nur Cahyadi</td>
                                    <td>T. Informatika</td>
                                    <td>7</td>
                                    <td>Aktif</td>
                                    <td><a href="#" class="bi bi-pen-fill text-dark"></a><span class="text-dark mx-1"
                                            style="font-size: 9px;">|</span><a href="#"
                                            class="bi bi-trash-fill text-dark"></a></td>
                                </tr>
                                <tr class="contentTable text-white">
                                    <th scope="row">190511094</th>
                                    <td>Ahmad Nur Cahyadi</td>
                                    <td>T. Informatika</td>
                                    <td>7</td>
                                    <td>Aktif</td>
                                    <td><a href="#" class="bi bi-pen-fill text-dark"></a><span class="text-dark mx-1"
                                            style="font-size: 9px;">|</span><a href="#"
                                            class="bi bi-trash-fill text-dark"></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Tab Data Mahasiswa selesai -->

            <!-- Tab Data Mata Kuliah -->
            <div id="matkul" class="container tab-pane fade">
                <div class="row mb-2">
                    <div class="col">
                        <a class="icon-plus ms-2" href="#insertMk">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="#EA7A7A"
                                class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                            </svg>
                            Insert
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table text-white">
                            <thead class="topTable">
                                <tr class="header">
                                    <th scope="col">KODE</th>
                                    <th scope="col">MATA KULIAH</th>
                                    <th scope="col">SEMESTER</th>
                                    <th scope="col">SKS</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="contentTable text-dark">
                                <tr class="text-white">
                                    <th scope="row">101</th>
                                    <td>Pemrograman Mobile</td>
                                    <td>7</td>
                                    <td>3</td>
                                    <td><a href="#" class="bi bi-pen-fill text-dark"></a><span class="text-dark mx-1"
                                            style="font-size: 9px;">|</span><a href="#"
                                            class="bi bi-trash-fill text-dark"></a></td>
                                </tr>
                                <tr class="text-white">
                                    <th scope="row">101</th>
                                    <td>Pemrograman Mobile</td>
                                    <td>7</td>
                                    <td>3</td>
                                    <td><a href="#" class="bi bi-pen-fill text-dark"></a><span class="text-dark mx-1"
                                            style="font-size: 9px;">|</span><a href="#"
                                            class="bi bi-trash-fill text-dark"></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Tab Data Mata Kuliah selesai -->

            <!-- Tab Data KRS -->
            <div id="krs" class="container tab-pane fade">
                <div class="row mb-2">
                    <div class="col">
                        <a class="icon-plus ms-2" href="#insertKrs">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="#EA7A7A"
                                class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                            </svg>
                            Insert
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table text-white">
                            <thead class="topTable">
                                <tr class="header">
                                    <th scope="col">NIM</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">PRODI</th>
                                    <th scope="col">SMT</th>
                                    <th scope="col">SKS</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="contentTable text-dark">
                                <tr class="text-white">
                                    <th scope="row">190511094</th>
                                    <td>Ahmad Nur Cahyadi</td>
                                    <td>T. Informatika</td>
                                    <td>7</td>
                                    <td>24</td>
                                    <td><a href="#" class="bi bi-pen-fill text-dark"></a><span class="text-dark mx-1"
                                            style="font-size: 9px;">|</span><a href="#"
                                            class="bi bi-trash-fill text-dark"></a></td>
                                </tr>
                                <tr class="text-white">
                                    <th scope="row">190511094</th>
                                    <td>Ahmad Nur Cahyadi</td>
                                    <td>T. Informatika</td>
                                    <td>7</td>
                                    <td>24</td>
                                    <td><a href="#" class="bi bi-pen-fill text-dark"></a><span class="text-dark mx-1"
                                            style="font-size: 9px;">|</span><a href="#"
                                            class="bi bi-trash-fill text-dark"></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Tab Data KRS selesai -->

            <!-- Register -->
            <div id="registrasi" class="container tab-pane fade">
                <div class="form-box">
                    <button type="button" class="toggle-button">WELCOME to M PROJECT</button>
                    <div class="logo">
                        <img src="image/Logo.png" alt="" />
                    </div>
                    <form id="login" action="POST" method="" class="input-group">
                        <input type="text" class="input-field" placeholder="Username" name="username" />
                        <input type="password" class="input-field" placeholder="Password" name="pwd" />
                        <input type="text" class="input-field" placeholder="Level" name="level" />
                        <div class="check-box">
                            <input type="checkbox" />
                            <span>I'm agree with that</span>
                        </div>
                        <button class="submit-button">Daftarkan</button>
                    </form>
                </div>
            </div>
            <!-- Register selesai -->

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
                                <span>: 190511012</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <label for="nama" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                <span>: Eka Nurseva Saniyah</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <span>: ekanursevas@gmail.com</span>
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
                                <span>: 2022/2023 Ganjil</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <label for="ipk" class="col-sm-4 col-form-label">IPK</label>
                                <span>: 4.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BIODATA selesai -->

            <!--ABOUT-->
            <div id="about" class="container tab-pane fade">
                <h3 class="mt-4 text-white">M-PROJECT</h3>
                <div class="box mt-3">
                    <div class="row mt-1">
                        <span style="text-align: center;">M-Project merupakan aplikasi pengisian KRS online berbasis
                            webdroid yang
                            mana adalah hasil dari tugas akhir Mata Kuliah Pemrograman Bergerak</span>
                    </div>
                </div>
            </div>
            <!-- ABOUT selesai -->
            <!-- CONTENT selesai -->
        </div>
    </div>
    <!-- Js Bootstrap -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Js lokal -->
    <script src="folder_js/script-admin.js"></script>
</body>

</html>