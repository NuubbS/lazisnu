<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>
    <!-- <title>Dashboard &mdash; Lazisnu</title> -->

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/datatables.min.css') ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/css/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/OwlCarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/OwlCarousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap-social.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toast/iziToast.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>assets/img/avatar/<?= $this->fungsi->user_login()->gambar; ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->fungsi->user_login()->nama; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="<?= base_url('profile'); ?>" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="#">Lazisnu Kesamben</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="#">LK</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="<?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == null ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('dashboard') ?>">
                                <i class="fas fa-fire"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-header">Content</li>
                        <li class="nav-item dropdown <?= $this->uri->segment(1) == "munfiq" || $this->uri->segment(1) == "mustahiq" ? 'active' : '' ?>">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-hand-holding-usd"></i>
                                <span>Infaq</span></a>
                            <ul class="dropdown-menu">
                                <li class="<?= $this->uri->segment(1) == 'munfiq' ? 'active' : '' ?>">
                                    <a class="nav-link" href="<?= base_url('munfiq'); ?>">Munfiq</a>
                                </li>
                                <li class="<?= $this->uri->segment(1) == 'mustahiq' ? 'active' : '' ?>">
                                    <a class="nav-link" href="<?= base_url('mustahiq'); ?>">Mustahiq</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?= $this->uri->segment(1) == 'profile' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('profile'); ?>">
                                <i class="fas fa-user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <!-- admin menu -->
                        <?php if ($this->session->userdata('role_id') != 3) { ?>
                            <li class="menu-header">Setting</li>
                            <li class="<?= $this->uri->segment(1) == 'user' ? 'active' : '' ?>">
                                <a class="nav-link" href="<?= base_url('user/user_account'); ?>">
                                    <i class="fas fa-users-cog"></i>
                                    <span>User Account</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                    <!-- sidebar menu -->
                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://github.com/NuubbS/lazisnu" class="btn btn-dark btn-lg btn-block btn-icon-split">
                            <i class="fab fa-github"></i> View Source Code
                        </a>
                    </div>
                </aside>
            </div>

            <!-- General JS Scripts -->
            <script src="<?= base_url('assets/plugins/jquery/jquery-3.5.1.min.js'); ?>"></script>
            <script src="<?= base_url('assets/js/datatables.min.js') ?>"></script>
            <script src="<?= base_url('assets/plugins/loading-overlay/loadingoverlay.min.js') ?>"></script>
            <?= $contents; ?>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2020 - <?= date('Y') ?> <div class="bullet"></div> Created By <a href="#">Arief Rahman Putera</a> & <a href="#">M. Hamdan Yusuf</a>
                </div>
                <div class="footer-right">
                    <i>Lazisnu Kesamben</i>
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url('assets/plugins/jquery/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/tooltip.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery/jquery.nicescroll.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery/moment.js'); ?>"></script>
    <script src="<?= base_url() ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>assets/plugins/jquery/sparkline.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/chart/Chart.js"></script>
    <script src="<?= base_url() ?>assets/plugins/OwlCarousel/dist/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/summernote/js/summernote-bs4.js"></script>
    <script src="<?= base_url() ?>assets/plugins/Chocolat/dist/js/chocolat.js"></script>
    <script src="<?= base_url() ?>assets/plugins/toast/iziToast.min.js"></script>


    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <?php if ($this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '') { ?>
        <script src="<?= base_url() ?>assets/js/page/index.js"></script>
    <?php } ?>
    <script src="<?= base_url() ?>assets/js/page/components-user.js"></script>

    <!-- ============ Search UI End ============= -->
    <script>
        $(function() {
            var table = $("#example1").DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "scrollX": true,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
            });
            $("#example1").attr('style', 'width: 100%');
            $("tr").attr('style', 'width: 100%');
            $('#filter-kategori').on('change', function() {
                table.column(2).search(this.value).draw();
            });
            $('#filter-download').on('change', function() {
                table.column(3).search(this.value).draw();
            });
        });
    </script>
</body>

</html>