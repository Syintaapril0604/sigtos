<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Maps</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php"><i class='bx bx-home-alt'></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Maps Sigtos</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->


<!-- Kotak Filter -->
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form id="filter-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="kecamatan-filter">Cari Berdasarkan Kecamatan</label>
                            <select id="kecamatan-filter" class="form-control">
                                <option value="">-- Pilih Kecamatan --</option>
                                <?php
                                include('../koneksi.php'); // Pastikan file koneksi tersedia
                                
                                // Query untuk mengambil nama kecamatan unik dari tabel toko
                                $query_kecamatan = "SELECT DISTINCT k.id, k.name 
                                                    FROM toko t
                                                    JOIN kecamatan k ON t.kecamatan_id = k.id";
                                $result_kecamatan = mysqli_query($koneksi, $query_kecamatan);
                                
                                while ($row_kecamatan = mysqli_fetch_assoc($result_kecamatan)) {
                                    echo "<option value='{$row_kecamatan['id']}'>{$row_kecamatan['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Peta -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Pemetaan Toko Oleh-Oleh</div>
            <div class="card-body">
                <div id="map" style="width: 100%; height: 400px;"></div>
            </div>
        </div>
    </div>
</div>

<script>
    var map = L.map('map').setView([-4.366411120949588, 119.90714487941108], 13);

    // Tambahkan tile layer dari OpenStreetMap
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Definisi icon custom untuk marker
    var icon1 = L.icon({
        iconUrl: '../leaflet/images/marker/pin.png',
        iconSize: [45, 45],
        iconAnchor: [25, 45],
        popupAnchor: [-3, -40]
    });

    var markers = []; // Array untuk menyimpan marker
    
    function loadMarkers(filterKecamatan = '') {
        // Hapus semua marker sebelumnya
        markers.forEach(marker => map.removeLayer(marker));
        markers = [];
        
        <?php
        // Query untuk mengambil data toko beserta nama kecamatan
        $query = "SELECT t.id, t.name AS toko_name, t.address, t.latitude, t.longitude, t.description, t.image_url, k.name AS kecamatan_name, k.id AS kecamatan_id
                  FROM toko t
                  JOIN kecamatan k ON t.kecamatan_id = k.id";
        $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

        // Data toko diolah menjadi JavaScript array
        $toko_data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $toko_data[] = $row;
        }
        ?>
        var tokoData = <?php echo json_encode($toko_data); ?>;

        // Filter kecamatan jika ada
        tokoData.forEach(function(data) {
            if (!filterKecamatan || filterKecamatan == data.kecamatan_id) {
                var marker = L.marker([data.latitude, data.longitude], {icon: icon1})
                    .addTo(map)
                    .bindPopup(
                        `<div style='text-align: center;'>
                            <img src='../uploads/${data.image_url}' style='width: 100%; max-width: 150px; height: auto; margin-bottom: 10px;' alt='Gambar Toko'>
                            <br>
                            <b>${data.toko_name}</b><br>
                            <b>Alamat:</b> ${data.address}<br>
                            <b>Kecamatan:</b> ${data.kecamatan_name}<br>
                            <div style='text-align: center; margin-top: 5px;'>${data.description}</div>
                            <button onclick="getRoute(${data.latitude}, ${data.longitude})" class='btn btn-danger btn-sm mt-3'>Rute</button>
                            <button onclick="window.location.href='detailpeta.php?id=${data.id}'" class='btn btn-primary btn-sm mt-3 ml-2'>Detail</button>
                        </div>`
                    );
                markers.push(marker);
            }
        });
    }

    // Muat marker awal
    loadMarkers();

    // Event listener untuk filter
    document.getElementById('kecamatan-filter').addEventListener('change', function() {
        var kecamatanId = this.value;
        loadMarkers(kecamatanId);
    });

    // Fungsi untuk mendapatkan rute menuju toko menggunakan Google Maps
    function getRoute(lat, lng) {
        // Mengambil lokasi saat ini pengguna
        navigator.geolocation.getCurrentPosition(function(position) {
            var userLat = position.coords.latitude;
            var userLng = position.coords.longitude;

            // Membuka Google Maps dengan rute dari lokasi pengguna ke toko
            var googleMapsUrl = `https://www.google.com/maps/dir/?api=1&origin=${userLat},${userLng}&destination=${lat},${lng}&travelmode=driving`;
            window.open(googleMapsUrl, '_blank');
        }, function(error) {
            alert("Gagal mendapatkan lokasi Anda. Pastikan GPS diaktifkan.");
        });
    }
</script>
