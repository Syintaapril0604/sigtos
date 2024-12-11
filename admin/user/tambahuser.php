<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Pengguna</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="?halaman=user"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Pengguna</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="card radius-15">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Tambah Data Pengguna</h4>
        </div>
        <hr/>
        <form method="POST">
            <div class="form-group">
                <label for="">Nama Pengguna</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="role" id="" class="form-control">
                    <option value="admin">ADMIN</option>
                </select>
            </div>
            <button class="btn btn-sm btn-secondary" type="button" onclick="window.history.back();">Kembali</button>
            <button class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>
            
        </form>
    </div>
</div>

<?php

if(isset($_POST['submit'])){

            $nama_user = $_POST['nama'];
            $username  = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $role = $_POST['role'];


            $query = mysqli_query($koneksi, "INSERT INTO user(nama, username, password, email, role)
                        VALUES('$nama_user','$username','$password','$email','$role')") or die(mysqli_error($koneksi));

    if($query) {
            echo "<script>alert('Berhasil Tambah Data'); </script>";
            echo "<script>document.location.href='?halaman=user'; </script>";
    } else {
            echo "<script>alert('Gagal Tambah Data'); </script>";
            echo "<script>document.location.href='tambahuser.php'; </script>";
    }
}

?>

