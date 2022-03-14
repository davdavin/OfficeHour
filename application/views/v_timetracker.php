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

  <style>
    #stopwatch {
      cursor: pointer;
      background: transparent;
      padding: 0;
      border: none;
      outline: none;
    }

    #display {
      text-align: center;
    }

    #pauseButton {
      display: none;
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
            <a class="d-block"><?php echo $this->session->userdata('nama_karyawan'); ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="<?php echo base_url() . 'TimeTracker' ?>" class="nav-link">
                <i class="nav-icon fas fa-clock"></i>
                <p> Time Tracker </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() . 'Account_Karyawan' ?>" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p> Account </p>
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
            <div class="col-sm-6">
              <h3><?php echo 'Anda sebagai ' . $this->session->userdata('posisi_karyawan'); ?></h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Time Tracker</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- <h4 class="time" id="display">00:00:00:00</h4> -->
          <button class="buttonPlay" id="stopwatch">
            <a type="button" id="start" class="btn bg-green" style="border-radius: 25px;">Mulai </a>
            <a type="button" id="stop" class="btn bg-red" style="border-radius: 25px;"> Berhenti </a><br><br>
            <!-- <a type="button" id="resetButton" class="btn bg-red" style="border-radius: 25px;"> Reset time </a><br><br> -->
          </button>
        </div><!-- /.container-fluid -->

        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Aktivitas</h3>
            </div>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Project</th>
                    <th>Nama Tugas</th>
                    <th>Waktu</th>
                    <th>Status Tugas</th>
                    <th>Detail Aktivitas</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($aktivitas as $list_aktivitas) { ?>
                    <tr>
                      <td><?php echo $list_aktivitas->nama_project ?></td>
                      <td><?php echo $list_aktivitas->nama_tugas ?> </td>
                      <td><?php echo waktu($list_aktivitas->waktu_mulai) . ' - ' . waktu($list_aktivitas->waktu_selesai) ?></td>
                      <td><?php echo $list_aktivitas->status_tugas ?></td>
                      <td><?php echo $list_aktivitas->bukti ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>

          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tugas Project</h3>
            </div>
            <div class="card-body">
              <table id="list-project" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Project</th>
                    <th>Tugas</th>
                    <th>Deadline</th>
                    <th>Status Tugas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($tugas_project as $list_tugas_project) { ?>
                    <tr>
                      <td><?php echo $list_tugas_project->nama_project ?></td>
                      <td><?php echo $list_tugas_project->nama_tugas ?> </td>
                      <td><?php echo tanggal_indonesia($list_tugas_project->batas_waktu)  ?></td>
                      <td><?php echo $list_tugas_project->status_tugas ?></td>
                      <td>
                        <a type="button" class="btn btn-sm bg-info" data-toggle="modal" data-target="#tugas<?php echo $list_tugas_project->id_tugas_project ?>"><i class="fas fa-pencil-alt"></i> Update</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>

        <?php $no = 0;
        foreach ($tugas_project as $list_tugas_project) {
          $no++;
          $id_tugas_project = $list_tugas_project->id_tugas_project; ?>
          <div class="modal fade" id="tugas<?php echo $list_tugas_project->id_tugas_project; ?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Input Aktivitas</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <form class="form-submit" action="<?php echo base_url() . 'TimeTracker/proses_input_aktivitas' ?>" method="post" id="submit-aktivitas<?php echo $list_tugas_project->id_tugas_project ?>">
                    <div class="form-group">
                      <label>Nama Project</label>
                      <input type="hidden" name="id_project" value="<?= $list_tugas_project->id_project ?>">
                      <input type="text" class="form-control" value="<?= $list_tugas_project->nama_project ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nama Tugas</label>
                      <input type="hidden" name="id_tugas_project" value="<?= $list_tugas_project->id_tugas_project ?>">
                      <input type="text" class="form-control" value="<?= $list_tugas_project->nama_tugas ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Aktivitas</label>
                      <input type="date" class="form-control" name="tanggal_aktivitas">
                      <p class="p-2 error_tanggal"></p>
                    </div>
                    <div class="form-group">
                      <label>Jam Mulai</label>
                      <input type="time" class="form-control" name="waktu_mulai">
                      <p class="p-2 error_mulai"></p>
                    </div>
                    <div class="form-group">
                      <label>Jam Selesai</label>
                      <input type="time" class="form-control" name="waktu_selesai">
                      <p class="p-2 error_selesai"></p>
                    </div>
                    <div class="form-group">
                      <label>Bukti</label>
                      <input type="text" class="form-control" name="bukti">
                      <p class="p-2 error_bukti"></p>
                    </div>
                    <div class="form-group">
                      <label>Status Tugas</label>
                      <select class="form-control" name="status_tugas">
                        <option selected disabled value>-- Pilih --</option>
                        <option value="SELESAI">Selesai</option>
                        <option value="SEDANG BERJALAN">Masih Berjalan</option>
                      </select>
                      <p class="p-2 error_status"></p>
                    </div>
                    <p class="p-2 berhasil"></p>
                    <button type="submit" class="btn btn-block btn-primary btn-sm">Submit</button>
                  </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

        <?php } ?>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
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
      $('#example1').DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidht": false
      });
      $('#list-project').DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidht": false
      });

      var timer = null,
        interval = 1000 * 1 * 60;
      $("#start").click(function() {
        if (timer !== null) return;
        timer = setInterval(function() {
          alert("Please Screen Shoot :)");
          window.open("<?php echo base_url() . 'LandingPage' ?>", '_blank');
        }, interval);

      });

      $("#stop").click(function() {
        clearInterval(timer);
        timer = null
      });

      <?php for ($i = 0; $i <= $id_tugas_project; $i++) {  ?>
        $('#submit-aktivitas<?php echo $i ?>').submit(function(e) {
          e.preventDefault();
          $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: $(this).serialize(),
            success: function(hasil) {
              var obj = $.parseJSON(hasil);
              if (obj.sukses == false) {
                if (obj.error_tanggal) {
                  $('.error_tanggal').html(obj.error_tanggal);
                  $('.error_tanggal').css("color", "red");
                } else {
                  $('.error_tanggal').hide();
                }
                if (obj.error_mulai) {
                  $('.error_mulai').html(obj.error_mulai);
                  $('.error_mulai').css("color", "red");
                } else {
                  $('.error_mulai').hide();
                }
                if (obj.error_selesai) {
                  $('.error_selesai').html(obj.error_selesai);
                  $('.error_selesai').css("color", "red");
                } else {
                  $('.error_selesai').hide();
                }
                if (obj.error_bukti) {
                  $('.error_bukti').html(obj.error_bukti);
                  $('.error_bukti').css("color", "red");
                } else {
                  $('.error_bukti').hide();
                }
                if (obj.error_status) {
                  $('.error_status').html(obj.error_status);
                  $('.error_status').css("color", "red");
                } else {
                  $('.error_status').hide();
                }
              } else {
                Swal.fire({
                  title: 'Sukses',
                  text: obj.sukses,
                  icon: 'success',
                }).then((confirmed) => {
                  window.location.reload();
                });
              }

            }
          });

        });
      <?php }
      ?>

    });
    // Convert time to a format of hours, minutes, seconds, and milliseconds
    /* function timeToString(time) {
       let diffInHrs = time / 3600000;
       let hh = Math.floor(diffInHrs);

       let diffInMin = (diffInHrs - hh) * 60;
       let mm = Math.floor(diffInMin);

       let diffInSec = (diffInMin - mm) * 60;
       let ss = Math.floor(diffInSec);

       let diffInMs = (diffInSec - ss) * 100;
       let ms = Math.floor(diffInMs);

       let formattedMM = mm.toString().padStart(2, "0");
       let formattedSS = ss.toString().padStart(2, "0");
       let formattedMS = ms.toString().padStart(2, "0");

       return `${formattedMM}:${formattedSS}:${formattedMS}`;
     }

     // Declare variables to use in our functions below
     let startTime;
     let elapsedTime = 0;
     let timerInterval;

     // Create function to modify innerHTML

     function print(txt) {
       document.getElementById("display").innerHTML = txt;
     }

     // Create "start", "pause" and "reset" functions

     function start() {
       startTime = Date.now() - elapsedTime;
       timerInterval = setInterval(function printTime() {
         elapsedTime = Date.now() - startTime;
         print(timeToString(elapsedTime));
       }, 10);
       showButton("PAUSE");
     }

     function pause() {
       clearInterval(timerInterval);
       showButton("PLAY");
     }

     function reset() {
       clearInterval(timerInterval);
       print("00:00:00");
       elapsedTime = 0;
       showButton("PLAY");
     }

     // Create function to display buttons

     function showButton(buttonKey) {
       const buttonToShow = buttonKey === "PLAY" ? playButton : pauseButton;
       const buttonToHide = buttonKey === "PLAY" ? pauseButton : playButton;
       buttonToShow.style.display = "block";
       buttonToHide.style.display = "none";
     }
     // Create event listeners

     let playButton = document.getElementById("playButton");
     let pauseButton = document.getElementById("pauseButton");
     let resetButton = document.getElementById("resetButton");

     playButton.addEventListener("click", start);
     pauseButton.addEventListener("click", pause);
     resetButton.addEventListener("click", reset); */
  </script>

</body>

</html>