<?php
date_default_timezone_set('Asia/Jakarta');
	$tgl=date("Y-m-d");
	
		

  $sql2=$koneksi->query("SELECT *FROM rekapitulasi_transaksi");

	while ($tampil2=$sql2->fetch_assoc()) {
		$total_pendapatan+=$tampil2['total_transaksi'];
	}

	$sql3=$koneksi->query("select * from tb_pengeluaran");

	while ($tampil3=$sql3->fetch_assoc()) {
		$jumlah_pengeluaran+=$tampil3 ['jml_pengeluaran'];
	}

	$sql4=$koneksi->query("select * from tb_pasien");

	while ($tampil4=$sql4->fetch_assoc()) {
		$jumlah_pasien=$sql4->num_rows;
	}

	$sql5=$koneksi->query("select * from tb_rekam_medis where tgl_pemeriksaan='$tgl'");

	while ($tampil5=$sql5->fetch_assoc()) {
		$jumlah_remek=$sql5->num_rows;
	}

	$sql6=$koneksi->query("select * from tb_dokter");



	while ($tampil6=$sql6->fetch_assoc()) {
		$jumlah_dokter=$sql6->num_rows;
	}
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!--<center><img src="images/logo1.jpg" width="150" height="150" align="middle"></center>-->
   <marquee>SELAMAT DATANG DI SISTEM INFORMASI MANAJEMEN PRAKTIK DOKTER</marquee>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $data['nama']; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
            
              <h3>Rp.<?php echo number_format($total_pendapatan);?></h3> 
                <p>Pendapatan</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="?page=lappendapatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3>Rp.<?php echo number_format($jumlah_pengeluaran);?></h3>
                <p>Pengeluaran</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="?page=pengeluaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3><?php echo $jumlah_pasien; ?></h3>
                <p>Data Pasien</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="?page=pasien" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo $jumlah_remek; ?></h3>
                <p>Pasien Hari Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

  <!-- PIE CHART -->
  
       
          <div class="col-lg-6"style="float:left;">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Peringatan Stok Obat Yang Habis</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                  
                </div>
              </div>
              <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No.</th>                               
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Stok</th>
                    
                  </tr>
                  </thead>

                  <tbody>
                  <?php
                    $no=1;
                      $ambildatastok = mysqli_query($koneksi, "select * from tb_obat where stok <  tb_obat.batas_min");
                     while($fetch=mysqli_fetch_array($ambildatastok)){
                    ?>
                                    
                    <tr>
                        <td class="text-center"><?php echo $no++;?></td>
                        <td class="text-center"><?php echo $fetch['kd_obat']?></td>
                        <td class ="text-center"><?php echo $fetch['nm_obat']?></td>
                        <td class="text-center"><?php echo $fetch['stok']?></td>
                    </tr>
                    <?php } ?>      
                  </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            
                
                 <div class="col-lg-12" >
                 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Perbandingan Kunjungan Pasien</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
              <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="col-lg-12" >
                 <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Grafik Pendapatan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
              <canvas id="line-chart"></canvas>
        
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="col-lg-12" >
                 <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Grafik Kunjungan Pasien</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
              <canvas id="bar-chart"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            
            

  
