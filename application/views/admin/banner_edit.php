<?= form_open_multipart('admin/banner/edit/' . $b['id_banner']); ?>
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
        <label for="nama_banner">Nama Banner</label>
        <input type="hidden" name="id_banner" value="<?= $b['id_banner'] ?>">
        <input type="text" class="form-control" id="nama_banner" name="nama_banner" value="<?= $b['nama_banner'] ?>">
        <small class="form-text text-danger"><?= form_error('nama_banner'); ?></small>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="url">URL</label>
        <textarea class="form-control" id="url" name="url" rows="3"><?= $b['url'] ?></textarea>
        <small class="form-text text-danger"><?= form_error('url'); ?></small>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="gambar_banner">Gambar</label><br>
        <img src="<?= base_url(); ?>assets/img_banner/<?= $b['gambar_banner'] ?>" class="img-thumbnail mb-2" width="400px">
        <div class="input-group mb-3">
          <div class="custom-file">
            <input type="hidden" class="" id="gambar_banner" name="gambar_banner" disabled>
          </div>
        </div>
      </div>
    </div>
    <div class="float-left">
      <a href="<?= base_url(); ?>admin/banner/hapus/<?= $b['id_banner'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda ingin menghapus data ini?');">Hapus</a>
    </div>
    <div class="float-right">
      <a href="<?= base_url(); ?>admin/banner" class="btn btn-secondary mr-1">Tutup</a>
      <button type="submit" class="btn btn-primary" name="submit" value="Submit">Update</button>
    </div>
  </div>
</div>
</div>
</form>