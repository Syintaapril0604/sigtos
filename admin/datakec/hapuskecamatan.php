<?php

$id = $_GET['id'];

$query_hapus = mysqli_query($koneksi, "DELETE FROM kecamatan WHERE id = '$id'") or die(mysqli_error($koneksi));

if($query_hapus) {
    echo "<script>alert('Berhasil Hapus Data'); </script>";
    echo "<script>document.location.href='index.php?halaman=datakecamatan'; </script>";
} else {
    echo "<script>alert('Gagal Hapus Data'); </script>";
    echo "<script>document.location.href='index.php?halaman=datakecamatan'; </script>";
}

?>