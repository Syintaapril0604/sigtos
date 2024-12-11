<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3"><b>Data Produk</b></div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Produk</li>
            </ol>
        </nav>
    </div>
    <div class="ml-auto">
        <div class="btn-group">
            <a href="?halaman=tambahproduk" class="btn btn-sm btn-primary">+ Tambah Data Produk</a>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<div class="card radius-15">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Data Produk</h4>
        </div>
        <hr/>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;" scope="col">No.</th>
                        <th style="text-align: center;" scope="col">Nama Produk</th>
                        <th style="text-align: center;" scope="col">Kategori</th>
                        <th style="text-align: center;" scope="col">No. P-IRT</th>
                        <th style="text-align: center;" scope="col">Deskripsi</th>
                        <th style="text-align: center;" scope="col">Harga</th>
                        <th style="text-align: center;" scope="col">Status Stok</th>
                        <th style="text-align: center;" scope="col">Gambar</th>
                        <th style="text-align: center;" scope="col">Nama Toko</th>
                        <th style="text-align: center;" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $products = mysqli_query($koneksi, 
                        "SELECT p.id, p.name, c.name AS category_name, p.pirt, p.description, p.price, p.stock_status, p.image_url, t.name AS store_name 
                        FROM products p 
                        JOIN categories c ON p.category_id = c.id 
                        JOIN toko t ON p.store_id = t.id"
                    ) or die(mysqli_error($koneksi));

                    $no = 1;
                    while ($data_product = $products->fetch_assoc()) {
                    ?>
                    <tr>
                        <th style="text-align: center;" scope="row"><?php echo $no++; ?></th>
                        <td style="text-align: center;"><?php echo htmlspecialchars($data_product['name']); ?></td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($data_product['category_name']); ?></td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($data_product['pirt']); ?></td>
                        <td style="text-align: justify; white-space: normal; word-wrap: break-word; max-width: 300px;">
                            <?php 
                            // Ganti setiap titik dengan titik diikuti baris baru
                            echo nl2br(str_replace('.', ".\n", htmlspecialchars($data_product['description']))); 
                            ?>
                        </td>
                        <td style="text-align: center;"><?php echo number_format($data_product['price'], 2, ',', '.'); ?></td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($data_product['stock_status']); ?></td>
                        <td style="text-align: center;">
                            <img src="../uploads/<?php echo htmlspecialchars($data_product['image_url']); ?>" style="width: 75px; height: auto;" alt="Produk" class="img-fluid">
                        </td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($data_product['store_name']); ?></td>
                        <td style="text-align: center;">
                            <a href="?halaman=editproduk&id=<?php echo $data_product['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                            <a onclick="return confirm('Yakin ingin hapus data?');" href="?halaman=hapusproduk&id=<?php echo $data_product['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
