<div class="container">

	<nav aria-label="breadcrumb" id="breadcrumb" class="pt-1" style="margin-left: -16px;">
		<ol class="breadcrumb bg-transparent">
			<li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
			<li class="breadcrumb-item"><a href="<?= base_url('home/keranjang') ?>">Keranjang</a></li>
			<li class="breadcrumb-item active" aria-current="page">Checkout</li>
		</ol>
	</nav>
	
	<form action="<?= base_url('home/checkout') ?>" method="post">

	<div class="row">
		<div class="col-12 col-lg-8 mb-3">
			<div class="row">
				<div class="col-12 form-group">
					<h4>Alamat Pengiriman</h4>
					<hr>
				</div>
				<div class="col-6 form-group">
					<label for="nama">Nama Penerima</label>
					<input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama_user'] ?>">
					<small class="text-danger"><?= form_error('nama') ?></small>
				</div>
				<div class="col-6 form-group">
					<label for="telp">No. Telp/HP</label>
					<input class="form-control" type="text" name="telp" id="telp" value="<?= set_value('telp') ?>">
					<small class="text-danger"><?= form_error('telp') ?></small>
				</div>
				<div class="col-12 form-group">
					<label for="alamat">Alamat</label>
					<textarea class="form-control" name="alamat" id="alamat" rows="3"><?= set_value('alamat') ?></textarea>
					<small class="text-danger"><?= form_error('alamat') ?></small>
				</div>
				<div class="col-12 col-md-4 form-group">
					<label for="kelurahan">Desa/Kelurahan</label>
					<input type="text" name="kelurahan" id="kelurahan" class="form-control" value="<?= set_value('kelurahan') ?>">
					<small class="text-danger"><?= form_error('kelurahan') ?></small>
				</div>
				<div class="col-12 col-md-5 form-group">
					<label for="kecamatan">Kecamatan</label>
					<input type="text" name="kecamatan" id="kecamatan" class="form-control" value="<?= set_value('kecamatan') ?>">
					<small class="text-danger"><?= form_error('kecamatan') ?></small>
				</div>
				<div class="col-12 col-md-3 form-group">
					<label for="kode_pos">Kode Pos</label>
					<input type="text" name="kode_pos" id="kode_pos" class="form-control" value="<?= set_value('kode_pos') ?>">
					<small class="text-danger"><?= form_error('kode_pos') ?></small>
				</div>
				<div class="col-12 col-md-6 form-group">
					<label for="provinsi">Provinsi</label>
					<select class="form-control" name="provinsi" id="provinsi" required>
						<option value=''>Memuat..</option>
					</select>
				</div>
				<div class="col-12 col-md-6 form-group mb-5">
					<label for="kota">Kabupaten/Kota</label>
					<select class="form-control" name="kota" id="kota" required>
						<option value=''>- Pilih provinsi terlebih dahulu -</option>
					</select>
				</div>
				<div class="col-12 form-group">
					<h4>Jasa Pengiriman</h4>
					<hr>
				</div>
				<div class="col-12 col-md-6 form-group">
					<label for="kurir">Kurir</label>
					<select class="form-control" name="kurir" id="kurir" required>
						<option value="">- Pilih kurir -</option>
					</select>
				</div>
				<div class="col-12 col-md-6 form-group">
					<label for="layanan">Nama Layanan</label>
					<select class="form-control" name="layanan" id="layanan" required>
						<option value="">- Pilih layanan -</option>
					</select>
				</div>
				<!-- Javascript -->
				<div class="col form-group">
					<input class="form-control" type="hidden" name="ekspedisi">
					<input class="form-control" type="hidden" name="ongkir">
					<input class="form-control" type="hidden" name="total">
					<input class="form-control" type="hidden" name="berat">
					<input class="form-control" type="hidden" name="input_prov" placeholder="provinsi">
					<input class="form-control" type="hidden" name="input_kota" placeholder="kota">
				</div>
				<!-- End of Javascript -->
			</div>
		</div>
		<div class="col-12 col-lg-4">
			<div class="shadow rounded mb-5">
							<div class="card-body"><span style="font-size: 1.2em; font-weight: 500; line-height: 1.8em;">Hai <?= $user['nama_user']; ?>,</span>
								<p style="font-size: .9em;">Silahkan periksa kembali item yang Anda pesan sebelum melakukan submit pesanan.</p>
								<hr>
								<div class="row mb-3">
									<div class="col">
										Jumlah barang
									</div>
									<div class="col text-right">
										<?= $this->cart->total_items() ?>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col">
										Total berat
									</div>
									<div class="col text-right">
										<?php 

										$tberat = 0;
										foreach ($produk as $produk) {
											foreach ($this->cart->contents() as $item) {
												if($produk['id_produk']==$item['id']) {
										$berat = $produk['berat_produk']*$item['qty'];
										$tberat = $tberat + $berat;

												}
											}
										}
										echo $tberat . " Kg";

										?>
										<form action="<?= base_url('home/layanan') ?>" method="post">
											<input type="hidden" name="berat" value="<?= $tberat * 1000 ?>">
										</form>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col">
										Total harga
									</div>
									<div class="col text-right">
										<span><?= getRupiah($this->cart->total()) ?></span>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col">
										Biaya pengiriman
									</div>
									<div class="col text-right">
										<span id="ongkir" class="font-weight-bold">-</span>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col">
										Total bayar
									</div>
									<div class="col text-right">
										<span id="total" style="color: orangered; font-weight: bold; font-size: 1.1em;">-</span>
									</div>
								</div>
								<div class="text-center mt-4">
									<button id="submit" class="btn btn-success btn-block">Konfirmasi</button>
								</div>							
							</div>
						</div>
		</div>
	</div>
	</form>
		</div>
	</div>	

