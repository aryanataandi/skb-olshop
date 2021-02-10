<form action="" method="post">
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
          <label for="nama">Nama Kategori</label>
          <input type="hidden" name="id" value="<?= $k['id_kategori']; ?>">
          <input type="text" class="form-control" id="nama" name="nama_kategori" value="<?= $k['nama_kategori']; ?>">
          <small class="form-text text-danger"><?= form_error('nama_kategori'); ?></small>
        </div>
      </div>
      <div class="float-right">
        <a href="<?= base_url(); ?>admin/kategori" class="btn btn-secondary mr-1">Tutup</a>
        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Update</button>
      </div>
    </div>
  </div>
  </div>
</form>