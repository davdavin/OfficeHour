<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi</title>

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/dist/img/logo.png" rel="icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/loginSignup/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/loginSignup/style.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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
                        <h2 class="form-title">Sign Up</h2>
                        <form action="<?php echo base_url() . 'Verifikasi/proses_verifikasi_klien' ?>" method="post" class="register-form" id="login-form">
                            <input type="hidden" name="id_klien" value="<?= $klien['id_client'] ?>" readonly>
                            <input type="hidden" name="token" value="<?= $id ?>" readonly>
                            <?php echo 'Email yang digunakan ' . $klien['email_client']; ?><br><br>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama_klien" value="<?= $klien['nama_client'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" />
                            </div>
                            <?php echo form_error('password'); ?>
                            <div class="form-group">
                                <label for="passconf"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="confirm_password" id="passconf" placeholder="Ketik Ulang Password" />
                            </div>
                            <?php echo form_error('confirm_password'); ?>
                            <div class="form-group form-button">
                                <input type="submit" id="signin" class="form-submit" value="Submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="<?php echo base_url(); ?>assets/loginSignup/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/loginSignup/js/main.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

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
        });
    </script>
</body>

</html>