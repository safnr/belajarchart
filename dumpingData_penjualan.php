<?php
include 'koneksi.php'; //Memanggil file koneksi.php

$sql = "INSERT INTO tb_penjualan (id_penjualan, id_barang, jumlah, tanggal_penjualan) VALUES 
(1, 1, 5, '2019-01-11'),
(2, 3, 3, '2019-01-04'),
(3, 2, 4, '2019-02-11'),
(4, 2, 3, '2019-03-09'),
(5, 3, 4, '2019-04-11'),
(6, 4, 1, '2019-05-11'),
(7, 1, 2, '2019-05-05'),
(8, 4, 7, '2019-06-09'),
(9, 3, 2, '2019-06-11'),
(10, 2, 5, '2019-07-11'),
(11, 1, 2, '2019-07-12');";

//Mengecek apakah tabel tersebut berhasil atau gagal dibuat
if (mysqli_query($conn, $sql)) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
//Menutup koneksi
mysqli_close($conn);
?>