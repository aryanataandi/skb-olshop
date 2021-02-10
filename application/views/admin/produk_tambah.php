<?= form_open_multipart('admin/produk/tambah'); ?>
<div class="container">
  <div class="card shadow py-4 mb-5">
    <div class="container-fluid">

      <!-- Alert -->
      <?php echo $this->session->flashdata('alert') ?>

      <!-- Alert -->
      <?php echo $this->session->flashdata('gambar') ?>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="nama">Nama Produk</label>
          <input type="text" class="form-control" id="nama" name="nama" autofocus>
          <small class="form-text text-danger"><?= form_error('nama'); ?></small>
        </div>
        <div class="form-group col-md-6">
          <label for="kategori">Kategori Produk</label>
          <select id="kategori" class="custom-select" name="id_kategori">
            <option value=0 selected>- Pilih Kategori -</option>
            <?php foreach ($tb_kategori as $rows) :
              $nama_kategori = $rows['nama_kategori'];
              $id_kategori = $rows['id_kategori'];
              echo "<option value='$id_kategori'>$nama_kategori</option>";
            endforeach; ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
        <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
      </div>
      <div class="form-group">
        <label for="stok">Stok Produk</label>
        <input type="number" class="form-control" id="stok" name="stok">
        <small class="form-text text-danger"><?= form_error('stok'); ?></small>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="harga">Harga Produk</label>
          <input type="text" class="form-control" id="harga" placeholder="Rp." name="harga">
          <small class="form-text text-danger"><?= form_error('harga'); ?></small>
        </div>
        <div class="form-group col-6 col-md-4">
          <label for="diskon">Diskon</label>
          <input type="text" class="form-control" id="diskon" name="diskon" placeholder="%">
          <small class="form-text text-danger"><?= form_error('diskon'); ?></small>
        </div>
        <div class="form-group col-6 col-md-4">
          <label for="berat">Berat</label>
          <input type="text" class="form-control" id="berat" name="berat" placeholder="Kg.">
          <small class="form-text text-danger"><?= form_error('berat'); ?></small>
        </div>
        <div class="form-group col-md-12">
          <label for="gambar">Gambar</label><br>
          <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="" id="gambar" name="gambar" required>
            </div>
            <?php if (!$this->session->flashdata('gambar')) { ?>
              <small>Gambar harus berukuran kurang dari 5 Mb dan berformat jpg/jpeg/png.</small>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="float-right">
        <a href="<?= base_url(); ?>admin/produk" class="btn btn-secondary mr-1">Tutup</a>
        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Tambah</button>
      </div>
    </div>
  </div>
</div>
</form>