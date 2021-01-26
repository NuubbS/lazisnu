<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome/css/all.min.css'); ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets/css/selectric.css'); ?>">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toast/iziToast.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">

    <!-- Js libraries -->
</head>

<body>
    <!-- alert -->
    <div id="eror-register" data-er="<?= $this->session->flashdata('eror-register'); ?>"></div>
    <!-- alert -->
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4">
                        <img src="<?= base_url() ?>assets/img/logo/nucare.png" alt="logo" width="300" class="shadow-light mb-2 mt-2">
                        <h4 class="text-dark font-weight-normal">Register New Account <span class="font-weight-bold">Lazisnu Kesamben</span></h4>
                        <form id="form" action="<?php echo base_url('auth/register') ?>" method="post">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input id="nama" type="text" class="form-control" name="nama" value="<?= set_value('nama'); ?>" autofocus>
                                <small class="text-danger"><?= form_error('nama') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control" name="email" value="<?= set_value('email'); ?>">
                                <div class="invalid-feedback">
                                </div>
                                <small class="text-danger"><?= form_error('email') ?></small>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control" name="password">
                                    <small class="text-danger"><?= form_error('password') ?></small>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password2" class="d-block">Password Confirmation</label>
                                    <input id="password2" type="password" class="form-control" name="password2">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="regis">
                                    Register
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-5 text-small">
                            Copyright &copy; 2020 - <?= date('Y'); ?><div class="bullet"></div>Created By Arief Rahman Putera & M. Hamdan Yusuf, Made with <i class="fas fa-smile text-primary"></i> by Stisla
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url() ?>assets/img/unsplash/login-bg.jpg">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1>
                                <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
                            </div>
                            Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url('assets/plugins/jquery/jquery-3.5.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery/jquery.nicescroll.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery/moment.js'); ?>"></script>
    <script src="<?= base_url() ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>assets/plugins/toast/iziToast.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script>
        // alert
        var er = $('#eror-register').data('er');
        if (er) {
            iziToast.warning({
                title: 'Warning !',
                message: er,
                position: 'topRight'
            });
        }
        // alert
    </script>
</body>

</html>