<div class="container my-5">
	
	<div class="row">
		<div class="col-md-12 col-lg-3 mb-3">
			<div class="list-group">
			  <a href="<?= base_url('profil') ?>" class="<?php if($this->uri->segment(2)==NULL || $this->uri->segment(2)=='index') { echo 'bg-light font-weight-bold '; } ?>list-group-item list-group-item-action">Dashboard</a>
			  <a href="<?= base_url('profil/pesanan') ?>" class="<?php if($this->uri->segment(2)=='pesanan') { echo 'bg-light font-weight-bold '; } ?>list-group-item list-group-item-action">Pesanan</a>
			  <a href="<?= base_url('profil/edit') ?>" class="<?php if($this->uri->segment(2)=='edit') { echo 'bg-light font-weight-bold '; } ?>list-group-item list-group-item-action">Edit Profil</a>
			  <a href="<?= base_url('profil/ubah_password') ?>" class="<?php if($this->uri->segment(2)=='ubah_password') { echo 'bg-light font-weight-bold '; } ?>list-group-item list-group-item-action">Ubah Password</a>
			</div>
		</div>
		<div class="divider col-12 mb-3">
			<hr>
		</div>