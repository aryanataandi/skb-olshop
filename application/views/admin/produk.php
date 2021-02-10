	<div class="container-fluid">

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Tabel Produk</h6>
			</div>
			<div class="card-body">
				<div>
					<a href="<?= base_url('admin/produk/tambah'); ?>" class="btn btn-primary mb-4">
						Tambah Data
					</a>
				</div>

				<!-- Alert -->
				<?php echo $this->session->flashdata('alert') ?>

				<!-- Data tidak ditemukan -->
				<?php if (empty($tb_produk)) { ?>
					<img src="<?= base_url('admin_assets/img/nodata.svg'); ?>" alt="nodata" class="d-flex mx-auto py-5" width="200px">
					<h3 class='text-center mb-5'>Data tidak ditemukan.</h3>
				<?php } else { ?>

					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th class="th-no">#</th>
									<th>Nama Produk</th>
									<th>Kategori</th>
									<th>Tanggal Input</th>
									<th>Status</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $start = 0;
								foreach ($tb_produk as $row) : ?>
									<tr>
										<td><?php echo ++$start; ?></td>
										<td class="text-truncate"><?php echo $row["nama_produk"]; ?></td>
										<td>
											<?php foreach ($tb_kategori as $kategori) {
												if ($row['id_kategori'] == $kategori['id_kategori']) {
													echo $kategori['nama_kategori'];
												}
											}
											if ($row['id_kategori'] == 0) {
												echo "-";
											}  ?>
										</td>
										<td><?= date('d/m/Y, H:i', strtotime($row['tanggal_produk'])) . " WIB" ?></td>
										<td>
											<?php if ($row['status_produk'] == 1) { ?>
												<a href="<?= base_url('admin/produk/status/' . $row['id_produk']) ?>" onclick="return confirm('Apakah anda yakin ingin me-nonaktifkan produk ini?');" class="text-success font-weight-bold">ON</a>
											<?php } else { ?>
												<a href="<?= base_url('admin/produk/status/' . $row['id_produk']) ?>" onclick="return confirm('Apakah anda yakin ingin meng-aktifkan produk ini?');" class="text-danger font-weight-bold">OFF</a>
											<?php } ?>
										</td>
										<td class="d-flex justify-content-center">
											<a href="<?= base_url(); ?>admin/produk/edit/<?= $row['id_produk'] ?>">
												<button type="button" class="btn btn-sm btn-warning aksi mr-1">
													<img src="<?= base_url(); ?>admin_assets/img/edt.svg">
												</button>
											</a>

											<a href="<?= base_url(); ?>admin/produk/hapus/<?= $row['id_produk'] ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?');">
												<button class="btn btn-sm btn-danger aksi"><img src="<?= base_url(); ?>admin_assets/img/del.svg"></button>
											</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php }	?>
			</div>
		</div>

	</div>