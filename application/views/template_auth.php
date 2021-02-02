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
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap-social.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toast/iziToast.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">

    <!-- Js libraries -->
</head>

<body>
    <!-- alert -->
    <div id="eror" data-er="<?= $this->session->flashdata('eror'); ?>"></div>
    <div id="sukses" data-sr="<?= $this->session->flashdata('sukses'); ?>"></div>
    <div id="eror" data-el="<?= $this->session->flashdata('eror'); ?>"></div>
    <div id="warning" data-warning="<?= $this->session->flashdata('warning'); ?>"></div>
    <!-- alert -->

    <?= $content_auth; ?>

    <div class="text-center mt-5 text-small">
        Copyright &copy; 2020 - <?= date('Y'); ?><div class="bullet"></div>Created By Arief Rahman Putera & M. Hamdan Yusuf, Made with <i class="fas fa-smile text-success"></i> by Stisla
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
        var er = $('#eror').data('er');
        if (er) {
            iziToast.warning({
                title: 'Warning !',
                message: er,
                position: 'topRight'
            });
        }
        var warning = $('#warning').data('warning');
        if (warning) {
            iziToast.warning({
                title: 'Warning !',
                message: warning,
                position: 'topRight'
            });
        }
        <?php if ($this->uri->segment(2) == 'register') { ?>
            iziToast.info({
                title: 'Information !',
                message: 'Pastikan anda terkoneksi dengan internet saat melakukan registrasi !, Dikarenakan kami akan mengirimkan kode aktivasi ke email anda !',
                position: 'topCenter',
                timeout: 0
            });
            // alert
        <?php } ?>
    </script>
</body>

</html>