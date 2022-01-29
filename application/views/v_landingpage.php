<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OfficeHour</title>
    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/dist/img/logo.png" rel="icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landingpage/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landingpage/css/responsive.css">

    <style>
        #pricing .pricing-table .table-content p {
            list-style: none;
            text-align: center;
            padding-bottom: 1rem;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>assets/landingpage/img/logo.png" alt="Apper"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">about</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features">features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#subscribe">subscribe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing">pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">contact</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero section -->
    <section id="hero">

        <div class="container">

            <div class="row main-hero-content">

                <div class="col-md-6">
                    <h1>OFFICE HOUR TIME TRACKING</h1>
                    <p>Office Hour akan membantu anda dan perusahaan anda dalam melakukan track waktu kerja di dalam project anda.
                        Melalui Office Hour anda dapat mengetahhui apa yang dikerjakan pata karyawan dan bagaimana karyawan mengalokasikan waktunya
                        di dalam project.</p>
                    <div class="hero-buttons">
                        <a href="<?php echo base_url() . 'Login' ?>" class="btn btn-outline-primary btn-white">Log In</a>
                        <a href="<?php echo base_url() . 'SignUp' ?>" class="btn btn-outline-primary btn-white">Sign Up</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image-box">
                        <img src="<?php echo base_url(); ?>assets/landingpage/img/device.png" class="img-fluid" alt="">
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- About section -->
    <section id="about">

        <div class="container">

            <div class="row section-title justify-content-center">
                <h2 class="section-title-heading">Why Choose Office Hour</h2>
            </div>

            <div class="row justify-content-center text-center mt-5">

                <div class="col-md-4">
                    <i class="fas fa-cogs fa-3x mb-2"></i>
                    <h3>Mudah Dilakukan</h3>
                    <p>OfficeHour dapat diakses melalui website dengan tampilan yang mudah dimengerti dan dipahami,
                        sehingga mudah digunakan oleh Karyawan maupun Client
                    </p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-bell fa-3x mb-2"></i>
                    <h3>Transparasi kepada Client</h3>
                    <p>Melalui Office Hour akan ada transparasi antara perusahaan dan client. Cliet dapat memantau sejauh mana yang dikerjakan
                        oleh para karyawan dalam project yang ia percayakan kepada perusahaan dengan begitu akan menumbuhkan kepercayaan antara perusahaan dengan para client.
                    </p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-power-off fa-3x mb-2"></i>
                    <h3>Memantau alokasi waktu</h3>
                    <p>Melalui Office Hour perusahaan dapat memantau dengan baik bagaimana para kariyawan mengalokasikan waktu yang mereka punya serta seberapa lama mereka dapat menyelesaikan
                        task yang diberikan.
                    </p>
                </div>

            </div>

        </div>

    </section>

    <!-- Feature section -->
    <section id="features">

        <div class="container">

            <div class="row section-title justify-content-center">
                <h2 class="section-title-heading">app features</h2>
            </div>

            <div class="row mt-5">

                <div class="col-md-4">
                    <div class="feature-block">
                        <img src="<?php echo base_url(); ?>assets/landingpage/img/featureicon1.png" alt="">
                        <h3 class="text-center">mobile friendly</h3>
                        <p>Office Hour dapet diakses melalui website dimana karyawan dapat melakukan tracking time dari device apapun
                            baik laptop, handphone atau tablet.</p>
                    </div>
                    <div class="feature-block mt-5">
                        <img src="<?php echo base_url(); ?>assets/landingpage/img/featureicon2.png" alt="">
                        <h3 class="text-center">Time Tracker</h3>
                        <p>Membantu Perusahaan dalam memantau project yang sedang dikerjakan. </p>
                    </div>
                </div>
                <div class="col-md-4 device">
                    <img src="<?php echo base_url(); ?>assets/landingpage/img/feature-device.png" class="img-fluid" alt="">
                </div>
                <div class="col-md-4">
                    <div class="feature-block">
                        <img src="<?php echo base_url(); ?>assets/landingpage/img/featureicon3.png" alt="">
                        <h3 class="text-center">Project Manage</h3>
                        <p>Mengatur segalanya dalam satu workspace untuk planning, tracking dan delivering hasil kerja dari team dengan mudah</p>
                    </div>
                    <div class="feature-block mt-5">
                        <img src="<?php echo base_url(); ?>assets/landingpage/img/featureicon4.png" alt="">
                        <h3 class="text-center">Report</h3>
                        <p>Menyediakan laporan terkini mengenai apa yang sudah dikerjakan karyawan dan bagaimana karyawan mengalokasikan waktunya.</p>
                    </div>
                </div>

            </div>


        </div>

    </section>

    <!-- Download section -->
    <section id="download">

        <div class="container">

            <div class="row download-title justify-content-center">
                <h2>Pantau projectmu dengan bergabung bersama kami</h2>
            </div>

        </div>

    </section>



    <section id="pricing">

        <div class="container">

            <div class="row section-title justify-content-center">
                <h2 class="section-title-heading">Harga Paket</h2>
            </div>

            <div class="row justify-content-center">
                <?php foreach ($paket as $list_paket) { ?>
                    <div class="col-md pricing-table">

                        <div class="table-header text-center">
                            <h4><?php echo $list_paket->nama_paket ?></h4>
                            <p><?php echo $list_paket->harga ?></p>
                        </div>

                        <div class="table-content">
                            <p><?php echo 'Maksimal ' . $list_paket->maks_orang . ' orang' ?> </p>
                            <p><?php echo $list_paket->deskripsi ?></p>
                        </div>

                        <div class="table-footer text-center">
                            <a href="<?php echo base_url() . 'Subscribe/form_subscribe/' . $list_paket->id_paket ?>">subscribe now</a>
                        </div>

                    </div>
                <?php } ?>
            </div>

        </div>

    </section>

    <!-- Contact section -->
    <section id="contact">

        <div class="container">

            <div class="row section-title justify-content-center">
                <h2 class="section-title-heading">contact</h2>
            </div>

            <div class="row mt-5">

                <div class="col-md-4 posisi">
                    <div class="contact-details">
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-mobile-alt"></i></span>08123456789</li>
                            <li><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span>Jl. M. H. Thamrin Boulevard 1100 Lippo Vilage Gedung D, Klp. Dua, Kec. Klp. Dua, Kota Tangerang, Banten 15811</li>
                            <li><span class="fa-li"><i class="fas fa-envelope"></i></span>Office@hour.com</li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>

    </section>

    <!-- Footer section -->
    <footer id="footer">

        <div class="container">

            <div class="row d-flex flex-column align-items-center">

                <div class="footer-logo">
                    <img src="<?php echo base_url(); ?>assets/landingpage/img/logo.png" alt="">
                </div>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="copyright text-center">
                    <p></p>
                </div>

            </div>

        </div>

    </footer>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/landingpage/js/custom.js"></script>
</body>

</html>