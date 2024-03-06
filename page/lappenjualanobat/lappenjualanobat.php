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
              <li class="breadcrumb-item active">Penjualan Obat</li>
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
                <h3 class="card-title">Laporan Penjualan Obat</h3>
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
                    <th>Tanggal Transaksi</th>
                    <th>Nama Obat</th>
                    <th>Jumlah</th>
                    <th>Harga Jual</th>
                    <th>Sub Harga</th>
                    <th>Profit</th>
                    <th>Sub Profit</th>
                    
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    if(isset($_POST['filter_tgl'])){
                      $mulai = $_POST['tgl_mulai'];
                      $selesai = $_POST['tgl_selesai'];

                      if($mulai!=null || $selesai!=null){
                        $sql=$koneksi->query("Select tb_rekam_medis_detail2.no_rm,tb_obat.nm_obat,jumlah,dosis,harga_jual,profit,tgl_pembelian
                        from tb_rekam_medis_detail2,tb_obat,tb_rekam_medis where
                        tb_rekam_medis_detail2.no_rm=tb_rekam_medis.no_rm and
                        tb_obat.kd_obat=tb_rekam_medis_detail2.kd_obat and tgl_pembelian BETWEEN '$mulai' and DATE_ADD('$selesai', INTERVAL 0 DAY)");
                      }else{
                        $sql=$koneksi->query("Select tb_rekam_medis_detail2.no_rm,tb_obat.nm_obat,jumlah,dosis,harga_jual,profit,tgl_pembelian
                    from tb_rekam_medis_detail2,tb_obat,tb_rekam_medis where
                    tb_rekam_medis_detail2.no_rm=tb_rekam_medis.no_rm and
                    tb_obat.kd_obat=tb_rekam_medis_detail2.kd_obat");
                      }
                    }
                    else{
                      $sql=$koneksi->query("Select tb_rekam_medis_detail2.no_rm,tb_obat.nm_obat,jumlah,dosis,harga_jual,profit,tgl_pembelian
                    from tb_rekam_medis_detail2,tb_obat,tb_rekam_medis where
                    tb_rekam_medis_detail2.no_rm=tb_rekam_medis.no_rm and
                    tb_obat.kd_obat=tb_rekam_medis_detail2.kd_obat");
                    }
                    $no=1;
                    
                    while($data=$sql->fetch_assoc()){
                      $tgl_beli=$data['tgl_pembelian'];
                      ?>
                  <tr class="text-center">
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data['no_rm']?></td>
                    <td><?php echo date ("d-m-Y", strtotime($tgl_beli));?></td>
                    <td><?php echo $data['nm_obat']?></td>
                    <td><?php echo $data['jumlah']?></td>
                    <td><?php echo number_format ($data['harga_jual'])?></td>
                    <td align="center">Rp.<?php echo number_format ($data['harga_jual']*$data['jumlah'])?></td>
                    <td><?php echo number_format ($data['profit'])?></td>
                    <td align="center">Rp.<?php echo number_format ($data['profit']*$data['jumlah'])?></td>
                  </tr>
                  <?php $total_penjualan_obat+=$data['harga_jual']*$data['jumlah'];?>
                  <?php $total_profit_penjualan_obat+=$data['profit']*$data['jumlah'];?>
                  <?php
                    }
                    ?>
                  </tbody>
                  <tfoot>

                        <th class ="text-center" colspan="5">Total Profit Penjualan Obat</th>
                        <th class ="text-center" colspan="6">Rp.<?php echo number_format($total_profit_penjualan_obat);?></th>
            </tfoot> 
                   <tfoot>
                        <th class ="text-center" colspan="5">Total Penjualan Obat</th>
                        <th class ="text-center" colspan="6">Rp.<?php echo number_format($total_penjualan_obat);?></th>
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