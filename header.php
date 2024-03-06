<?php 

session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

//include "kodepj.php";
include "koderm.php";


$koneksi=new mysqli("localhost","root","","farmasi");

if($_SESSION['admin'] || $_SESSION['petugas'] || $_SESSION['dokter'] || $_SESSION['apoteker']){

?>
<?php 
	$kode = $_GET['koderm'];
    //$kdpasie = $_GET['no_pasien'];
    //$kasir = $data['nama'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIM | Praktik Dokter</title>
  <link rel="icon" href="images/logo1.jpg" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
 
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    <p>Please wait...</p>
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">ContactQ</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" role="button">
          <i class="nav-icon fas fa-reply"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

<?php  

      if($_SESSION['admin']){
        $user =$_SESSION['admin'];
      }elseif ($_SESSION['petugas']){
        $user =$_SESSION['petugas'];
      }elseif ($_SESSION['dokter']){
        $user =$_SESSION['dokter'];
      }elseif ($_SESSION['apoteker']){
        $user =$_SESSION['apoteker'];
      }

      $sql=$koneksi->query("select * from tb_pengguna where id='$user'");
      $data=$sql->fetch_assoc();
?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">                                                                                                                             
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $data['nama']; ?></a>
        </div>
      </div>

      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          
          <?php  if($_SESSION['admin']){ ?>
          <!-- Menu Master -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-desktop"></i>
              <p>Master<i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <!-- Sub Menu Data Dokter-->
              <li class="nav-item">
                <a href="?page=dokter" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Data Dokter</p>
                </a>
              </li>

            <!-- Sub Menu Data Obat-->
              <li class="nav-item">
                <a href="?page=obat" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Data Obat</p>
                </a>
              </li>

              <!-- Sub Menu Data Diagnosa-->
              <li class="nav-item">
                <a href="?page=diagnosa" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Data Diagnosa</p>
                </a>
              </li>

              <!-- Sub Menu Data Pengguna-->
              <li class="nav-item">
                <a href="?page=pengguna" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Data Pengguna</p>
                </a>
              </li>
            </ul>
          </li>

              <?php  } ?>

              <?php  if($_SESSION['petugas'] || $_SESSION['admin']){ ?>
              <!-- Menu Pendaftaran Pasien -->
              
                <li class="nav-item">
                <a href="?page=pasien" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>Pendaftaran Pasien</p>
                </a>            
              </li>
              
                <!-- Menu Rekam Medis -->
                <li class="nav-item">
                <a href="?page=rekam_medis" class="nav-link">
                
                <i class="nav-icon fas fa-list-alt"></i>
                <p>Rekam Medis</p>
            </a>            
          </li>

          <?php  } ?>

          <?php  if($_SESSION['dokter'] || $_SESSION['admin']){ ?>
              <!-- Menu Pemeriksaan Dokter -->
                <li class="nav-item">
                <a href="?page=pemeriksaan_dokter" class="nav-link">
                <i class="nav-icon fas fa-medkit"></i>
                <p>Pemeriksaan Dokter</p>
                </a>            
              </li>
          <?php  } ?>

          <?php  if($_SESSION['apoteker'] || $_SESSION['admin']){ ?>
              <!-- Menu Tambah Stok Obat -->
              
                <li class="nav-item">
                <a href="?page=tambahstok" class="nav-link">
                <i class="nav-icon fas fa-database"></i>
                <p>Stok Obat</p>
                </a>            
              </li>
              
                <!-- Menu Cetak Obat -->
                <li class="nav-item">
                <a href="?page=cetakobat" class="nav-link">
                <i class="nav-icon fas fa-print"></i>
                <p>Cetak Data Obat</p>
                </a>            
              </li>
                
          <?php  } ?>

          <?php  if($_SESSION['admin']){ ?>
          <!-- Menu Master -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>Laporan - Laporan<i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <!-- Sub Menu Laporan RM-->
              <li class="nav-item">
                <a href="?page=laprm" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Laporan Rekam Medis</p>
                </a>
              </li>

            <!-- Sub Menu Laporan Pendaftaran Pasien-->
              <li class="nav-item">
              <a data-toggle="modal" data-target="#smallModal" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Data Registrasi Pasien</p>
                </a>
              </li>

              <!-- Sub Menu Laporan Pemakaian Obat-->
              <li class="nav-item">
              <a data-toggle="modal" data-target="#smallModal1" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Laporan Pemakaian Obat</p>
                </a>
              </li>

              <!-- Sub Menu Laporan Pemasukan Obat-->
              <li class="nav-item">
              <a data-toggle="modal" data-target="#smallModal2" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Laporan Obat Masuk</p>
                </a>
              </li>

              <!-- Sub Menu Laporan Berobat Pasien-->
              <li class="nav-item">
              <a data-toggle="modal" data-target="#smallModal3" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Laporan Berobat Pasien</p>
                </a>
              </li>
            </ul>
          </li>

              <?php  } ?>

          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Search
                <i class="fas fa-angle-left right"></i>
              </p>

            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/search/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Search</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/search/enhanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enhanced</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-share"></i>
                <p>Logout</p>
                </a>            
              </li>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <?php
    }else{
        header("location:login.php");
    }
?>

<!--Modal Rekap Pendaftaran Pasien-->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Laporan Pendaftaran Pasien</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="page/laporan/rekapdaftarpasien.php" target="blank">
            <label for="">Tanggal Awal</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" name="tgl_awal"class="form-control" />
                </div>
            </div>

            <label for="">Tanggal Akhir</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" name="tgl_akhir"class="form-control" />
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cetak</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--Modal Rekap Pendaftaran Pasien-->
<!--Modal Rekap Pemakaian obat-->
<div class="modal fade" id="smallModal1" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Laporan Pemakaian Obat</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="page/laporan/rekappemakaianobat.php" target="blank">
            <label for="">Tanggal Awal</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" name="tgl_awal"class="form-control" />
                </div>
            </div>

            <label for="">Tanggal Akhir</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" name="tgl_akhir"class="form-control" />
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cetak</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--Modal Rekap Pemakaian obat-->
<!--Modal Rekap Pemasukan obat-->
<div class="modal fade" id="smallModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Laporan Pemasukan Obat</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="page/laporan/rekappemasukanobat.php" target="blank">
            <label for="">Tanggal Awal</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" name="tgl_awal"class="form-control" />
                </div>
            </div>

            <label for="">Tanggal Akhir</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" name="tgl_akhir"class="form-control" />
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cetak</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--Modal Rekap Pemasukan obat-->
<!--Modal Rekap berobat pasien-->
<div class="modal fade" id="smallModal3" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Laporan Berobat Pasien</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="page/laporan/rekapberobatpasien.php" target="blank">
            <label for="">Tanggal Awal</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" name="tgl_awal"class="form-control" />
                </div>
            </div>

            <label for="">Tanggal Akhir</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" name="tgl_akhir"class="form-control" />
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cetak</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--Modal Rekap berobat pasien-->
 