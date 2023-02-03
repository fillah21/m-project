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

    $id_matkul = $_GET['idmatkul'];

    $data_matkul = query("SELECT * FROM mata_kuliah WHERE id_matkul = $id_matkul") [0];
    
    if ($data_diri['level'] !== "Admin") {
        echo "<script>
                alert('Hak akses tidak diizinkan');
                document.location.href='logout.php';
            </script>";
        exit;
    }

    // Proses edit matkul
    if(isset($_POST['submit_mk'])) {
        if(edit_matkul($_POST) > 0) {
            echo "
                <script>
                alert('Data Berhasil Diubah');
                document.location.href='admin.php';
                </script>
            ";
        } else {
            echo "
                <script>
                alert('Data Gagal Diubah');
                document.location.href='admin.php';
                </script>
            ";
        }
    }
    // Proses edit matkul selesai

    if(isset($_POST['back'])) {
        echo "
            <script>
                document.location.href='admin.php';
            </script>
        ";
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
        <!-- Edit data matkul -->
        <div class="container-sm tab-pane active" id="editMk">
            <h3>Edit Mata Kuliah</h3>
            <form action="" method="post">
                <fieldset>
                    <input type="hidden" name="id_matkul" value="<?= $data_matkul['id_matkul']; ?>">
                    <input type="text" placeholder="Kode" name="kode_matkul" value="<?= $data_matkul['kode_matkul']; ?>" required>
                    <input type="text" placeholder="Nama Mata Kuliah" name="nama_matkul" value="<?= $data_matkul['nama_matkul']; ?>" required>
                    <select name="semester_matkul" required>
                        <option value="<?= $data_matkul['semester_matkul']; ?>" selected hidden><?= $data_matkul['semester_matkul']; ?></option>
                        <option value="1" class="select-jk">1</option>
                        <option value="2" class="select-jk">2</option>
                        <option value="3" class="select-jk">3</option>
                        <option value="4" class="select-jk">4</option>
                        <option value="5" class="select-jk">5</option>
                        <option value="6" class="select-jk">6</option>
                        <option value="7" class="select-jk">7</option>
                        <option value="7" class="select-jk">8</option>
                    </select>
                    <input type="text" placeholder="SKS" name="sks" value="<?= $data_matkul['sks']; ?>" required>
                    
                    <button type="submit" class="btn" name="submit_mk">
                        <a>UPDATE</a>
                    </button>
                    <button type="submit" class="btn" name="back">
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