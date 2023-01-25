<?php
    //koneksi ke database mysql, isi parameter sesuai web server masing-masing
    $conn = mysqli_connect("localhost","root","","m-project");

    //cek jika koneksi ke mysql gagal, maka akan tampil pesan error
    if (mysqli_connect_errno()){
        echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
    }

    // Fungsi query fetch
    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
    // Fungsi query fetch selesai


    // Fungsi Upload Foto
    function uploadFoto() {
        $namaFile = $_FILES['foto']['name'];
        $ukuranFile = $_FILES ['foto']['size'];
        $error = $_FILES ['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        // Cek apakah ada gambar yang diupload atau tidak
        if(!$namaFile === "") {
            //cek apakah yang di upload gambar atau bukan
            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
    
            //cek apakah ekstensinya ada atau tidak di dalam array $ekstensiGambarValid
            if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                    alert('Yang anda upload bukan gambar');
                    </script>";
            return false;
            }
        }


        //cek jika ukurannya terlalu besar, ukurannya dalam byte
        if($ukuranFile > 5000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar, jangan melebihi 5mb');
                </script>";
        return false;
        }

        //generate nama gambar baru
        if(!$namaFile === "") {
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
            //parameternya file namenya, lalu tujuannya
            move_uploaded_file($tmpName, 'profil/'.$namaFileBaru);

            return $namaFileBaru;
        } else {
            $namaFileBaru = "";

            return $namaFileBaru;
        }
    }
    // Fungsi Upload Foto Selesai



    // Fungsi Register
    function register($data) {
        global $conn;
        $username = strtolower(stripslashes ($_POST["username"]));
        $password = mysqli_real_escape_string($conn, $_POST["pwd"]);
        $password2 = mysqli_real_escape_string($conn, $_POST["pwd2"]);
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $foto = uploadFoto();
        if(!$foto) {
            $foto = "default.png";
        }
        $no_induk = $_POST['no_induk'];
        $semester = $_POST['semester'];
        $ipk = $_POST['ipk'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $jk = $_POST['jk'];
        $sudah_krs = "Belum";
        $level = "User";

        //cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'") or die(mysqli_error($conn));
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Username Sudah Dipakai!!!');
                </script>";
            return false;
        }

        //cek konfirmasi password 1 dan password 2 sama atau tidak
        if ($password !== $password2) {
            echo "<script>
                    alert('Password Tidak Sesuai!');
                </script>";
            return false;
        }

        //enskripsi password
        $password = password_hash($password2, PASSWORD_DEFAULT);
        
        //jika password sama, masukkan data ke database
        mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password', '$nama', '$email', '$foto', '$no_induk', '$semester', '$ipk', '$alamat', '$no_hp', '$jk', '$sudah_krs', '$level')");
        
        return mysqli_affected_rows($conn);
    }
    // Fungsi Register Selesai\



    // Fungsi Enkripsi
    function enkripsi($teks) {
        $text = $teks;
        $kunci = 'm-project';
        $key = hash('sha256', $kunci);
        $pkey = "123";
        
        $method = "aes-192-cfb1";
        $iv = substr(hash('sha256', $pkey), 0, 16);

        $enkripsi = openssl_encrypt($text, $method, $key, 0, $iv);
        $enkripsi = base64_encode($enkripsi);

        return $enkripsi;
    }
    // Fungsi Enkripsi selesai


    
    // Fungsi Deskripsi
    function deskripsi($teks) {
        $text = $teks;
        $kunci = 'm-project';
        $key = hash('sha256', $kunci);
        $pkey = "123";
        
        $method = "aes-192-cfb1";
        $iv = substr(hash('sha256', $pkey), 0, 16);

        $deskripsi = base64_decode($text);
        $deskripsi = openssl_decrypt($deskripsi, $method, $key, 0, $iv);

        return $deskripsi;
    }
    // Fungsi Deskripsi Selesai



    // Fungsi Cek SKS
    function cek_sks($ipk) {
        if($ipk >= 3.3) {
            $sks = 24;
        } elseif($ipk >= 3.0 && $ipk < 3.3) {
            $sks = 22;
        } elseif($ipk >= 2.5 && $ipk < 3.0) {
            $sks = 20;
        } elseif($ipk >= 2.0 && $ipk < 2.5) {
            $sks = 18;
        } elseif($ipk < 2.0) {
            $sks = 16;
        }

        return $sks;
    }
    // Fungsi Cek SKS selesai



    // Fungsi Tambah Matkul
    function tambah_matkul($data) {
        global $conn;
        $kode_matkul = htmlspecialchars($data['kode_matkul']);
        $nama_matkul = htmlspecialchars($data['nama_matkul']);
        $semester_matkul = htmlspecialchars($data['semester_matkul']);
        $sks = htmlspecialchars($data['sks']);

        $query = "INSERT INTO mata_kuliah
                    VALUES 
                    ('', '$kode_matkul', '$nama_matkul', '$semester_matkul', '$sks')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
    // Fungsi Tambah Matkul Selesai


    // Fungsi jumlah data
    function jumlah_data($data) {
        global $conn;
        $query = mysqli_query($conn, $data);

        $jumlah_data = mysqli_num_rows($query);

        return $jumlah_data;
    }
    // Fungsi jumlah data selesai
?>