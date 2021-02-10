<form action="<?= base_url('admin/info/edit') ?>" method="post">
	<div class="container">
		<div class="card shadow">
			<div class="card-header">Edit Informasi Website</div>
			<div class="card-body">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="judulweb">Judul Website</label>
						<input class="form-control" type="text" id="judulweb" name="judulweb" value="<?= $info['judul_web'] ?>">
						<small class="text-danger"><?= form_error('judulweb') ?></small>
					</div>
					<div class="form-group col-md-12">
						<label for="deskweb">Deskripsi Website</label>
						<textarea class="form-control" name="deskweb" id="deskweb" rows="3"><?= $info['deskripsi_web'] ?></textarea>
						<small class="text-danger"><?= form_error('deskweb') ?></small>
					</div>
					<div class="form-group col-md-4">
						<label for="nomorweb">No. Telp. Website</label>
						<input class="form-control" type="text" id="nomorweb" name="nomorweb" value="<?= $info['nomor_web'] ?>">
						<small class="text-danger"><?= form_error('nomorweb') ?></small>
					</div>
					<div class="form-group col-md-4">
						<label for="email">Email</label>
						<input class="form-control" type="text" id="email" name="email" value="<?= $info['email_web'] ?>">
						<small class="text-danger"><?= form_error('email') ?></small>
					</div>
					<div class="form-group col-md-4">
						<label for="wa">Nomor Whatsapp</label>
						<input class="form-control" type="text" id="wa" name="wa" value="<?= $info['wa_web'] ?>">
						<small class="text-danger"><?= form_error('wa') ?></small>
					</div>
					<div class="form-group col-md-4">
						<label for="alamat">Alamat Fisik</label>
						<input class="form-control" type="text" id="alamat" name="alamat" value="<?= $info['alamat_web'] ?>">
						<small class="text-danger"><?= form_error('alamat') ?></small>
					</div>
					<div class="form-group col-md-4">
						<label for="bank">Informasi Bank</label>
						<input class="form-control" type="text" id="bank" name="bank" value="<?= $info['info_bank'] ?>">
						<small class="text-danger"><?= form_error('bank') ?></small>
					</div>
					<div class="form-group col-md-4">
						<label for="rekening">No. Rekening</label>
						<input class="form-control" type="text" id="rekening" name="rekening" value="<?= $info['no_rek'] ?>">
						<small class="text-danger"><?= form_error('rekening') ?></small>
					</div>
					<button type="submit" name="submit" value="Submit" class="btn btn-success btn-icon-split mx-auto my-4">
						<span class="icon text-white-50">
							<i class="fas fa-check"></i>
						</span>
						<span class="text">Update</span>
					</button>
				</div>

			</div>
		</div>
	</div>
</form>