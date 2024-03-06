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
              <li class="breadcrumb-item active">Keuangan</li>
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
                <h3 class="card-title">Laporan Keuangan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form method ="POST">
                    <div class="row clearfix">
                        <div class="col-md-3 ">
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tgl_mulai" class="form-control datetimepicker-input" data-target="#reservationdate" required/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                        </div>

                        <div class="col-md-3 ">
                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" name="tgl_selesai" class="form-control datetimepicker-input" data-target="#reservationdate2" required/>
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
                  <tr class ="text-center">
                    <th>No.</th>
                    <th>Tanggal Transaksi</th>
                    <th>Rincian Transaksi</th>
                    <th>Total Pendapatan</th>
                    <th>Total Pengeluaran</th>
                    <th>Saldo</th>
                    
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                      if(isset($_POST['filter_tgl'])){
                          $mulai = $_POST['tgl_mulai'];
                          $selesai = $_POST['tgl_selesai'];

                          if($mulai!=null || $selesai!=null){
                            $sql=$koneksi->query("SELECT tgl_transaksi as tanggal_transaksi, keterangan as keterangan_transaksi, (sum(total_transaksi)) as pendapatan, null as pengeluaran 
                             FROM rekapitulasi_transaksi WHERE tgl_transaksi BETWEEN '$mulai' and DATE_ADD('$selesai', INTERVAL 0 DAY) group by tanggal_transaksi 
                             union
                             SELECT tanggal_pengeluaran as tanggal_transaksi, keterangan as keterangan_transaksi, null as pendapatan,
                             jml_pengeluaran as pengeluaran FROM tb_pengeluaran WHERE tanggal_pengeluaran BETWEEN '$mulai' and DATE_ADD('$selesai', INTERVAL 0 DAY) order by tanggal_transaksi asc ");
                          }else{
                            $sql=$koneksi->query("SELECT tgl_transaksi as tanggal_transaksi, keterangan as keterangan_transaksi, (sum(total_transaksi)) as pendapatan, null as pengeluaran 
                            FROM rekapitulasi_transaksi group by tanggal_transaksi 
                            union
                            SELECT tanggal_pengeluaran as tanggal_transaksi, keterangan as keterangan_transaksi, null as pendapatan,
                            jml_pengeluaran as pengeluaran FROM tb_pengeluaran order by tanggal_transaksi asc ");
                          }
                        }
                        else{
                           $sql=$koneksi->query("SELECT tgl_transaksi as tanggal_transaksi, keterangan as keterangan_transaksi, (sum(total_transaksi)) as pendapatan, null as pengeluaran 
                            FROM rekapitulasi_transaksi group by tanggal_transaksi 
                            union
                            SELECT tanggal_pengeluaran as tanggal_transaksi, keterangan as keterangan_transaksi, null as pendapatan,
                            jml_pengeluaran as pengeluaran FROM tb_pengeluaran order by tanggal_transaksi asc ");
                         }
                   
                     
                      
                    $no=1;
                    $saldo=0;
                    while($data=$sql->fetch_assoc()){
                      $tgl_transaksi=$data['tanggal_transaksi'];
                      $saldo += $data ['pendapatan'];
                      $saldo -= $data ['pengeluaran'];
                      ?>
                  <tr>
                    <td class ="text-center"><?php echo $no++;?></td>
                    <td class ="text-center"><?php echo date ("d-m-Y", strtotime($tgl_transaksi));?></td>
                    <td class ="text-center"><?php echo $data['keterangan_transaksi']?></td>
                    <td class="text-center">Rp.<?php echo ($data['pendapatan'] !== null) ? number_format($data['pendapatan']) : '0'; ?></td>
                    <td class="text-center">Rp.<?php echo ($data['pengeluaran'] !== null) ? number_format($data['pengeluaran']) : '0'; ?></td>
                    <td class ="text-center">Rp.<?php echo number_format($saldo);?></td>
                  </tr>
                        
                  <?php
                    }
                    ?>
                  </tbody>
                   <tfoot>
                        <th class ="text-center" colspan="5">Total Pendapatan-Pengeluaran</th>
                        <th class ="text-center">Rp.<?php echo number_format($saldo);?></th>
                        
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