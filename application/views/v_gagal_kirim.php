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
                    $maks_orang = $detail_perusahaan->maks_orang;
                } ?>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="<?php echo base_url() . 'Dashboard_Perusahaan/tampil_menu_utama' ?>" class="nav-link">
                                <i class="nav-icon fas fa-clock"></i>
                                <p> Dashboard </p>
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
                            <a href="<?php echo base_url() . 'Dashboard_Perusahaan/lihat_klien/' . $id_perusahaan ?>" class="nav-link">
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
                                <li class="breadcrumb-item active">Karyawan</li>
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
                            <h3 class="card-title">Daftar Karyawan Gagal Terkirim </h3>
                        </div>

                        <div class="card-body">
                            <?php foreach ($total_karyawan as $total) {
                                $totalKaryawan = $total->total_karyawan;
                            }
                            ?>
                            
                            <table id="list_karyawan" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Karyawan</th>
                                        <th>Nama Karyawan</th>
                                        <th>Email</th>
                                        <th>Posisi</th>
                                        <th>Status Karyawan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($karyawan as $list_karyawan) { ?>
                                        <tr>
                                            <td><?php echo $list_karyawan->id_karyawan ?></td>
                                            <td><?php echo $list_karyawan->nama_karyawan ?></td>
                                            <td><?php echo $list_karyawan->email_karyawan ?></td>
                                            <td><?php echo $list_karyawan->posisi_karyawan ?></td>
                                            <td>
                                                <?php if ($list_karyawan->status_karyawan == 1) {
                                                    echo "Aktif";
                                                } else {
                                                    echo "Tidak Aktif";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm bg-info" data-toggle="modal" data-target="#modalEdit<?php echo $list_karyawan->id_karyawan ?>">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                <a href="<?php echo base_url() . 'Dashboard_Perusahaan/hapus_karyawan_gagal/' . $list_karyawan->id_karyawan; ?>" class="btn btn-sm bg-danger tombol-hapus">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Hapus
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

                            <form action="<?php echo base_url() . 'Dashboard_Perusahaan/proses_tambah_karyawan' ?>" class="form-submit" method="post">
                                <input type="hidden" class="form-control" id="id_perusahaan" name="id_perusahaan" value="<?= $id_perusahaan; ?>">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Nama Lengkap">
                                    <!-- INFO ERROR -->
                                    <div class="p-2 is-invalid error_nama" style="display: none">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email_karyawan" name="email_karyawan" placeholder="Email karyawan">
                                    <!-- INFO ERROR -->
                                    <div class="p-2 is-invalid error_email" style="display: none">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Posisi Karyawan</label>
                                    <input type="text" class="form-control" id="posisi_karyawan" name="posisi_karyawan" placeholder="Posisi karyawan">
                                    <!-- INFO ERROR -->
                                    <div class="p-2 is-invalid error_posisi" style="display: none">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-block btn-primary btn-sm" id="tombolSimpan">Submit</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <?php $no = 0;
            foreach ($karyawan as $list_karyawan) {
                $no++; ?>
                <div class="modal fade" id="modalEdit<?php echo $list_karyawan->id_karyawan; ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Posisi & Status Karyawan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="<?php echo base_url() . 'Dashboard_Perusahaan/proses_edit_karyawan' ?>" method="post">
                                    <input type="hidden" name="id_karyawan" value="<?= $list_karyawan->id_karyawan ?>">
                                    <div class="form-group">
                                        <label>Posisi Karyawan</label>
                                        <input type="text" class="form-control" name="posisi_karyawan" value="<?= $list_karyawan->posisi_karyawan; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Status Karyawan</label>
                                        <select class="form-control select2bs4" style="width: 100%;" name="status_karyawan" required>
                                            <option selected disabled value>Status</option>
                                            <?php if ($list_karyawan->status_karyawan == 1) { ?>
                                                <option value="<?php echo $list_karyawan->status_karyawan; ?>" <?php echo "selected" ?>>Aktif</option>
                                                <option value="0">Tidak Aktif</option>
                                            <?php } ?>
                                            <?php if ($list_karyawan->status_karyawan == 0) { ?>
                                                <option value="1">Aktif</option>
                                                <option value="<?php echo $list_karyawan->status_karyawan; ?>" <?php echo "selected" ?>>Tidak Aktif</option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-block btn-primary btn-sm">Submit</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            <?php } ?>
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

            $('.tombol-hapus').click(function(e) {
                e.preventDefault();
                const href = $(this).attr('href');

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: 'Data karyawan akan dihapus',
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'batal',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.value) {
                        document.location.href = href;
                    }
                });
            });

            $('.form-submit').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(hasil) {
                        var $obj = $.parseJSON(hasil);
                        if ($obj.sukses == false) {
                            if ($obj.error_nama) {
                                $('.error_nama').show();
                                $('.error_nama').html($obj.error_nama);
                                $('.error_nama').css("color", "red");
                            } else {
                                $('.error_nama').hide();
                            }
                            if ($obj.error_email) {
                                $('.error_email').show();
                                $('.error_email').html($obj.error_email);
                                $('.error_email').css("color", "red");
                            } else {
                                $('.error_email').hide();
                            }
                            if ($obj.error_posisi) {
                                $('.error_posisi').show();
                                $('.error_posisi').html($obj.error_posisi);
                                $('.error_posisi').css("color", "red");
                            } else {
                                $('.error_posisi').hide();
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