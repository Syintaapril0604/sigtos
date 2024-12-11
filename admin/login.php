<?php

include '../koneksi.php';

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Login Admin</title>
	<!--favicon-->
	<link rel="icon" href="../assets/images/logosoppeng.png" type="image/png" />
	<!-- loader-->
	<link href="../assets/css/pace.min.css" rel="stylesheet" />
	<script src="../assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="../assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="../assets/css/app.css" />
</head>

<body class="bg-login">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="section-authentication-login d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-8 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="card-body p-md-5">
									<div class="text-center">
										<img src="../assets/images/webgis.png" width="60" alt="">
										<h3 class="mt-4 font-weight-bold">Silahkan Login</h3>
									</div>

                            <form method="POST">        
									<div class="form-group mt-4">
										<label>Username</label>
										<input type="text" name="username" class="form-control" placeholder="Masukkan username anda" />
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control" placeholder="Masukkan password anda" />
									</div>
									<div class="form-row">
										<div class="form-group col">
											<div class="custom-control custom-switch">
												<input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
												<label class="custom-control-label" for="customSwitch1">Remember Me</label>
											</div>
										</div>
									</div>
									<div class="btn-group mt-3 w-100">
										<button type="submit" name="login" class="btn btn-primary btn-block">Log In</button>
										<button type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
										</button>
									</div>
									<hr>
                            </form>        
								</div>
							</div>
							<div class="col-lg-6">
								<img src="../assets/images/login-images/login-frent-img.jpg" class="card-img login-img h-100" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>
</html>

<?php

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($_POST['username']) && empty($_POST['password'])){
            
            echo header('location: login.php?errorusername=Username harus diisi&errorpassword=Password harus diisi');
        
        }else if(empty($_POST['username'])){
        
            echo header('location: login.php?errorusername=Username harus diisi');

        }else if(empty($_POST['password'])) {

            echo header('location: login.php?errorpassword=Password harus diisi');

        } else {

                $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND role= 'admin'") or die(mysqli_error($koneksi));

            $cek = $query->num_rows;

            if($cek == 1){
                $_SESSION['admin'] = $query->fetch_assoc();

                echo "<script>alert('Berhasil Login'); </script>";
                echo "<script>document.location.href='index.php'; </script>";
            }else{
                echo "<script>alert('Gagal Login'); </script>";
                echo "<script>document.location.href='login.php'; </script>";
            }
        }
    }
?>