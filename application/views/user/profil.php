		<div class="col-md-12 col-lg-9">
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="shadow rounded bg-white mb-3">
						<div class="card-body">
							<div class="card-title">Total Belanja</div>
							<h5>
								<?php $total = 0;
								foreach ($total_belanja as $transaksi) {
									$total += $transaksi['total'];
								}
								echo getRupiah($total); ?>
							</h5>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<a href="<?= base_url('profil/pesanan') ?>">
						<div class="shadow rounded bg-white text-body mb-3">
							<div class="card-body">
								<div class="card-title">Total Transaksi</div>
								<h5><?= $total_transaksi ?> Transaksi</h5>
							</div>
						</div>
					</a>
				</div>
				<div class="col-12">
					<a href="<?= base_url('home/keranjang') ?>">
						<div class="shadow rounded bg-white text-body mb-3">
							<div class="card-header bg-white"><i class="fas fa-shopping-cart mr-2"></i> Keranjang Belanja</div>
							<div class="card-body">
								<h5 class="card-title"><?php if (!$this->cart->total_items()) {
															echo "Tidak Ada";
														} else {
															echo $this->cart->total_items();
														} ?> Item di Keranjang</h5>
								<p class="card-text"><?php if (!$this->cart->total_items()) {
															echo "Buruan belanja sekarang!";
														} else {
															echo "Segera lakukan pembayaran sebelum kehabisan!";
														} ?></p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-12">
					<div class="shadow rounded text-white bg-info mb-3">
						<div class="card-body">
							<h5 class="card-title">Customer Service</h5>
							<p class="card-text">Jika ada pertanyaan silakan menghubungi whatsapp <?= $info['wa_web'] ?> atau <a href="http://wa.me/<?= $info['wa_web'] ?>" target="_blank" style="text-decoration: underline; color: white;">klik disini</a>.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>


		</div>