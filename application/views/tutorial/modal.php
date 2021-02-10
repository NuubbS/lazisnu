<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <!-- animate -->
        <div class="animate__animated animate__bounce animate__fast">
            <div class="section-header">
                <h1>Modal</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Setting</a></div>
                    <div class="breadcrumb-item">User Account CRUD</div>
                </div>
            </div>
        </div>
        <div class="section-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                Four In One
            </button>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-sm" id="staticBackdropLabel">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#nav-login" role="tab">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#nav-register" role="tab">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#nav-forgot" role="tab">Forgot</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#nav-reset" role="tab">Reset</a>
                        </li>
                    </ul>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-login" role="tabpanel">
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
                                <button type="submit" class="btn btn-success btn-lg btn-block" name="login" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-forgot" role="tabpanel">
                        <form method="POST" action="<?= base_url('auth'); ?>">
                            <p class="text-muted">We will send a link to reset your password</p>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required="" autofocus="">
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                                    Forgot Password
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-reset" role="tabpanel">
                        <form method="POST" action="<?= base_url('auth'); ?>">
                            <p class="text-muted">We will send a link to reset your password</p>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="2" required>
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="confirm-password" tabindex="2" required>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-register" role="tabpanel">
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
                                <button type="submit" class="btn btn-success btn-lg btn-block" name="regis">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>