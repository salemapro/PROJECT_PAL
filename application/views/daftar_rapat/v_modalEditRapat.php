    <div class="modal fade" id="modalEditRapat" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Rapat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('presensi/updateDataRapat', ['class' => 'formUpdateRapat']) ?>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="form-group row">
                        <label for="inputJudul" class="col-sm-3 col-form-label">Judul Rapat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputJudul" name="judul" value="<?php echo $judul ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputTempat" class="col-sm-3 col-form-label">Tempat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputTempat" name="tempat" value="<?php echo $tempat ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputTanggal" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input" id="inputTanggal" name="tanggal" value="<?php echo  $tanggal ?>" data-target="#reservationdate"/>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="inputWaktu" class="col-sm-3 col-form-label">Waktu</label>
                        <div class="col-sm-9">
                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                                <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input" id="inputWaktu" name="waktu" value="<?php echo $waktu ?>" data-target="#timepicker"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputStatus" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control select text-sm" id="inputStatus" name="status" required="">
                                <option value="1" <?php if($status == '1') echo 'selected'; ?>>[1] Aktif </option>
                                <option value="0" <?php if($status == '0') echo 'selected'; ?>> [0] Non-Aktif </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Page Script -->
    <script type="text/javascript">
        $('#reservationdate').datetimepicker({ 
            format: 'YYYY-MM-DD' 
        });

        $('#timepicker').datetimepicker({
            format: 'LT'
        })
     </script>


    <script>
        $(document).ready(function(){
            $('.formUpdateRapat').submit(function(e){
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response){
                        if(response.error){
                            // $('.pesan').html(response.error).show();
                            toastr.error(response.error);
                        }
                        if (response.sukses){ 
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses,
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                            // $('#modalEditRapat').modal('hide');
                            setTimeout(function(){
                                location.reload();
                            }, 1200);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
        });
    </script>