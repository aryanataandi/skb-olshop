<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap & My CSS -->
    <link href="<?= base_url('vendor/sb-admin-2/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>vendor/bootstrap/css/bootstrap.css">
    <title>Error</title>
</head>

<body>
    <div class="my-4">
        <div class="container d-flex">
            <div class="mx-auto my-5 text-center">
                <img src="<?= base_url('assets/not_found.svg') ?>" alt="not_found" width="280px" draggable="false">
                <h1 style="font-size: 2em;" class="mt-4"><b>Tidak ada barang!</b></h1>
                <h5 class="my-4">Terjadi kesalahan terhadap barang yang anda cari</h2>
                    <div class="d-flex justify-content-around">
                        <a href="<?= base_url() ?>" style="text-decoration: underline;">Kembali ke Beranda</a>
                    </div>
                    <br>
                    <small>Copyright &copy; Aryanata Andipradana - 2020</small>
            </div>
        </div>
    </div>

</body>

</html>