<div class="container-fluid">

	<div class="d-none d-flex justify-content-end mb-4">
		<div class="dropdown">
			<button type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-sm btn-primary shadow-sm">
				<i class="fas fa-print"></i>
				Cetak Laporan</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" type="button" data-toggle="modal" data-target="#tanggalModal">Berdasarkan Tanggal</a>
				<a class="dropdown-item" type="button" data-toggle="modal" data-target="#bulanModal">Berdasarkan Bulan</a>
				<a class="dropdown-item" type="button" data-toggle="modal" data-target="#tahunModal">Berdasarkan Tahun</a>
			</div>
		</div>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tabel Invoice</h6>
		</div>
		<div class="card-body">

			<!-- Alert -->
			<?php echo $this->session->flashdata('success')  ?>

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTableInvoice" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Kode Invoice</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Pembayaran</th>
							<th>Tanggal Pemesanan</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1 ?>
						<?php foreach ($invoice as $inv) { ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= $inv['id_invoice'] ?></td>
								<td><?= $inv['nama_pemesan']; ?></td>
								<td><?= $inv['email'] ?></td>
								<td><?= getRupiah($inv['total'] - $inv['ongkir']) ?></td>
								<td><?= $inv['tgl_pesan']; ?></td>
								<td>
									<?php switch ($inv['status']) {
										case 'Baru': ?>
											<span class="text-warning font-weight-bold">Baru</span>
										<?php break;
										case 'Diproses': ?>
											<span class="text-primary font-weight-bold">Diproses</span>
										<?php break;
										case 'Dikirim': ?>
											<span class="text-info font-weight-bold">Dikirim</span>
										<?php break;
										case 'Dibatalkan': ?>
											<span class="text-danger font-weight-bold">Dibatalkan</span>
										<?php break;
										case 'Selesai': ?>
											<span class="text-success font-weight-bold">Selesai</span>
										<?php break;
										default: ?>
											...
									<?php break;
									} ?>

								</td>
								<td class="d-flex justify-content-center">
									<a href="<?= base_url('admin/invoice/view/' . strtourl($inv['id_invoice'])) ?>">
										<button type="button" class="btn btn-sm btn-info aksi mr-1">
											<img src="<?= base_url(); ?>admin_assets/img/view.svg">
										</button>
									</a>
								</td>

							</tr>
							<?php $i++ ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal : Pencarian by Tanggal -->
<div class="modal fade" id="tanggalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cari berdasarkan tanggal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/invoice/print/tanggal') ?>" method="POST" target="_blank">
				<div class="modal-body">
					<div class="row">
						<div class="col-12 col-md-6">
							<label for="tanggal_awal">Mulai Tanggal</label>
							<input type="date" id="tanggal_awal" name="tanggal_awal" class="form-control" required>
						</div>
						<div class="col-12 col-md-6">
							<label for="tanggal_akhir">Sampai Tanggal</label>
							<input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control" required>
						</div>
					</div>
					<input type="submit" class="btn btn-primary float-right px-3 my-3" value="Print">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal : Pencarian by Bulan -->
<div class="modal fade" id="bulanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cari berdasarkan bulan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/invoice/print/bulan') ?>" method="POST" target="_blank">
				<div class="modal-body">
					<div class="row">
						<div class="col-12 col-md-6">
							<label for="bulan_awal">Dari Bulan</label>
							<select name="bulan_awal" id="bulan_awal" class="form-control" required>
								<option value="">- Pilih Bulan -</option>
								<option value="1">Januari</option>
								<option value="2">Februari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
						<div class="col-12 col-md-6">
							<label for="bulan_akhir">Sampai Bulan</label>
							<select name="bulan_akhir" id="bulan_akhir" class="form-control" required>
								<option value="">- Pilih Bulan -</option>
								<option value="1">Januari</option>
								<option value="2">Februari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
						<div class="col-12 mt-3">
							<label for="tahun">Pada Tahun</label>
							<select name="tahun" id="tahun" class="form-control" required>
								<option value="">- Pilih Tahun -</option>
								<?php foreach ($tahun as $row) { ?>
									<option value="<?= $row['tahun'] ?>"><?= $row['tahun'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<input type="submit" class="btn btn-primary float-right px-3 my-3" value="Print">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal : Pencarian by Tahun -->
<div class="modal fade" id="tahunModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cari berdasarkan tahun</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/invoice/print/tahun') ?>" method="POST" target="_blank">
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
							<label for="filter_tahun">Pada Tahun</label>
							<select name="filter_tahun" id="filter_tahun" class="form-control" required>
								<option value="">- Pilih Tahun -</option>
								<?php foreach ($tahun as $row) { ?>
									<option value="<?= $row['tahun'] ?>"><?= $row['tahun'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<input type="submit" class="btn btn-primary float-right px-3 my-3" value="Print">
				</div>
			</form>
		</div>
	</div>
</div>