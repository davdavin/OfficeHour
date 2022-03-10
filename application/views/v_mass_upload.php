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
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!--   <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url(); ?>assets/dist/img/logo.png" alt="Logo" height="60" width="60">
        </div> -->

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

            <?php foreach ($info_perusahaan as $detail_perusahaan) {
                $id_perusahaan = $detail_perusahaan->id_perusahaan;
                $nama_paket = $detail_perusahaan->nama_paket;
                $maks_orang = $detail_perusahaan->maks_orang;
            } ?>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url(); ?>assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block text-center"><?php echo $this->session->userdata('username_perusahaan'); ?></a>
                    </div>
                </div>

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
                <div class="container-fluid">
                    <?php

                    use Phppot\DataSource;
                    use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

                    require_once 'DataSource.php';
                    $db = new DataSource();
                    $conn = $db->getConnection();
                    require_once('./vendor/autoload.php');

                    if (isset($_POST["import"])) {

                        $allowedFileType = [
                            'application/vnd.ms-excel',
                            'text/xls',
                            'text/xlsx',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        ];

                        if (in_array($_FILES["file"]["type"], $allowedFileType)) {

                            $targetPath = 'uploads/' . $_FILES['file']['name'];
                            move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

                            $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

                            $spreadSheet = $Reader->load($targetPath);
                            $excelSheet = $spreadSheet->getActiveSheet();
                            $spreadSheetAry = $excelSheet->toArray();
                            $sheetCount = count($spreadSheetAry);

                            for ($i = 0; $i <= $sheetCount; $i++) {
                                $name = "";
                                if (isset($spreadSheetAry[$i][0])) {
                                    $name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
                                }
                                $description = "";
                                if (isset($spreadSheetAry[$i][1])) {
                                    $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
                                }
                                $posisi = "";
                                if (isset($spreadSheetAry[$i][2])) {
                                    $posisi = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
                                }

                                if (!empty($name) || !empty($description)) {
                                    $query = "insert into karyawan(id_perusahaan,nama_karyawan,email_karyawan,posisi_karyawan) values(?,?,?,?)";
                                    $paramType = "ssss";
                                    $paramArray = array(
                                        $id_perusahaan,
                                        $name,
                                        $description,
                                        $posisi
                                    );
                                    $insertId = $db->insert($query, $paramType, $paramArray);
                                    // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
                                    // $result = mysqli_query($conn, $query);

                                    if (!empty($insertId)) {
                                        $type = "success";
                                        $message = "Excel Data Imported into the Database";
                                    } else {
                                        $type = "error";
                                        $message = "Problem in Importing Excel Data";
                                    }
                                }
                            }
                        } else {
                            $type = "error";
                            $message = "Invalid File Type. Upload Excel File.";
                        }
                    }
                    ?>
                    <h2>Import Excel File into MySQL Database using PHP</h2>

                    <div class="outer-container">
                        <form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                            <div>
                                <label>Choose Excel File</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
                                <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
                                x
                            </div>

                        </form>

                    </div>
                    <div id="response" class="<?php if (!empty($type)) {
                                                    echo $type . " display-block";
                                                } ?>"><?php if (!empty($message)) {
                                                            echo $message;
                                                        } ?></div>

                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
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
    <!-- Select2 -->
    <script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>


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

        });
    </script>

</body>

</html>