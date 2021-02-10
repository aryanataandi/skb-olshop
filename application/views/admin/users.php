<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $header; ?></h6>
        </div>
        <div class="card-body">
            <!-- <div>
                <a href="<?= base_url('admin/users/tambah') ?>" class="btn btn-primary mb-4">
                    Tambah Data
                </a>
            </div> -->

            <!-- Alert -->
            <?php echo $this->session->flashdata('alert')  ?>

            <!-- Data tidak ditemukan -->
            <?php if (empty($tb_user)) { ?>
                <img src="<?= base_url('admin_assets/img/nodata.svg'); ?>" alt="nodata" class="d-flex mx-auto py-5" width="200px">
                <h3 class="text-center mb-5">User tidak ditemukan.</h3>
            <?php } else { ?>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="th-no">#</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Tanggal Daftar</th>
                                <th class="text-center th-aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $start=0; foreach ($tb_user as $row) : ?>
                                <tr>
                                    <td><?php echo ++$start; ?></td>
                                    <td><?php echo $row["nama_user"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><a href="<?= base_url('admin/users/status/' . $row['id_user']) ?>"
                                        <?php if ($row["is_active"] == 1) { ?>
                                            onclick="return confirm('Apakah anda yakin ingin me-nonaktifkan user ini?');" class="text-success font-weight-bold"><p>Aktif</p></a>
                                        <?php } elseif ($row["is_active"] == 0) { ?>
                                            onclick="return confirm('Apakah anda yakin ingin meng-aktifkan user ini?');" class="text-danger font-weight-bold">Tidak Aktif</a>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo date('d F Y', $row["tanggal_user"]); ?></td>
                                    <td class="d-flex justify-content-center">
                                        <a href="<?= base_url(); ?>admin/users/edit/<?= $row['id_user'] ?>" style="text-decoration: none; color: black;">
                                            <button class="btn btn-sm btn-warning aksi mr-1"><img src="<?= base_url(); ?>admin_assets/img/edt.svg"></button>
                                        </a>
                                        <a href="<?= base_url(); ?>admin/users/hapus/<?= $row['id_user'] ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?');" style="text-decoration: none; color: black;">
                                            <button class="btn btn-sm btn-danger aksi"><img src="<?= base_url(); ?>admin_assets/img/del.svg"></button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } ?>
                </div>
                <!-- <?php echo $this->pagination->create_links(); ?> -->
        </div>
    </div>