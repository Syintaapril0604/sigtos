<div class="container-fluid" style="background-image: url('assets/images/login-images/dashboard.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 100vh;">
    <div class="row align-items-center" style="min-height: 100vh;">
        <!-- Kolom Teks -->
        <div class="col-md-6 text-start" style="padding-left: 2%;">
            <h2 class="fw-bold text-primary" style="font-family: 'Quicksand', sans-serif; font-weight: bold; margin-bottom: 20px;">
                Selamat Datang di SIGTOS
            </h2>
            <h5 class="text-dark" style="font-family: 'Quicksand', sans-serif; font-weight: bold; margin-bottom: 30px;">
                Kabupaten Soppeng, Sulawesi Selatan
            </h5>
            <p class="text-dark text-justify" style="font-size: 1.2rem; line-height: 1.8; ">
                Sistem ini mewadahi informasi bidang UMKM dan orang yang terkait di dalamnya, seperti informasi toko dan nikmati navigasi peta interaktif. Sebagai media pemantauan dan evaluasi keberadaan serta pengelolaan toko oleh-oleh khas Soppeng melalui data lokasi dan informasi lengkap tiap toko.
            </p>
            <div class="mt-4">
                <button type="button" class="btn btn-outline-info radius-30 px-5">
                    Selengkapnya <i class="bx bx-right-arrow-alt mr-1"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<br/>

<h6 class="text-uppercase mb-0">Kategori</h6>
<hr>
<div class="row">
    <?php
    // Koneksi ke database
    include 'koneksi.php'; 

    // Daftar ID kategori yang ingin ditampilkan
    $kategori_ids = [3, 4, 5, 6]; // ID kategori yang sesuai dengan yang Anda sebutkan

    // Loop untuk menampilkan kategori
    foreach ($kategori_ids as $kategori_id) :
        // Query untuk mendapatkan jumlah produk berdasarkan kategori
        $query = "SELECT COUNT(*) AS total_produk FROM products WHERE category_id = $kategori_id";
        $result = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_assoc($result);
        $jumlah_produk = $data['total_produk'];

        // Menentukan nama kategori berdasarkan ID
        $kategori_nama = '';
        switch ($kategori_id) {
            case 3:
                $kategori_nama = 'Makanan & Minuman';
                $icon = 'bx-restaurant';
                $bg = 'bg-light-primary';
                $text = 'text-primary';
                break;
            case 4:
                $kategori_nama = 'Pakaian';
                $icon = 'bx-closet';
                $bg = 'bg-light-danger';
                $text = 'text-danger';
                break;
            case 5:
                $kategori_nama = 'Aksesoris';
                $icon = 'bx-glasses';
                $bg = 'bg-light-success';
                $text = 'text-success';
                break;
            case 6:
                $kategori_nama = 'Hasil Bumi';
                $icon = 'bx-world';
                $bg = 'bg-light-info';
                $text = 'text-info';
                break;
        }
    ?>
        <div class="col-12 col-lg-3">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <h4 class="mb-0 font-weight-bold"><?= $jumlah_produk ?></h4>
                            <p class="mb-0"><?= $kategori_nama ?></p>
                        </div>
                        <div class="widgets-icons <?= $bg ?> <?= $text ?> rounded-circle">
                            <i class="bx <?= $icon ?>"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<h6 class="text-uppercase mb-0">Produk</h6>
