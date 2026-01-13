<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Buku - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">TOKO BUKU</a>
        <div class="navbar-nav">
            <a class="nav-link" href="index.php">HOME</a>
            <a class="nav-link active" href="admin.php">ADMIN</a>
        </div>
    </div>
</nav>

<div class="container mt-4 mb-5">
    <h2 class="mb-4">Halaman Admin (Pengelolaan Data)</h2>

    <div class="card mb-5">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Kelola Data Buku</h5>
            <a href="buku/tambah_buku.php" class="btn btn-light btn-sm">Tambah Buku Baru</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kategori</th>
                        <th>Nama Buku</th>
                        <th>Penerbit</th> <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $QueryBuku = mysqli_query($conn, "SELECT * FROM `tabel_buku` ");
                    while($Buku = mysqli_fetch_assoc($QueryBuku)):
                    ?>
                    <tr>
                        <td><?= $Buku['Id Buku']; ?></td>
                        <td><?= $Buku['Kategori']; ?></td>
                        <td><?= $Buku['Nama Buku']; ?></td>
                        <td><?= $Buku['Penerbit']; ?></td>
                        <td><?= $Buku['Harga']; ?></td>
                        <td><?= $Buku['Stok']; ?></td>
                        <td>
                            <a href="buku/edit_buku.php?id=<?= $Buku['Id Buku']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="buku/hapus_buku.php?id=<?= $Buku['Id Buku']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus buku ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Kelola Data Penerbit</h5>
            <a href="penerbit/tambah_penerbit.php" class="btn btn-light btn-sm">Tambah Penerbit Baru</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Penerbit</th>
                        <th>Kota</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $QueryPenerbit = mysqli_query($conn, "SELECT * FROM `tabel_penerbit` ");
                    if (mysqli_num_rows($QueryPenerbit) > 0) {
                        while($Penerbit = mysqli_fetch_assoc($QueryPenerbit)):
                        ?>
                        <tr>
                            <td><?= $Penerbit['Id Penerbit']; ?></td>
                            <td><?= $Penerbit['Nama Penerbit']; ?></td>
                            <td><?= $Penerbit['Kota']; ?></td>
                            <td><?= $Penerbit['Telp']; ?></td>
                            <td>
                                <a href="penerbit/edit_penerbit.php?id=<?= $Penerbit['Id Penerbit']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="penerbit/hapus_penerbit.php?id=<?= $Penerbit['Id Penerbit']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus penerbit ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php 
                        endwhile; 
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Data Penerbit Kosong</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>