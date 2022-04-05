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

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
    <style>
        .chartMenu {
            width: 100vw;
            height: 40px;
            background: #1A1A1A;
            color: rgba(255, 26, 104, 1);
        }

        .chartMenu p {
            padding: 10px;
            font-size: 20px;
        }

        .chartCard {
            /* width: 40vw; */
            /* height: calc(40vh - 40px); */
            /* background: rgba(255, 26, 104, 0.2); */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chartBox {
            width: 700px;
            padding: 20px;
            border-radius: 20px;
            border: solid 3px rgba(1, 1, 1, 0);
            background: white;
        }
    </style>
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
                        <a href="#" class="d-block"><?php echo $this->session->userdata('nama_karyawan') ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
                                <p> Laporan </p>
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
                        <div class="col-sm-6">
                            <h1>Project Manage</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Project Manage</li>
                                <li class="breadcrumb-item active">Project Detail</li>
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
                        <section class="col-lg-6">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4>Project Detail</h4>
                                    </div>
                                    <?php foreach ($project_detail as $list) { ?>

                                        <table class="table">
                                            <tr>
                                                <th>Nama Project</th>
                                                <td><?php echo $list->nama_project; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Project Manager</th>
                                                <td><?php echo $list->nama_karyawan; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Mulai</th>
                                                <td><?php echo tanggal_indonesia($list->tanggal_mulai_project); ?></td>
                                            </tr>
                                            <th>Batas Waktu</th>
                                            <td><?php echo tanggal_indonesia($list->batas_waktu_project);
                                                ?>
                                            </td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Selesai</th>
                                                <td><?php if ($list->tanggal_selesai_project == NULL) {
                                                        echo "-";
                                                    } else {
                                                        echo tanggal_indonesia($list->tanggal_selesai_project);
                                                    } ?>
                                                </td>
                                            </tr>
                                            <?php if ($list->status_project == "TIDAK SELESAI") { ?>
                                                <tr>
                                                    <th>Tanggal Project Dibatalkan</th>
                                                    <td>
                                                        <?php echo tanggal_indonesia($list->tanggal_berhenti_project); ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <th>Status</th>
                                                <td><?php echo ucwords(strtolower($list->status_project)); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Deskripsi</th>
                                                <td><?php echo $list->deskripsi_project; ?></td>
                                            </tr>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4>Anggota Project</h4>
                                    </div>
                                    <table id="list-anggota" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama Karyawan</th>
                                                <th>Tugas</th>
                                                <th>Batas Waktu</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Status</th>
                                                <?php if ($this->session->userdata('posisi_karyawan') == "Project Manager") { ?>
                                                    <th>Aksi</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($anggota_project as $detail) { ?>
                                                <tr>
                                                    <td><?php echo $detail->nama_karyawan ?></td>
                                                    <td><?php echo $detail->nama_tugas ?></td>
                                                    <td><?php echo tanggal_indonesia($detail->batas_waktu) ?></td>
                                                    <td><?php if ($detail->tanggal_selesai_tugas == NULL) {
                                                            echo "-";
                                                        } else {
                                                            echo tanggal_indonesia($detail->tanggal_selesai_tugas);
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $detail->status_tugas ?></td>
                                                    <?php if ($this->session->userdata('posisi_karyawan') == "Project Manager") { ?>
                                                        <td>
                                                            <a type="button" class="btn btn-sm bg-info" href="<?php echo base_url() . 'ProjectManage/detail_tugas/' . $detail->id_tugas_project; ?>">
                                                                <i class="fas fa-pencil-alt"></i> Detail
                                                            </a>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </section>
                        <section class="col-lg-6">
                            <div class="chartCard">
                                <div class="chartBox">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                            <br>

                            <!-- small box -->
                            <div class="small-box col-7 bg-info" style="border-radius: 15px;">
                                <div class="inner text-center">
                                    <h4>Total Tugas</h4>
                                    <h4>
                                        <?php foreach ($total_tugas as $total) {
                                            $totalTugas = $total->totalTugas;
                                            echo $totalTugas;
                                        }
                                        ?>
                                    </h4>
                                </div>
                            </div>

                            <div class="small-box col-7 bg-maroon" style="border-radius: 15px;">
                                <div class="inner text-center">
                                    <h4>Sedang Berjalan</h4>
                                    <?php
                                    foreach ($total_status_berjalan as $total) { ?>
                                        <h4> <?php $totalBerjalan = $total->totalStatus;
                                                echo $totalBerjalan; ?>
                                        </h4>
                                    <?php
                                    } ?>
                                </div>

                            </div>


                            <?php  ?>
                            <div class="small-box col-7 bg-green" style="border-radius: 15px;">
                                <div class="inner text-center">
                                    <h4>Selesai</h4>
                                    <?php // $totalSelesai = 0;
                                    foreach ($total_status_selesai as $total) { ?>
                                        <h4> <?php
                                                $totalSelesai = $total->totalStatus;
                                                echo $totalSelesai;
                                                ?>
                                        </h4>
                                    <?php
                                    } ?>
                                </div>
                            </div><br><br>

                            <h3>Progres</h3>
                            <div class="flex-wrapper">
                                <div class="single-chart">
                                    <svg viewBox="0 0 36 36" class="circular-chart orange">
                                        <path class="circle" stroke-dasharray="<?php if ($totalTugas == 0) {
                                                                                    echo '0%';
                                                                                } else {
                                                                                    echo $totalSelesai / $totalTugas * 100 . '%';
                                                                                } ?>, 100" d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831" />
                                        <text x="18" y="20.35" class="percentage"><?php if ($totalTugas == 0) {
                                                                                        echo '0%';
                                                                                    } else {
                                                                                        echo number_format($totalSelesai / $totalTugas * 100, 0) . '%';
                                                                                    } ?></text>
                                    </svg>
                                </div>
                            </div>
                        </section>
                    </div>
            </section>
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
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
    <!-- Summernote -->
    <script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


    <script>
        $(function() {
            $("#list-anggota").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false
            });
        });
        // setup 
        const data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Total Jam',
                data: [<?php echo $senin['MinuteDiff'] ?>,
                    <?php echo $selasa['MinuteDiff'] ?>,
                    <?php echo $rabu['MinuteDiff'] ?>,
                    <?php echo $kamis['MinuteDiff'] ?>,
                    <?php echo $jumat['MinuteDiff'] ?>,
                    <?php echo $sabtu['MinuteDiff'] ?>,
                    <?php echo $minggu['MinuteDiff'] ?>
                ],
                backgroundColor: [
                    'rgba(255, 26, 104, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(0, 0, 0, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 26, 104, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 0, 0, 1)'
                ],
                borderWidth: 1
            }]
        };

        // config 
        const config = {
            type: 'bar',
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // render init block
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>


</html>