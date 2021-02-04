<input type="hidden" name="user_id" value="<?= $user->user_id ?>">
<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user->nama ?>">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?= $user->email ?>">
</div>
<div class="form-group">
    <label for="alamat">Address</label>
    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user->alamat ?>">
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="no_hp">No. HP</label>
        <input type="number" class="form-control" id="no_hp" name="no_hp" min="0" value="<?= $user->no_hp ?>">
        <div class="mt-2">
            <?php if ($user->status_id == 1) { ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_id" id="status_id1" value="1" checked>
                    <label class="form-check-label" for="status_id1">Aktif</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_id" id="status_id2" value="2">
                    <label class="form-check-label" for="status_id2">Non-Aktif</label>
                </div>
            <?php } else { ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_id" id="status_id" value="1">
                    <label class="form-check-label" for="status_id">Aktif</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_id" id="status_id" value="2" checked>
                    <label class="form-check-label" for="status_id">Non-Aktif</label>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="role_id">Jabatan</label>
        <select name="role_id" class="form-control select2 mb-3">
            <?php foreach ($role as $key => $kat) { ?>
                <option <?= ($kat->role_id == $user->role_id) ? 'selected' : ''; ?> value="<?= $kat->role_id; ?>"><?= $kat->role ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="form-group pb-2">
    <div class="float-right">
        <button type="button" class="btn btn-danger" onclick="closes_update()">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateData()">Simpan</button>
    </div>
</div>

<script type="text/javascript">
    function reload_datatables() {
        table.ajax.location.reload();
    }
</script>