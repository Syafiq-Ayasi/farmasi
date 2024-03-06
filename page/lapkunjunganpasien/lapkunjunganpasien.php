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
              <li class="breadcrumb-item active">Kunjungan Pasien</li>
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
                <h3 class="card-title">Laporan Kunjungan Pasien</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <br>
                <form method ="POST">
                    <div class="row clearfix">
                        <div class="col-md-3 ">
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tgl_mulai" class="form-control datetimepicker-input" data-target="#reservationdate"required/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                        </div>

                        <div class="col-md-3 ">
                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" name="tgl_selesai" class="form-control datetimepicker-input" data-target="#reservationdate2"required/>
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                        </div>
                        <div class="col-md-2 ">
                        <button type="submit" name="filter_tgl" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>

               

                <br>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No</th>
			        <th>Tgl Periksa</th>
              <th>No ID Kumjungan</th>
			        <th>Nomor RM</th>
			        <th>Nama Pasien</th>
			        <th>Alamat</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    if(isset($_POST['filter_tgl'])){
                      $mulai = $_POST['tgl_mulai'];
                      $selesai = $_POST['tgl_selesai'];

                      if($mulai!=null || $selesai!=null){
                        $sql=$koneksi->query("select tb_rekam_medis.tgl_pemeriksaan,no_rm,tb_pasien.no_pasien,nm_pasien,alamat 
						            from tb_pasien,tb_rekam_medis 
						            where tb_pasien.no_pasien=tb_rekam_medis.no_pasien and tgl_pemeriksaan BETWEEN '$mulai' and DATE_ADD('$selesai', INTERVAL 0 DAY)
						            group by tb_rekam_medis.no_pasien");
                      }else{
                        $sql=$koneksi->query("select * from view_rm order by tgl_pemeriksaan DESC");
                      }
                    }
                    else{
                     $sql=$koneksi->query("select * from view_rm order by tgl_pemeriksaan DESC");
                    }
                    $no=1;
                    
                    while($data=$sql->fetch_assoc()){
                      ?>
                  <tr class="text-center">
                    <td align="center"><?php echo $no++;?></td>
	                <td align="center"><?php echo date ('d F Y',strtotime($data['tgl_pemeriksaan']))?></td>
                  <td align="center"><?php echo $data['no_rm']?></td>
	                <td align="center"><?php echo $data['no_pasien']?></td>
	                <td><?php echo $data['nm_pasien']?></td>
	                <td><?php echo $data['alamat']?></td>
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