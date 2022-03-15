<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>

    <!-- Favicons -->
    <link href="assets/dist/img/logo.png" rel="icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/loginSignup/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/loginSignup/style.css">
    <style>
        .block {
            display: block;
            width: 100%;
            border: none;
            color: white;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;

        }
    </style>
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
                        <a href="<?php echo base_url() . 'Login/login_perusahaan' ?>" style="text-decoration: none;"><button type="button" class="block form-submit">Perusahaan</button></a><br>

                        <a href="<?php echo base_url() . 'Login/login_klien' ?>" style="text-decoration: none;"><button type="button" class="block form-submit">Klien</button></a><br>

                        <a href="<?php echo base_url() . 'Login/login_karyawan' ?>" style="text-decoration: none;"><button type="button" class="block form-submit">Karyawan</button></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="<?php echo base_url(); ?>assets/loginSignup/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/loginSignup/js/main.js"></script>
</body>

</html>