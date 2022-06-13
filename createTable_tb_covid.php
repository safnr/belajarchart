<?php
include 'koneksi_covid.php'; //Memanggil file koneksi.php

//Membuat tabel user
$sql = "CREATE TABLE tb_covid (
    no INT(2) NOT NULL PRIMARY KEY,
    country VARCHAR(225) NOT NULL,
    total_cases INT(11) NOT NULL,
    new_cases INT(11) NOT NULL,
    total_deaths INT(11) NOT NULL,
    new_deaths INT(3) NOT NULL,
    total_recovered INT(11) NOT NULL,
    new_recovered INT(11) NOT NULL
)";
//Mengecek apakah tabel tersebut berhasil atau gagal dibuat
if (mysqli_query($conn, $sql)) {
    echo "Table tb_covid created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
//Menutup koneksi
mysqli_close($conn);
?>