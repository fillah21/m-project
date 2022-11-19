<?php 
    include ("function.php");

    if (isset($_POST["submit"])) {
        $username = strtolower(stripslashes ($_POST["username"]));
        $password = mysqli_real_escape_string($conn, $_POST["pwd"]);
        $password2 = mysqli_real_escape_string($conn, $_POST["pwd2"]);
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
        mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password', '$level')");
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
            <input type="text" class="form-control" id="username" name="username">
        </div>

        <div class="mb-3">
            <label for="pwd" class="form-label">Password</label>
            <input type="password" class="form-control" id="pwd" name="pwd">
        </div>
        
        <div class="mb-3">
            <label for="pwd2" class="form-label">Password 2</label>
            <input type="password" class="form-control" id="pwd2" name="pwd2">
        </div>
        
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>