    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4">
                        <img src="<?= base_url() ?>assets/img/logo/nucare.png" alt="logo" width="300" class="shadow-light mb-2 mt-2">
                        <h4 class="text-dark font-weight-normal">Register New Account <span class="font-weight-bold">Lazisnu Kesamben</span></h4>
                        <form id="form" action="<?php echo base_url('auth/register') ?>" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Forgot Password
                                </button>
                            </div>
                        </form>