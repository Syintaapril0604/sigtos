<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Oleh-Oleh Soppeng</title>
	<!--favicon-->
	<link rel="icon" href="assets/images/logosoppeng.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="assets/css/app.css" />
	<link rel="stylesheet" href="assets/css/dark-sidebar.css" />
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
	<!-- Data Tables -->
	<link href="assets/plugins/datatable/css/datatable.bootstrap4.min.css" rel="stylesheet" type="text/css" >
	<!-- CSS CUSTOM -->
	<link rel="stylesheet" href="assets/css/custom-style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

	<!-- Leaflet -->
	<link rel="stylesheet" href="leaflet/leaflet.css" />
	<script src="leaflet/leaflet.js"></script>
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<!--sidebar-wrapper-->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div class="">
					<img src="assets/images/webgis.png" class="logo-icon-2" alt="" />
				</div>
				<div>
					<h6 class="logo-text"><b>SIGTOS</b></h6>
				</div>
				<a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
				</a>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="index.php">
						<div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>

					<li class="menu-label">MENU</li>
				
				<li>
					<a href="?halaman=peta">
						<div class="parent-icon icon-color-3"><i class="bx bx-map"></i>
						</div>
						<div class="menu-title">Peta</div>
					</a>
				</li>

				<li>
					<a href="?halaman=produk">
						<div class="parent-icon icon-color-6"><i class="bx bx-food-menu"></i>
						</div>
						<div class="menu-title">Oleh-Oleh</div>
					</a>
				</li>

				<li>
					<a href="?halaman=toko">
						<div class="parent-icon icon-color-12"><i class="bx bx-store"></i>
						</div>
						<div class="menu-title">Toko</div>
					</a>
				</li>	
				<li class="menu-label">NARAHUBUNG</li>

				<li>
					<a href="?halaman=contacts">
						<div class="parent-icon icon-color-2"><i class="bx bx-group"></i>
						</div>
						<div class="menu-title">Contact</div>
					</a>
				</li>	
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar-wrapper-->
		<!--header-->
		<header class="top-header">
			<nav class="navbar navbar-expand">
				<div class="left-topbar d-flex align-items-center">
					<a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
					</a>
				</div>
				
				<div class="right-topbar ml-auto">
					<ul class="navbar-nav">
						
						<li class="nav-item dropdown dropdown-lg">
							<div class="dropdown-menu dropdown-menu-right">
							</div>
						</li>
						<li class="nav-item dropdown dropdown-language">
							<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
								<div class="lang d-flex">
									<div><i class="flag-icon flag-icon-id"></i>
									</div>
									<div><span>IDN</span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="javascript:;"><i class="flag-icon flag-icon-de"></i><span>German</span></a>
								<a class="dropdown-item" href="javascript:;"><i class="flag-icon flag-icon-fr"></i><span>French</span></a>
								<a class="dropdown-item" href="javascript:;"><i class="flag-icon flag-icon-um"></i><span>English</span></a>
								<a class="dropdown-item" href="javascript:;"><i class="flag-icon flag-icon-in"></i><span>Hindi</span></a>
								<a class="dropdown-item" href="javascript:;"><i class="flag-icon flag-icon-cn"></i><span>Chinese</span></a>
								<a class="dropdown-item" href="javascript:;"><i class="flag-icon flag-icon-id"></i><span>Indonesia</span></a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					
					<?php

					if(isset($_GET['halaman'])){

						if($_GET['halaman'] == 'peta') {
							include 'peta.php';

						}else if($_GET['halaman'] == 'toko') {
							include 'toko.php';

						}else if($_GET['halaman'] == 'produk') {
							include 'produk.php';

					
						}else if($_GET['halaman'] == 'ekspor') {
							include 'ekspor.php';

						} else if($_GET['halaman'] == 'contacts') {
							include 'contacts.php';

						} 	
					} else {
						include 'dashboard.php';
					}
					?>
				</div>	
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!-- end footer -->
	</div>
	<!-- end wrapper -->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="custom-control custom-radio">
					<input type="radio" id="darkmode" name="customRadio" class="custom-control-input">
					<label class="custom-control-label" for="darkmode">Dark Mode</label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="lightmode" name="customRadio" checked class="custom-control-input">
					<label class="custom-control-label" for="lightmode">Light Mode</label>
				</div>
			</div>
			<hr/>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="DarkSidebar">
				<label class="custom-control-label" for="DarkSidebar">Dark Sidebar</label>
			</div>
			<hr/>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="ColorLessIcons">
				<label class="custom-control-label" for="ColorLessIcons">Color Less Icons</label>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!--plugins-->
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!-- App JS -->
	<script src=" assets/js/app.js"></script>

	
	
	<!-- Data Table -->
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js" ></script>

	<script>
		$(document).ready(function() {
			$('#example').DataTable();
			var table = $('#example2').DataTable({
				lengthChange : false,
				buttons : ['copy', 'excel', 'pdf', 'print', 'colvis']
			});
			table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
		});
	</script>
</body>

</html>
