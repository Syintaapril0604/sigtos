<div class="row">
    <div class="col-12 col-lg-3">
        <div class="card radius-15 bg-voilet">
            <div class="card-body">
                <div class="d-flex align-items-center">
                <?php
                    $query_kecamatan = mysqli_query($koneksi, "SELECT * FROM kecamatan")or die(mysqli_error($koneksi));

                    $jumlah_kecamatan = $query_kecamatan->num_rows;
                ?>
                    <div>
                        <h2 class="mb-0 text-white"><?php echo $jumlah_kecamatan; ?></h2>
                    </div>
                    <div class="ml-auto font-35 text-white"><i class="bx bx-map-pin"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">KECAMATAN</p>
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <div class="col-12 col-lg-3">
        <div class="card radius-15 bg-primary-blue">
            <div class="card-body">
                <div class="d-flex align-items-center">
                <?php
                    $query_toko = mysqli_query($koneksi, "SELECT * FROM toko")or die(mysqli_error($koneksi));

                    $jumlah_toko = $query_toko->num_rows;
                ?>
                    <div>
                        <h2 class="mb-0 text-white"><?php echo $jumlah_toko; ?></h2>
                    </div>
                    <div class="ml-auto font-35 text-white"><i class="bx bx-store"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">TOKO</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-3">
        <div class="card radius-15 bg-sunset">
            <div class="card-body">
                <div class="d-flex align-items-center">
                <?php
                    $query_oleholeh = mysqli_query($koneksi, "SELECT * FROM products")or die(mysqli_error($koneksi));
                    $jumlah_oleholeh = $query_oleholeh->num_rows;
                ?>
                    <div>
                        <h2 class="mb-0 text-white"><?php echo $jumlah_oleholeh; ?></h2>
                    </div>
                    <div class="ml-auto font-35 text-white"><i class="bx bx-basket"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">OLEH-OLEH</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-3">
        <div class="card radius-15 bg-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                <?php
                    $query_user= mysqli_query($koneksi, "SELECT * FROM user")or die(mysqli_error($koneksi));

                    $jumlah_user = $query_user->num_rows;
                ?>
                    <div>
                        <h2 class="mb-0 text-white"><?php echo $jumlah_user; ?></h2>
                    </div>
                    <div class="ml-auto font-35 text-white"><i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">PENGGUNA</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--end breadcrumb-->
<div class="card radius-15">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Selamat Datang, <?php echo $_SESSION['admin']['nama']; ?></h4>
        </div>
        <hr/>
        <p>Nama     :  <?php echo $_SESSION['admin']['nama']; ?></p>
        <p>Username :  <?php echo $_SESSION['admin']['username']; ?></p>
        <p>Role     :  <?php echo strtoupper($_SESSION['admin']['role']); ?></p>

</div>
