<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Toko</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php"><i class='bx bx-home-alt'></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Toko</li>
            </ol>
        </nav>
    </div>
    <div class="ml-auto">
        <div class="btn-group">
            <a href="?halaman=tambahtoko" class="btn btn-primary">+ Tambah Data Toko</a>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Data Toko</h4>
        </div>
        <hr/>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Deskripsi</th>
                        <th>Kecamatan</th>
                        <th>Nomor WhatsApp</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Koneksi ke database
                    $koneksi = mysqli_connect("localhost", "root", "", "sigtos");

                    // Query untuk mendapatkan data toko beserta kecamatan
                    $query = "SELECT toko.id, toko.name, toko.address, toko.latitude, toko.longitude, 
                                     toko.description, toko.image_url, toko.whatsapp_number, kecamatan.name AS kecamatan 
                              FROM toko 
                              JOIN kecamatan ON toko.kecamatan_id = kecamatan.id";
                    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
                    $no = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['latitude']; ?></td>
                        <td><?php echo $row['longitude']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['kecamatan']; ?></td>
                        <td>
                            <?php if (!empty($row['whatsapp_number'])) { ?>
                                <a href="https://wa.me/<?php echo htmlspecialchars($row['whatsapp_number']); ?>" target="_blank">
                                    <?php echo htmlspecialchars($row['whatsapp_number']); ?>
                                </a>
                            <?php } else { ?>
                                <span class="text-muted">Tidak ada nomor</span>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if (!empty($row['image_url'])) { ?>
                                <img src="../uploads/<?php echo $row['image_url']; ?>" alt="Gambar Toko" style="width: 80px; height: 80px; object-fit: cover;">
                            <?php } else { ?>
                                <span class="text-muted">Tidak ada gambar</span>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="?halaman=edittoko&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success">
                                <i class='bx bx-edit'></i>
                            </a>
                            <a onclick="return confirm('Yakin ingin hapus data?');" href="?halaman=hapustoko&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">
                                <i class='bx bx-trash'></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
