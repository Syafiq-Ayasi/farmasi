<?php 

session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
date_default_timezone_set('Asia/Jakarta');
//include "kodepj.php";
include "koderm.php";


$koneksi=new mysqli("localhost","root","","farmasi");

if($_SESSION['admin'] || $_SESSION['petugas'] || $_SESSION['dokter'] || $_SESSION['apoteker'] || $_SESSION['adminapoteker']){

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
  <link rel="icon" href="images/logo1.png" type="image/x-icon">

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
  

    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="assets/sweet_alert/sweetalert2.min.css">
</head>

<style>
  input[type=number]::-webkit-inner-spin-button,
  input[type=number]::-webkit-outer-spin-button{
    -webkit-appearance:none;
    margin:0;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
 
  <!-- Preloader -->
  
<?php  

        if($_SESSION['admin']){
            $user =$_SESSION['admin'];
        }elseif ($_SESSION['petugas']){
            $user =$_SESSION['petugas'];
        }elseif ($_SESSION['dokter']){
            $user =$_SESSION['dokter'];
        }elseif ($_SESSION['apoteker']){
            $user =$_SESSION['apoteker'];
        }elseif ($_SESSION['adminapoteker']){
            $user =$_SESSION['adminapoteker'];
        }

       $sql=$koneksi->query("select * from tb_pengguna where id='$user'");

       $data=$sql->fetch_assoc();

    ?>
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
        <a href="#" class="nav-link">Contact</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Akses Aktif: <?php echo $userglobal;
          ?> </a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
        
        <b><?php
        date_default_timezone_set('Asia/Jakarta');
        echo date("d/m/Y");
        ?>&nbsp;&nbsp;<span id="jam" style="font-size:24"></span></b>
        

  



      <!-- Messages Dropdown Menu -->
    


      <!-- Notifications Dropdown Menu -->

        
    </ul>
  </nav>
  <!-- /.navbar -->


     <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="images/Logo11.png" width="225" height="90" alt="Logo">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
       
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
          
          <?php  if($_SESSION['admin'] || $_SESSION['adminapoteker']){ ?>
          <!-- Menu Master -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-laptop-medical"></i>
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

              <!-- Sub Menu Data Akun-->
              <li class="nav-item">
                <a href="?page=akun" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Data Akun Pasien</p>
                </a>
              </li>
            </ul>
          </li>

              <?php  } ?>

              <?php  if($_SESSION['petugas'] || $_SESSION['admin']){ ?>
              
                <li class="nav-item">
                <a href="?page=antrian" class="nav-link">
                <i class="nav-icon fas fa fa-users"></i>
                <p>Data Antrian</p>
                </a>            
              </li>
              
                <!-- Menu Pendaftaran Pasien -->
              
                <li class="nav-item">
                <a href="?page=pasien" class="nav-link">
                <i class="nav-icon fas fa-hand-holding-medical"></i>
                <p>Pendaftaran Pasien</p>
                </a>            
              </li>
              
                <!-- Menu Rekam Medis -->
                <li class="nav-item">
                <a href="?page=rekam_medis&koderm=<?php echo $rmkode; ?>" class="nav-link">
                <i class="nav-icon 	fas fa-notes-medical"></i>
                <p>Pemeriksaan Awal</p>
            </a>            
          </li>
          
          <?php  } ?>

              <?php  if($_SESSION['adminapoteker']){ ?>
              
                <!-- Menu Pendaftaran Pasien -->
              
                <li class="nav-item">
                <a href="?page=pasien" class="nav-link">
                <i class="nav-icon fas fa-hand-holding-medical"></i>
                <p>Pendaftaran Pasien</p>
                </a>            
              </li>
              
                <!-- Menu Rekam Medis -->
                <li class="nav-item">
                <a href="?page=rekam_medis&koderm=<?php echo $rmkode; ?>" class="nav-link">
                <i class="nav-icon 	fas fa-notes-medical"></i>
                <p>Pemeriksaan Awal</p>
            </a>            
          </li>

          <?php  } ?>

          <?php  if($_SESSION['dokter'] || $_SESSION['admin'] || $_SESSION['adminapoteker']){ ?>
          
              <!-- Menu Pemeriksaan Dokter -->
                <li class="nav-item">
                <a href="?page=pemeriksaan_dokter" class="nav-link">
                <i class="nav-icon fas fa-medkit"></i>
                <p>Pemeriksaan Dokter</p>
                </a>            
              </li>
          <?php  } ?>

          <?php  if($_SESSION['apoteker'] || $_SESSION['admin'] || $_SESSION['adminapoteker']){ ?>
              
              
              <!-- Menu Input Obat -->
                   <li class="nav-item">
                <a href="?page=pemeriksaan_dokter" class="nav-link">
                <i class="nav-icon fas fa-mortar-pestle"></i>
                <p>Input Data Obat</p>
                </a>            
              </li>

            <!-- Menu Cetak Obat -->
                <li class="nav-item">
                <a href="?page=cetakobat" class="nav-link">
                <i class="nav-icon fas fa-mortar-pestle"></i>
                <p>Penebusan Obat</p>
                </a>            
              </li>
              
              <!-- Menu Stok Obat -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-pills"></i>
                <p>Stok Obat<i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
                </p>
              </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=tambahstok" class="nav-link">
                <i class="nav-icon fas fa-caret-right"></i>
                <p>Stok Obat  Masuk</p>
                </a>            
              </li>
              <li class="nav-item">
                <a href="?page=kurangstok" class="nav-link">
                <i class="nav-icon fas fa-caret-right"></i>
                <p>Stok Obat Keluar</p>
                </a>            
              </li>
              </ul>
          </li>

             
              
             
                
          <?php  } ?>

          <?php  if($_SESSION['admin'] || $_SESSION['adminapoteker']){ ?>
          
            <li class="nav-item">
                <a href="?page=pengeluaran" class="nav-link">
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <p>Pengeluaran</p>
                </a>            
              </li>
              
          <!-- Menu Master -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>Laporan - Laporan<i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <!-- Sub Menu Laporan Penjualan Obat-->
              <li class="nav-item">
                <a href="?page=lappenjualanobat" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Penjualan Obat</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="?page=lappendapatan" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Transaksi Pemeriksaan</p>
                </a>
              </li>


            <!-- Sub Menu Laporan Pendaftaran Pasien-->
              <li class="nav-item">
              <a href="?page=lapregis" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Registrasi Pasien</p>
                </a>
              </li>

              <li class="nav-item">
              <a href="?page=lapkeuangan" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Keuangan</p>
                </a>
              </li>

           <!-- Sub Menu Laporan Berobat Pasien-->
              <li class="nav-item">
              <a href="?page=lapkunjunganpasien" class="nav-link">
                  <i class="nav-icon fas fa-caret-right"></i>
                  <p>Kunjungan Pasien</p>
                </a>
              </li>
            </ul>
          </li>

          

              <?php  } ?>

              
          <li class="nav-item">
                <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-share-square"></i>
                <p>Logout</p>
                </a>            
              </li>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  


<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <?php 

                $page=$_GET['page'];
                $aksi=$_GET['aksi'];

                if($page == "dokter"){
                    if($aksi == ""){
                        include "page/dokter/dokter.php";
                    }
                    if ($aksi=="tambah"){
                        include "page/dokter/tambah.php";
                    }
                    if ($aksi=="ubah"){
                        include "page/dokter/ubah.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/dokter/hapus.php";
                    }
                }
                if($page == "obat"){
                    if($aksi == ""){
                        include "page/obat/obat.php";
                    }
                    if ($aksi=="tambah"){
                        include "page/obat/tambah.php";
                    }
                    if ($aksi=="ubah"){
                        include "page/obat/ubah.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/obat/hapus.php";
                    }
                }
                if($page == "diagnosa"){
                    if($aksi == ""){
                        include "page/diagnosa/diagnosa.php";
                    }
                    if ($aksi=="tambah"){
                        include "page/diagnosa/tambah.php";
                    }
                    if ($aksi=="ubah"){
                        include "page/diagnosa/ubah.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/diagnosa/hapus.php";
                    }
                }
                if($page == "akun"){
                  if($aksi == ""){
                      include "page/akun/akun.php";
                  }
                  if ($aksi=="ubah"){
                      include "page/akun/ubah.php";
                  }
                  if ($aksi=="hapus"){
                      include "page/akun/hapus.php";
                  }
              }
                if($page == "pasien"){
                    if($aksi == ""){
                        include "page/pasien/pasien.php";
                    }
                    if ($aksi=="tambah"){
                        include "page/pasien/tambah.php";
                    }
                    if ($aksi=="ubah"){
                        include "page/pasien/ubah.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/pasien/hapus.php";
                    }
                }
                if($page == "pengguna"){
                    if($aksi == ""){
                        include "page/pengguna/pengguna.php";
                    }
                    if ($aksi=="tambah"){
                        include "page/pengguna/tambah.php";
                    }
                    if ($aksi=="ubah"){
                        include "page/pengguna/ubah.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/pengguna/hapus.php";
                    }
                }
                if($page == "antrian"){
                    if($aksi == ""){
                        include "page/antrian/antrian.php";
                    }
                    if ($aksi=="tambah"){
                        include "page/antrian/tambah.php";
                    }
                    if ($aksi=="tambah_akun"){
                      include "page/antrian/tambah_akun.php";
                  }
                    if ($aksi=="ubah"){
                        include "page/antrian/ubah.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/antrian/hapus.php";
                    }
                    if ($aksi=="setuju"){
                      include "page/antrian/setuju.php";
                  }
                  if ($aksi=="tolak"){
                    include "page/antrian/tolak.php";
                }
                }
                if($page == "rekam_medis"){
                    if($aksi == ""){
                        include "page/rekam_medis/rekam_medis.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/rekam_medis/hapus.php";
                    }
                }
                if($page == "pemeriksaan_dokter"){
                    if($aksi == ""){
                        include "page/pemeriksaan_dokter/daftar.php";
                    }
                    if ($aksi=="pemeriksaan_dokter"){
                        include "page/pemeriksaan_dokter/pemeriksaan_dokter.php";
                    }
                    if ($aksi=="tambah_obat1"){
                        include "page/pemeriksaan_dokter/tambah_obat1.php";
                    }
                    if ($aksi=="tambah_obat2"){
                        include "page/pemeriksaan_dokter/tambah_obat2.php";
                    }
                    if ($aksi=="tambah_obat3"){
                      include "page/pemeriksaan_dokter/tambah_obat3.php";
                    }
                    if ($aksi=="tambah"){
                        include "page/pemeriksaan_dokter/tambah.php";
                    }
                    if ($aksi=="kurang"){
                        include "page/pemeriksaan_dokter/kurang.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/pemeriksaan_dokter/hapus.php";
                    }
                    if ($aksi=="tambahdosis"){
                        include "page/pemeriksaan_dokter/tambahdosis.php";
                    }
                    if ($aksi=="kurangdosis"){
                        include "page/pemeriksaan_dokter/kurangdosis.php";
                    }
                    
                }
                if($page == "tambahstok"){
                    if($aksi == ""){
                        include "page/tambahstok/tambahstok.php";
                    }
                    if ($aksi=="tambah"){
                        include "page/tambahstok/tambah.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/tambahstok/hapus.php";
                    }
                }
                if($page == "kurangstok"){
                  if($aksi == ""){
                      include "page/kurangstok/kurangstok.php";
                  }
                  if ($aksi=="kurang"){
                      include "page/kurangstok/kurang.php";
                  }
                  if ($aksi=="hapus"){
                      include "page/kurangstok/hapus.php";
                  }
              }
                if($page == "cetakobat"){
                    if($aksi == ""){
                        include "page/cetakobat/cetakobat.php";
                    } if($aksi == "nota"){
                        include "page/cetakobat/nota.php";
                    }
                }
                if($page == "pengeluaran"){
                  if($aksi == ""){
                      include "page/pengeluaran/pengeluaran.php";
                  }
                  if ($aksi=="tambah"){
                    include "page/pengeluaran/tambah.php";
                }
                if ($aksi=="ubah"){
                    include "page/pengeluaran/ubah.php";
                }
                if ($aksi=="hapus"){
                    include "page/pengeluaran/hapus.php";
                }
                }
                if($page == "laprm"){
                    if($aksi == ""){
                        include "page/laprm/laprm.php";
                    }
                    if ($aksi=="daftar"){
                        include "page/laprm/daftar.php";
                    }
                }
                if($page == "lappenjualanobat"){
                    if($aksi == ""){
                        include "page/lappenjualanobat/lappenjualanobat.php";
                    }
                    if($aksi == "grafik"){
                      include "page/lappenjualanobat/grafik_po.php";
                  }
                }
                if($page == "lappendapatan"){
                    if($aksi == ""){
                        include "page/lappendapatan/lappendapatan.php";
                    }
                }
                if($page == "lapkeuntungan"){
                  if($aksi == ""){
                      include "page/lapkeuntungan/lapkeuntungan.php";
                  }
              }
                if($page == "lapregis"){
                    if($aksi == ""){
                        include "page/lapregis/lapregis.php";
                    }
                }
                if($page == "lappemakaianobat"){
                    if($aksi == ""){
                        include "page/lappemakaianobat/lappemakaianobat.php";
                    }
                }
                if($page == "lapkeuangan"){
                  if($aksi == ""){
                      include "page/lapkeuangan/lapkeuangan.php";
                  }
              }
                if($page == "lapkunjunganpasien"){
                    if($aksi == ""){
                        include "page/lapkunjunganpasien/lapkunjunganpasien.php";
                    }
                }
                if($page == ""){
                    include "home.php";
                }

                ?>
                </div>
            </div>
        </section>


 <!-- /.content-wrapper -->
 <footer class="main-footer text center">
    <strong>Copyright &copy; 2023-2024 <a href="https://adminlte.io">Praktik Dokter dan Kefarmasian </a></strong>
  </footer>
  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<a href="#" class="dropdown-item">
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Sweet Alert -->
<script src="assets/sweet_alert/sweetalert2.min.css"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" 
integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="assets/hightcharts/highcharts.js"></script>
<script src="assets/hightcharts/series-label.js"></script>
<script src="assets/hightcharts/exporting.js"></script>
<script src="assets/hightcharts/export-data.js"></script>
<script src="assets/hightcharts/accessibility.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script type="text/javascript">
        window.onload = function() { jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
    </script>

<script>
  //Date range as a button
  $('#daterange-btn').daterangepicker(
      {
        
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        format : 'YYYY-MM-DD',
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'))
      });
      $('#reportrange span').html(moment().substract(29, 'days').format('YYYY-MM-DD') + ' - ' + moment.format('YYYY-MM-DD'))
</script>

<script>
  //Date picker
  $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>

<script>
  //Date picker
  $('#reservationdate2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<?php
if (isset($_SESSION['ambil']) && $_SESSION['ambil'] !='' )
{
  ?>
<script>
      Swal.fire({
  icon: 'error',
  title: 'Eror',
  text: 'Maaf, Pasien Sudah Mengambil Antrian Hari Ini!!!',

})
</script>
  <?php
  unset($_SESSION['ambil']);
}
?>

<?php
if (isset($_SESSION['sudah_bayar']) && $_SESSION['sudah_bayar'] !='' )
{
  ?>
<script>
      Swal.fire({
  icon: 'error',
  title: 'Eror',
  text: 'Anda Sudah Melakukan Pembayaran',

})
</script>
  <?php
  unset($_SESSION['sudah_bayar']);
}
?>

<?php
if (isset($_SESSION['sudah_verifikasi']) && $_SESSION['sudah_verifikasi'] !='' )
{
  ?>
<script>
      Swal.fire({
  icon: 'error',
  title: 'Eror',
  text: 'Anda Sudah Melakukan Proses Verifikasi',

})
</script>
  <?php
  unset($_SESSION['sudah_verifikasi']);
}
?>

<?php
if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] !='' )
{
  ?>
<script>
      Swal.fire({
					icon: 'success',
					title:'Success',
					text: 'Antrian Berhasil Diambil',
				}) 
</script>
  <?php
  unset($_SESSION['berhasil']);
}
?>

<?php
if (isset($_SESSION['verifikasi']) && $_SESSION['verifikasi'] !='' )
{
  ?>
<script>
      Swal.fire({
					icon: 'success',
					title:'Success',
					text: 'Proses Verifikasi Kehadiran Berhasil Dilakukan',
				}) 
</script>
  <?php
  unset($_SESSION['verifikasi']);
}
?>

<?php
if (isset($_SESSION['status']) && $_SESSION['status'] !='' )
{
  ?>
<script>
      Swal.fire({
					icon: 'success',
					title:'Success',
					text: 'Data Berhasil Disimpan',
				}) 
</script>
  <?php
  unset($_SESSION['status']);
}
?>

<?php
if (isset($_SESSION['ubah']) && $_SESSION['ubah'] !='' )
{
  ?>
<script>
      Swal.fire({
					icon: 'success',
					title:'Success',
					text: 'Data Berhasil Diubah',
				}) 
</script>
  <?php
  unset($_SESSION['ubah']);
}
?>

<?php
if (isset($_SESSION['tambah_diagnosa']) && $_SESSION['tambah_diagnosa'] !='' )
{
  ?>
<script>
      Swal.fire({
					icon: 'success',
					title:'Success',
					text: 'Diagnosa Berhasil Ditambahkan',
				}) 
</script>
  <?php
  unset($_SESSION['tambah_diagnosa']);
}
?>

<?php
if (isset($_SESSION['bayar']) && $_SESSION['bayar'] !='' )
{
  ?>
<script>
      Swal.fire({
					icon: 'success',
					title:'Success',
					text: 'Pembayaran Diterima, Terimakasih',
				}) 
</script>
  <?php
  unset($_SESSION['bayar']);
}
?>

<?php
if (isset($_SESSION['tambah_resep']) && $_SESSION['tambah_resep'] !='' )
{
  ?>
<script>
      Swal.fire({
					icon: 'success',
					title:'Success',
					text: 'Resep Obat Berhasil Ditambahkan',
				}) 
</script>
  <?php
  unset($_SESSION['tambah_resep']);
}
?>

<?php
if (isset($_SESSION['tambah_rm']) && $_SESSION['tambah_rm'] !='' )
{
  ?>
<script>
      Swal.fire({
					icon: 'success',
					title:'Success',
					text: 'Data Rekam Medis Berhasil Ditambahkan',
				}) 
</script>
  <?php
  unset($_SESSION['tambah_rm']);
}
?>


<?php
if (isset($_SESSION['periksa_awal']) && $_SESSION['periksa_awal'] !='' )
{
  ?>
<script>
      Swal.fire({
					icon: 'success',
					title:'Success',
					text: 'Data Hasil Pemeriksaan Awal Berhasil Disimpan',
				}) 
</script>
  <?php
  unset($_SESSION['periksa_awal']);
}
?>

<?php
if (isset($_SESSION['terdaftar']) && $_SESSION['terdaftar'] !='' )
{
  ?>
<script>
      Swal.fire({
					icon: 'success',
					title:'Success',
					text: 'Proses tambah akun berhasil dilakukan',
				}) 
</script>
  <?php
  unset($_SESSION['terdaftar']);
}
?>

<?php
if (isset($_SESSION['ambil']) && $_SESSION['ambil'] !='' )
{
  ?>
<script>
      Swal.fire({
  icon: 'error',
  title: 'Eror',
  text: 'Maaf, Pasien Sudah Mengambil Antrian Hari Ini!!!',

})
</script>
  <?php
  unset($_SESSION['ambil']);
}
?>

<?php
if (isset($_SESSION['nik_terdaftar']) && $_SESSION['nik_terdaftar'] !='' )
{
  ?>
<script>
      Swal.fire({
  icon: 'error',
  title: 'Eror',
  text: 'Maaf, NIK Yang Anda Inputkan Sudah Terdaftar!!',

})
</script>
  <?php
  unset($_SESSION['nik_terdaftar']);
}
?>

<script>
  $('.delete-data').on('click', function(e){
    e.preventDefault();
    var getLink = $(this).attr('href');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = getLink;
          
  }
})
  });
