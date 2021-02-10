		<div class="col-md-12 col-lg-9">
			<?= form_open_multipart('profil/ubah_password'); ?>
			<?= $this->session->flashdata('alert'); ?>
			<div class="row">
				<div class="col">
					<div class="shadow rounded">
						<div class="card-header bg-white font-weight-bold">Ubah Katasandi</div>
						<div class="card-body">
							<div class="form-group">
								<label for="password">Password Lama</label>
								<input name="password" type="password" id="password" class="form-control" value="">
								<small class="text-danger float-right"><?= form_error('password'); ?></small>
							</div>
							<input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
							<div class="form-group">
								<label for="passwordbaru">Password Baru</label>
								<input name="passwordbaru" type="password" id="passwordbaru" class="form-control" value="">
								<small class="text-danger float-right"><?= form_error('passwordbaru'); ?></small>
							</div>
							<div class="form-group">
								<label for="passwordbaru2">Konfirmasi Password Baru</label>
								<input name="passwordbaru2" type="password" id="passwordbaru2" class="form-control" value="">
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