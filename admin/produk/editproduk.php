<?php

$id = $_GET['id'];

// Query untuk mengambil data produk berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM products WHERE id = '$id'") or die(mysqli_error($koneksi));
$product = $query->fetch_assoc();

?>

<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Data Produk</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data Produk</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="card radius-15">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Edit Data Produk</h4>
        </div>
        <hr/>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nama Produk</label>
                <input type="text" value="<?php echo $product['name']; ?>" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="category_id">Kategori</label>
                <select class="form-control" name="category_id" required>
                    <?php
                    $categories = mysqli_query($koneksi, "SELECT * FROM categories");
                    while ($category = $categories->fetch_assoc()) {
                        $selected = $product['category_id'] == $category['id'] ? 'selected' : '';
                        echo "<option value='" . $category['id'] . "' $selected>" . $category['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pirt">PIRT</label>
                <input type="text" value="<?php echo isset($product['pirt']) ? $product['pirt'] : ''; ?>" class="form-control" name="pirt" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description" rows="3" required><?php echo $product['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" value="<?php echo $product['price']; ?>" class="form-control" name="price" required>
            </div>
            <div class="form-group">
                <label for="stock_status">Status Stok</label>
                <select class="form-control" name="stock_status" required>
                    <option value="Tersedia" <?php if ($product['stock_status'] == 'Tersedia') echo 'selected'; ?>>Tersedia</option>
                    <option value="Habis" <?php if ($product['stock_status'] == 'Habis') echo 'selected'; ?>>Habis</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image_url">Gambar</label>
                <input type="file" class="form-control-file" name="image_url">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
            </div>
            <div class="form-group">
                <label for="store_id">Nama Toko</label>
                <select class="form-control" name="store_id" required>
                    <?php
                    $stores = mysqli_query($koneksi, "SELECT * FROM toko");
                    while ($store = $stores->fetch_assoc()) {
                        $selected = $product['store_id'] == $store['id'] ? 'selected' : '';
                        echo "<option value='" . $store['id'] . "' $selected>" . $store['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <button class="btn btn-sm btn-secondary" type="button" onclick="window.history.back();">Kembali</button>
            <button class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $id_product = $_POST['id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $pirt = $_POST['pirt'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock_status = $_POST['stock_status'];
    $store_id = $_POST['store_id'];

    // Handling image upload if a new image is provided
    if (!empty($_FILES['image_url']['name'])) {
        $image_name = $_FILES['image_url']['name'];
        $image_tmp = $_FILES['image_url']['tmp_name'];
        $image_folder = "../uploads/" . $image_name;
        move_uploaded_file($image_tmp, $image_folder);

        // Update query with new image
        $update_query = mysqli_query($koneksi, 
            "UPDATE products SET 
                name = '$name',
                category_id = '$category_id',
                pirt = '$pirt',
                description = '$description',
                price = '$price',
                stock_status = '$stock_status',
                image_url = '$image_folder',
                store_id = '$store_id'
            WHERE id = '$id_product'"
        ) or die(mysqli_error($koneksi));
    } else {
        // Update query without changing the image
        $update_query = mysqli_query($koneksi, 
            "UPDATE products SET 
                name = '$name',
                category_id = '$category_id',
                pirt = '$pirt',
                description = '$description',
                price = '$price',
                stock_status = '$stock_status',
                store_id = '$store_id'
            WHERE id = '$id_product'"
        ) or die(mysqli_error($koneksi));
    }

    if ($update_query) {
        echo "<script>alert('Berhasil Edit Data'); </script>";
        echo "<script>document.location.href='?halaman=dataproduk'; </script>";
    } else {
        echo "<script>alert('Gagal Edit Data'); </script>";
        echo "<script>document.location.href='editproduk.php?id=$id_product'; </script>";
    }
}
?>