</script>

<script>
 const data = {
        labels: [
          'Pasien Lama',
          'Pasien Baru'
        ],
        datasets: [{
          label: 'My First Dataset',
          data: [
            <?php 
            $qry = $koneksi -> query("SELECT status_pasien FROM tb_rekam_medis_detail3 WHERE status_pasien = 'Pasien Lama'");
            $restL= $qry->num_rows;
            echo $restL;
            ?>,
             <?php 
            $qry = $koneksi -> query("SELECT status_pasien FROM tb_rekam_medis_detail3 WHERE status_pasien = 'Pasien Baru'");
            $restL= $qry->num_rows;
            echo $restL;
            ?>
             
          ],
          backgroundColor: [
           
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
          ],
          hoverOffset: 4
        }]
      };
      const config = {
        type: 'pie',
        data: data,
    };
    const pieChart = new Chart(
      document.getElementById('pieChart'),
      config
    )
</script>

<!-- Bar Chart Kunjungan Pasien -->
<?php
    $data_kunjungan = mysqli_query($koneksi, "SELECT tgl_pemeriksaan, COUNT(no_rm) AS total_kunjungan FROM view_rm GROUP BY tgl_pemeriksaan");

    $data_tanggal = array();
    $data_total_kunjungan = array();

    while ($data = mysqli_fetch_array($data_kunjungan)) {
      $data_tanggal[] = date('"d-m-Y"', strtotime($data['tgl_pemeriksaan'])); // Memasukan tanggal ke dalam array
      $data_total_kunjungan[] = $data['total_kunjungan']; // Memasukan total ke dalam array
    }
