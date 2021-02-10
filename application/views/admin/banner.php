<div class="container-fluid">

	<?php if($tb_banner) { ?>
	<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    	Preview
  	</button>

	<!-- Banner -->
	<div class="collapse" id="collapseExample">
	  	<div data-aos="fade-in" id="carouselExampleIndicators" class="carousel slide my-4 shadow" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <?php $i = 0; foreach ($tb_banner as $banner) { ?>
		    <?php if($i == 0) { ?>
		    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; $i++ ?>" class="active"></li>
		    <?php } else { ?>
		    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; $i++ ?>"></li>
		    <?php } } ?>
		  </ol>
		  <div class="carousel-inner">
		    <?php $a = 0; foreach ($tb_banner as $banner) { ?>
		    <?php if($a == 0) { ?>
		    <div class="carousel-item active">
		    <?php } else { ?>
		    <div class="carousel-item">
		    <?php } $a++; ?>
		      <img src="<?= base_url(); ?>assets/img_banner/<?= $banner['gambar_banner'] ?>" class="d-block w-100" alt="<?= $banner['nama_banner'] ?>">
		    </div>
		    <?php } ?>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
	<?php } ?>

	<div class="card shadow my-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $header; ?></h6>
		</div>
		<div class="card-body">

			<?php if (!$tb_banner) {
			} else { ?>
				<a href="<?= base_url(); ?>admin/banner/tambah" class="btn btn-sm btn-primary mb-4">
					Tambah Data
				</a>
			<?php } ?>

			<!-- Alert -->
			<?php if ($this->session->flashdata('alert')) :  ?>
				<div class="form-row">
					<div class="form-group col-md-12">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							Banner <strong>berhasil</strong> <?= $this->session->flashdata('alert'); ?>.
						</div>
					</div>
				</div>
			<?php endif; ?>

			<!-- Jika tidak ada data -->
			<?php if (!$tb_banner) { ?>
				<h3 class="text-center my-5">Tidak ada data banner.</h3>
				<div class="d-flex justify-content-center">
					<a href="<?= base_url(); ?>admin/banner/tambah" class="btn btn-sm btn-primary mb-4">
						Tambah Data
					</a>
				</div>
			<?php } else { ?>

				<div class="table-responsive">
					<table class="table table-bordered" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nama Banner</th>
								<th>URL</th>
								<th class="text-center th-aksi">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($tb_banner as $row) : ?>
								<tr>
									<td><?php echo $row["nama_banner"]; ?></td>
									<td><?php echo $row["url"]; ?></td>
									<td class="d-flex justify-content-center">
										<a href="<?= base_url(); ?>admin/banner/edit/<?= $row['id_banner'] ?>" style="text-decoration: none; color: black;">
											<button class="btn btn-warning aksi mr-1"><img src="<?= base_url(); ?>admin_assets/img/edt.svg"></button>
										</a>
										<a href="<?= base_url(); ?>admin/banner/hapus/<?= $row['id_banner'] ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?');" style="text-decoration: none; color: black;">
											<button class="btn btn-danger aksi"><img src="<?= base_url(); ?>admin_assets/img/del.svg"></button>
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				<?php } ?>
				</div>
		</div>
	</div>

<?php if($tb_banner) { echo "</div>"; } ?>