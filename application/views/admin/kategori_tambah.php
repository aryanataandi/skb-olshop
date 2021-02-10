<form action="<?= base_url('admin/kategori/tambah'); ?>" method="post">
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

      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="nama_kategori">Nama Kategori</label>
          <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" autofocus>
          <small class="form-text text-danger"><?= form_error('nama_kategori'); ?></small>
        </div>
      </div>
      <div class="float-right">
        <a href="<?= base_url(); ?>admin/kategori" class="btn btn-secondary mr-1">Tutup</a>
        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Tambah</button>
      </div>
    </div>
  </div>
  </div>
</form>