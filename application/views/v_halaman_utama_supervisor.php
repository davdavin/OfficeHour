<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

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

                        <li class="nav-item menu-open">
                            <a href="<?php echo base_url() . 'Supervisor' ?>" class="nav-link">
                                <i class="nav-icon fas fa-clock"></i>
                                <p> Project Manage </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Account_Karyawan' ?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p> Akun </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Supervisor/daftar_karyawan' ?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p> Report </p>
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
                                <li class="breadcrumb-item active">Project Manage</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-white" style="border-radius: 15px;">
                                <div class="inner text-center">
                                    <h3>
                                        <?php
                                        echo $totalProject['totalProject'];
                                        ?>
                                    </h3>
                                    <h4>Project</h4>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->


                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-white" style="border-radius: 15px;">
                                <div class="inner text-center">
                                    <h3><?php echo $status_berjalan['totalStatus']; ?></h3>
                                    <h4>Sedang Berjalan</h4>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-white" style="border-radius: 15px;">
                                <div class="inner text-center">
                                    <h3><?php echo $status_selesai['totalStatus']; ?></h3>
                                    <h4>Selesai</h4>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->

                <div class="container-fluid">
                    <div class="row mb-2">

                        <div class="col-sm-6">
                            <div class="form-group">

                                <!--    masih belum bisa      <input type="text" id="text-search-project" class="form-control" placeholder="Cari Project"> -->
                            </div>
                        </div>
                    </div>

                    <div class="row" id="tampil">
                        <div class="card-body col-6" style="margin-left: auto; margin-right: auto">
                            <div class="small-box bg-white" style="border-radius: 15px;">
                                <div class="inner text-center">
                                    <h4 id="nama-project"><strong><?php //echo $list_project->nama_project 
                                                                    ?>Tidak ada</strong></h4>
                                    <h5><?php //echo $list_project->status_project 
                                        ?></h5>
                                    <a id="id-project"><button class=" btn btn-primary">Selebihnya</button></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row" id="list-project">
                        <?php foreach ($project as $list_project) { ?>
                            <div class="card-body col-6" style="margin-left: auto; margin-right: auto">
                                <div class="small-box bg-white" style="border-radius: 15px;">
                                    <div class="inner text-center">
                                        <h4><strong> <?php echo $list_project->nama_project ?></strong></h4>
                                        <h5><?php echo $list_project->status_project ?></h5>
                                        <a href="<?php echo base_url() . 'Supervisor/project_detail/' . $list_project->id_project ?>"><button class="btn btn-primary">Selebihnya</button></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
        </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>jquery-3.4.1.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>

    <script>
        $(document).ready(function() {
            $('#tampil').hide();
            $('#text-search-project').autocomplete({

                source: function(request, response) {

                    //fetch data
                    $.ajax({
                        url: '<?php echo base_url() . 'ProjectManage/search_project' ?>',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                            $('#list-project').hide();
                        }

                    });
                },
                select: function(event, ui) {
                    $('#tampil').show();
                    $('#text-search-project').val(ui.item.label);
                    $('#nama-project').html(ui.item.nama);

                    // var obj = JSON.parse(id);

                    var link = document.getElementById('id-project');

                    link.href = "<?php echo base_url() .  'ProjectManage/project_detail/' ?>";

                    //masih belum bisa
                    /*   var data = {
                         "link": "<?php echo base_url() .  'ProjectManage' ?>"
                       };

                       var obj = JSON.parse(data);


                       $('#id-project').href = obj.link; */

                    return false;
                }
            });
        });
    </script>

</body>

</html>