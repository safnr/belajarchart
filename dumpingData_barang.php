<?php
include 'koneksi.php'; //Memanggil file koneksi.php

$sql = "INSERT INTO tb_barang (id_barang, barang) VALUES 
(1, 'Redmi Note 7'),
(2, 'Samsung M20'),
(3, 'Reelame 3'),
(4, 'Iphone X');";

//Mengecek apakah tabel tersebut berhasil atau gagal dibuat
if (mysqli_query($conn, $sql)) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
//Menutup koneksi
mysqli_close($conn);
?>