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
              <li class="breadcrumb-item active">Data Antrian</li>
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
                <h3 class="card-title">Data Antrian</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                 <a href="?page=antrian&aksi=tambah_akun" class="btn btn-success btn-sm">
              <i class="nav-icon fa fa-user-plus"></i> Daftar Akun Pasien</a>
              <a href="?page=antrian&aksi=tambah" class="btn btn-primary btn-sm">
              <i class="nav-icon fa fa-download"></i> Ambil Antrian</a>
              <br><br>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No.</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Tanggal Antrian</th>
                    <th>Nomor Antrian</th>
                    <th>Status Antrian</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    $tgl=date("Y-m-d");
                    $no=1;
                    $sql=$koneksi->query("SELECT *FROM user_antrian JOIN tb_antrian ON user_antrian.id_pasien=tb_antrian.user_id and tanggal_kunjungan='$tgl' order by no_antrian");
                    while($data=$sql->fetch_assoc()){
                      $tgl_kunjungan=$data['tanggal_kunjungan'];
                      ?>

                  <tr >
                    <td class="text-center"><?php echo $no++;?></td>
                    <td class="text-center"><?php echo $data['no_identitas']?></td>
                    <td class="text-center"><?php echo $data['nama']?></td>
                    <td class="text-center"><?php echo $data['telepone']?></td>
                    <td class="text-center"><?php echo date ("d-m-Y", strtotime($tgl_kunjungan));?></td>
                    <td class="text-center"><?php echo $data['no_antrian']?></td>
                    <td class="text-center"><span class="badge badge-primary"><?php echo $data['status_antrian']?></span></td>
                   
                    <td class="text-center">
                      <a href="?page=antrian&aksi=setuju&id_pasien=<?php echo $data['id_pasien'];?>" class="btn btn-success">
                      <i class="nav-icon fas fa-user-check" style="float:left;margin:0;" ></i></a>

                      <a href="?page=antrian&aksi=tolak&id_pasien=<?php echo $data['id_pasien'];?>" class="btn btn-danger">
                      <i class="nav-icon fas fa-user-times" style="float:left;margin:0;" ></i></a>
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

    
   

