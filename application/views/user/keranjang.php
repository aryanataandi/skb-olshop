	<div class="container detail-keranjang">

		<div class="mb-4">

			<?php if ($this->cart->total_items() == 0) { ?>
				<div class="my-4">
					<img src="<?= base_url('assets/empty.svg') ?>" class="d-flex mx-auto my-5 no-cart">
					<h4 class="text-center text-dark">Keranjang belanja kosong</h4>
					<div class="d-flex">
						<a href="<?= base_url() ?>" class="btn btn-sm btn-dark mx-auto mt-3 px-4 py-2">Mulai Belanja</a>
					</div>
				</div>

			<?php } else { ?>

				<nav aria-label="breadcrumb" id="breadcrumb" class="pt-1" style="margin-left: -16px;">
					<ol class="breadcrumb bg-transparent">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
						<li class="breadcrumb-item active" aria-current="page">Keranjang</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-12 col-lg-8">


						<?php
						echo $this->session->flashdata('alert');
						foreach ($produk as $produk) {
							foreach ($this->cart->contents() as $item) {
								if ($produk['id_produk'] == $item['id']) {
						?>

									<div class="mb-4">
										<div class="mb-5">
											<img src="<?= base_url('assets/img_produk/' . $produk['gambar_produk']) ?>" alt="produk" class="rounded float-left mr-3" height="120px">
											<h5><a href="<?= base_url('home/detail/' . strtourl($produk['nama_produk'])) ?>" style="font-size: .96em;"><?= $produk['nama_produk'] ?></a></h5>
											<h5>@<?= getRupiah($item['price']) ?></h5>
											<p class="text-muted small">Jumlah : <?= $item['qty'] ?> / Berat <?= $produk['berat_produk'] * $item['qty'] ?> Kg</p>
											<a href="<?= base_url('home/delitem/' . $item['rowid']) ?>"><i class="fas fa-trash float-right text-secondary"></i></a>
										</div>
										<hr>
									</div>

						<?php
								}
							}
						}

						?>

						<div class="d-flex">
							<a href="<?= base_url('home/delcart') ?>" class="btn btn-outline-danger mx-auto mb-4" onclick="return confirm('Apakah anda ingin menghapus keranjang?');"><i class="fas fa-cart-arrow-down mr-3"></i>Kosongkan Keranjang</a>
						</div>

					</div>
					<div class="col-12 col-lg-4 mb-4">
						<div class="shadow rounded">
							<div class="card-body"><span style="font-size: 1.2em; font-weight: 500;">Detail Keranjang</span>
								<hr>
								<div class="row mb-3">
									<div class="col">
										Jumlah barang
									</div>
									<div class="col text-right">
										<?= $this->cart->total_items() ?>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col">
										Total harga
									</div>
									<div class="col text-right">
										<span style="font-size: 1.2em; color: orangered;" class="font-weight-bold"><?= getRupiah($this->cart->total()) ?></span>
									</div>
								</div>
								<div class="text-center mt-4">
									<?php if ($user) { ?>
										<a href="<?= base_url('home/checkout') ?>" class="btn btn-success btn-block">Checkout</a>
									<?php } else { ?>
										<a href="<?= base_url('auth') ?>" class="btn btn-success d-flex"><span class="mx-auto">Login</span></a>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php if (!$user) { ?>
							<div class="d-flex">
								<small class="text-danger mx-auto my-4">Anda harus login untuk melanjutkan pemesanan</small>
							</div>
						<?php } ?>
					</div>
				</div>

			<?php } ?>

			<div style="min-height: 40px"></div>

		</div>
	</div>

	<!-- Alert -->
	<div id="flashdata" data-flashdata="<?= $this->session->flashdata('swal') ?>"></div>