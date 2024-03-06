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
              <li class="breadcrumb-item active">Data Dokter</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Dokter</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                 <a href="?page=dokter&aksi=tambah" class="btn btn-primary btn-sm">
              <i class="nav-icon fa fa-download"></i> Tambah Data</a>
              <br><br>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Nama Dokter</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Biaya Pemeriksaan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    $no=1;
                    $sql=$koneksi->query("select*from tb_dokter");
                    while($data=$sql->fetch_assoc()){
                      ?>

                  <tr >
                    <td class="text-center"><?php echo $no++;?></td>
                    <td class="text-center"><?php echo $data['kd_dokter']?></td>
                    <td><?php echo $data['nm_dokter']?></td>
                    
                    <td class="text-center"><?php echo $data['tlp']?></td>
                    <td class="text-center"><?php echo $data['alamat']?></td>
                    <td class="text-center">Rp.<?php echo number_format($data['biaya_pemeriksaan'])?></td>
                    <td class="text-center">
                      <a href="?page=dokter&aksi=ubah&kd_dokter=<?php echo $data['kd_dokter'];?>" class="btn btn-info">
                      <i class="nav-icon fas fa-edit" style="float:left;margin:0;" ></i></a>
                      <a  
                      href="?page=dokter&aksi=hapus&kd_dokter=<?php echo $data['kd_dokter'];?>" 
                      class="btn btn-danger delete-data"><i class="nav-icon fas fa-trash" style="float:left;margin:0;"></i></a>
                    </td>
                  </tr>
                  <?php
                    }
                    ?>
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

    
   

