<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SS | Presensi Rapat</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('assets/template') ?>/plugins/fontawesome-free/css/all.min.css">

        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url('assets/template') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

        <!-- Canvas -->
        <link rel="stylesheet" href="<?php echo base_url('assets/template') ?>/plugins/jquery/jquery.signaturepad.css">

        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url('assets/template') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/template') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/template') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

        <!-- Toastr -->
        <link rel="stylesheet" href="<?php echo base_url('assets/template') ?>/plugins/toastr/toastr.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('assets/template') ?>/dist/css/adminlte.min.css">

        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <style>
            canvas{
                border: 1px solid #ccc;
                border-radius: 0.5rem;
                width: 100%;
            }
        </style>
    </head>
    <body class="layout-top-nav dark-mode text-sm">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
                <div class="container">

                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <a href="#" class="navbar-brand">
                            <img src="<?php echo base_url('assets/template/dist/img/insaba.png') ?>" alt="A" class="brand-image"style="margin: 30px 0 0 0 0;">
                            <!-- <span class="brand-text">SS</span> -->
                            <span class="brand-text font-light">Presensi Rapat</span>
                        </a>
                    </ul>

                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Login Button -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <button class="btn btn-primary" id="tombolLogin">
                                <i class="fas fa-user"></i>
                                Sign In
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h3>Presensi Rapat v1.0</h3>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Presensi</a></li>
                                    <li class="breadcrumb-item active">Input Presensi Rapat</li>
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
                                <p class="card-text">Silakan pilih rapat yang Anda ikuti :</p>
                                <select class="form-control select text-sm" id="jenis_rapat" name="jenis_rapat" required="" onchange="openForm()">
                                    <option value="0" selected="" disabled="">-- Pilih Rapat --</option>
                                    <?php
                                        foreach ($presensi as $row) :
                                            echo "<option value='$row->id'>$row->judulRapat | " . date('d F Y', strtotime($row->tanggal)) . " Pukul $row->waktu</option>";
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div id="divInput" class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Lengkapi data berikut ini</h3>
                            </div>
                            <form class="form-horizontal" id="formInput" role="form" action="#" method="post">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" required onkeypress="return isNumberKey(event)">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="no_nip" name="no_nip" onchange="onNIPChecked(this)">
                                                <label for="no_nip" class="form-check-label"><i>Saya tidak memiliki NIP</i></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="unit" name="unit" placeholder="Unit" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="intansi" class="col-sm-2 col-form-label">Instansi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputTtd" class="col-sm-2 col-form-label">Tanda Tangan</label>
                                        <div class="col-sm-10">
                                            <canvas id="signature-pad" class="signature-pad" style="max-width: 300px;"></canvas>
                                            <input type="hidden" name="output" class="output" id="output">
                                            <li><a href="#clear" class="link" id="clear">Clear</a></li>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" id="id_rapat" name="id_rapat">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <button type="reset" class="btn btn-danger" onclick="closeForm()">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Footer -->
            <footer class="main-footer">
                <div class="container">
                    <div class="float-right d-none d-sm-block">
                        <b>Version</b> 1.0
                    </div>
                    <strong>Copyright &copy; 2023 <a href="#">Salema.io</a>.</strong> All rights
                    reserved.
                </div>
            </footer>
        </div>
        <div class="viewmodal" style="display: none;">

        </div>

        <!-- jQuery -->
        <script src="<?php echo base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- Canvas -->
        <script src="<?php echo base_url('assets/template') ?>/dist/js/signature_pad.min.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/popper/umd/popper.min.js"></script>
        
        <!-- jsGrid -->
        <script src="<?php echo base_url('assets/template') ?>/plugins/jsgrid/demos/db.js"></script>
        <script src="<?php echo base_url('assets/template') ?>/plugins/jsgrid/jsgrid.min.js"></script>

        <!-- SweetAlert2 -->
        <script src="<?php echo base_url('assets/template') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

        <!-- Toastr -->
        <script src="<?php echo base_url('assets/template') ?>/plugins/toastr/toastr.min.js"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/template') ?>/dist/js/adminlte.min.js"></script>

        <!-- JQuery -->
        <script type="text/javascript">
            $(document).ready(function() {
                var list = <?php echo json_encode($presensi); ?>;
                if(list.length == 0){
                    Swal.fire('Information','Saat ini tidak ada rapat yang tersedia', 'info');
                }

                $('#divInput').hide();
                document.addEventListener('DOMContentLoaded', function () {
                    resizeCanvas();
                })
        
                $('#tombolLogin').click(function(e) {
                    $.ajax({
                        url: "<?php echo base_url('presensi/formLogin') ?>",
                        dataType: "json",
                        success: function(response) {
                            if (response.sukses) {
                                $('.viewmodal').html(response.sukses).show();
                                $('#modalFormLogin').on('shown.bs.modal', function(e) {
                                    $('#username').focus();
                                })
                                $('#modalFormLogin').modal('show');
                            }
                        }
                    });
                });

                function isNumberKey(evt){
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                    return true;
                }
            });

            function openForm() {
                $('#divInput').show();
            }

            function onNIPChecked(obj){
                if($(obj).is(":checked")){
                document.getElementById("nip").readOnly = true;
                document.getElementById("nip").required = false;
                document.getElementById("nip").value = "-";
                document.getElementById("nama").focus();
                } else {
                document.getElementById("nip").readOnly = false;
                document.getElementById("nip").required = true;
                document.getElementById("nip").value = "";
                document.getElementById("nip").focus(); 
                }
            }

            function closeForm(){
                $("#nip").val('');
                document.getElementById("nip").readOnly = false;
                document.getElementById("nip").required = true;
                $("#jabatan").val('');
                $("#nama").val('');
                $("#email").val('');
                $("#unit").val('');
                $("#instansi").val('');
                $("#jenis_rapat").val(0).change();
                $("#no_nip").prop("checked", false);
                $('#divInput').hide();
                signaturePad.clear();
            } 

            //menyesuaikan tanda tangan dengan ukuran canvas
            function resizeCanvas() {
                var ratio = Math.max(window.devicePixelRatio || 1, 1);
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
            }
        
            var canvas = document.getElementById('signature-pad');
        
            //warna dasar signaturepad
            var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)'
            });

            document.getElementById('clear').addEventListener('click', function () {
                signaturePad.clear();
            });

            $("#formInput").on("submit", function (event) {
                event.preventDefault();

                var signature = signaturePad.toDataURL("image/jpeg").split(';base64,')[1];
                var email = $('#email').val();
                var nama = $('#nama').val();
                var nip = $('#nip').val();
                var jabatan = $('#jabatan').val();
                var unit = $('#unit').val();
                var instansi = $('#instansi').val();
                var id_rapat = $('#jenis_rapat').val();

                if(signaturePad.isEmpty()){
                    toastr.warning('Mohon isi tanda tangan');
                    return;
                }

                if(nip.length < 6){
                    if(nip != '-') {
                        toastr.warning('NIP tidak valid!');
                        document.getElementById("nip").focus(); 
                        return;
                    }
                }

                if(validateEmail(email)){
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('presensi/save_presensi') ?>",
                        data: {
                            nama: nama,
                            signature: signature,
                            id_rapat: id_rapat,
                            nip: nip,
                            jabatan: jabatan,
                            unit: unit,
                            email: email,
                            instansi: instansi
                        },
                        dataType: "json",
                        success: function (response) {
                            if(response.error){
                                toastr.warning('NIP sudah terdaftar pada rapat ini');
                            }
                            if(response.sukses){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Data has been saved',
                                    text: 'Thanks for your response',
                                    showCancelButton: false,
                                    showConfirmButton: true,
                                })
                                // location.reload()
                                closeForm();
                            }
                        },
                        error: function (xhr, status, e) {
                            toastr.warning('Input Data Failed! ' + status + e);
                        }
                    });
                } else {
                    toastr.error('Email not valid, Please check again . .');
                    document.getElementById("email").focus(); 
                }
            });

            function validateEmail(email) {
                const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
        </script>
    </body>
</html>