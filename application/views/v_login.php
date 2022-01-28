<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/dist/img/logo.png" rel="icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/loginSignup/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/loginSignup/style.css">
</head>

<body style="background-image: url('<?php echo base_url(); ?>assets/loginSignup/konten.png'), url('<?php echo base_url(); ?>assets/loginSignup/background.png');">
    <div class="isi">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="<?php echo base_url(); ?>assets/loginSignup/loginimage.png" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log In</h2>
                        <form action="<?php echo base_url() . 'Login/verifikasi' ?>" method="post" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username" required />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" id="signin" class="form-submit" value="Log in" />
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