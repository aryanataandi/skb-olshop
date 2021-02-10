		<div class="col-md-12 col-lg-9">
			<?php if (!$pesanan_baru && !$pesanan_diproses && !$pesanan_dikirim && !$pesanan_dibatalkan && !$pesanan_selesai) { ?>
				<div class="row">
					<div class="col-12 mb-4">
						<img src="<?= base_url('assets/noorder.svg') ?>" class="d-flex mx-auto my-5 no-order">
						<h4 class="text-center text-secondary">Anda belum pernah melakukan pesanan</h4>
					</div>
				</div>
			<?php } ?>
			<div class="row">
				<?php if ($pesanan_baru) { ?>
					<div class="col-12">
						<?php foreach ($pesanan_baru as $invoice) { ?>
							<a href="<?= base_url('profil/pesanan/' . $invoice['id_invoice']) ?>">
								<div class="shadow rounded bg-white text-body mb-3">
									<div class="card-body">
										<h5 class="card-title">Menunggu pembayaran..</h5>
										<p class="card-text">
											Pesanan dengan kode <span class="font-weight-bold"><?= $invoice['id_invoice'] ?></span> belum terbayar <br>Mohon segera lakukan pembayaran dalam 1 x 24 jam
										</p>
									</div>
									<div class="card-footer">
										<small><em>*Jika sudah melakukan pembayaran mohon tunggu beberapa saat.</em></small>
									</div>
								</div>
							</a>
						<?php } ?>
					</div>
				<?php } ?>
				<?php if ($pesanan_diproses) { ?>
					<div class="col-12">
						<?php foreach ($pesanan_diproses as $invoice) { ?>
							<a href="<?= base_url('profil/pesanan/' . $invoice['id_invoice']) ?>">
								<div class="shadow rounded bg-primary text-white mb-3">
									<div class="card-body">
										<h5 class="card-title">Pesanan sedang diproses</h5>
										<p class="card-text">Pesanan dengan kode <span class="font-weight-bold underline"><?= $invoice['id_invoice'] ?></span> sudah terbayar & sedang dalam proses/packing</p>
									</div>
								</div>
							</a>
						<?php } ?>
					</div>
				<?php } ?>
				<?php if ($pesanan_dikirim) { ?>
					<div class="col-12">
						<?php foreach ($pesanan_dikirim as $invoice) { ?>
							<a href="<?= base_url('profil/pesanan/' . $invoice['id_invoice']) ?>">
								<div class="shadow rounded bg-success text-white mb-3">
									<div class="card-body">
										<h5 class="card-title">Pesanan sedang dikirim</h5>
										<p class="card-text">Pesanan dengan kode <span class="font-weight-bold underline"><?= $invoice['id_invoice'] ?></span> sudah selesai diproses & sedang dalam tahap pengiriman</p>
									</div>
								</div>
							</a>
						<?php } ?>
					</div>
				<?php } ?>
				<!-- Divider -->
				<?php if (($pesanan_dibatalkan || $pesanan_selesai) && ($pesanan_baru || $pesanan_diproses || $pesanan_dikirim)) { ?>
					<div class="col-12 mb-3">
						<hr>
					</div>
				<?php } ?>
				<!-- Riwayat Transaksi -->
				<?php foreach ($pesanan_all as $pesanan) { ?>
					<?php if ($pesanan['status'] == 'Selesai') { ?>
						<div class="col-12">
							<div class="shadow rounded bg-white mb-3">
								<div class="card-body">
									<h5 class="card-title">Belanja<span class="float-right badge badge-success">Selesai</span></h5>
									<p class="card-text"><?= date('d M Y', strtotime($pesanan['tgl_pesan'])) ?> &middot; Total belanja: <span class="font-weight-bold" style="color: orangered;"><?= getRupiah($pesanan['total']) ?></span></p>
								</div>
								<a href="<?= base_url('profil/pesanan/' . $pesanan['id_invoice']) ?>">
									<div class="card-footer font-weight-bold">Rincian pesanan &raquo;</div>
								</a>
							</div>
						</div>
					<?php }
					if ($pesanan['status'] == 'Dibatalkan') { ?>
						<div class="col-12">
							<a href="<?= base_url('profil/pesanan/' . $pesanan['id_invoice']) ?>">
								<div class="shadow rounded bg-white text-body mb-3">
									<div class="card-body">
										<h5 class="card-title">Pesanan dibatalkan<span class="float-right badge badge-danger">Dibatalkan</span></h5>
										<p class="card-text">Pesanan dengan kode order <span class="font-weight-bold"><?= $pesanan['id_invoice'] ?></span> telah dibatalkan</p>
									</div>
								</div>
							</a>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
		</div>


		</div>

		<!-- Alert -->
		<div id="flashdata" data-flashdata="<?= $this->session->flashdata('batal') ?>"></div>
		<div id="flashdataKonf" data-flashdata="<?= $this->session->flashdata('confirm') ?>"></div>