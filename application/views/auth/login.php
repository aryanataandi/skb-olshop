    <div class="container">
        <div class="row justify-content-center">
            <!-- <div class="col-0 col-md-6">
                <img src="<?= base_url('assets/logout.svg') ?>" class="col-0 img-fluid mt-5 pt-5 mb-0 pb-0" alt="">
            </div> -->
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-body card-login">
                    <h2 class="text-center my-3"><strong>Login User</strong></h2><br>
                    <a href="<?= base_url(); ?>" class="text-center" style="margin-top: -38px; margin-bottom: 40px; color: black;"><b><?= $info['judul_web'] ?></b></a>

                    <!-- Alert Login-->
                    <?php if ($this->session->flashdata('alert')) :  ?>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="alert alert-success" role="alert">
                                    <?= $this->session->flashdata('alert'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Alert Ends -->

                    <!-- Alert Error-->
                    <?php if ($this->session->flashdata('danger')) :  ?>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <?= $this->session->flashdata('danger'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Alert Ends -->

                    <!-- Alert Warning-->
                    <?php if ($this->session->flashdata('logout')) :  ?>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="alert alert-warning" role="alert">
                                    <?= $this->session->flashdata('logout'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Alert Ends -->

                    <form action="<?= base_url('auth'); ?>" method="post">
                        <div class="form-group mb-4">
                            <label for="email">Email</label><small class="text-danger float-right"><?= form_error('email'); ?></small>
                            <input type="text" class="text-field col-lg" name="email" id="email" autocomplete="off" value="<?= set_value('email'); ?>" autofocus>
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">Password</label>
                                <small class="text-danger float-right"><?= form_error('password'); ?></small>
                            <input type="password" class="text-field col-lg" name="password" id="password">
                                <small><a href="#" class="float-right mt-2">Lupa password?</a></small>
                        </div>
                        <button type="submit" name="login" class="d-flex login-button col-lg justify-content-center mt-5 py-4 shadow">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 text-center">
        <small>Belum punya akun? <a href="<?= base_url('auth/registrasi'); ?>">Buat akun</a></small>
    </div>