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
              <li class="breadcrumb-item"><a href="#">Stok</a></li>
              <li class="breadcrumb-item active">Stok Obat Masuk</li>
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
                <h3 class="card-title">Stok Obat Masuk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="?page=tambahstok&aksi=tambah" class="btn btn-primary btn-sm"><i class="nav-icon fa fa-download"></i> Tambah Data</a>
                            <a href="page/tambahstok/cetak.php" target="blank" class="btn btn-info btn-sm"><i class="nav-icon fas fa-print"></i> Cetak</a>
                            <br><br>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Satuan</th>
                    <th>Isi</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php
                    $no=1;
                    $sql= $koneksi->query("select id,tgl,tb_pembelian_detail.`kd_obat`,`nm_obat`,`satuan`,`isi`,jumlah from tb_pembelian_detail,tb_obat
                        where tb_pembelian_detail.kd_obat=tb_obat.kd_obat");
                    while($data= $sql->fetch_assoc()){
                      $tgl_masuk=$data['tgl'];


                    ?>
                                    
                    <tr >
                        <td class="text-center"><?php echo $no++;?></td>
                        <td class="text-center"><?php echo date ("d-m-Y", strtotime($tgl_masuk));?></td>
                        <td class="text-center"><?php echo $data['kd_obat']?></td>
                        <td><?php echo $data['nm_obat']?></td>
                        <td class="text-center"><?php echo $data['satuan']?></td>
                        <td class="text-center"><?php echo $data['isi']?></td>
                        <td class="text-center"><?php echo $data['jumlah']?></td>
                        <td class="text-center">
                           <a href="?page=tambahstok&aksi=hapus&id=<?php echo $data['id'];?>" 
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
       

    
   

