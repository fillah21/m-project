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

    $id_mahasiswa = $_GET['idkrs'];

    $data_diri = query("SELECT * FROM user WHERE id_user = $deskripsi")[0];

    $data_mahasiswa = query("SELECT * FROM user WHERE id_user = $id_mahasiswa") [0];


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
                            <input type="text" readonly value="<?= $data_mahasiswa['no_induk']; ?>" name="nim">
                        </div>
                        <div>
                            <span>Nama</span>
                            <p>:</p>
                            <input type="text" readonly value="<?= $data_mahasiswa['nama']; ?>" name="nama">
                        </div>
                        <div>
                            <span>Semester</span>
                            <p>:</p>
                            <input type="text" readonly value="<?= $data_mahasiswa['semester']; ?>" name="semester">
                        </div>
                        <div>
                            <span>IPK</span>
                            <p>:</p>
                            <input type="text" readonly value="<?= $data_mahasiswa['ipk']; ?>" name="ipk">
                        </div>
                    </fieldset>
                </form>
                <p class="mt-3">Daftar Mata Kuliah Yang Diajukan</p>
                <div class="table-responsive" id="krsMhs">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mata Kuliah</th>
                                <th scope="col">Semester</th>
                                <th scope="col">SKS</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $data_krs = query("SELECT * FROM krs WHERE id_user = $id_mahasiswa");
                                $jumlah = 0;
                                foreach($data_krs as $krs) :
                                    $id_matkul = $krs['id_matkul'];
                                    $data_matkul = query("SELECT * FROM mata_kuliah WHERE id_matkul = $id_matkul");
                                    foreach($data_matkul as $matkul) :
                                    
                            ?>
                            <tr>
                                <?php $jumlah = $jumlah + $matkul['sks']; ?>
                                <th scope="row"><?= $matkul['nama_matkul']; ?></th>
                                <td><?= $matkul['semester_matkul']; ?></td>
                                <td><?= $matkul['sks']; ?></td>
                                <td class="btn-delete-krs">
                                    <a href="delete.php?idkrs=<?= $krs['id_krs']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus mata kuliah?')"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <?php 
                                    endforeach;
                                endforeach;
                            ?>
                        </tbody>
                    </table>

                    <p class="mt-3">Jumlah SKS : <?= $jumlah; ?></p>
                </div>
                <div id="toggleKrs">
                    <button type="button" class="btn btn-outline-danger btn-sm me-2" id="beforeKrs">
                        <a href="admin.php">BACK</a>
                    </button>
                    <button type="button" class="btn btn-outline-danger btn-sm me-2" id="upKrs" onclick="return confirm('Apakah anda yakin membuka validasi?')">
                        <a href="delete.php?iduser=<?= $id_mahasiswa; ?>">BUKA VALIDASI</a>
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