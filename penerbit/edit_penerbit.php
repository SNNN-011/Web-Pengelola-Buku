<?php 
include '../koneksi.php'; 

$IdLama = isset($_GET['id']) ? trim($_GET['id']) : '';

$QueryGet = "SELECT * FROM `tabel_penerbit` WHERE REPLACE(REPLACE(`Id Penerbit`, '\r', ''), '\n', '') = '$IdLama'";
$GetData = mysqli_query($conn, $QueryGet);
$Penerbit = mysqli_fetch_assoc($GetData);

if (!$Penerbit) {
    echo "<script>alert('Data penerbit tidak ditemukan!'); window.location='../admin.php';</script>";
    exit;
}

if (isset($_POST['Update'])) {
    $NamaPenerbit = mysqli_real_escape_string($conn, $_POST['NamaPenerbit']);
    $Kota = mysqli_real_escape_string($conn, $_POST['Kota']);
    $Telp = mysqli_real_escape_string($conn, $_POST['Telp']);

    $QueryUpdate = "UPDATE `tabel_penerbit` SET 
                    `Nama Penerbit` = '$NamaPenerbit', 
                    `Kota` = '$Kota', 
                    `Telp` = '$Telp' 
                    WHERE REPLACE(REPLACE(`Id Penerbit`, '\r', ''), '\n', '') = '$IdLama'";

    if (mysqli_query($conn, $QueryUpdate)) {
        echo "<script>alert('Data penerbit berhasil diperbarui!'); window.location='../admin.php';</script>";
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
    <title>Edit Penerbit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>
<body class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">Edit Data Penerbit</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label>ID Penerbit (Tidak bisa diubah)</label>
                            <input type="text" class="form-control" value="<?= htmlspecialchars($Penerbit['Id Penerbit']); ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label>Nama Penerbit</label>
                            <input type="text" name="NamaPenerbit" class="form-control" value="<?= htmlspecialchars($Penerbit['Nama Penerbit']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Kota</label>
                            <input type="text" name="Kota" class="form-control" value="<?= htmlspecialchars($Penerbit['Kota']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Telepon</label>
                            <input type="text" name="Telp" class="form-control" value="<?= htmlspecialchars($Penerbit['Telp']); ?>" required>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" name="Update" class="btn btn-warning">Update Data</button>
                            <a href="../admin.php" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>