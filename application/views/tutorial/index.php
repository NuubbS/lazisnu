<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <!-- animate -->
        <div class="animate__animated animate__bounce animate__fast">
            <div class="section-header">
                <h1>User Account CRUD</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Setting</a></div>
                    <div class="breadcrumb-item">User Account CRUD</div>
                </div>
            </div>
        </div>
        <div class="section-body">
            <!-- <h2 class="section-title">Note</h2> -->
            <p class="section-lead text-dark">
                <button onclick="tambah();" class="btn btn-icon icon-left btn-primary"><i class="fas fa-user-plus"></i> Tambahkan User</button>
                <!-- <button onclick="tambah();" class="btn btn-icon btn-sm btn-primary m-1" data-toggle="tooltip" data-placement="top" title="Tambah User"><i class="fas fa-user-edit"></i></button> -->
            </p>

            <!-- animasi table -->
            <div class="animate__animated animate__fadeInUp animate__fast">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card table-responsive">
                            <div class="card-body">
                                <table id="table_user" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">No. HP</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Tgl dibuat</th>
                                            <th scope="col">Tgl Diubah</th>
                                            <th scope="col">Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <i class="fas fa-quote-left fa-2x fa-pull-left"></i>
                                Gatsby believed in the green light, the orgastic future that year by year recedes before us.
                                It eluded us then, but that’s no matter — tomorrow we will run faster, stretch our arms further...
                                And one fine morning — So we beat on, boats against the current, borne back ceaselessly into the past.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- modal ubah -->
<div class="modal" id="modalUserUpdate" role="dialog" data-backdrop="false" style="background: rgba(0,0,0,0.3);">
    <div class="modal-dialog modal-md">
        <div class="modal-content P-1">
            <div class="modal-header">
                <h5 class="modal-title">Update User CRUD</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <form id="form_update" action="<?= base_url('tutorial/crud_update'); ?>" method="post">
                <div class="modal-body" id="content_update">
                    <!-- content user update -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal ubah -->
