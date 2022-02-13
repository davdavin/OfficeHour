<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OfficeHour - Perusahaan</title>

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
                        <img src="<?php echo base_url(); ?>assets/dist/img/corporate.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block text-center"><?php echo $this->session->userdata('username_perusahaan'); ?></a>
                    </div>
                </div>

                <?php foreach ($info_perusahaan as $detail_perusahaan) {
                    $id_perusahaan = $detail_perusahaan->id_perusahaan;
                    $nama_paket = $detail_perusahaan->nama_paket;
                } ?>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Dashboard_Perusahaan/tampil_menu_utama' ?>" class="nav-link">
                                <i class="nav-icon fas fa-clock"></i>
                                <p> Dasboard </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Account_Perusahaan/profile/' . $id_perusahaan  ?>" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p> Account </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="<?php echo base_url() . 'Dashboard_Perusahaan/lihat_karyawan/' . $id_perusahaan  ?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p> Karyawan </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Dashboard_Perusahaan/lihat_klien/' ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p> Klien </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Login/logout_perusahaan' ?>" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p> Logout </p>
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
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <?php $this->load->view('message.php'); ?>
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Karyawan</h3>
                        </div>

                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                                <i class="fas fa-plus"></i> Tambah karyawan
                            </button><br><br>

                            <table id="list_karyawan" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Karyawan</th>
                                        <th>Nama Karyawan</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Posisi</th>
                                        <th>Foto</th>
                                        <th>Status Karyawan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($karyawan as $list_karyawan) { ?>
                                        <tr>
                                            <td><?php echo $list_karyawan->id_karyawan ?></td>
                                            <td><?php echo $list_karyawan->nama_karyawan ?></td>
                                            <td><?php echo $list_karyawan->alamat_karyawan ?></td>
                                            <td><?php echo $list_karyawan->email_karyawan ?></td>
                                            <td><?php echo $list_karyawan->posisi_karyawan ?></td>
                                            <td><?php echo $list_karyawan->foto_karyawan ?></td>
                                            <td>
                                                <?php if ($list_karyawan->status_karyawan == 1) {
                                                    echo "Aktif";
                                                } else {
                                                    echo "Tidak Aktif";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-info btn-sm">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </section>

            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Input Karyawan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <!--     <form action="<?php //echo base_url() . 'Dashboard_Perusahaan/proses_tambah_karyawan' 
                                                    ?>" method="post"> -->

                            <input type="hidden" class="form-control" id="id_perusahaan" name="id_perusahaan" value="<?= $id_perusahaan; ?>">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Nama Lengkap">
                            </div>
                            <!-- INFO ERROR -->
                            <div class="alert alert-danger error_nama" role="alert" style="display: none">
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" id="alamat_karyawan" name="alamat_karyawan" placeholder="Alamat karyawan">
                            </div>
                            <!-- INFO ERROR -->
                            <div class="alert alert-danger error_alamat" role="alert" style="display: none">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email_karyawan" name="email_karyawan" placeholder="Email karyawan">
                            </div>
                            <!-- INFO ERROR -->
                            <div class="alert alert-danger error_email" role="alert" style="display: none">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <!-- INFO ERROR -->
                            <div class="alert alert-danger error_password" role="alert" style="display: none">
                            </div>

                            <div class="form-group">
                                <label>Posisi Karyawan</label>
                                <input type="posisi" class="form-control" id="posisi_karyawan" name="posisi_karyawan" placeholder="Posisi karyawan">
                            </div>
                            <!-- INFO ERROR -->
                            <div class="alert alert-danger error_posisi" role="alert" style="display: none">
                            </div>

                            <!-- status -->
                            <div class="form-group">
                                <label>Status Karyawan</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="status">
                                    <option selected disabled value>Status</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                            <!-- INFO ERROR -->
                            <div class="alert alert-danger error_status" role="alert" style="display: none">
                            </div>

                            <button type="submit" class="btn btn-block btn-primary btn-sm" id="tombolSimpan">Submit</button>
                            <!-- </form> -->
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
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
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
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
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
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
            $("#list_karyawan").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false
            });

            const sukses = $('.sukses').data('flashdata');
            if (sukses) {
                Swal.fire({
                    title: 'Sukses',
                    text: sukses,
                    icon: 'success'
                });
            }

            $('#tombolSimpan').on('click', function() {
                var id_perusahaan = $('#id_perusahaan').val();
                var nama = $('#nama_karyawan').val();
                var alamat = $('#alamat_karyawan').val();
                var email = $('#email_karyawan').val();
                var password = $('#password').val();
                var posisi = $('#posisi_karyawan').val();
                var status = $('#status').val();

                $.ajax({
                    url: "<?php echo base_url('Dashboard_Perusahaan/proses_tambah_karyawan') ?>",
                    type: "POST",
                    data: {
                        id_perusahaan: id_perusahaan,
                        nama_karyawan: nama,
                        alamat_karyawan: alamat,
                        email_karyawan: email,
                        password: password,
                        posisi_karyawan: posisi,
                        status: status
                    },
                    success: function(hasil) {
                        var $obj = $.parseJSON(hasil);
                        if ($obj.sukses == false) {
                            if ($obj.error_nama) {
                                $('.error_nama').show();
                                $('.error_nama').html($obj.error_nama);
                            }
                            if ($obj.error_nama) {
                                $('.error_alamat').show();
                                $('.error_alamat').html($obj.error_alamat);
                            }
                            if ($Obj.error_email) {
                                $('.error_email').show();
                                $('.error_email').html($obj.error_email);
                            }
                            if ($obj.error_password) {
                                $('.error_password').show();
                                $('.error_password').html($obj.error_password);
                            }
                            if ($obj.error_posisi) {
                                $('.error_posisi').show();
                                $('.error_posisi').html($obj.error_posisi);
                            }
                            if ($obj.error_status) {
                                $('.error_status').show();
                                $('.error_status').html($obj.error_status);
                            }
                        } else {
                            Swal.fire({
                                title: 'Sukses',
                                text: $obj.sukses,
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