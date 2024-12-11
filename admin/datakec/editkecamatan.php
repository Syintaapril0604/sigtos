<?php

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM kecamatan WHERE id = '$id'") or die(mysqli_error($koneksi));

while($kecamatan = $query->fetch_assoc()){

?>

<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Data Kecamatan</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data Kecamatan</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="card radius-15">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Edit Data Kecamatan</h4>
        </div>
        <hr/>
        <form method="POST">
            <div class="form-group">
                <label for="">Nama Kecamatan</label>
                <input type="text" value="<?php echo $kecamatan['name']; ?>"  class="form-control" name="name" placeholder="Masukkan nama kecamatan">
            </div>
            <input type="hidden" name="id" value="<?php echo $kecamatan['id']; ?>">
            <button class="btn btn-sm btn-secondary" type="button" onclick="window.history.back();">Kembali</button>
            <button class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>
            
        </form>
    </div>
</div>

<?php
}
if(isset($_POST['submit'])){
    $id_kecamatan = $_POST['id'];
    $nama_kecamatan = $_POST['name'];

    // Query untuk memperbarui data kecamatan
    $update_query = mysqli_query($koneksi, "UPDATE kecamatan SET name = '$nama_kecamatan' WHERE id = '$id_kecamatan'") or die(mysqli_error($koneksi));

    if($update_query) {
        echo "<script>alert('Berhasil Edit Data'); </script>";
        echo "<script>document.location.href='?halaman=datakecamatan'; </script>";
    } else {
        echo "<script>alert('Gagal Edit Data'); </script>";
        echo "<script>document.location.href='tambahkecamatan.php'; </script>";
    }
}
?>