<?php 
include '../koneksi.php'; 

$IdLama = isset($_GET['id']) ? trim($_GET['id']) : '';

$QueryGet = "SELECT * FROM `tabel_buku` WHERE REPLACE(REPLACE(`Id Buku`, '\r', ''), '\n', '') = '$IdLama'";
$GetData = mysqli_query($conn, $QueryGet);
$Buku = mysqli_fetch_assoc($GetData);

if (!$Buku) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='../admin.php';</script>";
    exit;
}

if (isset($_POST['Update'])) {
    $Kategori = mysqli_real_escape_string($conn, $_POST['Kategori']);
    $NamaBuku = mysqli_real_escape_string($conn, $_POST['NamaBuku']);
    $Harga = mysqli_real_escape_string($conn, $_POST['Harga']);
    $Stok = mysqli_real_escape_string($conn, $_POST['Stok']);
    $Penerbit = mysqli_real_escape_string($conn, $_POST['Penerbit']);

    $QueryUpdate = "UPDATE `tabel_buku` SET 
                    `Kategori` = '$Kategori', 
                    `Nama Buku` = '$NamaBuku', 
                    `Harga` = '$Harga', 
                    `Stok` = '$Stok', 
                    `Penerbit` = '$Penerbit' 
                    WHERE REPLACE(REPLACE(`Id Buku`, '\r', ''), '\n', '') = '$IdLama'";

    if (mysqli_query($conn, $QueryUpdate)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='../admin.php';</script>";
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>
<body class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">Edit Data Buku</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
        <div class="mb-3">
            <label>ID Buku (Tidak bisa diubah)</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($Buku['Id Buku']); ?>" disabled>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="Kategori" class="form-control" value="<?= htmlspecialchars($Buku['Kategori']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Nama Buku</label>
            <input type="text" name="NamaBuku" class="form-control" value="<?= htmlspecialchars($Buku['Nama Buku']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="text" name="Harga" class="form-control" value="<?= htmlspecialchars($Buku['Harga']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="Stok" class="form-control" value="<?= htmlspecialchars($Buku['Stok']); ?>" required>
        </div>
        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="Penerbit" class="form-control" value="<?= htmlspecialchars($Buku['Penerbit']); ?>" required>
        </div>
        <button type="submit" name="Update" class="btn btn-warning">Update Data</button>
        <a href="../admin.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>