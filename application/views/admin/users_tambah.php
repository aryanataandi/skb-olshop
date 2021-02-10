<form action="<?= base_url('admin/users/tambah'); ?>" method="POST">
    <div class="container">
    <div class="card shadow py-4 mb-5">
        <div class="container-fluid">

            <!-- Alert -->
            <?php if ($this->session->flashdata('alert')) : ?>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data user <strong>berhasil</strong> <?= $this->session->flashdata('alert'); ?>.
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Alert Ends -->

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama">Nama User</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email User</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="form-text text-danger"><?= form_error('password'); ?></small>
                </div>
                <div class="form-group col-md-6">
                    <label for="tanggal">Tanggal Akun Dibuat</label>
                    <p>dd/mm/YY</p>
                </div>
                <div class="form-group col-md-12">
                    <input type="checkbox" onclick="myFunction()" id="peek" class="mr-2">
                    <label for="peek">Lihat Password</label>

                    <script>
                        function myFunction() {
                            var x = document.getElementById("password");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <p>Status Akun</p>
                    <div>
                        <input type="radio" id="aktif" name="status" value=1 class="mr-2" checked>
                        <label for="aktif">Aktif</label>
                    </div>
                    <input type="radio" id="non" name="status" value=0 class="mr-2">
                    <label for="non">Tidak Aktif</label>
                </div>
            </div>

            <div class="float-right">
                <a href="<?= base_url(); ?>admin/users" class="btn btn-secondary mr-1">Tutup</a>
                <button type="submit" class="btn btn-primary" name="submit" value="Submit">Tambah</button>
            </div>
        </div>
    </div>
    </div>
</form>