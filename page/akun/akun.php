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
              <li class="breadcrumb-item active">Data Akun Pasien</li>
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
                <h3 class="card-title">Data Akun Pasien</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                
              
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No.</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    $no=1;
                    $sql=$koneksi->query("select*from user_antrian");
                    while($data=$sql->fetch_assoc()){
                      ?>

                  <tr >
                    <td class="text-center"><?php echo $no++;?></td>
                    <td class="text-center"><?php echo $data['no_identitas']?></td>
                    <td class="text-center"><?php echo $data['nama']?></td>
                    <td class="text-center"><?php echo $data['telepone']?></td>
                    <td class="text-center"><?php echo $data['username']?></td>
                    <td class="text-center"><?php echo $data['password']?></td>
                
                    <td class="text-center">
                      <a href="?page=akun&aksi=ubah&id_pasien=<?php echo $data['id_pasien'];?>" class="btn btn-info">
                      <i class="nav-icon fas fa-edit" style="float:left;margin:0;" ></i></a>
                      <a 
                      href="?page=akun&aksi=hapus&id_pasien=<?php echo $data['id_pasien'];?>" 
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

    
   

