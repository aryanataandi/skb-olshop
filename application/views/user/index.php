<!-- Banner -->
<div data-aos="fade-in" id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php $i = 0;
    foreach ($tb_banner as $banner) { ?>
      <?php if ($i == 0) { ?>
        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;
                                                                    $i++ ?>" class="active"></li>
      <?php } else { ?>
        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;
                                                                    $i++ ?>"></li>
    <?php }
    } ?>
  </ol>
  <div class="carousel-inner">
    <?php $a = 0;
    foreach ($tb_banner as $banner) { ?>
      <?php if ($a == 0) { ?>
        <div class="carousel-item active">
        <?php } else { ?>
          <div class="carousel-item">
          <?php }
        $a++; ?>
          <a href="http://<?= $banner['url'] ?>">
            <img src="<?= base_url(); ?>assets/img_banner/<?= $banner['gambar_banner'] ?>" class="d-block w-100" alt="<?= $banner['nama_banner'] ?>">
          </a>
          </div>
        <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>

  <div class="container">

    <div class="wrapper shadow card my-5">
      <h5 class="card-header terbaru text-white py-3">Produk Terbaru</h5>
      <div class="card-body">
        <div class="produkTerbaru owl-carousel owl-theme">
          <!-- Item Card -->
          <?php foreach ($terbaru as $t) { ?>
            <div class="mb-4">
              <div class="card h-100">
                <a href="<?= base_url('home/detail/' . strtourl($t['nama_produk'])) ?>">
                  <img src="<?= base_url('assets/img_produk/') . $t['gambar_produk'] ?>" class="card-img-top">
                  <div class="card-body">
                    <div class="div-produk">
                      <p style="font-weight: 500; font-size: .9em;" class="nama-terbaru"><?= $t['nama_produk']; ?></p>
                    </div>
                    <div class="div-produk">
                      <?php if ($t['diskon_produk'] != 0) { ?>
                        <small style="color: gray;">
                          <strike><?= getRupiah($t['harga_produk']); ?></strike>
                          <p class="badge badge-success d-inline ml-1"><?= $t['diskon_produk'] ?>%</p>
                        </small>
                      <?php } ?>
                      <p class="harga"><?= getRupiah($t['harga_produk'] - ($t['diskon_produk'] / 100) * $t['harga_produk']); ?></p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>
          <!-- End of Item Card -->
        </div>
      </div>
    </div>
  </div>

  <?php if (count($diskon) >= 6) { ?>
    <section data-aos="fade-up" data-aos-duration="400" class="bg-warning pt-1">
      <div class="container my-5">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-4">
              <div class="text-light text-center text-body text-md-left mb-5 pt-4">
                <h2><b>Yang Lagi Promo!</b></h2>
                <p class="h4 font-weight-lighter">Diskon hingga<br><span class="font-weight-bold" style="font-size: 4.6em;"><?php echo $max_diskon['diskon_produk'] ?><span style="font-size: .6em;">%</span></span></p>
              </div>
            </div>
            <div class="col-12 col-md-8">
              <div class="produkDiskon owl-carousel">
                <!-- Item Card -->
                <?php foreach ($diskon as $d) { ?>
                  <div class="mb-4">
                    <div class="card h-100">
                      <a href="<?= base_url('home/detail/' . strtourl($d['nama_produk'])) ?>">
                        <img src="<?= base_url('assets/img_produk/') . $d['gambar_produk'] ?>" class="card-img-top">
                        <div class="card-body">
                          <div class="div-produk">
                            <p style="font-weight: 500; font-size: .9em;" class="nama-terbaru"><?= $d['nama_produk']; ?></p>
                          </div>
                          <div class="div-produk">
                            <?php if ($d['diskon_produk'] != 0) { ?>
                              <small style="color: gray;">
                                <strike><?= getRupiah($d['harga_produk']); ?></strike>
                                <p class="badge badge-success d-inline ml-1"><?= $d['diskon_produk'] ?>%</p>
                              </small>
                            <?php } ?>
                            <p class="harga"><?= getRupiah($d['harga_produk'] - ($d['diskon_produk'] / 100) * $d['harga_produk']); ?></p>
                          </div>
                        </div>
                      </a>
                      <!-- <a href="<?= base_url('home/add_keranjang/' . $d['id_produk']) ?>" class="btn btn-lg cart btn-success align-text-bottom"><i class="fas fa-cart-plus"></i></a> -->
                    </div>
                  </div>
                <?php } ?>
                <!-- End of Item Card -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>

  <div class="container">
    <div class="wrapper my-5">
      <h5 class="card-header bg-transparent py-3">Produk Lainnya</h5>
      <div class="card-body mt-2">
        <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5">
          <!-- Item Card -->
          <?php $i = 100;
          foreach ($produk as $p) { ?>
            <div data-aos="fade-up" data-aos-delay="<?= $i ?>" class="col mb-4">
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
                      <?php $i += 100;
                      } ?>
                      <p class="harga"><?= getRupiah($p['harga_produk'] - ($p['diskon_produk'] / 100) * $p['harga_produk']); ?></p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>
          <!-- End of Item Card -->
        </div>
        <div class="text-center">
          <a data-aos="fade-up" data-aos-duration="600" href="<?= base_url('home/all') ?>" class="btn btn-special btn-lg btn-outline-dark font-weight-bold py-3 px-5 mt-4">Lihat Selengkapnya</a>
        </div>
      </div>
    </div>

  </div>


  <!-- Alert -->
  <div id="flashdataerr" data-flashdata="<?= $this->session->flashdata('swal') ?>"></div>

  <script>
    $(document).ready(function() {
      $(".produkTerbaru").owlCarousel({
        autoplay: true,
        autoplayHoverPause: true,
        loop: true,
        margin: 20,
        responsive: {
          0: {
            items: 2
          },
          600: {
            items: 3
          },
          1000: {
            items: 5
          }
        }
      });

      $(".produkDiskon").owlCarousel({
        margin: 20,
        stagePadding: 50,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        }
      });
    });
  </script>