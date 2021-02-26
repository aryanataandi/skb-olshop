	<div class="container detail-keranjang">

		<div class="mb-4">

			<nav aria-label="breadcrumb" id="breadcrumb" class="pt-1">
				<ol class="breadcrumb bg-transparent">
					<li class="breadcrumb-item">Profil</li>
					<li class="breadcrumb-item"><a href="<?= base_url('profil/pesanan') ?>">Pesanan</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?= $pesanan['id_invoice'] ?></li>
				</ol>
			</nav>

			<!-- Content -->
			<div class="row">
				<div class="col-12">

					<?php if ($pesanan['status'] == 'Baru') { ?>
						<div class="card bg-light mb-4">
							<div class="card-body text-center">
								<p>Lakukan transfer ke nomor rekening berikut, pastikan anda menginput nomor rekening dengan benar.</p>
								<p class="font-weight-bold"><?= $info['info_bank'] ?></p>
								<h2 class="font-weight-bold "><u><?= $info['no_rek'] ?></u></h2>
							</div>
						</div>
					<?php } elseif ($pesanan['status'] == 'Dibatalkan') { ?>
						<div class="card bg-danger mb-4">
							<div class="card-body text-light">
								<h4>Pesanan ini telah dibatalkan</h4>
								<p>Pesanan dapat dibatalkan karena hal-hal berikut ini :</p>
								<ul>
									<li>User tidak membayar tagihan dalam jangka waktu yang ditentukan</li>
									<li>User membatalkan pesanannya sendiri</li>
									<li>Data pengiriman yang diinputkan oleh user tidak sesuai</li>
								</ul>
							</div>
						</div>
					<?php } elseif ($pesanan['status'] == 'Dikirim') { ?>
						<div class="card bg-light mb-4">
							<div class="card-body text-center">
								<p>Pesanan anda sedang dalam tahap pengiriman. Cek history pengiriman secara berkala menggunakan nomor resi berikut ini.</p>
								<h3 class="font-weight-bold "><u><?= $pesanan['resi'] ?></u></h3>
							</div>
						</div>
						<?php }
					foreach ($item as $item) {
						if (!$item['nama_produk']) {
						?>
							<div class="mb-4">
								<div class="mb-4 d-flex">
									<div style="background-color: #c2c2c2; width: 120px; height: 120px;" class="rounded float-left d-flex mr-3"></div>
									<div>
										<h5 class="text-danger"><em>Produk tidak tersedia</em></h5>
										<h5><?= getRupiah($item['harga_detail']) ?></h5>
										<p class="text-muted">Jumlah : <?= $item['jumlah'] ?></p>
									</div>
								</div>
								<hr>
							</div>
						<?php } else { ?>
							<div class="mb-4">
								<div class="mb-5">
									<img src="<?= base_url('assets/img_produk/' . $item['gambar_produk']) ?>" alt="<?= $item['nama_produk'] ?>" class="rounded float-left mr-3" height="120px">
									<h5><a href="<?= base_url('home/detail/' . strtourl($item['nama_produk'])) ?>" style="font-size: .96em;"><?= $item['nama_produk'] ?></a></h5>
									<h5><?= getRupiah($item['harga_detail']) ?></h5>
									<p class="text-muted">Jumlah : <?= $item['jumlah'] ?></p>
								</div>
								<hr>
							</div>
					<?php
						}
					}
					?>

					<div class="shadow rounded mb-4">
						<div class="card-body">
							<div class="card-title">
								<h5>
									Detail Pesanan
									<?php if ($pesanan['status'] == 'Selesai') { ?>
										<span class="float-right badge badge-success">Dikirim</span>
									<?php } ?>
								</h5>
							</div>
							<hr>
							<div class="row">
								<div class="col-6 my-1">
									Kode Order
								</div>
								<div class="col-6 my-1">
									<?= $pesanan['id_invoice'] ?>
								</div>
								<div class="col-6 my-1">
									Tanggal & Jam Order
								</div>
								<div class="col-6 my-1">
									<?= date('d/m/Y, H:i', strtotime($pesanan['tgl_pesan'])) . " WIB" ?>
								</div>
								<div class="col-6 my-1">
									Kurir Pengiriman
								</div>
								<div class="col-6 my-1">
									<?= $pesanan['ekspedisi'] ?>
								</div>
								<div class="col-6 my-1">
									No. Resi
								</div>
								<div class="col-6 my-1">
									<?= $pesanan['resi'] ?>
								</div>
								<div class="col-6 my-1">
									Alamat Pengiriman
								</div>
								<div class="col-6 my-1">
									<?= $pesanan['nama_pemesan'] ?>
								</div>
								<div class="col-6 my-1">
								</div>
								<div class="col-6 my-1">
									<?= $pesanan['no_telp'] ?>
								</div>
								<div class="col-6 my-1">
								</div>
								<div class="col-6 my-1">
									<?= $pesanan['alamat'] ?>
								</div>
								<div class="col-6 my-1">
								</div>
								<div class="col-6 my-1">
									<?= $pesanan['kode_pos'] ?>
								</div>
							</div>
						</div>
					</div>

					<div class="shadow rounded mb-4">
						<div class="card-body">
							<div class="card-title">
								<h5>
									Informasi Pembayaran
									<?php if ($pesanan['status'] == 'Selesai' || $pesanan['status'] == 'Diproses' || $pesanan['status'] == 'Dikirim') { ?>
										<span class="float-right badge badge-success">Lunas</span>
									<?php } ?>
								</h5>
							</div>
							<hr>
							<div class="row">
								<div class="col-6 my-1">
									Total Harga
								</div>
								<div class="col-6 my-1">
									<?= getRupiah($pesanan['bayar']) ?>
								</div>
								<div class="col-6 my-1">
									Total Ongkir (<?= $pesanan['berat_total'] ?> kg)
								</div>
								<div class="col-6 my-1">
									<?= getRupiah($pesanan['ongkir']) ?>
								</div>
							</div>
							<hr>
							<div class="row" style="font-size: 1.1em;">
								<div class="col-6 my-1 font-weight-bold">
									Total Bayar
								</div>
								<div class="col-6 my-1">
									<span class="font-weight-bold" style="color: orangered;"><?= getRupiah($pesanan['total']) ?></span>
								</div>
							</div>
						</div>
					</div>

					<div class="d-flex">
						<?php if ($pesanan['status'] == 'Baru') { ?>
							<button type="button" class="btn btn-danger mx-auto mb-4" data-toggle="modal" data-target="#batalModal">
								<i class="fas fa-ban mr-3"></i>Batalkan Pesanan
							</button>
						<?php } elseif ($pesanan['status'] == 'Dikirim') { ?>
							<button type="button" class="btn btn-success py-2 mx-auto mb-4" data-toggle="modal" data-target="#konfirmModal">
								<i class="fas fa-check-circle mr-3"></i>Konfirmasi Pesanan
							</button>
						<?php } ?>
					</div>
				</div>

			</div>
		</div>


		<div style="min-height: 40px"></div>

	</div>
	</div>

	<!-- Alert -->
	<div id="flashdata" data-flashdata="<?= $this->session->flashdata('swal') ?>"></div>

	<!-- Modal -->
	<div class="modal fade" id="batalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Batalkan Pesanan?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Apakah anda yakin ingin membatalkan pesanan?
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal">Tidak</button>
					<a href="<?= base_url('profil/batal/' . $this->uri->segment(3)) ?>" class="btn btn-danger">Batalkan</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="konfirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pesanan?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Apakah anda yakin ingin mengkonfirmasi pesanan?<br><br>Pastikan barang yang anda pesan sudah anda terima sebelum mengkonfirmasi pesanan!
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal">Tidak</button>
					<a href="<?= base_url('profil/konfirmasi/' . $this->uri->segment(3)) ?>" class="btn py-2 btn-success">Konfirmasi</a>
				</div>
			</div>
		</div>
	</div>