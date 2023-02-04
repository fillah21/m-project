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

    if($data_diri['level'] !== "User") {
        echo "<script>
                alert('Hak akses tidak diizinkan');
                document.location.href='logout.php';
              </script>";
        exit;
    }

    if(isset($_POST['submit'])) {
        if(edit_foto($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Diubah');
                    document.location.href='mahasiswa.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Diubah');
                    document.location.href='mahasiswa.php';
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
        <!--CONTENT MAHASISWA-->
        <div class="container-fluid d-flex" id="container" style="min-height: 100vh; background-color: #D23939; padding-left: 0px;">
        <div class="content tab-content" id="content">
            <!-- Edit Foto Profil -->
            <div id="editp" class="container-sm open">
                <h3>Edit Foto Profil</h3>
                <button type="reset" class="btn back-btn">
                    <a href="mahasiswa.php"><i class="bi bi-x-circle-fill"></i></a>
                </button>
                <form action="" method="post" enctype="multipart/form-data">
                    <fifieldset>
                        <input type="hidden" name="foto_lama" value="<?= $data_diri['foto']; ?>">
                        <input type="hidden" name="id_user" value="<?= $data_diri['id_user']; ?>">
                        <img src="profil/<?= $data_diri['foto']; ?>" class="img-preview">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="profil" name="foto" onchange="previewImg()">
                        </div>
                        <button type="submit" class="btn btn-sm" name="submit">
                            UPDATE
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>
        </div>

    <!--Javascript-->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="folder_js/script-mhs.js"></script>

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