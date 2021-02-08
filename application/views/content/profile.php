<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, <?= $this->fungsi->user_login()->nama; ?></h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="<?= base_url() ?>assets/img/avatar/<?= $this->fungsi->user_login()->gambar; ?>" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Posts</div>
                                    <div class="profile-widget-item-value">187</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Followers</div>
                                    <div class="profile-widget-item-value">6,8K</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Following</div>
                                    <div class="profile-widget-item-value">2,1K</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <div class="font-weight-bold mb-2">Follow Lazisnu Kesamben On</div>
                            <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-pinterest mr-1">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form id="form_updated" method="post" action="<?= base_url('user/user_profile_update'); ?>">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="user_id" value="<?= $this->fungsi->user_login()->user_id ?>">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control" value="<?= $this->fungsi->user_login()->nama; ?>" required="">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= $this->fungsi->user_login()->email; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Alamat</label>
                                        <input type="Alamat" name="alamat" class="form-control" value="<?= $this->fungsi->user_login()->alamat; ?>" required="">
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Phone</label>
                                        <input type="number" name="no_hp" class="form-control" value="<?= $this->fungsi->user_login()->no_hp; ?>">
                                    </div>
                                    <div class="card-footer text-right ml-auto">
                                        <button class="btn btn-primary" onclick="saveData();">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function saveData() {
        $.LoadingOverlay("show", {
            image: "",
            fontawesome: "fa fa-spinner fa-pulse"
        });
        var form = $('#form_updated');
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            dataType: "json",
            success: function(result) {
                message = result.messages;
                status = result.status;
                notifikasi(status, message);
            }
        });

    }

    function notifikasi(status, message) {
        $.LoadingOverlay("hide");
        if (status == 1) {
            table.ajax.reload();
            iziToast.success({
                title: 'Success',
                message: message,
                position: 'topRight',
                balloon: true,
                transitionIn: 'fadeInLeft',
                transitionOut: 'fadeOutRight'
            });
        } else {
            iziToast.error({
                title: 'Error',
                message: message,
                position: 'topRight',
                balloon: true,
                transitionIn: 'fadeInLeft',
                transitionOut: 'fadeOutRight'
            });
        }
    }
</script>