<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url(); ?>vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>admin_assets/css/style-auth.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@800&display=swap" rel="stylesheet">
    <title><?= $judul; ?></title>
    <style>
        .login-button {
            background-color: #4e73df;
        }

        .text-field:focus {
            border-bottom: solid #4e73df 2px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-body card-login">
                    <h2 class="text-center my-3"> <strong>Login Admin</strong> </h2><br>

                    <!-- Alert Error-->
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

                    <form action="<?= base_url('auth/admin'); ?>" method="POST">
                        <div class="form-group mb-4">
                            <label for="username">Username</label><small class="text-danger float-right"><?= form_error('username'); ?></small>
                            <input type="text" class="text-field col-lg" name="username" id="username" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label><small class="text-danger float-right"><?= form_error('password'); ?></small>
                            <input type="password" class="text-field col-lg" name="password" id="password">
                        </div>
                        <div class="form-group form-check my-4" style="height: 20px;">
                            <!-- <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Ingat saya</label> -->
                        </div>
                        <button type="submit" name="login" class="d-flex login-button col-lg justify-content-center my-3 py-4 shadow">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>