<?php 
include '../koneksi.php'; 

if (isset($_POST['Simpan'])) {
    $IdPenerbit = mysqli_real_escape_string($conn, $_POST['IdPenerbit']);
    $NamaPenerbit = mysqli_real_escape_string($conn, $_POST['NamaPenerbit']);
    $Kota = mysqli_real_escape_string($conn, $_POST['Kota']);
    $Telp = mysqli_real_escape_string($conn, $_POST['Telp']);

    $QueryTambah = "INSERT INTO `tabel_penerbit` (`Id Penerbit`, `Nama Penerbit`, `Kota`, `Telp`) 
                    VALUES ('$IdPenerbit', '$NamaPenerbit', '$Kota', '$Telp')";

    if (mysqli_query($conn, $QueryTambah)) {
        echo "<script>alert('Penerbit berhasil ditambahkan!'); window.location='../admin.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Penerbit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>
<body class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Tambah Penerbit Baru</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label>ID Penerbit</label>
                            <input type="text" name="IdPenerbit" class="form-control" placeholder="Contoh: SP01" required>
                        </div>
                        <div class="mb-3">
                            <label>Nama Penerbit</label>
                            <input type="text" name="NamaPenerbit" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Kota</label>
                            <input type="text" name="Kota" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Telepon</label>
                            <input type="text" name="Telp" class="form-control" required>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" name="Simpan" class="btn btn-success">Simpan</button>
                            <a href="../admin.php" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>