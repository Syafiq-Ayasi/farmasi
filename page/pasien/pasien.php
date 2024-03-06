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
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active">Data Pasien</li>
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
                <h3 class="card-title">Data Pasien</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="?page=pasien&aksi=tambah" class="btn btn-primary btn-sm">
              <i class="nav-icon fa fa-download"></i> Tambah Data</a>
              <br>
            
              <br>
              
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>No.</th>
                    <th>Nomor RM</th>
                    <th>Nama Pasien</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>Usia</th>
                    <th>Telepon</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    $no=1;
                    $sql=$koneksi->query("select*from tb_pasien");
                    while($data=$sql->fetch_assoc()){
                      $tgl_daftar=$data['tgldaftar'];
                      ?>

                  <tr class="text-center">
                    <td class="text-center"><?php echo $no++;?></td>
                    <td class="text-center"><?php echo $data['no_pasien']?></td>
                    <td><?php echo $data['nm_pasien']?></td>
                    <td><?php echo $data['nik']?></td>
                    <td class="text-center"><?php echo $data['alamat']?></td>
                    <td class="text-center"><?php echo $data['usia']?></td>
                    <td class="text-center"><?php echo $data['no_tlp']?></td>
                    <td class="text-center"><?php echo date ("d-m-Y", strtotime($tgl_daftar));?></td>
                    
                    <td class="text-center">
                      <a href="?page=pasien&aksi=ubah&no_pasien=<?php echo $data['no_pasien'];?>" class="btn btn-info">
                      <i class="nav-icon fas fa-edit" style="float:left;margin:0;" ></i></a>
                      <a href="?page=pasien&aksi=hapus&no_pasien=<?php echo $data['no_pasien'];?>" 
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

    
   

