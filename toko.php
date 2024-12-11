<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Toko Oleh-Oleh</div>
        <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Soppeng</li>
            </ol>
        </nav>
        </div>
    </div>
 <hr>
<!--end breadcrumb-->
    <style>
        .card {
            height: 100%; /* Membuat card selalu memiliki tinggi penuh di kolom */
        }
        .card-img-top {
            height: 200px; /* Tinggi gambar seragam */
            object-fit: cover; /* Gambar akan dipotong untuk menyesuaikan ukuran */
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            text-align: center;
        }
        .card-text {
            margin-bottom: 1rem; /* Menambah jarak antara deskripsi dan kecamatan */
        }
        .list-group-item {
            border: none; /* Menghapus garis antar item */
        }
        .card-footer {
            text-align: center;
            font-size: 0.9rem;
            padding: 0.5rem;
        }
    </style>

<div class="container mt-5">
    <div class="row">
        <?php
        // Ambil data toko dari database
        $query = mysqli_query($koneksi, "SELECT toko.*, kecamatan.name AS kecamatan_name FROM toko JOIN kecamatan ON toko.kecamatan_id = kecamatan.id");
        while ($toko = mysqli_fetch_assoc($query)) {
            $image_url = !empty($toko['image_url']) ? 'uploads/' . $toko['image_url'] : 'https://via.placeholder.com/800x500';
            $name = $toko['name'];
            $description = $toko['description'];
            $kecamatan_name = $toko['kecamatan_name'];
            $latitude = $toko['latitude'];
            $longitude = $toko['longitude'];
            ?>
            <div class="col-12 col-lg-4 col-xl-4 mb-4">
                <div class="card">
                    <img src="<?php echo $image_url; ?>" class="card-img-top" alt="<?php echo $name; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $name; ?></h5>
                        <br>
                        <p class="card-text"><?php echo $description; ?></p>
                        <p><strong>Kecamatan:</strong> <?php echo $kecamatan_name; ?></p>
                    </div>
                    <div class="card-footer">
                        <!-- Tautan Rute -->
                        <a 
                            href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $latitude; ?>,<?php echo $longitude; ?>" 
                            class="text-primary" 
                            target="_blank">
                            Rute
                        </a> 
                        | 
                        <a href="detailpeta.php?id=<?php echo $toko['id']; ?>" class="text-info">Detail Toko</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>


