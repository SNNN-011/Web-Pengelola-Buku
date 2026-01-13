<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Buku - Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">TOKO BUKU</a>
        <div class="navbar-nav">
            <a class="nav-link active" href="index.php">HOME</a>
            <a class="nav-link" href="admin.php">ADMIN</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="text-center mb-4">Daftar Inventaris Buku</h2>

    <form action="index.php" method="get" class="row g-3 mb-4 align-items-center">
        <div class="col-md-10">
            <input type="text" name="cari" class="form-control search-input" 
                   placeholder="Cari berdasarkan Nama Buku..." 
                   value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100 btn-search">Cari</button>
        </div>
    </form>
    <table class="table table-striped table-bordered">
        <thead class="table-warning">
            <tr>
                <th>Id Buku</th>
                <th>Kategori</th>
                <th>Nama Buku</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Penerbit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['cari']) && $_GET['cari'] !== "") {
                $Keyword = mysqli_real_escape_string($conn, $_GET['cari']);
                $Query = "SELECT * FROM `tabel_buku` WHERE `Nama Buku` LIKE '%$Keyword%'";
            } else {
                $Query = "SELECT * FROM `tabel_buku`";
            }

            $Result = mysqli_query($conn, $Query);

            if ($Result && mysqli_num_rows($Result) > 0) {
                while ($Row = mysqli_fetch_assoc($Result)) {
                    echo "<tr>
                            <td>" . htmlspecialchars($Row['Id Buku']) . "</td>
                            <td>" . htmlspecialchars($Row['Kategori']) . "</td>
                            <td>" . htmlspecialchars($Row['Nama Buku']) . "</td>
                            <td>" . htmlspecialchars($Row['Harga']) . "</td>
                            <td>" . htmlspecialchars($Row['Stok']) . "</td>
                            <td>" . htmlspecialchars($Row['Penerbit']) . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>Data tidak ditemukan</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>