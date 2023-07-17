    <div class="modal fade" id="modalFormLogin" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 350px;">
            <div class="modal-content">
                <div class="card-body login-card-body">
                    <center>
                        <h4><b>Login as Administrator</b></h4>
                    </center>
                    <br>
                    <?php echo form_open('login/cek_login', ['class' => 'formLogin']) ?>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <div class="input-group mb-3">
                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <div class="input-group mb-3">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <button type="reset" class="btn btn-danger btn-block" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-login btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    <!-- </form> -->
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.formLogin').submit(function(e){
                // var username = $("#username").val();
                // var password = $("#password").val();
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response){
                        if (response.sukses){
                            Swal.fire({
                                icon: 'success',
                                title: 'Login Berhasil',
                                text: response.sukses,
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: '1000'
                            })
                            .then (function(){
                                window.location.href = "<?php echo base_url('presensi/daftarRapat') ?>";
                            });
                        } 
                        if (response.error){
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.error
                            });
                        }
                    },
                    error:function(response){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops',
                            text: 'server error!'
                        });

                        console.log(response);
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
        });
    </script>