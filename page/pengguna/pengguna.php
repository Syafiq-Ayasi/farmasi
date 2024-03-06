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
              <li class="breadcrumb-item active">Data Pengguna</li>
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
                <h3 class="card-title">Data Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="?page=pengguna&aksi=tambah" class="btn btn-primary btn-sm">
              <i class="nav-icon fa fa-download"></i> Tambah Data</a>
              <br><br>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No.</th>
                    <th>Nama Pengguna</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    
                    <th>Aksi</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    $no=1;
                    $sql=$koneksi->query("select*from tb_pengguna");
                    while($data=$sql->fetch_assoc()){
                      ?>

                  <tr class="text-center">
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data['nama']?></td>
                    <td><?php echo $data['username']?></td>
                    <td><?php echo $data['password']?></td>
                    <td><?php echo $data['level']?></td>
                    
                    <td>
                      <a href="?page=pengguna&aksi=ubah&id=<?php echo $data['id'];?>" class="btn btn-info">
                      <i class="nav-icon fas fa-edit" style="float:left;margin:0;" ></i></a>
                      <a 
                      href="?page=pengguna&aksi=hapus&id=<?php echo $data['id'];?>" 
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

    
   

