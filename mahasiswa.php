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
    <link rel="Icon" href="image/Logo.png">
    <!--CSS Lokal-->
    <link rel="stylesheet" href="folder_css/mahasiswa.css">

     <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--Icon Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <!--SIDEBAR MAHASISWA-->
    <div class="container-fluid d-flex" id="container" style="min-height: 100vh; background-color: #D23939; padding-left: 0px;">
        <div class="sidebar">
            <div class="header justify-content-between">
                <a href="image/Logo.png">
                    <img class="img" src="image/Logo3.png" alt="">
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

            <!--PROFIL-->
            <div class="profil">
                <?php if($data_diri['foto'] != "") : ?>
                    <img src="profil/<?= $data_diri['foto']; ?>" class="rounded-circle" alt="profi">
                <?php else : ?>
                    <img src="profil/default.png ?>" class="rounded-circle" alt="profi">
                <?php endif; ?>
                    <span  id="opedit"><a href="edit-foto-user.php"><button class="rounded-circle"><i class="bi bi-brush-fill"></i></button></a></span>
                <h1><?= $data_diri['nama']; ?></h1>
            </div>
            <!--PROFIL SELESAI-->

            <ul class="nav list-unstyled mt-3px" role="tablist">
                <li class="nav-link">
                    <a href="#home" class="d-block" data-bs-toggle="tab"><i class="bi bi-house-door-fill"></i>
                        <span class="text"> Home</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a class="dd" data-bs-toggle="tab" href="dropdown">
                        <i class="bi bi-bookmark-star-fill"></i><span class="text"> KRS</span> 
                        <i class="icon bi bi-caret-down-fill"></i>
                    </a>
                    <ul id="dropdown">
                        <?php if($data_diri['semester'] % 2) : ?>
                            <li><a id="sem1" data-bs-toggle="tab" href="#smt1">Semester 1</a></li>
                            <li><a id="sem3" data-bs-toggle="tab" href="#smt3">Semester 3</a></li>
                            <li><a id="sem5" data-bs-toggle="tab" href="#smt5">Semester 5</a></li>
                            <li><a id="sem7" data-bs-toggle="tab" href="#smt7">Semester 7</a></li>
                        <?php else : ?>
                            <li><a id="sem1" data-bs-toggle="tab" href="#smt2">Semester 2</a></li>
                            <li><a id="sem3" data-bs-toggle="tab" href="#smt4">Semester 4</a></li>
                            <li><a id="sem5" data-bs-toggle="tab" href="#smt6">Semester 6</a></li>
                            <li><a id="sem7" data-bs-toggle="tab" href="#smt8">Semester 8</a></li>
                        <?php endif; ?>
                        <li><a id="val" data-bs-toggle="tab" href="#validasi">Validasi Ajuan</a></li>
                    </ul>
                </li>
                <li class="nav-link">
                    <a href="#biodata" class="d-block" data-bs-toggle="tab"><i class="bi bi-person-lines-fill"></i> 
                        <span class="text"> Biodata</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#about" class="d-block" data-bs-toggle="tab"><i class="bi bi-gear-wide"></i> 
                        <span class="text"> About</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="logout.php" ><i class="bi bi-door-open-fill"></i>
                        <span class="text"> Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <!--CONTENT MAHASISWA-->
        <div class="content tab-content" id="content">
            <!--DASHBOARD-->
            <div id="home" class="container tab-pane active" style="text-align: center;">
                <header>
                    SELAMAT DATANG <br> <?= $data_diri['nama']; ?>
                </header>    
                <footer> <img src="image/Logo2.png" alt="Logo2"></footer>
            </div>
            <!--DASHBOARD SELESAI-->  
            
            <!--KRS-->
            <?php for ($f = 1; $f <= 6; $f++) : ?>
            <div class="container tab-pane" id="smt<?= $f; ?>">
                <h3 class="mt-4 text-white">Semester <?= $f; ?></h3>
                    <div class="box mt-3 col-sm table-responsive">
                            <h5>Daftar Mata Kuliah Wajib</h5>
                            <table class="table">
                                <thead class="table-defult">
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php 
                                        $semester = query("SELECT * FROM mata_kuliah WHERE semester_matkul = '$f'");
                                        foreach ($semester as $smtr) :
                                        
                                    ?>
                                    <tr>
                                        <td><?= $smtr['kode_matkul']; ?></td>
                                        <td><?= $smtr['nama_matkul']; ?></td>
                                        
                                        <td><?= $smtr['semester_matkul']; ?></td>
                                        <td><?= $smtr['sks']; ?></td>
                                        <td>
                                            <button id="btnpilih1" class="btn btn-sm" type="menu">
                                                <i class="bi bi-check-square"></i><a href="tambah-krs.php?idmatkul=<?= $smtr['id_matkul']; ?>"> Pilih</a>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                    </div>
                <footer style="text-align: center;"> <img src="image/Logo2.png" alt="Logo2"></footer>
            </div>
            
            <?php endfor; ?>

            <div id="smt7" class="container tab-pane">
                <h3 class="mt-4 text-white">Semester 7</h3>
                    <div class="box mt-3">
                            <h5>Daftar Mata Kuliah Wajib</h5>
                            <table class="table col-sm table-responsive">
                                <thead class="table-defult">
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php 
                                        $semester = query("SELECT * FROM mata_kuliah WHERE semester_matkul = '7'");
                                        foreach ($semester as $smtr) :
                                        
                                    ?>
                                    <tr>
                                        <td><?= $smtr['kode_matkul']; ?></td>
                                        <td><?= $smtr['nama_matkul']; ?></td>
                                        
                                        <td><?= $smtr['semester_matkul']; ?></td>
                                        <td><?= $smtr['sks']; ?></td>
                                        <td>
                                            <button id="btnpilih1" class="btn btn-sm" type="menu">
                                                <i class="bi bi-check-square"></i><a href="#pilih1"> Pilih</a>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="box mt-3">
                            <h5>Daftar Mata Kuliah Tambahan</h5>
                            <table class="table">
                                <thead class="table-defult">
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php 
                                        $semester = query("SELECT * FROM mata_kuliah WHERE semester_matkul = '9'");
                                        foreach ($semester as $smtr) :
                                        
                                    ?>
                                    <tr>
                                        <td><?= $smtr['kode_matkul']; ?></td>
                                        <td><?= $smtr['nama_matkul']; ?></td>
                                        
                                        <td>Tambahan</td>
                                        <td><?= $smtr['sks']; ?></td>
                                        <td>
                                            <button id="btnpilih1" class="btn btn-sm" type="menu">
                                                <i class="bi bi-check-square"></i><a href="#pilih1"> Pilih</a>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                <footer style="text-align: center;"> <img src="image/Logo2.png" alt="Logo2"></footer>
            </div>

            <div id="smt8" class="container tab-pane">
                <h3 class="mt-4 text-white">Semester 8</h3>
                    <div class="box mt-3 table-responsive">
                            <h5>Daftar Mata Kuliah Wajib</h5>
                            <table class="table">
                                <thead class="table-defult">
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php 
                                        $semester = query("SELECT * FROM mata_kuliah WHERE semester_matkul = '8'");
                                        foreach ($semester as $smtr) :
                                        
                                    ?>
                                    <tr>
                                        <td><?= $smtr['kode_matkul']; ?></td>
                                        <td><?= $smtr['nama_matkul']; ?></td>
                                        
                                        <td><?= $smtr['semester_matkul']; ?></td>
                                        <td><?= $smtr['sks']; ?></td>
                                        <td>
                                            <button id="btnpilih1" class="btn btn-sm" type="menu">
                                                <i class="bi bi-check-square"></i><a href="#pilih1"> Pilih</a>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="box mt-3">
                            <h5>Daftar Mata Kuliah Tambahan</h5>
                            <table class="table">
                                <thead class="table-defult">
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php 
                                        $semester = query("SELECT * FROM mata_kuliah WHERE semester_matkul = '9'");
                                        foreach ($semester as $smtr) :
                                        
                                    ?>
                                    <tr>
                                        <td><?= $smtr['kode_matkul']; ?></td>
                                        <td><?= $smtr['nama_matkul']; ?></td>
                                        
                                        <td>Tambahan</td>
                                        <td><?= $smtr['sks']; ?></td>
                                        <td>
                                            <button id="btnpilih1" class="btn btn-sm" type="menu">
                                                <i class="bi bi-check-square"></i><a href="#pilih1"> Pilih</a>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                <footer style="text-align: center;"> <img src="image/Logo2.png" alt="Logo2"></footer>
            </div>

            <div id="validasi" class="container tab-pane">
                <h3 class="mt-4 text-white">KRS</h3>
                    <div class="box mt-3">
                        <h6>Detail Mahasiswa</h6>
                        <div class="row mt-1">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="nim" class="col-sm-4 col-form-label">NIM</label>
                                    <span>: <?= $data_diri['no_induk']; ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label for="smt" class="col-sm-4 col-form-label">Semester</label>
                                    <span>: <?= $data_diri['semester']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="nama" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                    <span>: <?= $data_diri['nama']; ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label for="sks" class="col-sm-4 col-form-label">Jumlah SKS yang bisa diambil</label>
                                    <span>: <?= $jumlah_sks; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="box mt-3">
                        <h6>Daftar Mata Kuliah Yang Diajukan</h6>
                        <table class="table">
                            <thead class="table-defult">
                                <tr>
                                    <th scope="col">Mata Kuliah</th>
                                    <th scope="col">SKS</th>
                                    <th scope="col">Keterangan</th>
                                    <?php if($data_diri['sudah_krs'] == "Belum") : ?>
                                        <th scope="col">Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <tr>
                                    <td>Pemrograman Bergerak</td>
                                    <td>3</td>
                                    <?php if($data_diri['sudah_krs'] == "Belum") : ?>
                                        <td>Belum Validasi</td>
                                        <td>
                                            <a href="" class="text-dark" style="text-decoration: none; list-style-type: none;">
                                                <i class="bi bi-file-earmark-x-fill"></i>delete
                                            </a>
                                        </td>
                                    <?php else : ?>
                                        <td>Sudah Validasi</td>
                                    <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-md-6 p-2" style="font-size:12px;">
                            <label for="sks-ambil">Jumlah SKS yang telah diambil</label>
                            <span>: 3</span>
                        </div>
                    </div>
                    <?php if($data_diri['sudah_krs'] == "Belum") : ?>
                        <div class="box mt-3 d-grid">
                            <span style="font-size: 11px; font: grey">Note: Pastikan data yang dipilih telah sesuai!</span>
                            <button type="submit" name="submit" class="btn btn-outline-danger btn-danger text-light">Validasi</button>
                        </div>
                    <?php endif; ?>
                <footer style="text-align: center;"> <img src="image/Logo2.png" alt="Logo2"></footer>
            </div>

            <!--BIODATA-->
            <div id="biodata" class="container tab-pane fade">
                <h4 class="mt-4 text-white">BIODATA MAHASISWA</h4>
                    <div class="box mt-3">
                    <h5>Detail Mahasiswa</h5>
                        <div class="row mt-1">
                            <div class="col-md-13">
                                <div class="">
                                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                    <span>: <?= $data_diri['no_induk']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-13">
                                <div class="">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                                    <span>: <?= $data_diri['nama']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-13">
                                <div class="">
                                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <?php if($data_diri['jk'] == "L" ) : ?>
                                        <span>: Laki-Laki</span>
                                    <?php elseif ($data_diri['jk'] == "P" ) : ?>
                                        <span>: Perempuan</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-13">
                                <div class="">
                                    <label for="smt" class="col-sm-2 col-form-label">Semester</label>
                                    <span>: <?= $data_diri['semester']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-13">
                                <div class="">
                                    <label for="ipk" class="col-sm-2 col-form-label">IPK</label>
                                    <span>: <?= $data_diri['ipk']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-13">
                                <div class="">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <span>: <?= $data_diri['email']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-13">
                                <div class="">
                                    <label for="almt" class="col-sm-2 col-form-label">Alamat</label>
                                    <span>: <?= $data_diri['alamat']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-13">
                                <div class="">
                                    <label for="no" class="col-sm-2 col-form-label">No Handphone</label>
                                    <span>: <?= $data_diri['no_hp']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <footer style="text-align: center;"> <img src="image/Logo2.png" alt="Logo2"></footer>
            </div>

            <!--ABOUT-->
            <div id="about" class="container tab-pane fade">
                <h3 class="mt-4 text-white">M-PROJECT</h3>
                <div class="box mt-3">
                    <div class="row mt-1 fw-bold text-center">
                        <span>M-Project merupakan aplikasi pengisian KRS online berbasis webdroid yang mana adalah hasil dari tugas akhir Mata Kuliah Pemrograman Bergerak</span>
                    </div>
                </div>
                <div class="box mt-3">
                    <div class="email row mt-1">
                        <span>M-Project dirancang oleh:</span>
                        <i style="text-align: center; font-size: 25px;" class="bi bi-envelope"></i>
                        <span style="font-weight: normal; color: black">ekanursevas@gmail.com</span>
                        <span style="font-weight: normal; color: black">arcanearlaze02@gmail.com</span>
                        <span style="font-weight: normal; color: black">fillah.alhaqi11@gmail.com</span>
                        <span style="font-weight: normal; color: black">velyafitria@gmail.com</span>
                    </div>
                    <div class="row mt-3 text-center">
                        <div class="insta col-md-6">
                            <a style="font-size: 12px; cursor: pointer; text-decoration: none; color: black" href="https://www.instagram.com/ekanurseva/"><i class="bi bi-instagram"></i> ekanurseva</a>
                            <a style="font-size: 12px;  cursor: pointer; text-decoration: none; color: black" href="https://instagram.com/fillah_alhaqi21/"><i class="bi bi-instagram"></i> fillah_alhaqi21</a>
                        </div>
                        <div class="insta col-md-6">
                            <a style="font-size: 12px;  cursor: pointer; text-decoration: none; color: black" href="https://www.instagram.com/cimets_13/"><i class="bi bi-instagram"> cimets_13</i></a>
                            <a style="font-size: 12px;  cursor: pointer;text-decoration: none; color: black" href="https://www.instagram.com/velyafitri.azzahra/"><i class="bi bi-instagram"> velyafitri.azzahra</i></a>
                        </div>
                    </div>
                </div>
                <footer style="text-align: center;"> <img src="image/Logo2.png" alt="Logo2"></footer>
            </div>
        </div>
    </div>

    <!--Javascript-->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="folder_js/script-mhs.js"></script>
</body>
</html>