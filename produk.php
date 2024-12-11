<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "sigtos");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
$searchKeyword = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
// Query untuk mengambil data produk beserta toko terkait
$query = "
    SELECT 
        products.id AS product_id,
        products.name AS product_name,
        products.description AS product_description,
        products.price AS product_price,
        products.image_url AS product_image,
        toko.name AS store_name,
        toko.whatsapp_number AS store_whatsapp
    FROM products
    INNER JOIN toko ON products.store_id = toko.id
";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}
?>

<style>
    .card {
        height: 100%; /* Semua kartu memiliki tinggi yang sama */
        display: flex;
        flex-direction: column;
    }

    .card-img-top {
        height: 250px; /* Ukuran gambar tetap seragam */
        object-fit: cover; /* Gambar memenuhi area tanpa distorsi */
    }

    .card-body {
        flex-grow: 1;
    }

    .card-body hr {
        margin: 1rem 0; /* Spasi yang konsisten untuk garis */
    }
</style>

<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Oleh-Oleh Khas Sopppeng</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Produk Soppeng</li>
            </ol>
        </nav>
    </div>
</div>
<hr>
<div class="row">
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="col-12 col-lg-3 col-xl-3 mb-4">
            <div class="card">
                <!-- Gambar Produk -->
                <img src="uploads/<?= htmlspecialchars($row['product_image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['product_name']) ?>" onerror="this.src='uploads/default.jpg';">
                
                <div class="card-body">
                    <!-- Nama Produk -->
                    <h5 class="card-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;"><?= htmlspecialchars($row['product_name']) ?></h5>
                    <br>
                    <!-- Harga Produk -->
                    <p class="mb-0 text-success fw-bold" style="color: green; font-weight: bold; font-size: 16px;">Rp <?= number_format($row['product_price'], 0, ',', '.') ?></p>
                    <br>
                    <!-- Nama Toko -->
                    <p class="mb-0 text-muted fst-italic" style="font-style: italic; color: #555; font-family: 'Quicksand', sans-serif;">Toko: <?= htmlspecialchars($row['store_name']) ?></p>
                    
                    <hr/>
                    
                    <!-- Teks dan Tombol Sosial Media -->
                    <div class="profile-social d-flex align-items-center">
                        <span class="me-2 fw-bold" style="font-weight: bold; font-family: 'Quicksand', sans-serif; font-size: 18px;">Order Now: &nbsp; &nbsp;</span>
                        <a href="https://wa.me/<?= htmlspecialchars($row['store_whatsapp']) ?>" class="text-success" target="_blank">
                            <i class="bx bxl-whatsapp" style="font-size: 30px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php
// Tutup koneksi
mysqli_close($conn);
?>
