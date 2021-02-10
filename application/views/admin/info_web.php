<div class="container">
	<div class="card shadow">
		<div class="card-header">Informasi Website</div>
		<div class="card-body">
			<?= $this->session->flashdata('alert'); ?>
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="judulweb">Judul Website</label>
					<input class="form-control" type="text" id="judulweb" name="judulweb" value="<?= $info['judul_web'] ?>" readonly>
				</div>
				<div class="form-group col-md-12">
					<label for="deskweb">Deskripsi Website</label>
					<textarea class="form-control" name="desk" id="deskweb" rows="3" readonly><?= $info['deskripsi_web'] ?></textarea>
				</div>
				<div class="form-group col-md-4">
					<label for="nomorweb">No. Telp. Website</label>
					<input class="form-control" type="text" id="nomorweb" name="nomorweb" value="<?= $info['nomor_web'] ?>" readonly>
				</div>
				<div class="form-group col-md-4">
					<label for="email">Email</label>
					<input class="form-control" type="text" id="email" name="email" value="<?= $info['email_web'] ?>" readonly>
				</div>
				<div class="form-group col-md-4">
					<label for="wa">Nomor Whatsapp</label>
					<input class="form-control" type="text" id="wa" name="wa" value="<?= $info['wa_web'] ?>" readonly>
				</div>
				<div class="form-group col-md-4">
					<label for="alamat">Alamat Fisik</label>
					<input class="form-control" type="text" id="alamat" name="alamat" value="<?= $info['alamat_web'] ?>" readonly>
				</div>
				<div class="form-group col-md-4">
					<label for="bank">Informasi Bank</label>
					<input class="form-control" type="text" id="bank" name="bank" value="<?= $info['info_bank'] ?>" readonly>
				</div>
				<div class="form-group col-md-4">
					<label for="rekening">No. Rekening</label>
					<input class="form-control" type="text" id="rekening" name="rekening" value="<?= $info['no_rek'] ?>" readonly>
				</div>
				<a href="<?= base_url('admin/info/edit') ?>" class="btn btn-primary btn-icon-split mx-auto my-4">
					<span class="icon text-white-50">
						<i class="fas fa-pen"></i>
					</span>
					<span class="text">Edit Info Website</span>
				</a>
			</div>

		</div>
	</div>
</div>