<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OfficeHour - Karyawan</title>

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/dist/img/logo.png" rel="icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url(); ?>assets/dist/img/logo.png" alt="Logo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a class="brand-link">
                <img src="<?php echo base_url(); ?>assets/dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">OfficeHour</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url(); ?>assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block text-center"><?php echo $this->session->userdata('nama_karyawan'); ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'TimeTracker' ?>" class="nav-link">
                                <i class="nav-icon fas fa-clock"></i>
                                <p> Time Tracker </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="<?php echo base_url() . 'Account_Karyawan' ?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p> Akun </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'ProjectManage' ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p> Project Manage </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Login/logout_karyawan' ?>" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p> Keluar </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>

            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Akun</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php $this->load->view('message.php'); ?>
                    <div class="card card-primary">
                        <div class="card-body box-profile">

                            <?php foreach ($profil_karyawan as $detail) { ?>
                                <h1 class="profile-username text-center">Profile</h1>
                                <p class="text-muted text-center"> <?php echo $detail->posisi_karyawan; ?></p>

                                <form class="form-update" action="<?php echo base_url() . 'Account_Karyawan/update_profile' ?>" method="POST">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>ID</label>
                                                <input type="text" class="form-control" name="id_karyawan" value="<?= $detail->id_karyawan ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control bg-input" name="nama_karyawan" value="<?= $detail->nama_karyawan ?>">
                                                <p class="p-2 is-invalid error_nama" style="display: none"></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control bg-input" name="email_karyawan" value=" <?= $detail->email_karyawan ?>">
                                                <p class="p-2 is-invalid error_email" style="display: none"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" id="tombolUpdate" class="btn btn-primary">Ubah</button><br><br>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <button data-toggle="modal" data-target="#modal-lg" class="btn btn-primary">Ganti Password</button>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ganti Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="<?php echo base_url() . 'Account_Karyawan/update_password' ?>" method="post" class="form-submit">
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input type="password" class="form-control bg-input" name="currentpass">
                                <!-- INFO ERROR -->
                                <div class="p-2 is-invalid error_currentpass" style="display: none">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" class="form-control bg-input" name="newpass">
                                <!-- INFO ERROR -->
                                <div class="p-2 is-invalid error_newpass" style="display: none">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ketik Ulang Password Baru</label>
                                <input type="password" class="form-control bg-input" name="confirmpass">
                                <!-- INFO ERROR -->
                                <div class="p-2 is-invalid error_retype" style="display: none">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-block btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function() {
            const sukses = $('.sukses').data('flashdata');
            if (sukses) {
                Swal.fire({
                    title: 'Sukses',
                    text: sukses,
                    icon: 'success'
                });
            }

            $('.form-update').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: 'Update Data',
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'cancel',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Update'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: $(this).attr('action'),
                            type: "POST",
                            dataType: "JSON",
                            data: $(this).serialize(),
                            success: function(respon) {
                                if (respon.sukses == false) {
                                    if (respon.error_nama) {
                                        $('.error_nama').show();
                                        $('.error_nama').html(respon.error_nama);
                                        $('.error_nama').css("color", "red");
                                    } else {
                                        $('.error_nama').hide();
                                    }
                                    if (respon.error_alamat) {
                                        $('.error_alamat').show();
                                        $('.error_alamat').html(respon.error_alamat);
                                        $('.error_alamat').css("color", "red");
                                    } else {
                                        $('.error_alamat').hide();
                                    }
                                    if (respon.error_email) {
                                        $('.error_email').show();
                                        $('.error_email').html(respon.error_email);
                                        $('.error_email').css("color", "red");
                                    } else {
                                        $('.error_email').hide();
                                    }

                                } else {
                                    Swal.fire({
                                        title: 'Sukses',
                                        text: respon.sukses,
                                        icon: 'success',
                                    }).then((confirmed) => {
                                        window.location.reload();
                                    });
                                }
                            }
                        });
                    }
                });

            });


            $('.form-submit').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    dataType: "JSON",
                    data: $(this).serialize(),
                    success: function(respon) {
                        //var obj = $.parseJSON(respon);
                        if (respon.sukses == false) {
                            if (respon.error_currentpass) {
                                $('.error_currentpass').show();
                                $('.error_currentpass').html(respon.error_currentpass);
                                $('.error_currentpass').css("color", "red");
                            } else {
                                $('.error_currentpass').hide();
                            }
                            if (respon.error_newpass) {
                                $('.error_newpass').show();
                                $('.error_newpass').html(respon.error_newpass);
                                $('.error_newpass').css("color", "red");
                            } else {
                                $('.error_newpass').hide();
                            }
                            if (respon.error_retype) {
                                $('.error_retype').show();
                                $('.error_retype').html(respon.error_retype);
                                $('.error_retype').css("color", "red");
                            } else {
                                $('.error_retype').hide();
                            }

                        } else {
                            Swal.fire({
                                title: 'Sukses',
                                text: respon.sukses,
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