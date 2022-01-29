<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUp - Karyawan</title>

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
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="">
                            <div class="form-group">
                                <label for="kode"><i class="zmdi zmdi-local-store material-icons-name"> </i> </label>
                                <input type="text" name="kode" id="kode" placeholder="ID Perusahaan" required />
                            </div>
                            <div class="form-group">
                                <label for="nama"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama" id="name" placeholder="Nama" required />
                            </div>
                            <div class="form-group">
                                <label for="alamat"><i class="zmdi zmdi-home"></i></label>
                                <input type="text" name="alamat" id="alamat" placeholder="Alamat Lengkap" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" required />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <label for="posisi"><i class="zmdi zmdi-view-agenda"></i></label>
                                <input type="text" name="posisi" id="posisi" placeholder="Posisi anda" required />
                            </div>
                            <div class="form-group">
                                <label for="foto"><i class="zmdi zmdi-image"></i></label>
                                <input type="file" name="foto" id="foto" required />
                            </div>
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