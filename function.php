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
?>