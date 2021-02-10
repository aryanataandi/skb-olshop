    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-body card-login">
                    <h2 class="text-center my-3"> <strong>Registrasi</strong> </h2><br>
                    <form action="<?= base_url('auth/registrasi'); ?>" method="post">
                        <div class="row">
                            <div class="form-group mb-4 col-12">
                                <label for="nama">Nama</label><small class="text-danger float-right"><?= form_error('nama'); ?></small>
                                <input type="text" class="text-field col-lg" name="nama" id="nama" autocomplete="off" value="<?= set_value('nama'); ?>">
                            </div>
                            <div class="form-group mb-4 col-12">
                                <label for="email">Email</label><small class="text-danger float-right"><?= form_error('email'); ?></small>
                                <input type="text" class="text-field col-lg" name="email" id="email" autocomplete="off" value="<?= set_value('email'); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="text-field col-lg" name="password" id="password">
                                    <small class="text-danger"><?= form_error('password'); ?></small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password2">Konfirmasi Password</label>
                                    <input type="password" class="text-field col-lg" name="password2" id="password2">
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="d-flex login-button col-lg justify-content-center mt-5 py-4 shadow">Daftar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 text-center">
        <small>Sudah punya akun? <a href="<?= base_url('auth'); ?>">Login</a></small>
    </div>