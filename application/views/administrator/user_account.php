<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <!-- animate -->
        <div class="animate__animated animate__bounce animate__fast">
            <div class="section-header">
                <h1>User Account</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Setting</a></div>
                    <div class="breadcrumb-item">User Account</div>
                </div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Note</h2>
            <p class="section-lead text-dark">
                <i>" Dengan bersedakah tidak akan membuat kita miskin ! "</i>
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
                <h5 class="modal-title">Ubah Role User</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <form id="form_update" action="<?= base_url('user/user_account_update'); ?>" method="post">
                <div class="modal-body" id="content_update">
                    <!-- content user update -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal ubah -->
<!-- modal info -->
<div class="modal" id="infouser" role="dialog" data-backdrop="false" style="background: rgba(0,0,0,0.3);">
    <div class="modal-dialog modal-md">
        <div class="modal-content P-1">
            <div class="modal-header">
                <h5 class="modal-title">INFO USER</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <form id="form_detail" action="<?= base_url('user/user_account_update'); ?>" method="post">
                <div class="modal-body" id="content_detail">

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
            'url': '<?= base_url('user/user_account_fetch') ?>',
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
            Swal.fire('Sukses!', '<?= $this->session->flashdata('result')['msg'] ?>', 'success');
        <?php else : ?>
            Swal.fire('Maaf!', '<?= $this->session->flashdata('result')['msg'] ?>', 'error');
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
                position: 'topRight'
            });
        } else {
            iziToast.error({
                title: 'Error',
                message: message,
                position: 'topRight'
            });
        }
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

    function edit(id) {
        $.LoadingOverlay("show");
        $.ajax({
            url: "<?= base_url("user/user_account_edit/") ?>" + id,
            dataType: "html",
            success: function(result) {
                $.LoadingOverlay("hide");
                $('#modalUserUpdate').modal('show');
                $('#content_update').html(result);

            }
        });
    }

    function detail(id) {
        $.LoadingOverlay("show");
        $.ajax({
            url: "<?= base_url("user/user_account_detail/") ?>" + id,
            dataType: "html",
            success: function(result) {
                $.LoadingOverlay("hide");
                $('#infouser').modal('show');
                $('#content_detail').html(result);

            }
        });
    }

    function updateData() {
        $.LoadingOverlay("show");
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
        swal({
            title: 'Peringatan!',
            text: 'Data yang dihapus tidak bisa dikembalikan',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus',
        }).then(function() {
            $.LoadingOverlay("show");
            $.post('<?= base_url('administrator/banksoalcaseconference_hapus') ?>', {
                'id': id
            }, function(data, textStatus, xhr) {
                $.LoadingOverlay("hide");
                if (data.status = 1) {
                    iziToast.success({
                        title: 'Hello, world!',
                        message: 'This awesome plugin is made by iziToast',
                        position: 'topRight'
                    });
                    table.ajax.reload();
                } else {
                    iziToast.error({
                        title: 'Hello, world!',
                        message: 'This awesome plugin is made by iziToast',
                        position: 'topRight'
                    });
                    table.ajax.reload();
                }
            }, 'json');
        }, function(dismiss) {
            if (dismiss === 'cancel') {

            }
        });
    }

    function closes() {
        $('#modalSoal').modal('hide');
    }

    function closes_update() {
        $('#modalUserUpdate').modal('hide');
    }
</script>