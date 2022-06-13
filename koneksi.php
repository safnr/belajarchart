<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "db_penjualan";

//Membuat Koneksi
$conn = mysqli_connect($host, $username, $password, $dbname);
//Mengecek Koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
?>