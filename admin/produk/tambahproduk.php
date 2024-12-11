<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Produk</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="?halaman=user"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Produk</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="card radius-15">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Tambah Data Produk</h4>
        </div>
        <hr/>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nama Produk</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="category_id">Kategori</label>
                <select class="form-control" name="category_id" required>
                    <?php
                    $categories = mysqli_query($koneksi, "SELECT * FROM categories");
                    while ($category = $categories->fetch_assoc()) {
                        echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pirt">PIRT</label>
                <input type="text" class="form-control" name="pirt" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" class="form-control" name="price" required>
            </div>
            <div class="form-group">
                <label for="stock_status">Status Stok</label>
                <select class="form-control" name="stock_status" required>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Habis">Habis</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image_url">Gambar</label>
                <input type="file" class="form-control-file" name="image_url" required>
            </div>
            <div class="form-group">
                <label for="store_id">Nama Toko</label>
                <select class="form-control" name="store_id" required>
                    <?php
                    $stores = mysqli_query($koneksi, "SELECT * FROM toko");
                    while ($store = $stores->fetch_assoc()) {
                        echo "<option value='" . $store['id'] . "'>" . $store['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button class="btn btn-sm btn-secondary" type="button" onclick="window.history.back();">Kembali</button>
            <button class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $pirt = $_POST['pirt'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock_status = $_POST['stock_status'];
    $store_id = $_POST['store_id'];

    // Upload image handling
    $image_name = $_FILES['image_url']['name'];
    $image_tmp = $_FILES['image_url']['tmp_name'];
    $image_folder = "../uploads/" . $image_name;
    move_uploaded_file($image_tmp, $image_folder);

    $query = mysqli_query($koneksi, 
        "INSERT INTO products (name, category_id, pirt, description, price, stock_status, image_url, store_id)
        VALUES ('$name', '$category_id', '$pirt', '$description', '$price', '$stock_status', '$image_folder', '$store_id')"
    ) or die(mysqli_error($koneksi));

    if ($query) {
        echo "<script>alert('Berhasil Tambah Data'); </script>";
        echo "<script>document.location.href='?halaman=dataproduk'; </script>";
    } else {
        echo "<script>alert('Gagal Tambah Data'); </script>";
        echo "<script>document.location.href='tambahproduk.php'; </script>";
    }
}

?>
