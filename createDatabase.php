<?php
$servername = "localhost"; //Nama host
$username = "root"; //Username
$password = ""; //

//Membuat koneksi
$conn = mysqli_connect($servername, $username, $password);
//Mengecek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Membuat database FINA
$sql = "CREATE DATABASE db_penjualan";
//Mengecek apakah database berhasil dibuat
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

//Menutup koneksi
mysqli_close($conn);
?>