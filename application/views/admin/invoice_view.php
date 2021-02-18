<div class="container">
	<div class="card shadow mb-4">
		<div class="card-header">
			<h6 class="m-0 font-weight-bold text-primary">Detail Invoice</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-6 my-1">
					No. Invoice
				</div>
				<div class="col-6 my-1">
					<?= $invoice['id_invoice'] ?>
				</div>
				<div class="col-6 my-1">
					Tanggal & Jam Order
				</div>
				<div class="col-6 my-1">
					<?= date('d/m/Y, H:i', strtotime($invoice['tgl_pesan'])) . " WIB" ?>
				</div>
				<div class="col-6 my-1">
					<label for="resi">No. Resi</label>
				</div>
				<div class="col-6 col-md-3 my-1">
					<form action="<?= base_url('admin/invoice/view/' . $invoice['id_invoice']) ?>" method="post">
						<input type="text" id="resi" name="resi" class="form-control" value="<?= $invoice['resi'] ?>">
				</div>
				<div class="col-6 my-1">
					<label for="status">Status Order</label>
				</div>
				<div class="col-6 col-md-3 my-1">
					<select class="form-control" name="status" id="status" required>
						<?php if ($invoice['status'] == "Selesai") { ?>
							<option value="">Selesai</option>
							<option value="Dibatalkan">Dibatalkan</option>
							<option value="Diproses">Diproses</option>
							<option value="Dikirim">Dikirim</option>
						<?php } elseif ($invoice['status'] == "Dibatalkan") { ?>
							<option value="">Dibatalkan</option>
							<option value="Diproses">Diproses</option>
							<option value="Dikirim">Dikirim</option>
							<option value="Selesai">Selesai</option>
						<?php } elseif ($invoice['status'] == "Dikirim") { ?>
							<option value="">Dikirim</option>
							<option value="Dibatalkan">Dibatalkan</option>
							<option value="Diproses">Diproses</option>
							<option value="Selesai">Selesai</option>
						<?php } elseif ($invoice['status'] == "Diproses") { ?>
							<option value="">Diproses</option>
							<option value="Dibatalkan">Dibatalkan</option>
							<option value="Dikirim">Dikirim</option>
							<option value="Selesai">Selesai</option>
						<?php } else { ?>
							<option value="">...</option>
							<option value="Dibatalkan">Dibatalkan</option>
							<option value="Diproses">Diproses</option>
							<option value="Dikirim">Dikirim</option>
							<option value="Selesai">Selesai</option>
						<?php } ?>
					</select>
					<small class="text-danger"><?= form_error('resi') ?></small>
					<input type="hidden" name="id" value="<?= $invoice['id_invoice'] ?>">
					<button type="submit" class="btn btn-block btn-primary mt-2">Ubah</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header">
			<h6 class="m-0 font-weight-bold text-primary">Data Belanja</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-6 my-1">
					Nama Pemesan
				</div>
				<div class="col-6 my-1">
					<?= $invoice['nama_pemesan'] ?>
				</div>
				<div class="col-6 my-1">
					No. HP / Telp
				</div>
				<div class="col-6 my-1">
					<?= $invoice['no_telp'] ?>
				</div>
				<div class="col-6 my-1">
					E-mail
				</div>
				<div class="col-6 my-1">
					<?= $invoice['email'] ?>
				</div>
				<div class="col-6 my-1">
					Alamat
				</div>
				<div class="col-6 my-1">
					<?= $invoice['alamat'] ?>
				</div>
				<div class="col-6 my-1">
					Kode Pos
				</div>
				<div class="col-6 my-1">
					<?= $invoice['kode_pos'] ?>
				</div>
			</div>
			<div class="table-responsive mt-4">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th class="th-no">#</th>
							<th>Nama Produk</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Sub-total</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($invoice_detail as $item) { ?>
							<tr>
								<td><?= $i ?></td>
								<td class="text-truncate"><a class="text-secondary" href="<?= base_url('home/detail/' . strtourl($item['nama_produk'])) ?>"><u><?= $item['nama_produk'] ?></u></a></td>
								<td><?= $item['jumlah'] ?></td>
								<td align="right"><?= getRupiah($harga = $item['harga_produk'] - ($item['diskon_produk'] / 100) * $item['harga_produk']) ?></td>
								<td align="right"><?= getRupiah($subtotal = $harga * $item['jumlah']) ?></td>
							</tr>
						<?php $i++;
						} ?>
						<tr>
							<td></td>
							<td colspan="3" class="font-weight-bold">
								Total
							</td>
							<td align="right" class="font-weight-bold">
								<?php $total = 0;
								foreach ($invoice_detail as $item) {
									$harga = $item['harga_produk'] - ($item['diskon_produk'] / 100) * $item['harga_produk'];
									$total += $harga * $item['jumlah'];
								}
								echo getRupiah($total); ?>
							</td>
						</tr>
						<tr>
							<td></td>
							<td colspan="3" class="font-weight-bold">
								Ongkos kirim ( <?= $item['ekspedisi'] . " / " . $item['berat_total'] . " Kg" ?> )
							</td>
							<td align="right" class="font-weight-bold">
								<?= getRupiah($item['ongkir']) ?>
							</td>
						</tr>
						<tr>
							<td></td>
							<td colspan="3" class="font-weight-bold">
								Total bayar
							</td>
							<td align="right" class="font-weight-bold">
								<?= getRupiah($item['total']) ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>