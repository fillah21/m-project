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

    $id_mhs = $_GET['idmhs'];

    $data_mhs = query("SELECT * FROM user WHERE id_user = $id_mhs") [0];

    if($data_mhs['jk'] == "L") {
        $jk = "Laki-Laki";
    } else {
        $jk = "Perempuan";
    }

    if ($data_diri['level'] !== "Admin") {
        echo "<script>
            alert('Hak akses tidak diizinkan');
            document.location.href = 'logout.php';
        </script>";
        exit;
    }

    if(isset($_POST['submit'])) {
        if(edit_mhs($_POST) > 0) {
            echo "
                <script>
                alert('Data Berhasil Diubah');
                
                </script>
            ";
        } else {
            echo "
                <script>
                alert('Data Gagal Diubah');
                
                </script>
            ";
        }  
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
        <!-- Edit Data Mahasiswa -->
        <div class="container-sm tab-pane active" id="edit">
            <h3>Edit Data Mahasiswa</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <input type="hidden" name="foto_lama" value="<?= $data_mhs['foto']; ?>">
                    <input type="hidden" name="username_lama" value="<?= $data_mhs['username']; ?>">
                    <input type="hidden" name="pwd_lama" value="<?= $data_mhs['pwd']; ?>">
                    <input type="hidden" name="id_user" value="<?= $data_mhs['id_user']; ?>">
                    <input class="usePass" type="text" placeholder="Username" name="username" value="<?= $data_mhs['username']; ?>">
                    <input class="usePass" type="password" placeholder="Password" name="pwd" value="<?= $data_mhs['pwd']; ?>">
                    <input class="usePass" type="password" placeholder="Konfirmasi Password" name="pwd2" value="<?= $data_mhs['pwd']; ?>">
                    <input type="text" placeholder="Nama" name="nama" value="<?= $data_mhs['nama']; ?>">
                    <input type="email" placeholder="Email" name="email" value="<?= $data_mhs['email']; ?>">
                    <label for="foto" class="mb-1">Foto Profil : </label>
                    <div class="input-group mb-3 uploadFoto">
                        <input type="file" class="form-control" name="foto">
                        <label for="foto" class="mb-1">*kosongkan jika tidak ingin mengganti foto</label>
                    </div>
                    <input type="text" placeholder="NIM" name="no_induk" value="<?= $data_mhs['no_induk']; ?>">
                    <select name="semester">
                        <option value="<?= $data_mhs['semester']; ?>" selected hidden><?= $data_mhs['semester']; ?></option>
                        <option value="1" class="select-jk">1</option>
                        <option value="2" class="select-jk">2</option>
                        <option value="3" class="select-jk">3</option>
                        <option value="4" class="select-jk">4</option>
                        <option value="5" class="select-jk">5</option>
                        <option value="6" class="select-jk">6</option>
                        <option value="7" class="select-jk">7</option>
                        <option value="7" class="select-jk">8</option>
                    </select>
                    <input type="text" placeholder="IPK" name="ipk" value="<?= $data_mhs['ipk']; ?>">
                    <textarea class="text-white" name="alamat" cols="25" rows="7" placeholder="Alamat"><?= $data_mhs['alamat']; ?></textarea>
                    <input type="text" placeholder="No. Telp" name="no_hp" value="<?= $data_mhs['no_hp']; ?>">
                    <select name="jk">
                        <option value="<?= $data_mhs['jk']; ?>" selected hidden><?= $jk; ?></option>
                        <option value="Laki-laki" class="select-jk">Laki-laki</option>
                        <option value="Perempuan" class="select-jk">Perempuan</option>
                    </select>

                    <button type="submit" class="btn " id="closeEdit" name="submit">
                        <a>UPDATE</a>
                    </button>
                    <button type="reset" class="btn " id="backBtnEdit" name="back">
                        <a href="admin.php">BACK</a>
                    </button>
                </fieldset>
            </form>
        </div>
        <!-- Edit Data Mahasiswa End -->

    </div>
    <!-- CONTENT END -->

    <!-- Js Bootstrap -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Js lokal -->
    <script src="folder_js/script-admin.js"></script>
</body>

</html>