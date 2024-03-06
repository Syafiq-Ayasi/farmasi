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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Laporan Rekam Medis</li>
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
                <h3 class="card-title">Laporan Rekam Medis Pasien</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>No RM</th>
                        <th>Nama Pasien</th>
                        <th>Tgl Lahir</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                                    
                <?php
                $no=1;
                $sql= $koneksi->query("select  tb_pasien.no_pasien, nm_pasien,tgl_lhr,agama,alamat
                    from  tb_pasien, tb_rekam_medis
                    where tb_pasien.no_pasien=tb_rekam_medis.no_pasien
                    group by nm_pasien
                    ");
                while($data= $sql->fetch_assoc()){


                ?>
                                    
                <tr class="text-center">
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data['no_pasien']?></td>
                    <td><?php echo $data['nm_pasien']?></td>
                    <td><?php echo $data['tgl_lhr']?></td>
                    <td><?php echo $data['agama']?></td>
                    <td><?php echo $data['alamat']?></td>
                    <td>
                    <a href="?page=laprm&aksi=daftar&no_pasien=<?php echo $data['no_pasien'];?> " class="btn btn-success btn-sm"><i class="nav-icon fa fa-eye"></i> Lihat Rekam Medis</a>
                   
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

    
   

