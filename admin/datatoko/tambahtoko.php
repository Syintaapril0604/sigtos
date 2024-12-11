<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Toko</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="?halaman=user"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Toko</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="card radius-15">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Tambah Data Toko</h4>
        </div>
        <hr/>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nama Toko</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea class="form-control" name="address" rows="2" required></textarea>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" class="form-control" name="latitude" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" class="form-control" name="longitude" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="kecamatan_id">Kecamatan</label>
                <select class="form-control" name="kecamatan_id" required>
                    <?php
                    $kecamatan = mysqli_query($koneksi, "SELECT * FROM kecamatan");
                    while ($row = $kecamatan->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="whatsapp_number">Nomor WhatsApp</label>
                <input type="text" class="form-control" name="whatsapp_number" placeholder="Masukkan nomor WhatsApp toko" required>
            </div>
            <div class="form-group">
                <label for="image_url">Gambar</label>
                <input type="file" class="form-control-file" name="image_url" required>
            </div>
            <button class="btn btn-sm btn-secondary" type="button" onclick="window.history.back();">Kembali</button>
            <button class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $description = $_POST['description'];
    $kecamatan_id = $_POST['kecamatan_id'];
    $whatsapp_number = $_POST['whatsapp_number'];

    // Upload image handling
    $image_name = $_FILES['image_url']['name'];
    $image_tmp = $_FILES['image_url']['tmp_name'];
    $image_folder = "../uploads/" . $image_name;

    // Pindahkan file ke folder tujuan
    if (move_uploaded_file($image_tmp, $image_folder)) {
        // Query untuk menyimpan data
        $query = mysqli_query($koneksi, 
            "INSERT INTO toko (name, address, latitude, longitude, description, kecamatan_id, whatsapp_number, image_url)
            VALUES ('$name', '$address', '$latitude', '$longitude', '$description', '$kecamatan_id', '$whatsapp_number', '$image_name')"
        ) or die(mysqli_error($koneksi));

        if ($query) {
            echo "<script>alert('Berhasil Tambah Data Toko');</script>";
            echo "<script>document.location.href='?halaman=datatoko';</script>";
        } else {
            echo "<script>alert('Gagal Tambah Data Toko');</script>";
            echo "<script>document.location.href='?halaman=tambahtoko';</script>";
        }
    } else {
        echo "<script>alert('Gagal Upload Gambar');</script>";
        echo "<script>document.location.href='?halaman=tambahtoko';</script>";
    }
}
?>