</div>

<!-- Live data ongkir -->
<script>
$(document).ready(function(){
	// Input Provinsi
	$.ajax({
		type: "POST",
		url: "<?= base_url('home/provinsi') ?>",
		success: function(hasil_provinsi) {
			$("select[name=provinsi]").html(hasil_provinsi);
		}
	});

	// Input Kota
	$("select[name=provinsi]").on("change", function(){
		var id_selected_provinsi = $("option:selected", this).attr("id_provinsi");

		$.ajax({
			type: "POST",
			url: "<?= base_url('home/kota') ?>",
			data: 'id_provinsi=' + id_selected_provinsi,
			success: function(hasil_kota) {
				$("select[name=kota]").html(hasil_kota);
			}
		});
	});

	// Input Kurir
	$("select[name=kota]").on("change", function(){
		$.ajax({
			type: "POST",
			url: "<?= base_url('home/kurir') ?>",
			success: function(hasil_kurir) {
				$("select[name=kurir]").html(hasil_kurir);
			}
		});
	});

	// Input Layanan
	$("select[name=kurir]").on("change", function(){
		var kurir = $("select[name=kurir]").val()
		var kota = $("option:selected", "select[name=kota]").attr("id_kota");
		var berat = <?= $tberat*1000 ?>;

		$.ajax({
			type: "POST",
			url: "<?= base_url('home/layanan') ?>",
			data: "kurir=" + kurir + "&id_kota=" + kota + "&berat=" + berat,
			success: function(hasil_layanan) {
				$("select[name=layanan]").html(hasil_layanan);
			}
		});
	});

	$("select[name=layanan]").on("change", function(){
		// Menampilkan Ongkir
		var dataOngkir = $("option:selected", this).attr('ongkir');
		var reverse = dataOngkir.toString().split('').reverse().join(''),
			rupiahOngkir = reverse.match(/\d{1,3}/g);
			rupiahOngkir = rupiahOngkir.join('.').split('').reverse().join('');

		$("#ongkir").html("Rp" + rupiahOngkir);
		var dataTotal = parseInt(dataOngkir) + parseInt(<?= $this->cart->total() ?>);
		var reverseTotal = dataTotal.toString().split('').reverse().join(''),
			rupiahTotal = reverseTotal.match(/\d{1,3}/g);
			rupiahTotal = rupiahTotal.join('.').split('').reverse().join('');
		$("#total").html("Rp" + rupiahTotal);

		// Ambil data JS
		var ekspedisi = $("option:selected", this).attr('ekspedisi');
		$("input[name=ekspedisi]").val(ekspedisi);
		$("input[name=ongkir]").val(dataOngkir);
		$("input[name=total]").val(dataTotal);
		var dataBerat = <?= $tberat ?>;
		var namaProv = $("option:selected", "select[name=provinsi]").attr("nama_provinsi");
		var namaKota = $("option:selected", "select[name=kota]").attr("nama_kota");
		$("input[name=berat]").val(dataBerat);
		$("input[name=input_prov]").val(namaProv);
		$("input[name=input_kota]").val(namaKota);

	});
	
});
</script>