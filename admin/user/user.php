<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Pengguna</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
            </ol>
        </nav>
    </div>
    <div class="ml-auto">
        <div class="btn-group">
            <a href="?halaman=tambahuser" class="btn btn-sm btn-primary">+ Tambah Pengguna</a>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<div class="card radius-15">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Data Pengguna</h4>
        </div>
        <hr/>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="text-align: center;" scope="col">No.</th>
                        <th style="text-align: center;" scope="col">Nama</th>
                        <th style="text-align: center;" scope="col">Username</th>
                        <th style="text-align: center;" scope="col">Role</th>
                        <th style="text-align: justify;" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $user= mysqli_query($koneksi, "SELECT * FROM user") or die(mysqli_error($koneksi));

                    $no = 1;
                    while($data_user = $user->fetch_assoc()) {
                    ?>

                    <tr>
                        <th style="text-align: center;" scope="row"><?php echo $no++; ?></th>
                        <td style="text-align: center;" ><?php echo $data_user['nama']; ?></td>
                        <td style="text-align: center;" ><?php echo $data_user['username']; ?></td>
                        <td style="text-align: center;" ><?php echo strtoupper($data_user['role']); ?></td>
                        <td>
                            <a href="?halaman=edituser&id=<?php echo $data_user['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                            <a onclick="return confirm('Yakin ingin hapus?');" href="?halaman=hapususer&id=<?php echo $data_user['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </div>
</div>
