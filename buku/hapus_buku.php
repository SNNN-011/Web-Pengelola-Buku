<?php 
include '../koneksi.php'; 

$IdHapus = $_GET['id'];

$QueryHapus = "DELETE FROM `tabel_buku` WHERE `Id Buku` = '$IdHapus'";

if (mysqli_query($conn, $QueryHapus)) {
    header("Location: admin.php");
} else {
    echo "Gagal menghapus: " . mysqli_error($conn);
}
?>