<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">
			<?php if ($this->session->flashdata('welcome')) {
				echo "Selamat Datang " . ucfirst($admin['username']);
			} else {
				echo "Dashboard";
			} ?>
		</h1>
	</div>

	<!-- Content Row -->
	<div class="row">
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Pendapatan
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php $total = 0; foreach ($pendapatan as $p) {
									$total += $p['total']-$p['ongkir'];
								} echo getRupiah($total); ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<a href="<?= base_url('admin/invoice') ?>" style="text-decoration: none;">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
									Jumlah Pesanan Baru
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800 <?php if ($total_invoice >= 1) {
																						echo "blink";
																					} ?>">
									<?= $total_invoice; ?> Pesanan
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
								Jumlah Produk Terjual
							</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
										<?php $tproduk = 0; foreach ($total_produk as $produk) {
											$tproduk += $produk['jumlah'];
										} echo $tproduk . " Produk" ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<a href="<?= base_url('admin/users') ?>" style="text-decoration: none;">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
									Jumlah User
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">
									<?= $total_user; ?> User
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-users fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>



</div>
<!-- /.container-fluid -->

<script>
	function blink() {
		$('.blink').fadeOut(500);
		$('.blink').fadeIn(500);
	}
	setInterval(blink, 1400);
</script>