<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Kecamatan</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="?halaman=user"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Kecamatan</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="card radius-15">
    <di class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Tambah Data Kecamatan</h4>
        </div>
        <hr/>
        <form method="POST">
            <div class="form-group">
                <label for="">Nama Kecamatan</label>
                <input type="text" class="form-control" name="name">
            </div>
            <button class="btn btn-sm btn-secondary" type="button" onclick="window.history.back();">Kembali</button>
            <button class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>
            
        </form>
    </div>
</div>

<?php

if(isset($_POST['submit'])){

            $nama_kecamatan = $_POST['name'];

            $query = mysqli_query($koneksi, "INSERT INTO kecamatan(name)
                        VALUES('$nama_kecamatan')") or die(mysqli_error($koneksi));

    if($query) {
            echo "<script>alert('Berhasil Tambah Data'); </script>";
            echo "<script>document.location.href='?halaman=datakecamatan'; </script>";
    } else {
            echo "<script>alert('Gagal Tambah Data'); </script>";
            echo "<script>document.location.href='tambahkecamatan.php'; </script>";
    }
}

?>

