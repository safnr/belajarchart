<?php
include 'koneksi.php'; //Memanggil file koneksi.php

//Membuat tabel user
$sql = "CREATE TABLE tb_penjualan (
    id_penjualan INT(11) NOT NULL,
    id_barang INT(11) NOT NULL,
    jumlah INT(11) NOT NULL,
    tanggal_penjualan date NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
//Mengecek apakah tabel tersebut berhasil atau gagal dibuat
if (mysqli_query($conn, $sql)) {
    echo "Table tb_penjualan created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
//Menutup koneksi
mysqli_close($conn);
?>