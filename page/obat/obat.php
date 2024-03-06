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
              <li class="breadcrumb-item active">Data Obat</li>
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


if($_SESSION['petugas'] || $_SESSION['dokter']){
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
                <h3 class="card-title">Data Obat</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                   <a href="?page=obat&aksi=tambah" class="btn btn-primary btn-sm"><i class="nav-icon fa fa-download"></i> Tambah Data</a>
                   <br><br>


                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No.</th>                               
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Satuan</th>
                    <th>Isi</th>
                    <th>Stok Obat</th>
                    <th>Harga Jual</th>
                    
                    <th>Minimum Persediaan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php
                    $no=1;
                    $sql= $koneksi->query("select*from tb_obat");
                    while($data= $sql->fetch_assoc()){


                    ?>
                                    
                    <tr>
                        <td class="text-center"><?php echo $no++;?></td>
                        <td class="text-center"><?php echo $data['kd_obat']?></td>
                        <td><?php echo $data['nm_obat']?></td>
                        <td class="text-center"><?php echo $data['satuan']?></td>
                        <td class="text-center"><?php echo $data['isi']?></td>
                        <td class="text-center"><?php echo $data['stok']?></td>

                        <td class="text-center"><?php echo $data['harga_jual']?></td>

                        <td class="text-center"><?php echo $data['batas_min']?></td>
                        <td class="text-center">
                                <a href="?page=obat&aksi=ubah&kd_obat=<?php echo $data['kd_obat'];?> " class="btn btn-info"><i class="nav-icon fas fa-edit" style="float:left;margin:0;" ></i></a>
                                <a href="?page=obat&aksi=hapus&kd_obat=<?php echo $data['kd_obat'];?>" 
                                class="btn btn-danger delete-data"><i class="nav-icon fas fa-trash" style="float:left;margin:0;"></i></a>
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
    </section>
    <?php 

    }

?>  
       

    
   

