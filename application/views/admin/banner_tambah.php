<?= form_open_multipart('admin/banner/tambah'); ?>
<div class="container">
<div class="card shadow py-4 mb-5">
  <div class="container-fluid">

    <!-- Alert -->
    <?php if ($this->session->flashdata('alert')) :  ?>
      <div class="form-row">
        <div class="form-group col-md-12">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data produk <strong>berhasil</strong> <?= $this->session->flashdata('alert'); ?>.
          </div>
        </div>
      </div>
    <?php endif; ?>
    <!-- Alert Ends -->

    <!-- Alert -->
    <?php if ($this->session->flashdata('gambar')) :  ?>
      <div class="form-row">
        <div class="form-group col-md-12">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Banner <?= $this->session->flashdata('gambar'); ?>.
          </div>
        </div>
      </div>
    <?php endif; ?>
    <!-- Alert Ends -->

    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="nama_banner">Nama Banner</label>
        <input type="text" class="form-control" id="nama_banner" name="nama_banner" autofocus>
        <small class="form-text text-danger"><?= form_error('nama_banner'); ?></small>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="url">URL</label>
        <textarea class="form-control" id="url" name="url" rows="3"></textarea>
        <small class="form-text text-danger"><?= form_error('url'); ?></small>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="gambar_banner">Gambar</label><br>
        <div class="input-group mb-3">
          <div class="custom-file">
            <input type="file" class="" id="gambar_banner" name="gambar_banner" required>
          </div>
          <?php if (!$this->session->flashdata('gambar')) { ?>
            <small>Banner harus berukuran kurang dari 2 Mb, beresolusi 1600 x 500px dan berformat jpeg/jpg/png.</small>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="float-right">
      <a href="<?= base_url(); ?>admin/banner" class="btn btn-secondary mr-1">Tutup</a>
      <button type="submit" class="btn btn-primary" name="submit" value="Submit">Tambah</button>
    </div>
  </div>
</div>
</div>
</form>