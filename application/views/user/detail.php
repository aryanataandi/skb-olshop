<div class="container mb-5">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('alert') ?>"></div>
  <div class="row mt-1">
    <div class="col">
      <!-- Breadcumb -->
      <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb bg-transparent">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
          <?php if ($produk['id_kategori'] == 0) { ?>

          <?php } else { ?>
            <li class="breadcrumb-item">
            <?php } ?>
            <?php foreach ($tb_kategori as $rows) {
              if ($produk['id_kategori'] == $rows['id_kategori']) { ?>
                <a href="<?= base_url('home/kategori/' . strtourl($rows['nama_kategori'])); ?>"> <?= $rows['nama_kategori'] ?>
                <?php } else { ?>
              <?php }
            } ?>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?= $produk['nama_produk']; ?></li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- Gambar Produk -->
  <div class="row">
    <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-center">
      <img src="<?= base_url(); ?>assets/img_produk/<?= $produk['gambar_produk'] ?>" onclick="openModal();currentSlide(1)" class="img-thumbnail shadow mb-4" width="440px">
    </div>
    <!-- Nama Produk -->
    <div class="col-12 col-md-6 col-lg-7 pl-4">
      <div class="pt-2">
        <h4 class="font-weight-bold"><?= $produk['nama_produk'] ?></h4>
      </div>
      <hr>
      <!-- Harga & Diskon -->
      <div class="row">
        <div class="col-4 col-md-3">
          <p>Harga</p>
        </div>
        <div class="col-8 col-md-9">
          <?php if ($produk['diskon_produk'] != 0) { ?>
            <h6 style="color: grey;">
              <strike><?= getRupiah($produk['harga_produk']); ?></strike>
              <p class="badge badge-success d-inline ml-1">Diskon <?= $produk['diskon_produk'] ?>%</p>
            </h6>
          <?php } ?>
          <h4 style="color: orangered;">
            <b><?= getRupiah($produk['harga_produk'] - ($produk['diskon_produk'] / 100) * $produk['harga_produk']); ?></b>
          </h4>
        </div>
      </div>
      <!-- Berat -->
      <div class="row">
        <div class="col-4 col-md-3">
          <p>Berat</p>
        </div>
        <div class="col-6 col-md-9">
          <p><?= $produk['berat_produk'] * 1000 . " gram" ?></p>
        </div>
      </div>
      <!-- Stok -->
      <div class="row">
        <div class="col-4 col-md-3">
          <p>Stok</p>
        </div>
        <div class="col-8 col-md-9">
          <p><?= $produk['stok_produk'] ?> pcs.</p>
        </div>
      </div>
      <?php if ($produk['stok_produk'] >= 1) { ?>
        <!-- Jumlah -->
        <?= form_open('home/addcart/' . $produk['id_produk']); ?>
        <div class="row mb-2">
          <div class="col-4 col-md-3">
            <label for="qty">Jumlah</label>
          </div>
          <div class="col-8 col-md-9">
            <input type="number" id="qty" value="1" min="1" max="<?= $produk['stok_produk'] ?>" name="qty" style="border: none; width: 80px;">
            <input type="hidden" id="qty" value="1" min="1" max="<?= $produk['stok_produk'] ?>" name="qty" style="border: none; width: 80px;">
          </div>
        </div>
        <!-- Tombol Beli -->
        <div class="beli">
          <button type="submit" class="btn btn-lg btn-primary" id="cart"><i class="fas fa-cart-plus mr-2"></i>Keranjang</button>
          <a href="<?= base_url('home/addcartinstant/' . $produk['id_produk']) ?>" class="btn btn-lg btn-success" id="beli"><i class="fas fa-cash-register mr-2"></i>Beli</a>
        </div>
        <!-- Beli mobile -->
        <div class="container beli-mobile">
          <div class="row">
            <button type="submit" class="col-12 mb-3 btn btn-lg btn-primary d-flex"><span class="mx-auto">Tambah ke Keranjang</span></button>
            <a href="<?= base_url('home/addcartinstant/' . $produk['id_produk']) ?>" class="col-12 btn btn-lg btn-success d-flex"><span class="mx-auto">Beli Sekarang</span></a>
          </div>
        </div>
    </div>
    <?= form_close(); ?>
  <?php } else { ?>
    <div class="row">
      <div class="col-6">
        <p class="text-danger font-weight-bold">Stok barang ini habis.</p>
      </div>
    </div>
  <?php } ?>
  </div>
  <!-- Deskripsi -->
  <div class="col-12">
    <div class="mt-4">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active mt-3" id="home" role="tabpanel" aria-labelledby="home-tab"><span class="text-secondary" style="font-size: 0.95em;"><?= $produk['deskripsi_produk'] ?></span></div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
      </div>
    </div>
  </div>
  <!-- Produk Lainnya -->
  <div class="row">
    <div class="col mx-2">
      <div class="wrapper my-5">
        <p><span class="h5">Produk Lainnya</span><a href="<?= base_url('home/all') ?>" class="float-right link-primary font-weight-bold pt-1">Lihat Selengkapnya &raquo;</a></p>
        <hr>
        <div class="card-body">
          <div class="row row-cols-2 row-cols-md-5">
            <!-- Item Card -->
            <?php $i = 100;
            foreach ($rekomendasi as $r) { ?>
              <div data-aos="fade-in" data-aos-delay="<?= $i ?>" class="col mb-4">
                <div class="bg-white rounded shadow h-100">
                  <a href="<?= base_url('home/detail/' . strtourl($r['nama_produk'])) ?>">
                    <img src="<?= base_url('assets/img_produk/') . $r['gambar_produk'] ?>" class="card-img-top">
                    <div class="card-body">
                      <div class="div-produk">
                        <p style="font-weight: 500;" class="nama-produk"><?= $r['nama_produk']; ?></p>
                      </div>
                      <div class="div-produk">
                        <?php if ($r['diskon_produk'] != 0) { ?>
                          <small style="color: gray;">
                            <strike><?= getRupiah($r['harga_produk']); ?></strike>
                            <p class="badge badge-success d-inline ml-1"><?= $r['diskon_produk'] ?>%</p>
                          </small>
                        <?php } ?>
                        <p class="harga"><?= getRupiah($r['harga_produk'] - ($r['diskon_produk'] / 100) * $r['harga_produk']); ?></p>
                      </div>
                    </div>
                  </a>
                  <!-- <a href="<?= base_url('home/add_keranjang/' . $r['id_produk']) ?>" class="btn btn-lg cart btn-success align-text-bottom"><i class="fas fa-cart-plus"></i></a> -->
                </div>
              </div>
            <?php $i += 100;
            } ?>
            <!-- End of Item Card -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

