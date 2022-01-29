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
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="">
                            <div class="form-group">
                                <label for="nama"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama" id="name" placeholder="Nama" required />
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="Username" required />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" required />
                            </div>
                            <div class="form-group">
                                <label for="jumlah"><i class="zmdi zmdi-email"></i></label>
                                <input type="number" name="jumlah" id="jumlah" placeholder="Jumlah Karyawan" required />
                            </div>
                            <div class="form-group">
                                <label for="paket"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="paket" id="paket" placeholder="paket" required />
                            </div>
                            <div class="form-group">
                                <label for="harga"><i class="zmdi zmdi-email"></i></label>
                                <input type="number" name="harga" id="harga" placeholder="harga" readonly />
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