?>

<script>
  var barchart = document.getElementById('bar-chart');
        var chart = new Chart(barchart, {
          type: 'bar',
          data: {
            labels: <?php echo json_encode($data_tanggal) ?>, // Merubah data tanggal menjadi format JSON
            datasets: [{
              label: 'Data Kunjungan',
              data: <?php echo json_encode($data_total_kunjungan) ?>,
              backgroundColor: [
                'rgba(123, 182, 238, 1.0)',
                'rgba(123, 182, 238, 1.0)',
                'rgba(123, 182, 238, 1.0)',
                'rgba(123, 182, 238, 1.0)',
                'rgba(123, 182, 238, 1.0)',
                'rgba(123, 182, 238, 1.0)',
                'rgba(123, 182, 238, 1.0)'
              ],
              borderColor: [
                'rgba(34, 40, 34, 1.0)',
                'rgba(34, 40, 34, 1.0)',
                'rgba(34, 40, 34, 1.0)',
                'rgba(34, 40, 34, 1.0)',
                'rgba(34, 40, 34, 1.0)',
                'rgba(34, 40, 34, 1.0)',
                'rgba(34, 40, 34, 1.0)'
              ],
              borderWidth: 2
            }]
          }
        });
</script>


<!-- Line Chart Pendapatan -->


<?php
    $data_pendapatan = mysqli_query($koneksi, "SELECT tgl_transaksi, SUM(total_transaksi) AS total FROM rekapitulasi_transaksi GROUP BY tgl_transaksi");

    $data_tanggal2 = array();
    $data_total_pendapatan = array();

    while ($data2 = mysqli_fetch_array($data_pendapatan)) {
      $data_tanggal2[] = date('"d-m-Y"', strtotime($data2['tgl_transaksi'])); // Memasukan tanggal ke dalam array
      $data_total_pendapatan[] = $data2['total']; // Memasukan total ke dalam array
    }
?>

<!--
<script>
  var linechart = document.getElementById('line-chart');
        var chart = new Chart(linechart, {
          type: 'line',
          data: {
            labels: <?php echo json_encode($data_tanggal2) ?>, // Merubah data tanggal menjadi format JSON
            datasets: [{
              label: 'Total Pendapatan',
              data: <?php echo json_encode($data_total_pendapatan) ?>,
              borderColor: 'rgba(34, 40, 34, 1.0)',
              backgroundColor: 'transparent',
              borderWidth: 2
            }]
          }
        });
</script>

-->
</body>
</html>

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
 
