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
              <li class="breadcrumb-item active">Transaksi Pemeriksaan</li>
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
                <h3 class="card-title">Laporan Transaksi Pemeriksaan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

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
                        <button type="submit" name="filter_tgl" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                        </div>
                    </div>
                </form>
               
                    


                <br>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No.</th>
                    <th>No Id Kunjungan</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Nama Pasien</th>
                    <th>Biaya Pemeriksaan</th>
                    <th>Biaya Pengobatan</th>
                    <th>Sub Harga</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                   
                   if(isset($_POST['filter_tgl'])){
                    $mulai = $_POST['tgl_mulai'];
                    $selesai = $_POST['tgl_selesai'];
                     
                     $sql=$koneksi->query("SELECT *FROM rekapitulasi_transaksi JOIN view_rm ON rekapitulasi_transaksi.no_rm=view_rm.no_rm where 
                     tgl_transaksi  BETWEEN '$mulai' and DATE_ADD('$selesai', INTERVAL 0 DAY)");
                   }else{
                    $sql=$koneksi->query("SELECT *FROM rekapitulasi_transaksi JOIN view_rm ON rekapitulasi_transaksi.no_rm=view_rm.no_rm order by 
                    tgl_transaksi");
                  }
                    $no=1;
                    while($data=$sql->fetch_assoc()){
                      $tgl_transaksi=$data['tgl_transaksi'];
                      ?>
                  <tr>
                    <td class ="text-center"><?php echo $no++;?></td>
                    <td class ="text-center"><?php echo $data['no_rm']?></td>
                    <td class ="text-center"><?php echo date ("d-m-Y", strtotime($tgl_transaksi));?></td>
                    <td class ="text-center"><?php echo $data['nm_pasien']?></td>
                    <td class ="text-center">Rp.<?php echo number_format($data['biaya_dokter'])?></td>
                     <td class ="text-center">Rp.<?php echo number_format ($data['biaya_obat'])?></td>
                     <td class ="text-center">Rp.<?php echo number_format($data['total_transaksi'])?></td>
                  </tr>
                        <?php $total_pendapatan+=$data['total_transaksi'];?>
                  <?php
                    }
                    ?>
                  </tbody>
                   <tfoot>
                        <th class ="text-center" colspan="6">Total Pendapatan</th>
                        <th class ="text-center">Rp.<?php echo number_format($total_pendapatan);?></th>
                        
            </tfoot> 
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