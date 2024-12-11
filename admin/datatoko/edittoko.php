<?php
$id = $_GET['id'];

// Query untuk mengambil data toko berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM toko WHERE id = '$id'") or die(mysqli_error($koneksi));
$toko = $query->fetch_assoc();

?>

<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Data Toko</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php"><i class='bx bx-home-alt'></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data Toko</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="card radius-15">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Edit Data Toko</h4>
        </div>
        <hr/>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nama Toko</label>
                <input type="text" value="<?php echo $toko['name']; ?>" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea class="form-control" name="address" rows="2" required><?php echo $toko['address']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" value="<?php echo $toko['latitude']; ?>" class="form-control" name="latitude" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" value="<?php echo $toko['longitude']; ?>" class="form-control" name="longitude" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description" rows="3"><?php echo $toko['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="kecamatan_id">Kecamatan</label>
                <select class="form-control" name="kecamatan_id" required>
                    <?php
                    $kecamatan = mysqli_query($koneksi, "SELECT * FROM kecamatan");
                    while ($row = $kecamatan->fetch_assoc()) {
                        $selected = $toko['kecamatan_id'] == $row['id'] ? 'selected' : '';
                        echo "<option value='" . $row['id'] . "' $selected>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="whatsapp_number">Nomor WhatsApp</label>
                <input type="text" value="<?php echo $toko['whatsapp_number']; ?>" class="form-control" name="whatsapp_number" placeholder="Masukkan nomor WhatsApp toko" required>
            </div>
            <div class="form-group">
                <label for="image">Gambar Toko</label>
                <?php if (!empty($toko['image_url'])) { ?>
                    <div>
                        <img src="../uploads/<?php echo $toko['image_url']; ?>" alt="Gambar Toko" style="width: 100px; height: 100px; object-fit: cover; margin-bottom: 10px;">
                        <p><small>Gambar saat ini</small></p>
                    </div>
                <?php } ?>
                <input type="file" class="form-control" name="image">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
            </div>
            <input type="hidden" name="id" value="<?php echo $toko['id']; ?>">
            <button class="btn btn-sm btn-secondary" type="button" onclick="window.history.back();">Kembali</button>
            <button class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $id_toko = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $description = $_POST['description'];
    $kecamatan_id = $_POST['kecamatan_id'];
    $whatsapp_number = $_POST['whatsapp_number'];

    // Upload gambar baru jika ada
    $image_url = $toko['image_url'];
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi file
        if (in_array($image_file_type, ['jpg', 'png', 'jpeg', 'gif'])) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                // Hapus gambar lama jika ada
                if (!empty($toko['image_url']) && file_exists("../uploads/" . $toko['image_url'])) {
                    unlink("../uploads/" . $toko['image_url']);
                }
                $image_url = $_FILES['image']['name'];
            } else {
                echo "<script>alert('Gagal mengunggah gambar');</script>";
            }
        } else {
            echo "<script>alert('Format file tidak valid (harus JPG, PNG, atau GIF)');</script>";
        }
    }

    // Update data toko
    $update_query = mysqli_query($koneksi, 
        "UPDATE toko SET 
            name = '$name',
            address = '$address',
            latitude = '$latitude',
            longitude = '$longitude',
            description = '$description',
            kecamatan_id = '$kecamatan_id',
            whatsapp_number = '$whatsapp_number',
            image_url = '$image_url'
        WHERE id = '$id_toko'"
    ) or die(mysqli_error($koneksi));

    if ($update_query) {
        echo "<script>alert('Berhasil Edit Data Toko');</script>";
        echo "<script>document.location.href='?halaman=datatoko';</script>";
    } else {
        echo "<script>alert('Gagal Edit Data Toko');</script>";
        echo "<script>document.location.href='editToko.php?id=$id_toko';</script>";
    }
}
?>
