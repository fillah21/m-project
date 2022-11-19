<?php
    //koneksi ke database mysql, isi parameter sesuai web server masing-masing
    $conn = mysqli_connect("localhost","root","","m-project");

    //cek jika koneksi ke mysql gagal, maka akan tampil pesan error
    if (mysqli_connect_errno()){
        echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
    }
?>