<?php
include 'koneksi.php'; //Memanggil file koneksi.php

//Membuat tabel user
$sql = "CREATE TABLE tb_barang (
    id_barang INT(11) NOT NULL,
    barang VARCHAR(225) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
//Mengecek apakah tabel tersebut berhasil atau gagal dibuat
if (mysqli_query($conn, $sql)) {
    echo "Table tb_barang created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
//Menutup koneksi
mysqli_close($conn);
?>