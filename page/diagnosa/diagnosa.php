 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Data Diagnosa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php 

      ob_start();
      session_start();
      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

      $koneksi=new mysqli("localhost","appg4189_aay","LimauManiS2024!","appg4189_farmasi");


      if($_SESSION['petugas'] || $_SESSION['dokter'] || $_SESSION['apoteker']){
              //header("location:index.php");
              ?>
              <script type="text/javascript">
              alert ("Anda Tidak Berhak Mengakses Halaman ini");
              window.location.href="logout.php";
              </script>
              <?php
          }else{

      ?>


<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Diagnosa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <a href="?page=diagnosa&aksi=tambah" class="btn btn-primary btn-sm"><i class="nav-icon fa fa-download"></i> Tambah Data</a>
                  <br><br>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                      <th>No.</th>
                      <th>Kode Diagnosa</th>
                      <th>Diagnosa ICD 10</th>
                      <th>Aksi</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php
                    $no=1;
                    $sql= $koneksi->query("select * from tb_diagnosa");
                    while($data= $sql->fetch_assoc()){


                    ?>
                                     
                    <tr class="text-center">
                        <td width="20px"><?php echo $no++;?></td>
                        <td width="30px"><?php echo $data['kd_diagnosa']?></td>
                        <td width="250px"><?php echo $data['nm_diagnosa']?></td>
                        <td width="100px">
                                <a href="?page=diagnosa&aksi=ubah&kd_diagnosa=<?php echo $data['kd_diagnosa'];?> " class="btn btn-info"><i class="nav-icon fas fa-edit" style="float:left;margin:0;" ></i></a>
                                <a href="?page=diagnosa&aksi=hapus&kd_diagnosa=<?php echo $data['kd_diagnosa'];?>" class="btn btn-danger delete-data">
                                <i class="nav-icon fas fa-trash" style="float:left;margin:0;"></i></a>
                            </td>
                    </tr>
                    <?php } ?>        
                  </tbody>
                  </table>
                  
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
          </div>
        
                            
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      <?php 

    }

?>  
    </section>

    
   

