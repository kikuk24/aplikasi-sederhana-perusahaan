<?php
include 'config/koneksi.php';

// Cek jika ada parameter ID di URL
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];

// Proses update data jika form disubmit
if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
    $gaji = mysqli_real_escape_string($koneksi, $_POST['gaji']);
    $tanggal_masuk = mysqli_real_escape_string($koneksi, $_POST['tanggal_masuk']);

    $query = "UPDATE karyawan SET nama='$nama', jabatan='$jabatan', gaji='$gaji', tanggal_masuk='$tanggal_masuk' WHERE id=$id";
    
    if (mysqli_query($koneksi, $query)) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}

// Ambil data karyawan yang akan diedit
$query_data = "SELECT * FROM karyawan WHERE id=$id";
$result_data = mysqli_query($koneksi, $query_data);
$karyawan = mysqli_fetch_assoc($result_data);

// Jika data tidak ditemukan, redirect
if (!$karyawan) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Data Karyawan</h1>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($karyawan['nama']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo htmlspecialchars($karyawan['jabatan']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="gaji" class="form-label">Gaji</label>
                <input type="number" class="form-control" id="gaji" name="gaji" value="<?php echo htmlspecialchars($karyawan['gaji']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?php echo htmlspecialchars($karyawan['tanggal_masuk']); ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>