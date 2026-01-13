<?php 
include '../koneksi.php'; 

$IdHapus = isset($_GET['id']) ? $_GET['id'] : '';

if ($IdHapus != '') {
    $IdHapus = mysqli_real_escape_string($conn, $IdHapus);

    $QueryHapus = "DELETE FROM `tabel_penerbit` WHERE `Id Penerbit` = '$IdHapus'";

    if (mysqli_query($conn, $QueryHapus)) {
        echo "<script>alert('Penerbit berhasil dihapus!'); window.location='../admin.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus: " . mysqli_error($conn) . "'); window.location='../admin.php';</script>";
    }
} else {
    header("Location: ../admin.php");
}
?>