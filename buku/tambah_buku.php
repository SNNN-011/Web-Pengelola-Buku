<?php 
include '../koneksi.php'; 

if (isset($_POST['Simpan'])) {
    $IdBuku = mysqli_real_escape_string($conn, $_POST['IdBuku']);
    $Kategori = mysqli_real_escape_string($conn, $_POST['Kategori']);
    $NamaBuku = mysqli_real_escape_string($conn, $_POST['NamaBuku']);
    $Harga = mysqli_real_escape_string($conn, $_POST['Harga']);
    $Stok = mysqli_real_escape_string($conn, $_POST['Stok']);
    $Penerbit = mysqli_real_escape_string($conn, $_POST['Penerbit']);

    $QueryTambah = "INSERT INTO `tabel_buku` (`Id Buku`, `Kategori`, `Nama Buku`, `Harga`, `Stok`, `Penerbit`) 
                    VALUES ('$IdBuku', '$Kategori', '$NamaBuku', '$Harga', '$Stok', '$Penerbit')";

    if (mysqli_query($conn, $QueryTambah)) {
        header("Location: admin.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>
<body class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Tambah Buku Baru</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
        <div class="mb-3">
            <label>ID Buku</label>
            <input type="text" name="IdBuku" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="Kategori" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Buku</label>
            <input type="text" name="NamaBuku" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="text" name="Harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="Stok" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="Penerbit" class="form-control" required>
        </div>
        <button type="submit" name="Simpan" class="btn btn-primary">Simpan</button>
        <a href="../admin.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>