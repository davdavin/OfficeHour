<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subscribe</title>

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/dist/img/logo.png" rel="icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/loginSignup/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/loginSignup/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
</head>

<body style="background-image: url('<?php echo base_url(); ?>assets/loginSignup/konten.png'), url('<?php echo base_url(); ?>assets/loginSignup/background.png');">
    <div class="isi">
        <section class="signup">
            <div class="container-signup">
                <div class="signup-content">
                    <div class="signup-image">
                        <figure><img src="<?php echo base_url(); ?>assets/loginSignup/signupimage.png" alt="sing up image"></figure>
                        <a type="button" class="informasi-pembayaran" data-toggle="modal" data-target="#modal-md">Informasi Pembayaran Paket</a>
                    </div>
                    <div class="signup-form">
                        <h2 class="form-title">Form</h2>
                        <form method="POST" class="register-form" id="register-form" action="<?php echo base_url() . 'Subscribe/proses_subscribe' ?>">
                            <?php foreach ($paket as $paket_pilihan) { ?>
                                <input type="hidden" name="id_paket" value="<?= $paket_pilihan->id_paket; ?>">
                                <div class="form-group">
                                    <label for="paket"><i class="zmdi zmdi-storage"></i></label>
                                    <input type="text" name="paket" id="paket" value="<?= $paket_pilihan->nama_paket; ?>" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="harga"><i class="zmdi zmdi-receipt"></i></label>
                                    <input type="text" name="harga" id="harga" value="<?= 'Rp. ' . number_format($paket_pilihan->harga, '0', ',', '.'); ?>" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="maks_orang"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="maks_orang" id="maks_orang" value="<?= 'Maksimal ' .  $paket_pilihan->maks_orang . ' orang'; ?>" readonly />
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label for="nama"><i class="zmdi zmdi-local-store material-icons-name"></i></label>
                                <input type="text" name="nama" id="name" placeholder="Nama Perusahaan" value="<?= set_value('nama'); ?>" />
                            </div>
                            <?php echo form_error('nama'); ?>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username" value="<?= set_value('username'); ?>" />
                            </div>
                            <?php echo form_error('username'); ?>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" value="<?= set_value('password'); ?>" />
                            </div>
                            <?php echo form_error('password'); ?>
                            <div class="form-group">
                                <label for="passconf"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="confirm_password" id="passconf" placeholder="Ketik Ulang Password" />
                            </div>
                            <?php echo form_error('confirm_password'); ?>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>" />
                            </div>
                            <?php echo form_error('email'); ?>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="modal-md">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Informasi Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-color">
                        <div class="info-total-harga">
                            <?php echo 'Total harga Rp. ' . number_format($paket_pilihan->harga, '0', ',', '.'); ?>
                        </div>
                        <br>
                        <div class="info-nomor">
                            Pembayaran melalui Virtual Account <br> NO VA 12102001081212
                        </div>
                        <br>
                        <div class="info-proses">
                            Kami akan validasi pembayaran anda dalam waktu 24 jam
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/loginSignup/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/loginSignup/js/main.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
</body>

</html>