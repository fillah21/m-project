<?php 
    include ("function.php");

    if (isset($_POST["submit"])) {
        $username = strtolower(stripslashes ($_POST["username"]));
        $password = mysqli_real_escape_string($conn, $_POST["pwd"]);
        $password2 = mysqli_real_escape_string($conn, $_POST["pwd2"]);
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $no_induk = $_POST['no_induk'];
        $semester = $_POST['semester'];
        $jumlah_sks = $_POST['jumlah_sks'];
        $sudah_krs = "Belum";
        $level = "User";

        //cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'") or die(mysqli_error($conn));
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Username Sudah Dipakai!!!');
                    document.location.href='register.php';
                </script>";
            return false;
        }

        //cek konfirmasi password 1 dan password 2 sama atau tidak
        if ($password !== $password2) {
            echo "<script>
                    alert('Password Tidak Sesuai!');
                    document.location.href='register.php';
                </script>";
            return false;
        }

        //enskripsi password
        $password = password_hash($password2, PASSWORD_DEFAULT);
        
        //jika password sama, masukkan data ke database
        mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password', '$nama', '$email', '$no_induk', '$semester', '$jumlah_sks', '$sudah_krs', '$level')");
        echo "<script>
                alert('Data Berhasil Disimpan, dan Silahkan Login');
                document.location.href='login.php';
            </script>";
        return mysqli_affected_rows($conn);
  
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Sementara</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
  </head>

  <body>
  <form action="" method="POST" class="container mt-5">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
            <label for="pwd" class="form-label">Password</label>
            <input type="password" class="form-control" id="pwd" name="pwd" required>
        </div>
        
        <div class="mb-3">
            <label for="pwd2" class="form-label">Password 2</label>
            <input type="password" class="form-control" id="pwd2" name="pwd2" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="no_induk" class="form-label">Nomer Induk</label>
            <input type="number" class="form-control" id="no_induk" name="no_induk" required>
        </div>
        
        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="text" class="form-control" id="semester" name="semester" required>
        </div>
        
        <div class="mb-3">
            <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
            <input type="number" class="form-control" id="jumlah_sks" name="jumlah_sks" required>
        </div>
        
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>