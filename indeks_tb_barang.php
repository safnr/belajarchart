<?php
include 'koneksi.php'; //Memanggil file koneksi.php

//Membuat tabel user
$sql = "ALTER TABLE tb_barang
ADD PRIMARY KEY (id_barang);";
//Mengecek apakah tabel tersebut berhasil atau gagal dibuat
if (mysqli_query($conn, $sql)) {
    echo "Table tb_barang created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
//Menutup koneksi
mysqli_close($conn);
?>