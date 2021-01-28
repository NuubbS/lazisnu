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
                            <div class="mt-2 text-center">
                                Saya sudah memiliki akun ! <a href="<?= base_url('auth'); ?>">Login Now</a>
                            </div>
                        </form>