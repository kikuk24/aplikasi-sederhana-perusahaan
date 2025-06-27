<?php
include 'config/koneksi.php';

// Cek jika ada parameter ID di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM karyawan WHERE id=$id";
    
    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil, redirect ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika tidak ada ID, redirect ke halaman utama
    header("Location: index.php");
    exit();
}
