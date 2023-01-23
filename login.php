<?php
  include("function.php");

  if(isset($_COOKIE['project'])) {
    $deskripsi = deskripsi($_COOKIE['project']);

    $level = query("SELECT level FROM user WHERE id_user = $deskripsi") [0];

    if ($level['level'] === "Admin") {
      echo "<script>
              document.location.href='admin.php';
            </script>";
      exit;
    } elseif ($level['level'] === "User") {
      echo "<script>
              document.location.href='mahasiswa.php';
            </script>";
      exit;
    }
  }

  if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["pwd"];

    //cek username apakah ada di database atau tidak
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // mysqli_num_rows() untuk mengetahui ada berapa baris data yang dikembalikan
    if (mysqli_num_rows($result) === 1) {
      //cek password
      $row = mysqli_fetch_assoc($result);
      //password_verify() untuk mengecek apakah sebuah password itu sama atau tidak dengan hash nya
      //parameternya yaitu string yang belum diacak dan string yang sudah diacak
      if (password_verify($password, $row["pwd"])) {
        $enkripsi = enkripsi($row['id_user']);

        setcookie('project', $enkripsi, time() + 10800);
        // setcookie('role', hash('ripemd160', $row['rolename']), time()+10800);
        if ($row["level"] === "Admin") {
          echo "<script>
                    document.location.href='admin.php';
                </script>";
          exit;
        } elseif ($row["level"] === "User") {
          echo "<script>
                    document.location.href='mahasiswa.php';
                </script>";
          exit;
        }
      }
    }
    $error = true;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>M Project | Login</title>
  <!-- css lokal -->
  <link rel="stylesheet" href="folder_css/login.css" />

  <!-- link font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Rubik:wght@300&display=swap" rel="stylesheet" />
</head>

<body>
  <div class="content">
    <div class="form-box">
      <button type="button" class="toggle-button">WELCOME to M PROJECT</button>
      <div class="logo">
        <img src="image/Logo.png" alt="" />
      </div>
      <form id="login" action="" method="POST" class="input-group">
        <?php if (isset($error)) : ?>
          <p style="color: red; font-style: italic;">Username / Password Salah</p>
        <?php endif; ?>
        <input type="text" class="input-field" placeholder="Username" name="username" />
        <input type="password" class="input-field" placeholder="Password" name="pwd" />
        <div class="check-box">
          <input type="checkbox" />
          <span>Remember Me</span>
        </div>
        <button type="submit" class="submit-button" name="login">Login</button>
      </form>
    </div>
  </div>
</body>

</html>