<!-- The Modal/Lightbox -->
<div id="myModal" class="modal-lightbox" onclick="closeModal()">
  <!-- <span class="close cursor" onclick="closeModal()">&times;</span> -->
  <div class="modal-content-lightbox">

    <div class="mySlides">
      <!-- <div class="numbertext">1 / 4</div> -->
      <img class="img-fluid" src="<?= base_url(); ?>assets/img_produk/<?= $produk['gambar_produk'] ?>">
    </div>

    <!-- <div class="mySlides">
      <div class="numbertext">2 / 4</div>
      <img src="img2_wide.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 4</div>
      <img src="img3_wide.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">4 / 4</div>
      <img src="img4_wide.jpg" style="width:100%">
    </div> -->

    <!-- Next/previous controls -->
    <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a> -->

    <!-- Caption text -->
    <div class="caption-container">
      <p id="caption"></p>
    </div>

    <!-- Thumbnail image controls -->
    <!-- <div class="column">
      <img class="demo" src="img1.jpg" onclick="currentSlide(1)" alt="Nature">
    </div>

    <div class="column">
      <img class="demo" src="img2.jpg" onclick="currentSlide(2)" alt="Snow">
    </div>

    <div class="column">
      <img class="demo" src="img3.jpg" onclick="currentSlide(3)" alt="Mountains">
    </div>

    <div class="column">
      <img class="demo" src="img4.jpg" onclick="currentSlide(4)" alt="Lights">
    </div> -->
  </div>
</div>

<!-- Alert -->
<div id="flashdata" data-flashdata="<?= $this->session->flashdata('alert') ?>"></div>
<div id="flashdataerr" data-flashdata="<?= $this->session->flashdata('fail') ?>"></div>