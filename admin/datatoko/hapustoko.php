<?php

// Ambil ID toko dari parameter URL
$id = $_GET['id'];

// Query untuk menghapus data toko berdasarkan ID
$query_hapus = mysqli_query($koneksi, "DELETE FROM toko WHERE id = '$id'") or die(mysqli_error($koneksi));

// Cek hasil query
if ($query_hapus) {
    echo "<script>alert('Berhasil Hapus Data Toko');</script>";
    echo "<script>document.location.href='index.php?halaman=datatoko';</script>";
} else {
    echo "<script>alert('Gagal Hapus Data Toko');</script>";
    echo "<script>document.location.href='index.php?halaman=hapustoko';</script>";
}

?>
