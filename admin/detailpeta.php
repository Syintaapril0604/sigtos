<?php
include('../koneksi.php');

// Ambil ID toko dari parameter URL
$toko_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Query untuk mengambil data toko berdasarkan ID
$query_toko = "
    SELECT t.id, t.name AS toko_name, t.address, t.description, 
           t.latitude, t.longitude, t.kecamatan_id, k.name AS kecamatan_name
    FROM toko t
    JOIN kecamatan k ON t.kecamatan_id = k.id
    WHERE t.id = $toko_id";
$result_toko = mysqli_query($koneksi, $query_toko);
$toko = mysqli_fetch_assoc($result_toko);

// Jika data toko tidak ditemukan
if (!$toko) {
    die('Toko tidak ditemukan!');
}

// Query untuk mengambil produk berdasarkan store_id
$query_products = "
    SELECT p.id, p.name AS product_name, p.PIRT, p.description, 
           p.price, p.stock_status, p.image_url, c.name AS category_name
    FROM products p
    LEFT JOIN categories c ON p.category_id = c.id
    WHERE p.store_id = $toko_id";
$result_products = mysqli_query($koneksi, $query_products);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Toko - <?php echo $toko['toko_name']; ?></title>
    <link rel="icon" href="../assets/images/logosoppeng.png" type="image/png" />
    <!-- Link CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .product-card img {
            display: block;
            margin: 0 auto; /* Menempatkan gambar di tengah secara horizontal */
            width: auto; /* Agar tidak memaksa lebar */
            max-width: 300%; /* Tidak melebihi lebar container */
            height: auto; /* Mempertahankan proporsi gambar */
            max-height: 300px; /* Membatasi tinggi gambar agar konsisten */
            object-fit: contain; /* Menyesuaikan gambar agar tidak terpotong */
            margin-bottom: 10px; /* Memberikan jarak antara gambar dan teks */
        }

        .product-card-body {
            padding: 15px;
        }

        .product-card-title {
            font-size: 18px;
            font-weight: bold;
        }

        .product-card-price {
            color: #28a745;
            font-weight: bold;
        }

        .breadcrumb {
            background-color: #f8f9fa;
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-flex align-items-center mb-3">
            <div class="breadcrumb-title pr-3">Detail Toko</div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="index.php"><i class='bx bx-home-alt'></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $toko['toko_name']; ?></li>
                </ol>
            </nav>
        </div>

        <!-- Detail Toko -->
        <div class="card">
            <div class="card-header">Detail Toko: <?php echo $toko['toko_name']; ?></div>
            <div class="card-body">
                <!-- Peta -->
                <div id="map"></div>

                <!-- Informasi Toko -->
                <h4 class="mt-4">Informasi Toko</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td><?php echo $toko['id']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Toko</th>
                        <td><?php echo $toko['toko_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $toko['address']; ?></td>
                    </tr>
                    <tr>
                        <th>Latitude</th>
                        <td><?php echo $toko['latitude']; ?></td>
                    </tr>
                    <tr>
                        <th>Longitude</th>
                        <td><?php echo $toko['longitude']; ?></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td><?php echo $toko['description']; ?></td>
                    </tr>
                    <tr>
                        <th>Kecamatan</th>
                        <td><?php echo $toko['kecamatan_name']; ?></td>
                    </tr>
                </table>

                <!-- Produk yang Dijual -->
                <h4 class="mt-4">Produk yang Dijual</h4>
                <hr>
                <div class="row">
                    <?php while ($product = mysqli_fetch_assoc($result_products)) { ?>
                        <div class="col-md-4">
                            <div class="product-card">
                                <br>
                                <img src="../uploads/<?php echo $product['image_url']; ?>" alt="<?php echo $product['product_name']; ?>">
                                <div class="product-card-body">
                                    <h5 class="product-card-title"><?php echo $product['product_name']; ?></h5>
                                    <p><?php echo $product['description']; ?></p>
                                    <p><strong>PIRT:</strong> <?php echo $product['PIRT']; ?></p>
                                    <p><strong>Kategori:</strong> <?php echo $product['category_name']; ?></p>
                                    <p class="product-card-price">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></p>
                                    <p><strong>Status:</strong> <?php echo $product['stock_status']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
</div>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        // Validasi Koordinat
        var latitude = <?php echo !empty($toko['latitude']) ? $toko['latitude'] : 'null'; ?>;
        var longitude = <?php echo !empty($toko['longitude']) ? $toko['longitude'] : 'null'; ?>;

        if (!latitude || !longitude) {
            alert('Koordinat tidak valid! Peta tidak dapat dimuat.');
            document.getElementById('map').innerHTML = '<p class="text-danger">Koordinat tidak tersedia untuk toko ini.</p>';
        } else {
            // Inisialisasi Peta
            var map = L.map('map').setView([latitude, longitude], 15);

            // Tambahkan Tile Layer
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Custom Icon
            var customIcon = L.icon({
                iconUrl: '../leaflet/images/marker/place.png',
                iconSize: [38, 38],
                iconAnchor: [19, 38],
                popupAnchor: [0, -38]
            });

            // Tambahkan Marker
            var marker = L.marker([latitude, longitude], { icon: customIcon }).addTo(map);

            // Konten Popup
            var popupContent = `
                
                <strong><?php echo $toko['toko_name']; ?></strong><br>
                 <b>Alamat:</b> <?php echo $toko['address']; ?><br>
                <strong>Kecamatan:</strong> <?php echo $toko['kecamatan_name']; ?><br>
            `;

            marker.bindPopup(popupContent).openPopup();
        }
    </script>
</body>

</html>
