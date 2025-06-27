<?php
// Konfigurasi database
$host = "localhost";
$user = "root"; // Sesuaikan dengan username database Anda
$pass = "";     // Sesuaikan dengan password database Anda
$db   = "db_karyawan"; // Sesuaikan dengan nama database Anda

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
