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

    if($data_diri['jk'] == "L") {
        $jk = "Laki-Laki";
    } else {
        $jk = "Perempuan";
    }

    if(isset($_POST['submit'])) {
        if(edit_admin($_POST) > 0) {
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
            <form action="" method="post" enctype="multipart/form-data">
                <fifieldset>
                    <input type="hidden" name="foto_lama" value="<?= $data_diri['foto']; ?>">
                    <input type="hidden" name="username_lama" value="<?= $data_diri['username']; ?>">
                    <input type="hidden" name="pwd_lama" value="<?= $data_diri['pwd']; ?>">
                    <input type="hidden" name="id_user" value="<?= $data_diri['id_user']; ?>">

                    <label for="username">Username</label>
                    <input type="text" placeholder="Username" name="username" value="<?= $data_diri['username']; ?>" required>
                    <label for="pwd">Password</label>
                    <input type="password" placeholder="Password" name="pwd" value="<?= $data_diri['pwd']; ?>" required>
                    <label for="pwd">Konfirmasi Password</label>
                    <input type="password" placeholder="Konformasi Password" name="pwd2" value="<?= $data_diri['pwd']; ?>" required>
                    <label for="nama">Nama</label>
                    <input type="text" placeholder="Nama" name="nama" value="<?= $data_diri['nama']; ?>" required>
                    <label for="jk">Jenis Kelamain</label>
                    <select name="jk" required>
                        <option value="<?= $data_diri['jk']; ?>" selected hidden><?= $jk ?></option>
                        <option value="Laki-laki" class="select-jk">Laki-laki</option>
                        <option value="Perempuan" class="select-jk">Perempuan</option>
                    </select>
                    <label for="email">Email</label>
                    <input type="email" placeholder="Email" name="email" value="<?= $data_diri['email']; ?>" required>
                    <label for="nohp">No Telepon</label>
                    <input type="text" placeholder="No. Telp" name="no_hp" value="<?= $data_diri['no_hp']; ?>" required>
                    <label for="alamat">Alamat</label>
                    <textarea class="text-white" name="alamat" cols="25" rows="7" placeholder="Alamat" required><?= $data_diri['alamat']; ?></textarea>
                    <img src="profil/<?= $data_diri['foto']; ?>" class="img-preview">
                    <div class="input-group mb-3 uploadFoto">
                        <input type="file" class="form-control" id="profil" name="foto" onchange="previewImg()">
                        <label for="foto" class="mb-1">*kosongkan jika tidak ingin mengganti foto</label>
                    </div>
                    <button type="submit" class="btn btn-sm" name="submit">
                        <a>Update</a>
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

    <script>
      function previewImg() {
        const profil = document.querySelector('#profil');
        const imgPreview = document.querySelector('.img-preview');

        const fileProfil = new FileReader();
        fileProfil.readAsDataURL(profil.files[0]);

        fileProfil.onload = function(e) {
          imgPreview.src = e.target.result;
        }
      }
    </script>
</body>

</html>