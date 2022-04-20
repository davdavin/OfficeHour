<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Klien</title>

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/dist/img/logo.png" rel="icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/loginSignup/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/loginSignup/style.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>

<body style="background-image: url('<?php echo base_url(); ?>assets/loginSignup/konten.png'), url('<?php echo base_url(); ?>assets/loginSignup/background.png');">
    <div class="isi">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <?php $this->load->view('message.php'); ?>
                    <div class="signin-image">
                        <figure><img src="<?php echo base_url(); ?>assets/loginSignup/loginimage.png" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log In</h2>
                        <form action="<?php echo base_url() . 'Login/verifikasi_klien' ?>" method="post" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="email" required />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                        <a class="text-blue" type="button" data-toggle="modal" data-target="#modalForgot">
                                Forgot Password
                            </a>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="modalForgot">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Masukan Email</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'login/forgot_password_client' ?>" method="post" class="form-forget">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="email anda">
                                <p class="p-2 error_email"></p>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-sm simpan">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/loginSignup/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/loginSignup/js/main.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
     <!-- jQuery -->
     <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script>
        $(function() {
            const sukses = $('.sukses').data('flashdata');
            if (sukses) {
                Swal.fire({
                    title: 'Info',
                    text: sukses,
                    icon: 'success'
                });
            }

            const gagal = $('.gagal').data('flashdata');
            if (gagal) {
                Swal.fire({
                    title: 'Gagal',
                    text: gagal,
                    icon: 'error'
                });
            }

            $('.form-forget').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: $(this).serialize(),
                    beforeSend: function() {
                        $('.simpan').html('<i class="fa fa-spin fa-spinner"></i>');
                        $('.simpan').attr('disabled', 'disabled');

                    },
                    complete: function() {
                        $('.simpan').removeAttr('disabled');
                        $('.simpan').html('Submit');
                    },
                    success: function(hasil) {
                        var $obj = $.parseJSON(hasil);
                        if ($obj.sukses == false) {
                            if ($obj.error_email) {
                                $('.error_email').html($obj.error_email);
                                $('.error_email').css("color", "red");
                            } else {
                                $('.error_email').hide();
                            }

                        } else {
                            $('.error_email').hide();
                            Swal.fire({
                                title: 'Sukses',
                                text: $obj.sukses,
                                icon: 'success',
                            }).then((confirmed) => {
                                window.location.reload();
                            });
                        }
                    }
                });

            });
        });

    </script>
</body>

</html>