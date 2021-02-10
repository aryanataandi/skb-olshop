<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tabel Kategori</h6>
		</div>
		<div class="card-body">
			<!-- Tambah Data -->
			<a href="<?= base_url(); ?>admin/kategori/tambah" class="btn btn-primary mb-4">
				Tambah Data
			</a>

			<!-- Alert -->
			<?php echo $this->session->flashdata('alert')  ?>

			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Nama Kategori</th>
							<th class="text-center th-aksi">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($tb_kategori as $row) : ?>

							<tr>
								<td><?php echo $row["nama_kategori"]; ?></td>
								<td class="d-flex justify-content-center">
									<a href="<?= base_url(); ?>admin/kategori/edit/<?= $row["id_kategori"]; ?>" style="text-decoration: none; color: black;">
										<button class="btn btn-sm btn-warning aksi mr-1"><img src="<?= base_url(); ?>admin_assets/img/edt.svg"></button>
									</a>
									<a href="<?= base_url(); ?>admin/kategori/hapus/<?= $row["id_kategori"]; ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?');" style="text-decoration: none; color: black;">
										<button class="btn btn-sm btn-danger aksi"><img src="<?= base_url(); ?>admin_assets/img/del.svg"></button>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>

</div>