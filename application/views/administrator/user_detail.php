<input type="hidden" name="user_id" value="<?= $user->user_id ?>">
<!-- <div class="row">
    <div class="col-md-12 form-group"> -->
<div class="card profile-widget">
    <div class="profile-widget-header">
        <img alt="image" src="<?= base_url(''); ?>assets/img/avatar/<?= $user->gambar; ?>" class="rounded-circle profile-widget-picture">
        <div class="profile-widget-items">
            <div class="profile-widget-item">
                <div class="profile-widget-item-label">Posts</div>
                <div class="profile-widget-item-value">187</div>
            </div>
            <div class="profile-widget-item">
                <div class="profile-widget-item-label">Activity</div>
                <div class="profile-widget-item-value">6,8K</div>
            </div>
            <div class="profile-widget-item">
                <div class="profile-widget-item-label">Created at</div>
                <div class="profile-widget-item-value"><?= $user->date_created; ?></div>
            </div>
        </div>
    </div>
    <div class="profile-widget-description">
        <div class="profile-widget-name"><?= $user->nama; ?><div class="text-muted d-inline font-weight-normal">
                <div class="slash"></div> <?= $user->alamat; ?>
                <div class="slash"></div> <?= $user->no_hp; ?>
            </div>
        </div>
    </div>
</div>
<!-- </div>
</div> -->

<script type="text/javascript">
    function reload_datatables() {
        table.ajax.location.reload();
    }
</script>