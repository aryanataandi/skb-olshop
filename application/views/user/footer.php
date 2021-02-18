<div class="container">
    <hr>
</div>
<div class="bg-white marketplace">
    <div class="container text-center">
        <a href="https://www.tokopedia.com" target="_blank"><img src="<?= base_url('assets/tokopedia.jpg') ?>" alt="tokopedia"></a>
        <a href="https://www.shopee.co.id" target="_blank"><img src="<?= base_url('assets/shopee.jpg') ?>" alt="shopee"></a>
        <a href="https://www.bukalapak.com" target="_blank"><img src="<?= base_url('assets/bukalapak.jpg') ?>" alt="bukalapak"></a>
        <a href="https://www.instagram.com" target="_blank"><img src="<?= base_url('assets/instagram.jpg') ?>" alt="instagram"></a>
    </div>
</div>
<footer class="bg-light">

    <div class="py-5 mx-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-4 pr-4">
                    <h5 class="brand"><?= $info['judul_web'] ?></h5>
                    <p><?= $info['deskripsi_web'] ?></p>
                    <div class="soc-med mb-3">
                        <a href="https://www.facebook.com" target="_blank">
                            <i class="fab fa-facebook-square mr-3"></i>
                        </a>
                        <a href="https://www.instagram.com/skb.salatiga/" target="_blank">
                            <i class="fab fa-instagram mr-3"></i>
                        </a>
                        <a href="">
                            <i class="fab fa-telegram mr-3"></i>
                        </a>
                        <a href="https://wa.me/<?= $info['wa_web'] ?>" target="_blank">
                            <i class="fab fa-whatsapp mr-3"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCVbk0cH7oAm5YuNS8DYUBcw" target="_blank">
                            <i class="fab fa-youtube mr-3"></i>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-3 mb-3 my-2">
                            <h6>KATEGORI</h6>
                            <?php foreach ($tb_kategori as $kategori) { ?>
                                <a href="<?= base_url('home/kategori/' . str_replace(" ", "-", strtolower($kategori['nama_kategori']))); ?>"><?= $kategori['nama_kategori'] ?></a><br>
                            <?php } ?>
                        </div>
                        <div class="col-6 col-md-6 col-lg-3 my-2">
                            <h6>INFORMASI</h6>
                            <a href="">Cara Berbelanja</a><br>
                            <a href="">Pembatalan Pesanan</a><br>
                            <a href="http://wa.me/<?= $info['wa_web'] ?>" target="_blank">Customer Service</a><br>
                            <a href="">Syarat dan Ketentuan</a>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6 my-2">
                            <h6>TENTANG KAMI</h6>
                            <p>Jangan lupa kunjungi website resmi kami di <a class="font-weight-bold" href="http://skb.salatiga.go.id" target="_blank"><u>skb.salatiga.go.id</u></a>, untuk mengetahui informasi tentang kami secara up-to-date</p>
                            <!-- <h6>BERLANGGANAN</h6>
                            <p>Dapatkan berita mengenai berbagai macam penawaran menarik dari <?= $info['judul_web'] ?></p>
                            <div class="input-group my-3">
                                <input type="email" class="form-control" placeholder="Alamat email kamu">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fas fa-paper-plane"></i></button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-4 text-center px-5">
                    <i class="fas fa-map-marker-alt fa-2x mb-4"></i>
                    <p class="text-white"><?= $info['alamat_web'] ?></p>
                </div>
                <div class="col-6 col-md-4 text-center">
                    <i class="fas fa-phone fa-2x mb-4"></i>
                    <p class="text-white"><?= $info['nomor_web'] ?></p>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <i class="fas fa-envelope fa-2x mb-4"></i>
                    <p class="text-white"><?= $info['email_web'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <button onclick="topFunction()" class="rounded-circle shadow-lg" id="scroll-top" title="Go to top">
        <i class="fas fa-arrow-up"></i>
    </button>
    <div class="footer-c text-center text-light py-4">
        <small>Copyright &copy; 2020 - Aryanata Andipradana</small>
    </div>
</footer>

<!-- Javascript -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<!-- owl-carousel -->
<script src="<?= base_url('vendor/owl/dist/') ?>owl.carousel.min.js"></script>

<!-- Bootstrap -->
<script src="<?= base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<!-- Sweet Alert -->
<script src="<?= base_url('vendor/swal/') ?>sweetalert2.all.min.js"></script>

<!-- AOS -->
<script src="<?= base_url('vendor/aos/aos.js') ?>"></script>
<script>
    AOS.init({
        once: true,
        duration: 700,
        delay: 200
    })
</script>

<!-- Lightbox -->
<script src="<?= base_url('assets/js/lightbox.js') ?>"></script>

<!-- My Javascript -->
<script type="text/javascript">
    window.setTimeout(function() {
        $('.alert').fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);

    <?php if ($this->uri->segment(2) == 'detail') { ?>
        const flashData = $('#flashdata').data('flashdata');

        if (flashData) {
            Swal.fire({
                title: "<?= $produk['nama_produk'] ?>",
                text: 'Berhasil dimasukkan ke dalam keranjang',
                icon: 'success',
                confirmButtonText: `<i class="fas fa-store mr-3"></i>Lanjut belanja`
            });
        };

        const flashDataerr = $('#flashdataerr').data('flashdata');

        if (flashDataerr) {
            Swal.fire({
                title: 'Gagal',
                text: 'Anda tidak dapat menambahkan produk ini ke dalam keranjang!',
                icon: 'error'
            });
        };
    <?php } ?>

    <?php if ($this->uri->segment(2) == null || $this->uri->segment(2) == 'index') { ?>
        const flashDataerr = $('#flashdataerr').data('flashdata');
        if (flashDataerr) {
            Swal.fire({
                title: 'Gagal',
                text: 'Anda tidak dapat mengakses halaman tersebut!',
                icon: 'error'
            });
        };
    <?php } ?>

    <?php if ($this->uri->segment(2) == 'keranjang') { ?>
        const flashData = $('#flashdata').data('flashdata');

        if (flashData) {
            Swal.fire({
                title: 'Barang berhasil dimasukkan ke keranjang!',
                text: 'Silahkan periksa detail keranjang dan lanjutkan checkout',
                icon: 'success',
                confirmButtonText: `<i class="fas fa-clipboard-list mr-3"></i>Periksa`
            });
        }
    <?php } ?>

    <?php if ($this->uri->segment(2) == 'pesanan') { ?>
        const flashData = $('#flashdata').data('flashdata');

        if (flashData) {
            Swal.fire({
                title: "Dibatalkan!",
                text: 'Pesanan anda berhasil dibatalkan!',
                icon: 'success'
            });
        };

        const flashDataKonf = $('#flashdataKonf').data('flashdata');

        if (flashDataKonf) {
            Swal.fire({
                title: "Berhasil!",
                text: 'Pesanan anda selesai! Terima Kasih telah berbelanja di tempat kami!',
                icon: 'success'
            });
        };
    <?php } ?>

    $(document).on('change', 'input#qty', function() {
        $('input#qty').val($(this).val());
    });

    $(window).on("load", function() {
        $(".loader-wrapper").fadeOut("slow");
    });

    // * Scroll to top
    let scrollButton = document.getElementById("scroll-top");

    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 70) {
            scrollButton.style.opacity = "100";
            scrollButton.style.cursor = "pointer";
        } else {
            scrollButton.style.opacity = "0";
            scrollButton.style.cursor = "default";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

</body>

</html>