<div class="container py-3">

  <h4 data-aos="fade-in" class="py-4">
    <?php
    if ($this->uri->segment(2) == 'kategori') {
      if ($produk == null) {
        echo '';
      } else {
        echo 'Kategori ' . $produk[0]["nama_kategori"];
      }
    }
    if ($this->uri->segment(2) != 'kategori') {
      echo $header;
    }
    ?>
  </h4>

  <?php if ($produk != null) { ?>
    <div class="wrapper">
      <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5 mb-4">
        <!-- Item Card -->
        <?php
        foreach ($produk as $p) { ?>
          <div data-aos="fade-in" class="col mb-4">
            <div class="bg-white rounded shadow h-100">
              <a href="<?= base_url('home/detail/' . strtourl($p['nama_produk'])) ?>">
                <img src="<?= base_url('assets/img_produk/') . $p['gambar_produk'] ?>" class="card-img-top">
                <div class="card-body">
                  <div class="div-produk">
                    <p style="font-weight: 500;" class="nama-produk"><?= $p['nama_produk']; ?></p>
                  </div>
                  <div class="div-produk">
                    <?php if ($p['diskon_produk'] != 0) { ?>
                      <small style="color: gray;">
                        <strike><?= getRupiah($p['harga_produk']); ?></strike>
                        <p class="badge badge-success d-inline ml-1"><?= $p['diskon_produk'] ?>%</p>
                      </small>
                    <?php } ?>
                    <p class="harga"><?= getRupiah($p['harga_produk'] - ($p['diskon_produk'] / 100) * $p['harga_produk']); ?></p>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php } ?>
        <!-- End of Item Card -->
      </div>
    </div>
  <?php } else { ?>
    <div class="pb-5">
      <img src="<?= base_url('assets/no_result.svg') ?>" class="d-flex mx-auto my-5 no-cart">
      <h4 class="text-center text-dark">Upss, produk tidak ditemukan</h4>
      <p class="text-center font-weight-light">Coba kata kunci lain</p>
    </div>
  <?php } ?>

</div>