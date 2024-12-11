<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3"><b>Kecamatan</b></div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Data Kecamatan Di Kabupaten Soppeng</li>
            </ol>
        </nav>
    </div>
    <div class="ml-auto">
        <div class="btn-group">
            <a href="?halaman=tambahkecamatan" class="btn btn-sm btn-primary">+ Tambah Data Kecamatan</a>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<div class="card radius-15">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Data Kecamatan</h4>
        </div>
        <hr/>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="text-align: center;" scope="col">No.</th>
                        <th style="text-align: center;" scope="col">Nama</th>
                        <th style="text-align:justify;" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $kecamatan= mysqli_query($koneksi, "SELECT * FROM kecamatan") or die(mysqli_error($koneksi));

                    $no = 1;
                    while($data_kecamatan = $kecamatan->fetch_assoc()) {
                    ?>

                    <tr>
                        <th style="text-align: center;" scope="row"><?php echo $no++; ?></th>
                        <td style="text-align: center;" ><?php echo $data_kecamatan['name']; ?></td>
                        <td>
                            <a href="?halaman=editkecamatan&id=<?php echo $data_kecamatan['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                            <a onclick="return confirm('Yakin ingin hapus data?');" href="?halaman=hapuskecamatan&id=<?php echo $data_kecamatan['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </div>
</div>
