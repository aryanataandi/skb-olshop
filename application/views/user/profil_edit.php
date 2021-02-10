		<div class="col-md-12 col-lg-9">
			<?= form_open_multipart('profil/edit'); ?>
			<?= $this->session->flashdata('alert'); ?>
			<div class="row">
				<div class="col">
					<div class="shadow rounded">
						<div class="card-header bg-white font-weight-bold">Edit Profil</div>
						<div class="card-body">
							<img src="<?= base_url('assets/img_user/' . $user['img_user']) ?>" class="img-thumbnail rounded-circle d-flex mx-auto my-4" alt="img" style="height: 180px;width: 180px;">
							<div class="form-group">
								<label for="nama_user">Nama Lengkap</label>
								<input name="nama_user" type="text" id="nama_user" class="form-control" value="<?= $user['nama_user'] ?>">
								<small class="text-danger float-right"><?= form_error('nama_user'); ?></small>
							</div>
							<input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
							<div class="form-group">
								<label for="email">Email</label>
								<input name="email" type="text" id="email" class="form-control" value="<?= $user['email'] ?>" disabled>
							</div>
							<label for="gambar">Foto Profil</label>
							<div class="form-group">
								<input type="file" name="gambar" id="gambar" style="width: 20px;">
								<?php if ($user['img_user'] != 'default.png') { ?>
									<a href="<?= base_url('profil/hapus_foto_profil') ?>" class="btn btn-sm btn-danger float-left mr-2" onclick="return confirm('Apakah anda yakin ingin menghapus foto profil?');">Hapus Foto</a>
								<?php } ?>
							</div>
							<button class="btn btn-primary d-flex mx-auto mt-1">Simpan</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
		</form>