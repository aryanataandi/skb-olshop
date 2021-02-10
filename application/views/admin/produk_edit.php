<?= form_open_multipart('admin/produk/edit/' . $produk['id_produk']); ?>
<div class="container">
<div class="card shadow py-4 mb-5">
  <div class="container-fluid">

    <!-- Alert -->
    <?php if ($this->session->flashdata('alert')) : ?>
      <div class="form-row">
        <div class="form-group col-md-12">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data produk <strong>berhasil</strong> <?= $this->session->flashdata('alert'); ?>.
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!-- Alert -->
    <?php if ($this->session->flashdata('gambar')) : ?>
      <div class="form-row">
        <div class="form-group col-md-12">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data produk <strong>berhasil</strong> <?= $this->session->flashdata('gambar'); ?>.
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="nama">Nama Produk</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $produk['nama_produk'] ?>">
        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
        <input type="hidden" name="id" value="<?= $produk['id_produk']; ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="kategori">Kategori Produk</label>
        <select id="kategori" class="custom-select" name="id_kategori">

          <?php if ($produk['id_kategori'] == 0) {
            echo "<option value=0 selected>- Pilih Kategori -</option>";
          } ?>

          <?php foreach ($tb_kategori as $rows) {
            if ($produk['id_kategori'] == $rows['id_kategori']) { ?>
              <option value="<?= $rows['id_kategori'] ?>" selected><?= $rows['nama_kategori'] ?></option>
            <?php } else { ?>
              <option value="<?= $rows['id_kategori'] ?>"><?= $rows['nama_kategori'] ?></option>
          <?php }
          } ?>

        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="deskripsi">Deskripsi</label>
      <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $produk['deskripsi_produk'] ?></textarea>
      <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
    </div>
    <div class="form-group">
      <label for="stok">Stok Produk</label>
      <input type="number" class="form-control" id="stok" name="stok" value="<?= $produk['stok_produk'] ?>">
      <small class="form-text text-danger"><?= form_error('stok'); ?></small>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="harga">Harga Produk</label>
        <input type="text" class="form-control" id="harga" placeholder="Rp." name="harga" value="<?= $produk['harga_produk'] ?>">
        <small class="form-text text-danger"><?= form_error('harga'); ?></small>
      </div>
      <div class="form-group col-6 col-md-4">
        <label for="diskon">Diskon</label>
        <input type="text" class="form-control" id="diskon" name="diskon" placeholder="%" value="<?= $produk['diskon_produk'] ?>">
        <small class="form-text text-danger"><?= form_error('diskon'); ?></small>
      </div>
      <div class="form-group col-6 col-md-4">
        <label for="berat">Berat</label>
        <input type="text" class="form-control" id="berat" name="berat" placeholder="Kg." value="<?= $produk['berat_produk'] ?>">
        <small class="form-text text-danger"><?= form_error('berat'); ?></small>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="gambar">Gambar</label><br>
        <img src="<?= base_url(); ?>assets/img_produk/<?= $produk['gambar_produk']; ?>" class="img-thumbnail mb-2" width="200px">
        <input type="file" name="gambar" id="gambar" class="align-top ml-2">
      </div>
    </div>

    <div class="float-left">
      <a href="<?= base_url(); ?>admin/produk/hapus/<?= $produk['id_produk'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda ingin menghapus data ini?');">Hapus</a>
    </div>
    <div class="float-right">
      <!-- <input type="reset" class="btn btn-warning"> -->
      <a href="<?= base_url(); ?>admin/produk" class="btn btn-secondary mr-1 float-left">Tutup</a>
      <button type="submit" class="btn btn-primary" name="submit" value="Submit">Update</button>
    </div>
  </div>
</div>
</div>
</form>