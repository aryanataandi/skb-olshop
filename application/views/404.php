<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap & My CSS -->
	<link href="<?= base_url('vendor/sb-admin-2/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/bootstrap/css/bootstrap.css">
	<!-- favicon -->
	<?php if ($this->uri->segment(1) === "admin") { ?>
		<link rel="icon" href="<?= base_url('admin_assets/img/favicon_admin.ico') ?>">
	<?php } else { ?>
		<link rel="icon" href="<?= base_url('assets/favicon.ico') ?>">
	<?php } ?>
	<title>Error 404</title>
</head>

<body>
	<div class="my-4">
		<div class="container d-flex">
			<div class="mx-auto my-5 text-center">
				<img src="<?= base_url('assets/404.svg') ?>" alt="404" width="280px" draggable="false">
				<h1 style="font-size: 2em;" class="mt-4"><b>Error 404</b></h1>
				<h5 class="my-4">Halaman Tidak Ditemukan!</h2>
					<div class="d-flex justify-content-around">
						<?php if ($this->session->userdata('username') && $this->uri->segment(1) == "admin") { ?>
							<a href="<?= base_url('admin') ?>" style="text-decoration: underline;">Halaman Admin</a>
						<?php } else { ?>
							<a href="<?= base_url() ?>" style="text-decoration: underline;">Kembali ke Beranda</a>
						<?php } ?>
					</div>
					<br>
					<small>Copyright &copy; Aryanata Andipradana - <?= date('Y') ?></small>
			</div>
		</div>
	</div>

</body>

</html>