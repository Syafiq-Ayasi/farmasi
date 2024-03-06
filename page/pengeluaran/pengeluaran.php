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
              <li class="breadcrumb-item active">Data Pengeluaran</li>
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
                <h3 class="card-title">Data Pengeluaran</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                 <a href="?page=pengeluaran&aksi=tambah" class="btn btn-primary btn-sm">
              <i class="nav-icon fa fa-download"></i> Tambah Data</a>
              <br><br>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No.</th>
                    <th>Tanggal Pengeluaran</th>
                    <th>Total Pengeluaran</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    $no=1;
                    $sql=$koneksi->query("select*from tb_pengeluaran");
                    while($data=$sql->fetch_assoc()){
                        $tanggal_pengeluaran=$data['tanggal_pengeluaran'];
                      ?>

                  <tr >
                    <td class="text-center"><?php echo $no++;?></td>
                    <td class="text-center"><?php echo date ("d-m-Y", strtotime($tanggal_pengeluaran));?></td>
                    <td class="text-center">Rp.<?php echo number_format($data['jml_pengeluaran'])?></td>
                    <td class="text-center"><?php echo $data['keterangan']?></td>
                    <td class="text-center">
                      <a href="?page=pengeluaran&aksi=ubah&id=<?php echo $data['id'];?>" class="btn btn-info">
                      <i class="nav-icon fas fa-edit" style="float:left;margin:0;" ></i></a>
                      <a  
                      href="?page=pengeluaran&aksi=hapus&id=<?php echo $data['id'];?>" 
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

    
   

