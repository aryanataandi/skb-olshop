<div class="container-fluid">

	<div class="d-none d-flex justify-content-end mb-4">
		<a href="#" class="btn btn-sm btn-primary shadow-sm mr-2">
			<i class="fas fa-print"></i>
		 Cetak Laporan</a>
		<button type="button" data-toggle="modal" data-target="#tanggalModal" class="btn btn-sm btn-info shadow-sm">
		 	<i class="fas fa-search"></i>
		 Pencarian Tanggal</button>
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
								<td><?= getRupiah($inv['total']-$inv['ongkir']) ?></td>
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

<!-- Modal -->
<div class="modal fade" id="tanggalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari berdasarkan tanggal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="">
      <div class="modal-body">
        <div class="row">
				<div class="col-12 col-md-6">
					<label for="start_date">Mulai Tanggal</label>
					<input type="date" id="start_date" class="form-control">
				</div>
				<div class="col-12 col-md-6">
					<label for="end_date">Sampai Tanggal</label>
					<input type="date" id="end_date" class="form-control">
				</div>
		</div>
			<button type="button" class="btn btn-primary float-right my-3">Cari</button>
      </div>
      </form>
    </div>
  </div>
</div>