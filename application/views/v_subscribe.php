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
</head>

<body style="background-image: url('<?php echo base_url(); ?>assets/loginSignup/konten.png'), url('<?php echo base_url(); ?>assets/loginSignup/background.png');">
    <div class="isi">
        <section class="signup">
            <div class="container-signup">
                <div class="signup-content">
                    <div class="signup-image">
                        <figure><img src="<?php echo base_url(); ?>assets/loginSignup/signupimage.png" alt="sing up image"></figure>
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
                                <input type="password" name="confirm_password" id="passconf" placeholder="Re-type Password" />
                            </div>
                            <?php echo form_error('confirm_password'); ?>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>" />
                            </div>
                            <?php echo form_error('email'); ?>
                            <div class="form-group">
                                <label for="jumlah"><i class="zmdi zmdi-account"></i></label>
                                <input type="number" name="jumlah" id="jumlah" placeholder="Jumlah Karyawan" value="<?= set_value('jumlah'); ?>" />
                            </div>
                            <?php echo form_error('jumlah'); ?>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="<?php echo base_url(); ?>assets/loginSignup/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/loginSignup/js/main.js"></script>
</body>

</html>