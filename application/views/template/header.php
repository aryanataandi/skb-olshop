<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= base_url('admin_assets/img/favicon_admin.ico') ?>" />

	<title>
		<?php if ($this->uri->segment(2) == NULL) {
			echo $info['judul_web'] . ' Admin';
		} else {
			echo $judul . ' | Admin';
		} ?>
	</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('vendor/sb-admin-2/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('vendor/sb-admin-2/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Custom styles for this page -->
	<link href="<?= base_url('vendor/sb-admin-2/'); ?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark toggled accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
				<div class="sidebar-brand-icon">
					<i class="fas fa-user-tie"></i>
				</div>
				<div class="sidebar-brand-text mx-3"><?= $info['judul_web'] ?> Admin</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0 mb-3">

			<!-- Heading -->
			<div class="sidebar-heading">
				Beranda
			</div>

			<!-- Nav Item - Dashboard -->
			<li class="nav-item <?php if ($this->uri->segment(2) == null) {
									echo 'active';
								} ?>">
				<a class="nav-link" href="<?= base_url('admin'); ?>">
					<i class="fas fa-fw fa-house-user"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Pengelolaan
			</div>

			<!-- Nav Item - Produk -->
			<li class="nav-item <?php if ($this->uri->segment(2) == 'produk') {
									echo 'active';
								} ?>">
				<a class="nav-link" href="<?= base_url('admin/produk'); ?>">
					<i class="fas fa-fw fa-archive"></i>
					<span>Produk</span></a>
			</li>
			<!-- Nav Item - Kategori -->
			<li class="nav-item <?php if ($this->uri->segment(2) == 'kategori') {
									echo 'active';
								} ?>">
				<a class="nav-link" href="<?= base_url('admin/kategori'); ?>">
					<i class="fas fa-fw fa-tag"></i>
					<span>Kategori</span></a>
			</li>

			<!-- Nav Item - Banner -->
			<li class="nav-item <?php if ($this->uri->segment(2) == 'banner') {
									echo 'active';
								} ?>">
				<a class="nav-link" href="<?= base_url('admin/banner'); ?>">
					<i class="fas fa-fw fa-images"></i>
					<span>Banner</span></a>
			</li>

			<!-- Nav Item - Invoice -->
			<li class="nav-item <?php if ($this->uri->segment(2) == 'invoice') {
									echo 'active';
								} ?>">
				<a class="nav-link" href="<?= base_url('admin/invoice'); ?>">
					<i class="far fa-fw fa-file-alt"></i>
					<span>Invoice</span></a>
			</li>

			<!-- Nav Item - Info -->
			<li class="nav-item <?php if ($this->uri->segment(2) == 'info') {
									echo 'active';
								} ?>">
				<a class="nav-link" href="<?= base_url('admin/info'); ?>">
					<i class="fas fa-fw fa-info-circle"></i>
					<span>Info</span></a>
			</li>

			<!-- Nav Item - User -->
			<li class="nav-item <?php if ($this->uri->segment(2) == 'users') {
									echo 'active';
								} ?>">
				<a class="nav-link" href="<?= base_url('admin/users'); ?>">
					<i class="fas fa-fw fa-user"></i>
					<span>User</span></a>
			</li>

			<!-- Nav Item - Pages Collapse Menu -->
			<!-- <li class="nav-item <?php if ($this->uri->segment(2) == 'users') {
											echo 'active';
										} ?>">
				<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
					<i class="fas fa-fw fa-user-cog"></i>
					<span>User</span>
				</a>
				<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Menu</h6>
						<a class="collapse-item" href="<?= base_url('admin/users'); ?>">Customer</a>
						<a class="collapse-item" href="#">Admin</a>
					</div>
				</div>
			</li> -->

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<!-- <div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div> -->

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-3 d-none d-lg-inline text-gray-600 small"><?= ucfirst($admin['username']); ?></span>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->