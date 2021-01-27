<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome/css/all.min.css'); ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap-social.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toast/iziToast.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
</head>

<body>
    <!-- alert -->
    <div id="sukses" data-sr="<?= $this->session->flashdata('sukses'); ?>"></div>
    <div id="eror" data-el="<?= $this->session->flashdata('eror'); ?>"></div>
    <!-- alert -->
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <img src="<?= base_url() ?>assets/img/logo/nucare.png" alt="logo" width="300" class="shadow-light mb-2 mt-2">
                        <h4 class="text-dark font-weight-normal">Selamat Datang di <span class="font-weight-bold">Lazisnu Kesamben</span></h4>
                        <p class="text-muted">Sebelum anda mengakses aplikasi, anda harus login atau mendaftar jika anda belum mempunyai akun Lazisnu Kesamben.</p>
                        <form method="POST" action="<?= base_url('auth'); ?>">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control" name="email" tabindex="1" autofocus value="<?= set_value('email'); ?>">
                                <small class="text-danger"><?= form_error('email') ?></small>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2">
                                <small class="text-danger"><?= form_error('password') ?></small>
                            </div>

                            <div class="form-group text-right">
                                <a href="auth-forgot-password.html" class="float-left mt-3">
                                    Forgot Password?
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" name="login" tabindex="4">
                                    Login
                                </button>
                            </div>

                            <div class="mt-2 text-center">
                                Don't have an account? <a href="<?= base_url('auth/register'); ?>">Create new one</a>
                            </div>
                        </form>

                        <div class="text-center mt-2 text-small">
                            Copyright &copy; 2020 - <?= date('Y'); ?><div class="bullet"></div>Created By Arief Rahman Putera & M. Hamdan Yusuf, Made with <i class="fas fa-smile text-primary"></i> by Stisla
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url() ?>assets/img/unsplash/login-bg.jpg">
                    <?= $this->session->flashdata('pesan'); ?>
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
        var sr = $('#sukses').data('sr');
        if (sr) {
            iziToast.success({
                title: 'Caution !',
                message: sr,
                position: 'topRight'
            });
        }
        var el = $('#eror').data('el');
        if (el) {
            iziToast.warning({
                title: 'Login Gagal !',
                message: el,
                position: 'topRight'
            });
        }
    </script>
</body>

</html>