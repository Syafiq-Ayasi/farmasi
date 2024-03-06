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
              <li class="breadcrumb-item"><a href="#">Laporan</a></li>
              <li class="breadcrumb-item active">Pemakaian Obat</li>
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
                <h3 class="card-title">Laporan Pemakaian Obat</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <br>
                <form method ="POST">
                    <div class="row clearfix">
                        <div class="col-md-2 ">
                            <input type="date" name="tgl_mulai" class="form-control">
                        </div>
                        <div class="col-md-2 ">
                             <input type="date" name="tgl_selesai" class="form-control">
                        </div>
                        <div class="col-md-2 ">
                        <button type="submit" name="filter_tgl" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>

               

                <br>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
			              <th>Tgl Pemakaian</th>
			              <th>Kode Obat</th>
			              <th>Nama Obat</th>
			              <th>Jumlah</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    if(isset($_POST['filter_tgl'])){
                      $mulai = $_POST['tgl_mulai'];
                      $selesai = $_POST['tgl_selesai'];

                      if($mulai!=null || $selesai!=null){
                         $sql=$koneksi->query("select tgl_pemeriksaan,tb_obat.kd_obat,tb_obat.nm_obat,sum(jumlah)as jmlTotal 
									      from tb_obat,tb_rekam_medis, tb_rekam_medis_detail2 
									      where tb_obat.kd_obat=tb_rekam_medis_detail2.kd_obat and
									      tb_rekam_medis.no_rm=tb_rekam_medis_detail2.no_rm and tgl_pemeriksaan BETWEEN '$mulai' and DATE_ADD('$selesai', INTERVAL 0 DAY)
									      group by kd_obat");
                      }else{
                        $sql=$koneksi->query("select tgl_pemeriksaan,tb_obat.kd_obat,tb_obat.nm_obat,sum(jumlah)as jmlTotal 
									      from tb_obat,tb_rekam_medis, tb_rekam_medis_detail2 
									      where tb_obat.kd_obat=tb_rekam_medis_detail2.kd_obat and
									      tb_rekam_medis.no_rm=tb_rekam_medis_detail2.no_rm 
									      group by kd_obat");
                      }
                    }
                    else{
                     $sql=$koneksi->query("select tgl_pemeriksaan,tb_obat.kd_obat,tb_obat.nm_obat,sum(jumlah)as jmlTotal 
									      from tb_obat,tb_rekam_medis, tb_rekam_medis_detail2 
									      where tb_obat.kd_obat=tb_rekam_medis_detail2.kd_obat and
									      tb_rekam_medis.no_rm=tb_rekam_medis_detail2.no_rm 
									      group by kd_obat");
                    }

                    $no=1;
                    
                    while($data=$sql->fetch_assoc()){
                      ?>
                  <tr>
                    <td align="center"><?php echo $no++;?></td>
	                  <td align="center"><?php echo date ('d F Y',strtotime($data['tgl_pemeriksaan']))?></td>
	                  <td align="center"><?php echo $data['kd_obat']?></td>
	                  <td align="center"><?php echo $data['nm_obat']?></td>
	                  <td align="center"><?php echo $data['jmlTotal']?></td>
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