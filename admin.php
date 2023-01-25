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
    // Jika fungsi registrasi berhasil
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
    // Jika fungsi registrasi berhasil
    if (register($_POST) > 0) {
        echo "
            <script>
              alert('Registrasi Berhasil');
            </script>
          ";
    } else {
        echo "<script>
                   alert('Registrasi Gagal');
                  </script>";
    }
}
// Tambah mahasiswa selesai


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
    <!-- SIDEBAR -->
    <div class="container-fluid-md d-flex" style="background-color: #D23939; padding-left: 0px;">
        <div class="sidebar" id="side-nav">
            <div class="header justify-content-between">
                <a href="#">
                    <img class="img" src="image/Logo3.png" alt="logo">
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
                <img src="profil/<?= $data_diri['foto']; ?>" class="rounded-circle" alt="profi">
                    <span  id="opedit">
                        <button class="rounded-circle" id="dropdownMenuLink" data-bs-toggle="dropdown">
                            <i class="bi bi-info-lg"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a id="opend" class="dropdown-item" href="#kelola">Kelola Data Admin</a></li>
                            <li><a id="opene" class="dropdown-item" href="#regt">Edit Data Admin</a></li>
                        </ul>
                    </span>
                <h1><?= $data_diri['nama']; ?></h1>
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
                    <a href="#mhs" class="font py-2 d-block" data-bs-toggle="tab"><i
                            class="bi bi-journal-bookmark-fill"></i>
                        <span class="text"> Mahasiswa</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#matkul" class="font py-2 d-block" data-bs-toggle="tab"><i class="bi bi-book-fill"></i>
                        <span class="text"> Mata Kuliah</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#krs" class="font py-2 d-block" data-bs-toggle="tab"><i
                            class="bi bi-bookmark-star-fill"></i>
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
    <div class="content tab-content" id="content">
        <!-- List Edit Data Admin -->
        <div class="container-sm" id="editr">
            <h3>Edit Data Admin</h3>
            <button type="reset" class="btn back-btn" id="closee">
                <a href="#home"><i class="bi bi-x-circle-fill"></i></a>
            </button>
            <form action="">
                <fifieldset>
                    <input type="text" placeholder="Username" name="username">
                    <input type="password" placeholder="Password" name="password">
                    <input type="password" placeholder="Konformasi Password" name="password2">
                    <input type="text" placeholder="Nama" name="nama">
                    <select name="jenis kelamin">
                        <option value="" disabled selected hidden>Jenis Kelamin</option>
                        <option value="Laki-laki" class="select-jk">Laki-laki</option>
                        <option value="Perempuan" class="select-jk">Perempuan</option>
                    </select>
                    <input type="email" placeholder="Email" name="email">
                    <input type="text" placeholder="No. Telp" name="noTelp">
                    <textarea name="alamat" cols="25" rows="7" placeholder="Alamat"></textarea>
                    <img src="profil/aku.jpg">
                    <div class="input-group mb-3 uploadFoto">
                        <input type="file" class="form-control" id="inputGroupFile01">
                    </div>
                    <button type="submit" class="btn btn-sm" id="backe">
                        <a href="#home">Update</a>
                    </button>
                </fieldset>
            </form>
        </div>
        <!-- List Edit Admin End -->

        <!-- List Kelola Data Admin -->
        <!-- Data Admin -->
        <div class="container-sm" id="kelola">
            <h3>Kelola Data Admin</h3>
            <button type="reset" class="btn back-btn" id="closel">
                <a href="#home"><i class="bi bi-x-circle-fill"></i></a>
            </button>
            <button id="openr" type="button" class="btn text-white mb-2">
                <i class="bi bi-plus-square-fill me-1"></i>
                Registrasi Admin
            </button>
            <form action="">
                <fifieldset>
                    <div class="row-sm">
                        <div class="col-sm table-responsive">   
                            <table class="table text-white">
                                <thead class="topTable text-center">
                                    <tr class="headerMhs ">
                                        <th scope="col">No</th>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">JK</th>
                                        <th scope="col">No.HP</th>
                                        <th scope="col">Level</th>
                                    </tr>
                                </thead>
                                <tbody class="contentTable text-dark">
                                    <tr class=" text-white text-center">
                                        <td>1</td>
                                        <td>Makmur Sentosa</td>
                                        <td>L</td>
                                        <td>087654367897</td>
                                        <td>
                                        <span id="ganti">
                                            <button class="btn btn-sm p-0 m-0">
                                                <i id="i" class="bi bi-box-arrow-down"></i>
                                            </button>
                                        </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

        <!-- Confirm Ubah level -->
        <div class="container-sm text-center shadow" id="ganlev">
            <h3>CONFIRM</h3>
            <span></span>
            <p>Apakah anda yakin ingin mengubahnya ke level User?</p>
            <span></span>
            <div class="d-flex ms-auto">
                <button id="ya" type="button" class="btn btn-outline-primary btn-sm me-2">
                    <a href="#level">Yes</a>
                </button>
                <button id="ga" type="button" class="btn btn-outline-danger btn-sm">
                    <a href="#level">No</a>
                </button>
            </div>
        </div>

        <!-- Registrasi Admin -->
        <div class="container-sm" id="regt">
            <h3>Registrasi Admin</h3>
            <button type="reset" class="btn back-btn" id="closer">
                <a href="#home"><i class="bi bi-x-circle-fill"></i></a>
            </button>
            <form action="">
                <fifieldset>
                <input type="text" placeholder="Username" name="username">
                    <input type="password" placeholder="Password" name="password">
                    <input type="password" placeholder="Konformasi Password" name="password2">
                    <input type="text" placeholder="Nama" name="nama">
                    <select name="jenis kelamin">
                        <option value="" disabled selected hidden>Jenis Kelamin</option>
                        <option value="Laki-laki" class="select-jk">Laki-laki</option>
                        <option value="Perempuan" class="select-jk">Perempuan</option>
                    </select>
                    <input type="email" placeholder="Email" name="email">
                    <input type="text" placeholder="No. Telp" name="noTelp">
                    <textarea name="alamat" cols="25" rows="7" placeholder="Alamat"></textarea>
                    <div class="input-group mb-3 uploadFoto">
                        <input type="file" class="form-control" id="inputGroupFile01">
                    </div>
                    <button type="submit" class="btn btn-sm" id="backr">
                        <a href="#home">SUBMIT</a>
                    </button>
                </fieldset>
            </form>
        </div>
        <!-- List Kelola Data Admin End -->

        <!-- Tab Dashboard -->
        <div id="home" class="container-md tab-pane active">
            <header>
                <p>
                    Selamat Datang
                    <br>
                    <?= $data_diri['nama']; ?>
                </p>
            </header>
            <footer>
                <img src="image/Logo2.png" alt="logo">
            </footer>
        </div>
        <!-- Tab Dashboard End -->

        <!-- Tab Mahasiswa -->
        <!-- List Mahasiswa -->
        <div id="mhs" class="container-md tab-pane fade">
            <header class="mb-2">Data Mahasiswa</header>
            <button id="btnRegis" type="button" class="btn text-white mb-2">
                <i class="bi bi-plus-square-fill me-1"></i>
                Tambah Mahasiswa
            </button>
            <span class="search">
                <input type="text" name="search" placeholder="Search">
                <button class="btn"><i class="bi bi-search"></i></button>
            </span>
            <div class="row-sm">
                <div class="col-sm table-responsive" id="listItem">
                    <table class="table text-white">
                        <thead class="topTable text-center">
                            <tr class="headerMhs ">
                                <th scope="col">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">JK</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">No.HP</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">SMT</th>
                                <th scope="col">IPK</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody class="contentTable text-dark">
                            <?php $i = 1; ?>
                            <?php foreach ($data_mahasiswa as $mhs) : ?>
                                <tr class=" text-white text-center">
                                    <td><?= $i; ?></td>
                                    <th scope="row"><?= $mhs['no_induk']; ?></th>
                                    <td><?= $mhs['nama']; ?></td>
                                    <td><?= $mhs['jk']; ?></td>
                                    <td><?= $mhs['email']; ?></td>
                                    <td><?= $mhs['no_hp']; ?></td>
                                    <td><?= $mhs['alamat']; ?></td>
                                    <td><?= $mhs['semester']; ?></td>
                                    <td><?= $mhs['ipk']; ?></td>
                                    <td>
                                        <span id="btnEdit"><button class="btn btn-sm p-0 ms-1" style="width: 12px;">
                                                <i class="bi bi-pen-fill" style="font-size: 12px;"></i>
                                            </button></span>
                                        <span class="text-dark mx-1" style="font-size: 9px;">|</span>
                                        <span id="btnDel"><button class="btn btn-sm p-0 m-0 btnDelete" style="width: 12px;">
                                                <i class="bi bi-trash-fill" style="font-size: 12px;"></i>
                                            </button></span>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="jumlahData">Jumlah Data : <?= $jumlah_mahasiswa; ?></div>
            <footer><img src="image/Logo2.png" alt="logo"></footer>
        </div>
        <!-- List Mahasiswa End -->

        <!-- Registrasi Mahasiswa -->
        <div class="container-sm" id="regis">
            <h3>Registrasi Mahasiswa</h3>
            <button type="reset" class="btn back-btn" id="backBtn">
                <a href="#mhs"><i class="bi bi-x-circle-fill"></i></a>
            </button>
            <form action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <input type="text" placeholder="Username" name="username">
                    <input type="password" placeholder="Password" name="pwd">
                    <input type="password" placeholder="Konformasi Password" name="pwd2">
                    <input type="text" placeholder="Nama" name="nama">
                    <input type="email" placeholder="Email" name="email">
                    <label for="foto" class="mb-1">Foto Profil :</label>
                    <div class="input-group uploadFoto">
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <input type="text" placeholder="NIM" name="no_induk">
                    <select name="semester">
                        <option value="" disabled selected hidden>Semester</option>
                        <option value="1" class="select-jk">1</option>
                        <option value="2" class="select-jk">2</option>
                        <option value="3" class="select-jk">3</option>
                        <option value="4" class="select-jk">4</option>
                        <option value="5" class="select-jk">5</option>
                        <option value="6" class="select-jk">6</option>
                        <option value="7" class="select-jk">7</option>
                        <option value="8" class="select-jk">8</option>
                    </select>
                    <input type="text" placeholder="IPK" name="ipk">
                    <textarea name="alamat" cols="25" rows="7" placeholder="Alamat"></textarea>
                    <input type="number" placeholder="No. Telp" name="no_hp">
                    <select name="jk">
                        <option value="" disabled selected hidden>Jenis Kelamin</option>
                        <option value="L" class="select-jk">Laki-laki</option>
                        <option value="P" class="select-jk">Perempuan</option>
                    </select>
                    <button type="submit" class="btn btn-sm" name="submit_mahasiswa">
                        SUBMIT
                    </button>
                </fieldset>
            </form>
        </div>
        <!-- Registrasi Mahasiswa End -->

        <!-- Edit Data Mahasiswa -->
        <div class="container-sm" id="edit">
            <h3>Edit Data Mahasiswa</h3>
            <button type="reset" class="btn back-btn" id="backBtnEdit">
                <a href="#mhs"><i class="bi bi-x-circle-fill"></i></a>
            </button>
            <form action="">
                <fieldset>
                    <input class="usePass" type="text" placeholder="Username" name="username">
                    <input class="usePass" type="password" placeholder="Password" name="password">
                    <input type="text" placeholder="Nama" name="nama">
                    <select name="jenis kelamin">
                        <option value="" disabled selected hidden>Jenis Kelamin</option>
                        <option value="Laki-laki" class="select-jk">Laki-laki</option>
                        <option value="Perempuan" class="select-jk">Perempuan</option>
                    </select>
                    <input type="email" placeholder="Email" name="email">
                    <input type="text" placeholder="NIM" name="nim">
                    <select name="semester">
                        <option value="" disabled selected hidden>Semester</option>
                        <option value="1" class="select-jk">1</option>
                        <option value="2" class="select-jk">2</option>
                        <option value="3" class="select-jk">3</option>
                        <option value="4" class="select-jk">4</option>
                        <option value="5" class="select-jk">5</option>
                        <option value="6" class="select-jk">6</option>
                        <option value="7" class="select-jk">7</option>
                    </select>
                    <input type="text" placeholder="IPK" name="ipk">
                    <input type="text" placeholder="No. Telp" name="noTelp">
                    <textarea name="alamat" cols="25" rows="7" placeholder="Alamat"></textarea>
                    <div class="input-group mb-3 uploadFoto">
                        <input type="file" class="form-control" id="inputGroupFile01">
                    </div>
                    <button type="submit" class="btn d-flex justify-content-center ms-auto" id="closeEdit">
                        <a href="#mhs">UPDATE</a>
                    </button>
                </fieldset>
            </form>
        </div>
        <!-- Edit Data Mahasiswa End -->

        <!-- Delete Mahasiswa -->
        <div class="container-sm text-center shadow" id="delete">
            <h3>CONFIRM</h3>
            <span></span>
            <p>Apakah anda yakin ingin menghapusnya?</p>
            <span></span>
            <div class="d-flex ms-auto">
                <button id="confirm" type="button" class="btn btn-outline-primary btn-sm me-2">
                    <a href="#mhs">Yes</a>
                </button>
                <button id="back" type="button" class="btn btn-outline-danger btn-sm">
                    <a href="#mhs">No</a>
                </button>
            </div>
        </div>
        <!-- Delete Mahasiswa End -->
        <!-- Tab Mahasiswa End -->

        <!-- Tab Mata kuliah -->
        <!-- list Mk -->
        <div id="matkul" class="container-md tab-pane fade">
            <header class="mb-2">Data Mata Kuliah</header>
            <button id="btnMatkul" type="button" class="btn text-white mb-2">
                <i class="bi bi-plus-square-fill me-1"></i>
                Tambah Mata Kuliah
            </button>
            <span class="search">
                <input type="text" name="search" placeholder="Search">
                <button class="btn"><i class="bi bi-search"></i></button>
            </span>
            <div class="row-sm">
                <div class="col-sm table-responsive" id="listMatkul">
                    <table class="table text-white">
                        <thead class="topTable text-center">
                            <tr class="headerMatkul">
                                <th scope="col">NO</th>
                                <th scope="col">KODE</th>
                                <th scope="col">NAMA MATA KULIAH</th>
                                <th scope="col">SEMESTER</th>
                                <th scope="col">SKS</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody class="contentTable text-dark">
                            <?php $j = 1; ?>
                            <?php foreach ($data_matkul as $matkul) : ?>
                                <tr class="text-white text-center">
                                    <td><?= $j; ?></td>
                                    <th scope="row"><?= $matkul['kode_matkul']; ?></th>
                                    <td><?= $matkul['nama_matkul']; ?></td>
                                    <td><?= $matkul['semester_matkul']; ?></td>
                                    <td><?= $matkul['sks']; ?></td>
                                    <td>
                                        <span id="btnEditMk">
                                            <button class="btn btn-sm p-0 m-0" style="width: 12px;">
                                                <i class="bi bi-pen-fill" style="font-size: 12px;"></i>
                                            </button>
                                        </span>
                                        <span class="text-dark mx-1" style="font-size: 9px;">|</span>
                                        <span id="btnDelMk">
                                            <button class="btn btn-sm p-0 m-0" style="width: 12px;">
                                                <i class="bi bi-trash-fill" style="font-size: 12px;"></i>
                                            </button>
                                        </span>
                                    </td>
                                </tr>
                                <?php $j++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="jumlahData">Jumlah Data</div>
            <footer><img src="image/Logo2.png" alt="logo"></footer>
        </div>
        <!-- list Mk End -->

        <!-- Input data matkul -->
        <div class="container-sm" id="inputMk">
            <h3>Insert Mata Kuliah</h3>
            <button type="reset" class="btn back-btn" id="backBtnMk">
                <a href="#matkul"><i class="bi bi-x-circle-fill"></i></a>
            </button>
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
                    </select>
                    <input type="text" placeholder="SKS" name="sks">
                    <button type="submit" class="btn d-flex justify-content-center ms-auto" id="closeMatkul">
                        <a href="#matkul">SUBMIT</a>
                    </button>
                </fieldset>
            </form>
        </div>
        <!-- Input data matkul End -->

        <!-- Edit data matkul -->
        <div class="container-sm" id="editMk">
            <h3>Edit Mata Kuliah</h3>
            <button type="reset" class="btn back-btn" id="backEditMk">
                <a href="#matkul"><i class="bi bi-x-circle-fill"></i></a>
            </button>
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
                    </select>
                    <input type="text" placeholder="SKS" name="sks">
                    <button type="submit" class="btn d-flex justify-content-center ms-auto" id="closeEditMk">
                        <a href="#matkul">UPDATE</a>
                    </button>
                </fieldset>
            </form>
        </div>
        <!-- Edit data matkul End -->

        <!-- Delete matkul -->
        <div class="container-sm text-center shadow" id="deleteMk">
            <h3>CONFIRM</h3>
            <span></span>
            <p>Apakah anda yakin ingin menghapusnya?</p>
            <span></span>
            <div class="d-flex ms-auto">
                <button id="confirmMk" type="button" class="btn btn-outline-primary btn-sm me-2">
                    <a href="#matkul">Yes</a>
                </button>
                <button id="backMk" type="button" class="btn btn-outline-danger btn-sm">
                    <a href="#matkul">No</a>
                </button>
            </div>
        </div>
        <!-- Delete matkul End -->
        <!-- Tab Mata kuliah End -->

        <!-- Tab KRS -->
        <!-- list KRS -->
        <div id="krs" class="container-md tab-pane fade">
            <header class="mb-4">Data KRS</header>
            <span class="search">
                <input type="text" name="search" placeholder="Search">
                <button class="btn"><i class="bi bi-search"></i></button>
            </span>
            <div class="row-sm">
                <div class="col-sm table-responsive" id="listKrs">
                    <table class="table text-white">
                        <thead class="topTable text-center">
                            <tr class="headerKrs ">
                                <th scope="col">NIM</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">SEMESTER</th>
                                <th scope="col">SKS</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody class="contentTable text-dark">
                            <tr class="text-white text-center">
                                <th scope="row">190511094</th>
                                <td>Ahmad Nur Cahyadi</td>
                                <td>7</td>
                                <td>24</td>
                                <td>
                                    <button id="btnDetail" class="btn btn-sm" type="menu"><a
                                            href="#detailKrs">DETAIL</a></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="jumlahData">Jumlah Data</div>
            <footer><img src="image/Logo2.png" alt="logo"></footer>
        </div>
        <!-- list KRS End -->

        <!-- Detail KRS -->
        <div class="container-sm" id="detailKrs">
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
                                <td><i class="bi bi-trash"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Sistem Pakar</th>
                                <td>3</td>
                                <td><i class="bi bi-trash"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Riset Operasi</th>
                                <td>3</td>
                                <td><i class="bi bi-trash"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Big Data</th>
                                <td>3</td>
                                <td><i class="bi bi-trash"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Kecerdasan Buatan</th>
                                <td>3</td>
                                <td><i class="bi bi-trash"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="toggleKrs">
                    <button type="button" class="btn btn-outline-danger btn-sm me-2" id="beforeKrs">
                        <a href="#krs">BACK</a>
                    </button>
                    <button type="button" class="btn btn-outline-danger btn-sm me-2" id="upKrs">
                        <a href="#krs">UNBLOCK</a>
                    </button>
                </div>
            </div>
            <footer><img src="image/Logo2.png" alt="logo"></footer>
        </div>

        <!-- Delete Krs -->
        <div class="container-sm text-center shadow" id="deleteKrs">
            <h3>CONFIRM</h3>
            <span></span>
            <p>Apakah anda yakin ingin menghapusnya?</p>
            <span></span>
            <div class="d-flex ms-auto">
                <button id="confirmKrs" type="button" class="btn btn-outline-primary btn-sm me-2">
                    <a href="#krs">Yes</a>
                </button>
                <button id="backKrs" type="button" class="btn btn-outline-danger btn-sm">
                    <a href="#krs">No</a>
                </button>
            </div>
        </div>
        <!-- Delete Krs End -->
        <!-- Detail KRS End -->
        <!-- Tab KRS End -->

        <!-- Tab About -->
        <div id="about" class="container-md tab-pane fade">
            <h2 class="mb-2">About This Apps</h2>
            <article>M-Project merupakan aplikasi pengisian KRS online berbasis webdroid yang mana adalah hasil dari
                tugas akhir Mata Kuliah
                Pemrograman Bergerak</article>
            <div id="medsos">
                <p>M-Project dirancang oleh :</p>
                <i id="icon" class="bi bi-envelope-at"></i>
                <div class="email">
                    <a href="">ekanursevas@gmail.com</a>
                    <a href="">arcanearlaze02@gmail.com</a>
                    <a href="">fillah.alhaqi11@gmail.com</a>
                    <a href="">velyafitria@gmail.com</a>
                </div>
                <div class="insta d-flex flex-wrap">
                    <ul>
                        <li class="p-1">
                            <i class="bi bi-instagram"></i>
                            <a href="https://instagram.com/cimets_13?igshid=OGQ2MjdiOTE=">cimets_13</a>
                        </li>
                        <li class="p-1">
                            <i class="bi bi-instagram"></i>
                            <a
                                href="https://instagram.com/velyafitri.azzahra?igshid=OGQ2MjdiOTE=">velyafitri.azzahra</a>
                        </li>
                    </ul>
                    <ul>
                        <li class="p-1">
                            <i class="bi bi-instagram"></i>
                            <a href="https://instagram.com/fillah_alhaqi21?igshid=YmMyMTA2M2Y=">fillah_alhaqi21</a>
                        </li>
                        <li class="p-1">
                            <i class="bi bi-instagram"></i>
                            <a href="https://instagram.com/ekanurseva?igshid=OGQ2MjdiOTE=">ekanurseva</a>
                        </li>
                    </ul>
                </div>
            </div>
            <footer><img src="image/Logo2.png" alt="logo"></footer>
        </div>
        <!-- Tab About End -->
    </div>
    <!-- CONTENT END -->

    <!-- Js Bootstrap -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Js lokal -->
    <script src="folder_js/script-admin.js"></script>
</body>

</html>