<hr>
<section class="blogs" id="blogs">
    <div class="swiper blogs-row">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide box">
                <div class="img">
                    <img src="uploads/bolucukket.jpg" alt="Bolu Cukke">
                </div>
                <div class="content">
                    <h3 style="font-weight: bold;">Bolu Cukke</h3>
                    <p>Namanya sendiri, “cukke”, diambil dari cara membuatnya yang dicungkil keluar dari dalam cetakan.
					Bolu cukke adalah kue tradisional khas Suku Bugis, 
					Sulawesi Selatan, yang terbuat dari tepung beras, gula merah, dan telur bebek. </p>
					<p>Bolu cukke cocok disantap di sore hari ditemani dengan teh ataupun kopi.</p>
                    <a href="?halaman=produk" class="btn">Learn More</a>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide box">
                <div class="img">
                    <img src="uploads/nennunennu.jpg" alt="Nennu nennu">
                </div>
                <div class="content">
                    <h3>Nennu-Nennu</h3>
                    <p>Nennu-nennu adalah kue tradisional Bugis yang terbuat dari tepung beras dan gula merah.
					Nennu-nennu memiliki bentuk seperti benang kusut, sehingga sering disebut sebagai kue benang kusut. 
					Kue ini memiliki rasa manis dan sedikit gurih, dengan tekstur yang agak krispy namun mudah hancur di mulut.
					</p>
					<p>Nennu-nennu sering disajikan dalam pesta pernikahan adat Sulawesi Selatan. </p>
                    <a href="?halaman=produk" class="btn">Learn More</a>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide box">
                <div class="img">
                    <img src="uploads/dadargulung.jpg" alt="Dadar Gulung">
                </div>
                <div class="content">
                    <h3>Dadar Gulung</h3>
                    <p>Dadar gulung adalah jajanan tradisional Indonesia yang berbentuk bulat memanjang, 
						dengan kulit berwarna hijau dan isian kepala muda atau parutan kelapa 
						yang dicampur gula merah. Rasanya manis, legit, dan gurih.</p>
						<p>Memiliki beragam varian rasa dan isian. Selain kelapa parut, 
							Anda bisa menambahkan isian lain seperti unti kelapa parut, buang pisang, atau aneka buah.</p>
                    <a href="?halaman=produk" class="btn">Learn More</a>
                </div>
            </div>
			<!-- Slide 4 -->
            <div class="swiper-slide box">
                <div class="img">
                    <img src="uploads/tapebugis.jpeg" alt="Tape Bugis">
                </div>
                <div class="content">
                    <h3>Tape Bugis</h3>
                    <p>Tape Bugis atau gambang adalah makanan khas masyarakat Bugis yang terbuat dari beras ketan hitam dan putih yang difermentasi. 
						Tape Bugis memiliki rasa manis dan segar, tekstur lembut dan berair, serta bentuk bulat seperti bola bisbol. </p>
						<p>Tape Bugis nikmat jika disantap setelah dimasukkan di kulkas.</p>
                    <a href="?halaman=produk" class="btn">Learn More</a>
                </div>
            </div>
			<!-- Slide 5 -->
            <div class="swiper-slide box">
                <div class="img">
                    <img src="uploads/kuecucur.jpg" alt="Cucur">
                </div>
                <div class="content">
                    <h3>Jompo Jompo</h3>
                    <p>Jompo-Jompo adalah kue tradisional Bugis 
						di Sulawesi Selatan yang bentuknya sangat mirip dengan kue cucur, 
						sehingga sering disebut kue cucur Bugis.</p>
						<p>Bedanya, jompo-jompo terbuat dari gula merah atau gula aren sehingga warnanya kecoklatan. Sedangkan kue cucur, kadang ada warna merah muda dan warna putih.</p>
                    <a href="?halaman=produk" class="btn">Learn More</a>
                </div>
            </div>
			<!-- Slide 6 -->
            <div class="swiper-slide box">
                <div class="img">
                    <img src="uploads/pipang.jpg" alt="pipang">
                </div>
                <div class="content">
                    <h3>Pipang</h3>
                    <p>Pipang bugis adalah makanan ringan tradisional khas Makassar yang terbuat dari beras ketan dan gula merah. 
						Pipang memiliki tekstur yang renyah dan rasa yang manis. 
						Pipang juga dikenal dengan nama bipang atau Brondong Beras.</p>
						<p>Pipang merupakan oleh-oleh khas dari beberapa daerah di Sulawesi Selatan, seperti Jeneponto, Bone, dan Soppeng.</p>
                    <a href="?halaman=produk" class="btn">Learn More</a>
                </div>
            </div>
            <!-- Slide 7 -->
            <div class="swiper-slide box">
                <div class="img">
                    <img src="uploads/bolupeca.jpg" alt="bolupeca">
                </div>
                <div class="content">
                    <h3>Bolu Peca</h3>
                    <p>Bolu peca adalah salah satu kue adalah salah satu kue tradisional 
                        Indonesia yang berasal dari Sulawesi Selatan, lebih tepatnya dari masyarakat Bugis. </p>
						<p>Cara membuat bolu kukus bolu peca pun begitu unik dan memiliki ciri khasnya tersendiri. 
                            Bolu peca memiliki tekstur yang lembut serta aroma yang harus.</p>
                    <a href="?halaman=produk" class="btn">Learn More</a>
                </div>
            </div>
        </div>
        <!-- Navigation and Pagination -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Review Section -->
<!-- Review Section -->
<section id="review">
    <div class="container mt-5">
        <h2 class="text-center fw-bold" style="font-family: 'Quicksand', sans-serif;">Customer Reviews</h2>
        <hr class="mb-4">

        <!-- Review Form -->
        <form action="" method="POST" class="mb-5">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Anda"  required>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email Anda" required>
                </div>
                <div class="col-12 mb-3">
                    <textarea name="review" rows="4" class="form-control" placeholder="Masukkan ulasan anda di sini..." required></textarea>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" name="submit_review" class="btn btn-primary">Submit Review</button>
                </div>
            </div>
        </form>

        <!-- Display Reviews -->
        <div class="row">
            <?php
            // Koneksi ke database
            include 'koneksi.php';

            // Proses input review
            if (isset($_POST['submit_review'])) {
                $name = mysqli_real_escape_string($koneksi, $_POST['name']);
                $email = mysqli_real_escape_string($koneksi, $_POST['email']);
                $review = mysqli_real_escape_string($koneksi, $_POST['review']);

                // Simpan review ke database
                $query = "INSERT INTO reviews (name, email, review, created_at) VALUES ('$name', '$email', '$review', NOW())";
                mysqli_query($koneksi, $query);
            }

            // Ambil semua review dari database
            $result = mysqli_query($koneksi, "SELECT * FROM reviews ORDER BY created_at DESC");
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($row['review']) ?></p>
                            <p class="text-muted small">Posted on <?= date('d M Y, H:i', strtotime($row['created_at'])) ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<script>
   document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper(".blogs-row", {
        spaceBetween: 30,
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            },
            1024: {
                slidesPerView: 1,
            },
        },
    });
});
</script>
