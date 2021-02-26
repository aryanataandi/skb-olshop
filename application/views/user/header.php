<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- favicon -->
  <link rel="icon" href="<?= base_url('assets/favicon.ico') ?>">
  <!-- Bootstrap -->
  <link href="<?= base_url('vendor/sb-admin-2/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?= base_url(); ?>vendor/bootstrap/css/bootstrap.css">
  <!-- My CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/user.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/lightbox.css">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
  <!-- owl-carousel -->
  <link rel="stylesheet" href="<?= base_url('vendor/owl/dist/assets/') ?>owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url('vendor/owl/dist/assets/') ?>owl.theme.default.min.css">
  <!-- jQuery -->
  <script src="<?= base_url('vendor/jquery/jquery-3.5.1.min.js') ?>"></script>
  <!-- AOS -->
  <link rel="stylesheet" href="<?= base_url('vendor/aos/aos.css') ?>">

  <title>
    <?php if ($this->uri->segment(1) == NULL) {
      echo $info['judul_web'];
    } else {
      echo $judul . ' | ' . $info['judul_web'];
    } ?>
  </title>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg navbar-light shadow fixed-top">
    <div class="container">
      <div class="text-truncate">
        <a href="<?= base_url(); ?>"><img class="logo" src="<?= base_url('assets/logo.png') ?>" alt="<?= $info['judul_web'] ?>"></a>
      </div>
      <!-- Experimental -->
      <div class="dropdown cart mobile float-right">
        <a class="nav-link" href="#" id="cartDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-shopping-cart ml-2 mr-4 text-secondary"></i>
          <div class="badge badge-warning notification"><?php if ($this->cart->total_items() == 0) {
                                                          echo "";
                                                        } else {
                                                          echo $this->cart->total_items();
                                                        } ?></div>
        </a>
        <div class="dropdown-menu dropdown-menu-right cart-div animate slideIn" aria-labelledby="cartDropdownMenuLink">
          <?php if ($this->cart->total_items() == 0) { ?>
            <h4 class="dropdown-header py-3">Keranjang belanjamu kosong!</h4>
          <?php } else { ?>
            <h6 class="dropdown-header py-3">Keranjang Belanja</h6>
            <?php
            foreach ($keranjang as $produk) {
              foreach ($this->cart->contents() as $item) {
                if ($produk['id_produk'] == $item['id']) { ?>

                  <a href="<?= base_url('home/detail/' . strtourl($produk['nama_produk'])) ?>" class="dropdown-item py-3 text-truncate">
                    <b><?= $produk['nama_produk'] ?></b>
                    <span class="font-weight-bold" style="color: orangered;"><br><?= getRupiah($item['price']) ?></span><small> ( <?= $item['qty'] ?> barang )</small>
                  </a>
            <?php }
              }
            } ?>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('home/keranjang') ?>" class="dropdown-item py-2 text-center font-weight-bold">Lihat Keranjang</a>
          <?php } ?>
        </div>
      </div>
      <!-- End of Experimental -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-hover nav-item kategori dropdown active">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Kategori
            </a>
            <div class="dropdown-menu animate slideIn" aria-labelledby="navbarDropdownMenuLink">
              <?php foreach ($tb_kategori as $kategori) :  ?>
                <a class="dropdown-item py-3" href="<?= base_url('home/kategori/' . str_replace(" ", "-", strtolower($kategori['nama_kategori']))); ?>"><?= $kategori['nama_kategori']; ?></a>
              <?php endforeach; ?>
            </div>
          </li>
          <li class="nav-item active akun-mobile">
            <?php if (!$user) { ?>
              <a href="<?= base_url('auth') ?>" class="nav-link">Login</a>
            <?php } else { ?>
              <div class="cart dropdown">
                <a class="nav-link active" href="#" id="accountDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $user['nama_user']; ?>
                </a>
                <div class="dropdown-menu animate slideIn" aria-labelledby="accountDropdownMenuLink">
                  <img src="<?= base_url('assets/img_user/') . $user['img_user']; ?>" alt="user" class="rounded-circle d-flex mx-auto my-4" style="width: 54px; height: 54px;">
                  <a class="dropdown-item text-secondary py-3" href="<?= base_url('profil') ?>"><i class="fas fa-user mr-3"></i>Profil</a>
                  <a id="akun-dropdown" class="dropdown-item text-secondary py-3" href="<?= base_url('profil/pesanan/') ?>"><i class="fas fa-file-invoice mr-3"></i>Pesanan</a>
                  <a class="dropdown-item text-secondary py-3" href="" data-toggle="modal" data-target="#Logout"><i class="fas fa-sign-out-alt mr-3"></i>Log Out</a>
                </div>
              </div>
            <?php } ?>
          </li>
          <form action="<?= base_url('home/search') ?>" method="post">
        </ul>
        <div class="input-group searchbox">
          <input type="text" class="form-control searchbar" placeholder="Pencarian.." name="keyword" autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" name="submit"><i class="fas fa-search"></i></button>
          </div>
        </div>
        </form>
        <!-- Keranjang -->
        <!-- Experimental -->
        <div class="dropdown cart cart-md">
          <a class="nav-link" href="#" id="cartDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-shopping-cart ml-2 mr-4 text-secondary"></i>
            <div class="badge badge-warning notification"><?php if ($this->cart->total_items() == 0) {
                                                            echo "";
                                                          } else {
                                                            echo $this->cart->total_items();
                                                          } ?></div>
          </a>
          <div class="dropdown-menu dropdown-menu-right cart-div animate slideIn" aria-labelledby="cartDropdownMenuLink">
            <?php if ($this->cart->total_items() == 0) { ?>
              <h4 class="dropdown-header py-3">Keranjang belanjamu kosong!</h4>
            <?php } else { ?>
              <h6 class="dropdown-header py-3">Keranjang Belanja</h6>
              <?php
              foreach ($keranjang as $produk) {
                foreach ($this->cart->contents() as $item) {
                  if ($produk['id_produk'] == $item['id']) { ?>
                    <a href="<?= base_url('home/detail/' . strtourl($produk['nama_produk'])) ?>" class="dropdown-item py-3 text-truncate">
                      <b><?= $produk['nama_produk'] ?></b>
                      <span class="font-weight-bold" style="color: orangered;"><br><?= getRupiah($item['price']) ?></span><small> ( <?= $item['qty'] ?> barang )</small>
                    </a>
              <?php }
                }
              } ?>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('home/keranjang') ?>" class="dropdown-item py-2 text-center font-weight-bold">Lihat Keranjang</a>
            <?php } ?>
          </div>
        </div>
        <!-- End of Experimental -->
        <?php if (!$user) { ?>
          <a href="<?= base_url('auth') ?>" class="btn btn-login btn-outline-secondary ml-4"><i class="fas fa-sign-in-alt mr-2 my-auto"></i>Login</a>
        <?php } else { ?>
          <div class="dropdown nav-hover nav-profil">
            <a class="text-truncate nav-link" href="#" id="accountDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?= base_url('assets/img_user/') . $user['img_user']; ?>" alt="user" class="rounded-circle mr-2">
              <span style="font-size: .9rem;"><?= $user['nama_user']; ?></span>
            </a>
            <div class="dropdown-menu animate slideIn" aria-labelledby="accountDropdownMenuLink">
              <a id="akun-dropdown" class="dropdown-item text-secondary py-3" href="<?= base_url('profil') ?>"><i class="fas fa-user mr-3"></i>Profil</a>
              <a id="akun-dropdown" class="dropdown-item text-secondary py-3" href="<?= base_url('profil/pesanan/') ?>"><i class="fas fa-file-invoice mr-3"></i>Pesanan</a>
              <a id="akun-dropdown" class="dropdown-item text-secondary py-3" href="" data-toggle="modal" data-target="#Logout"><i class="fas fa-sign-out-alt mr-3"></i>Log Out</a>
            </div>
          </div>
        <?php } ?>
        </span>
      </div>
    </div>
  </nav>
  <!-- End of Navbar -->

  <div style="height: 78px;" id="top"></div>

  <!-- Modal -->
  <div class="modal fade" id="Logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?= $info['judul_web'] ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <div class="text-center mb-4">
            <img src="<?= base_url('assets/logout.svg') ?>" alt="logout" width="260px" class="">
          </div>
          Apakah anda yakin ingin keluar?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn text-white" data-dismiss="modal" style="background-color: #3282b8;">Batal</button>
          <a href="<?= base_url('auth/logout') ?>" class="btn">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Loading Animation -->
  <div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
  </div>