<!-- modal info -->
<div class="modal" id="modalUserAdd" role="dialog" data-backdrop="false" style="background: rgba(0,0,0,0.3);">
    <div class="modal-dialog modal-md">
        <div class="modal-content P-1">
            <div class="modal-header">
                <h5 class="modal-title">Tambahkan User</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <form id="form_add" action="<?= base_url('tutorial/crud_simpan'); ?>" method="post">
                <div class="modal-body" id="content_add">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Zaid">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Address</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Sekarang">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="no_hp">No. HP</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" min="0">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="role_id">Jabatan</label>
                            <select id="role_id" name="role_id" class="form-control">
                                <?php foreach ($role as $key => $data) { ?>
                                    <option value="<?= $data->role_id; ?>"><?= $data->role ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="status_id">Status</label>
                            <select id="status_id" name="status_id" class="form-control">
                                <?php foreach ($status as $key => $data) { ?>
                                    <option value="<?= $data->status_id; ?>"><?= $data->status ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div class="float-right mb-2">
                            <button type="button" onclick="closes();" class="btn btn-icon icon-left btn-warning"><i class="fas fa-times"></i> Batal</button>
                            <button type="button" onclick="saveData();" class="btn btn-icon icon-left btn-success"><i class="fas fa-file"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal info -->

<script type="text/javascript">
    var table;

    // $(document).ready(function() {

    table = $('#table_user').DataTable({
        'ajax': {
            'url': '<?= base_url('tutorial/crud_fetch') ?>',
            'dataSrc': 'data',
            'type': 'POST'
        },
        "columnDefs": [{
            "targets": [7, -1],
            "className": "text-center"
        }],
        'processing': true,
        'serverSide': true,
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false,
    });

    <?php if ($this->session->flashdata('result')) : ?>
        <?php if ($this->session->flashdata('result')['status']) : ?>
            Swal.Fire('Sukses!', '<?= $this->session->flashdata('result')['msg'] ?>', 'success');
        <?php else : ?>
            Swal.Fire('Maaf!', '<?= $this->session->flashdata('result')['msg'] ?>', 'error');
        <?php endif ?>
    <?php endif ?>

    // });

    $('input:radio[name="jenis"]').change(
        function() {
            if ($(this).is(':checked') && $(this).val() == '2') {
                $('#row_jawaban').removeClass('d-none')
            } else {
                $('#row_jawaban').addClass('d-none')
            }
        });

    function reload() {
        location.reload();
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

    function saveData() {
        $.LoadingOverlay("show", {
            image: "",
            fontawesome: "fa fa-spinner fa-pulse"
        });
        var form = $('#form_add');
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            dataType: "json",
            success: function(result) {
                message = result.messages;
                status = result.status;
                $('#modalUserAdd').modal('hide');
                $('input').val('');
                notifikasi(status, message);
                clear_form_elements('modal-body');
            }
        });

    }

    function clear_form_elements(class_name) {
        $("." + class_name).find(':input').each(function() {
            switch (this.type) {
                case 'password':
                case 'text':
                case 'textarea':
                case 'file':
                case 'select-one':
                case 'select-multiple':
                case 'date':
                case 'number':
                case 'tel':
                case 'email':
                    jQuery(this).val('');
                    break;
                case 'checkbox':
                case 'radio':
                    this.checked = false;
                    break;
            }
        });
    }

    function tambah() {
        $.LoadingOverlay("show", {
            image: "",
            fontawesome: "fa fa-spinner fa-pulse"
        });
        $('#modalUserAdd').modal('show');
        $.LoadingOverlay("hide");
    }

    function edit(id) {
        $.LoadingOverlay("show", {
            image: "",
            fontawesome: "fa fa-spinner fa-pulse"
        });
        $.ajax({
            url: "<?= base_url("tutorial/crud_edit/") ?>" + id,
            dataType: "html",
            success: function(result) {
                $.LoadingOverlay("hide");
                $('#modalUserUpdate').modal('show');
                $('#content_update').html(result);

            }
        });
    }

    function detail(id) {
        $.LoadingOverlay("show", {
            image: "",
            fontawesome: "fa fa-spinner fa-pulse"
        });
        $.ajax({
            url: "<?= base_url("tutorial/user_account_detail/") ?>" + id,
            dataType: "html",
            success: function(result) {
                $.LoadingOverlay("hide");
                $('#infouser').modal('show');
                $('#content_detail').html(result);

            }
        });
    }

    function updateData() {
        $.LoadingOverlay("show", {
            image: "",
            fontawesome: "fa fa-spinner fa-pulse"
        });
        var form = $('#form_update');
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            dataType: "json",
            success: function(result) {
                message = result.messages;
                status = result.status;
                $('#modalUserUpdate').modal('hide');
                notifikasi(status, message);
            }
        });
    }

    function hapus(id) {
        Swal.fire({
            title: 'Apakah anda Yakin ?',
            text: "Data yang dihapus tidak dapat dikembalikan !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus sekarang!',
            cancelButtonText: 'Batal hapus'
        }).then((result) => {
            if (result.value) {
                $.LoadingOverlay("show", {
                    image: "",
                    fontawesome: "fa fa-spinner fa-pulse"
                });
                $.post('<?= base_url('tutorial/crud_hapus') ?>', {
                    'id': id
                }, function(data, textStatus, xhr) {
                    $.LoadingOverlay("hide");
                    if (data.status = 1) {
                        iziToast.success({
                            title: 'Success!',
                            message: 'Data berhasil dihapus !',
                            position: 'topRight',
                            balloon: true,
                            transitionIn: 'fadeInLeft',
                            transitionOut: 'fadeOutRight'
                        });
                        table.ajax.reload();
                    } else {
                        iziToast.error({
                            title: 'Error!',
                            message: 'Data gagal dihapus',
                            position: 'topRight',
                            balloon: true,
                            transitionIn: 'fadeInLeft',
                            transitionOut: 'fadeOutRight'
                        });
                        table.ajax.reload();
                    }
                }, 'json');
            }
        })
    }


    function closes() {
        $('#modalUserAdd').modal('hide');
    }

    function closes_update() {
        $('#modalUserUpdate').modal('hide');
    }
</script>