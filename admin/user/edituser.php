<?php

    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$id'") or die(mysqli_error($koneksi));

    while($user = $query->fetch_assoc()){

    

?>

<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Pengguna</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data Pengguna</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="card radius-15">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Edit Data Pengguna</h4>
        </div>
        <hr/>
        <form method="POST">
            <div class="form-group">
                <label for="">Nama Pengguna</label>
                <input type="text" value="<?php echo $user['nama']; ?>"  class="form-control" name="nama" placeholder="Masukkan nama pengguna">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" value="<?php echo $user['email']; ?>"  class="form-control" name="email" placeholder="Masukkan email pengguna">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" value="<?php echo $user['username']; ?>" class="form-control" name="username" placeholder="Masukkan username pengguna">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Ketikkan jika ingin diubah">
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="role" id="" class="form-control">
                    <option value="admin" <?php if($user['role'] == 'admin'){ echo 'selected'; } ?>>ADMIN</option>
                </select>
            </div>
            <button class="btn btn-sm btn-secondary" type="button" onclick="window.history.back();">Kembali</button>
            <button class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>
            
        </form>
    </div>
</div>

<?php
    }
if(isset($_POST['submit'])){

            $nama_user = $_POST['nama'];
            $username  = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $role = $_POST['role'];

        if($_POST['password'] != ''){
            $query = mysqli_query($koneksi, "UPDATE user SET nama ='$nama_user', username='$username', 
                                password='$password', email='$email', role='$role' WHERE id = '$id'")or die(mysqli_error($koneksi));
        } else {
            $query = mysqli_query($koneksi, "UPDATE user SET nama ='$nama_user', username='$username', 
                                email='$email', role='$role' WHERE id = '$id'")or die(mysqli_error($koneksi));
        }
        if($query) {
            echo "<script>alert('Berhasil Edit Data'); </script>";
            echo "<script>document.location.href='?halaman=user'; </script>";
        } else {
            echo "<script>alert('Gagal Edit Data'); </script>";
            echo "<script>document.location.href='tambahuser.php'; </script>";
        }
}

?>

