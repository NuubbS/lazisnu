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
                                <a href="<?= base_url('auth/forgot'); ?>" class="float-left mt-3">
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