<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('admin_assets/css/print.css') ?>">
    <title><?= $judul ?></title>
</head>

<body onload="window.print()">
    <h1><?= $info['judul_web'] ?></h1>
    <h3>Laporan Penjualan</h3>
    <?php if (!isset($tahun)) { ?>
        <h3>Periode <?= $periode_awal ?> s/d <?= $periode_akhir ?></h3>
    <?php } else { ?>
        <h3>Tahun <?= $tahun; ?></h3>
    <?php } ?>

    <table width="100%">
        <tr>
            <td align="center"><b>No.</b></td>
            <td><b>Kode Invoice</b></td>
            <td><b>Tanggal</b></td>
            <td><b>Nama Pembeli</b></td>
            <td align="center"><b>Penjualan</b></td>
        </tr>
        <?php $i = 1;
        $total = 0;
        foreach ($invoice as $row) { ?>
            <tr>
                <td align="center"><?= $i ?></td>
                <td><?= $row['id_invoice'] ?></td>
                <td><?= date('d/m/Y', strtotime($row['tgl_pesan'])) ?></td>
                <td><?= $row['nama_pemesan'] ?></td>
                <td align="right"><?= getRupiah($row['total'] - $row['ongkir']) ?></td>
            </tr>
        <?php $i++;
            $total += $row['total'] - $row['ongkir'];
        } ?>
        <tr>
            <td colspan="4" align="right"><b>Total</b></td>
            <td align="right"><b><?= getRupiah($total) ?></b></td>
        </tr>
    </table>
</body>

</html>