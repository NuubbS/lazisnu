<input type="hidden" name="user_id" value="<?= $user->user_id ?>">
<div class="row">
    <div class="col-md-12 form-group">
        <select name="role_id" class="form-control select2 mb-3">
            <?php foreach ($role as $key => $kat) { ?>
                <option <?= ($kat->role_id == $user->role_id) ? 'selected' : ''; ?> value="<?= $kat->role_id; ?>"><?= $kat->role ?></option>
            <?php } ?>
        </select>
        <div class="mt-2 mb-0 float-right">
            <button type="button" class="btn btn-danger" onclick="closes_update()">Close</button>
            <button type="button" class="btn btn-primary" onclick="updateData()">Simpan</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    function reload_datatables() {
        table.ajax.location.reload();
    }
</script>