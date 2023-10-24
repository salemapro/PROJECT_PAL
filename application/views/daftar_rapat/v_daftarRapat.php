        <div class="wrapper">
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <!-- <h3>Daftar Rapat</h3> -->
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Daftar Rapat</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content">
                    <div class="container">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Rapat</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <button class="btn btn-sm btn-primary" id="tambahRapat"> <i class="fa fa-plus"></i> New Entry</button>
                                </div>
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead align="center">
                                        <tr>
                                            <th>ID Rapat</th>
                                            <th>Judul</th>
                                            <th>Tempat</th>
                                            <th>Tanggal dan Waktu</th>
                                            <th>Status</th>
                                            <th class="notexport">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($presensi as $row) {
                                            $status = ($row->status == 1) ? "checked" : "unchecked";
                                        ?>
                                            <tr>
                                                <td align="center"><?php echo $row->id ?></td>
                                                <td>
                                                    <b><?php echo $row->judulRapat ?></b><br>
                                                </td>
                                                <td align="center"><?php echo $row->tempat ?></td>
                                                <td align="center"><?php echo date('d/m/Y', strtotime($row->tanggal)), " ",  date('h:i A', strtotime($row->waktu)) ?></td>
                                                <td class="col-md-0" align="center">
                                                    <input type="checkbox" name="my-checkbox" data-bootstrap-switch data-off-color="danger" data-on-color="success" <?php echo $status ?> onchange="getStatusChanged(this, <?php echo $row->id; ?>);">
                                                </td>
                                                <td nowrap align="center">
                                                    <button title="Update" class="btn btn-sm btn-success" onclick="getRapat(<?php echo $row->id; ?>);">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    &nbsp;
                                                    <button title="Delete" onclick="deleteConfirm(<?php echo $row->id; ?>);" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="container">
                    <div class="float-right d-none d-sm-block">
                        <b>Version</b> 1.0
                    </div>
                    <strong>Copyright &copy; 2023 <a href="#">Salema.io</a>.</strong> All rights
                    reserved.
                </div>
            </footer>
            <div class="viewmodal" style="display: none;">

            </div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap 4 -->
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- SweetAlert2 -->
        <script src="<?php echo base_url('assets/template') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

        <!-- InputMask -->
        <script src="<?php echo base_url('assets/template') ?>/plugins/moment/moment.min.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/inputmask/jquery.inputmask.min.js"></script>

        <!-- DataTables -->
        <script src="<?php echo base_url('assets/template') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

        <!-- Bootstrap Switch -->
        <script src="<?php echo base_url('assets/template') ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

        <!-- AdminLTE App -->
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/dist/js/adminlte.min.js"></script>

        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?php echo base_url('assets/template') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Toastr -->
        <script type="text/javascript" src="<?php echo base_url('assets/template/plugins/toastr/toastr.min.js'); ?>"></script>
        
        <!-- Page Script -->
        <script type="text/javascript">
            $(function() {
                // $("#example1").DataTable({
                //     "ordering": false,
                //     "responsive": true, "lengthChange": false, "autoWidth": false,
                //     "buttons": ["excel", "pdf", "print"]
                // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

                $("#example1").DataTable({
                    "ordering": false,
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": [
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        }
                    ]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
            
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state');
            });
        </script>

        <!-- JQuery -->
        <script type="text/javascript">
            $(document).ready(function() {

                $('#tambahRapat').click(function(e) {
                    $.ajax({
                        url: "<?php echo base_url('presensi/formTambahRapat') ?>",
                        dataType: "json",
                        success: function(response) {
                            if (response.sukses) {
                                $('.viewmodal').html(response.sukses).show();
                                $('#modalTambahRapat').on('shown.bs.modal', function(e) {
                                    $('#inputJudul').focus();
                                })
                                $('#modalTambahRapat').modal('show');
                            }
                        }
                    });
                });
            });
            
            function getRapat(id){
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('presensi/formEditRapat') ?>",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            $('.viewmodal').html(response.sukses).show();
                            $('#modalEditRapat').on('shown.bs.modal', function(e) {
                                $('#inputJudul').focus();
                            })
                            $('#modalEditRapat').modal('show');
                        }
                    }
                });
            }

            function getStatusChanged(obj, id) {
                var status = 0;
                if ($(obj).is(":checked")) {
                    status = 1;
                }
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('presensi/change_status_rapat') ?>",
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(result) {
                        if (status === 1) {
                            toastr.success('Rapat berhasil di aktifkan');
                        } else {
                            toastr.success('Rapat berhasil di non-aktifkan');
                        }
                    },
                    error: function(xhr, status, e) {
                        toastr.warning('Change Data Failed! ' + status + e);
                    }
                });
            }

            function deleteConfirm(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: `You won't be able to revert this`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.value){
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url('presensi/deleteRapat') ?>",
                            data: {
                                id: id,
                            },
                            dataType: "json",
                            success: function(response){
                                if(response.sukses){
                                    Swal.fire ({
                                        icon: 'success',
                                        title: 'konfirmasi',
                                        text: response.sukses,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    }, 1000);
                                }
                            }
                        });
                    }
                })
            }
        </script>
    </body>
</html>