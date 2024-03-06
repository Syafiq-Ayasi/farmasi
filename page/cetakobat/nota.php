<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tagihan Penebusan Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tagihan Penebusan Obat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php 

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	
	$koneksi=new mysqli("localhost","appg4189_aay","LimauManiS2024!","appg4189_farmasi");

	
	$pencetak=$_GET['petugas'];

	$norm=$_GET['no_rm'];
	
	
?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">Tagihan Penebusan Obat</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

       
        <table border="0">
        	<?php
        		$sql2=$koneksi->query("select * from view_rm where no_rm='$norm'");
        		$tampil=$sql2->fetch_assoc();
        	?>
    
        	<tr>
            <label>Data Pasien</label>
        		<td>Nama Pasien</td>
        		<td width="200px">: &nbsp&nbsp <?php echo $tampil['nm_pasien']; ?></td>&nbsp
        		<td width="10px"></td>
        		<td>Tgl Lahir</td>
        		<td>: &nbsp&nbsp <?php echo $tampil['tgl_lhr']; ?></td>
        	</tr>
        	<tr>
        		<td>Pekerjaan &nbsp&nbsp</td>
        		<td>: &nbsp&nbsp <?php echo $tampil['pekerjaan']; ?></td>
        		<td></td>
        		<td>Agama &nbsp&nbsp</td>
        		<td>: &nbsp&nbsp <?php echo $tampil['agama']; ?></td>
        	</tr>
        	<tr>
        		<td>Alamat &nbsp&nbsp</td>
        		<td>: &nbsp&nbsp <?php echo $tampil['alamat']; ?></td>
        		<td></td>
        		<td>No. RM &nbsp&nbsp</td>
        		<td>: &nbsp&nbsp <?php echo $tampil['no_pasien']; ?></td>
        	</tr>
        	<tr>
        		<td>Berat Badan &nbsp&nbsp</td>
        		<td>: &nbsp&nbsp <?php echo $tampil['bb']; ?>&nbspKg</td>
        		<td></td>
        		<td>Tinggi Badan &nbsp&nbsp</td>
        		<td>: &nbsp&nbsp <?php echo $tampil['tb']; ?>&nbspCm</td>
        	</tr>
        	<tr>
        		<td>Alergi Obat &nbsp&nbsp</td>
        		<td>: &nbsp&nbsp <?php echo $tampil['ao']; ?></td>
        	</tr>
        </table>

        <br>
            <table class="table table-bordered table-hover">
  <thead>
		          <tr class="text-center">
                <th align="center">No.</th>
                <th align="center">Nama Obat</th>
                <th align="center">Dosis</th>
                <th align="center">Jumlah Obat</th>
                <th align="center">Harga</th>
                <th width="120px">Sub Harga</th>
		         </tr>		
</thead>

	        <tbody>
		
		        <?php
	                $no=1;
	                $sql3= $koneksi->query("Select tb_rekam_medis_detail2.no_rm,tb_obat.nm_obat,jumlah,dosis,harga_jual, tb_dokter.biaya_pemeriksaan
                    from tb_rekam_medis_detail2,tb_obat,tb_rekam_medis, tb_dokter where
                    tb_rekam_medis_detail2.no_rm=tb_rekam_medis.no_rm and
                    tb_obat.kd_obat=tb_rekam_medis_detail2.kd_obat and tb_rekam_medis_detail2.no_rm='$norm'");
	                while($data= $sql3->fetch_assoc()){
	                ?>
		            <tr>
	                    <td align="center"><?php echo $no++;?>.</td>
	                    <td align="center"><?php echo $data['nm_obat']?>
	                    <td align="center"><?php echo $data['dosis']?> x 1&nbspHari</td>
                        <td align="center"><?php echo $data['jumlah']?></td>
			        	<td align="center">Rp.<?php echo $data['harga_jual']?></td>
			        	<td align="center">Rp.<?php echo $data['harga_jual']*$data['jumlah']?></td>
	                </tr>
                    <?php $total_belanja+=$data['harga_jual']*$data['jumlah'];?>
                    <?php $biaya_pemeriksaan_dokter=$data['biaya_pemeriksaan'];?>
	            <?php } ?> 
	        </tbody>
            

            <tfoot>
               <th class ="text-center" colspan="5">Total Akhir</th>
               <?php $total_akhir=$total_belanja+($biaya_pemeriksaan_dokter);?>
               <th class ="text-center">Rp.<?php echo number_format($total_akhir);?></th>
            </tfoot>
            <tfoot>
               <th class ="text-center" colspan="5">Total Penjualan Obat</th>
               <th class ="text-center">Rp.<?php echo number_format($total_belanja);?></th>
            </tfoot> 

            <tfoot>
               <th class ="text-center" colspan="5">Biaya Pemeriksaan Dokter</th>
               <th class ="text-center">Rp.<?php echo number_format ($biaya_pemeriksaan_dokter);?></th>
            </tfoot>
                </table>
                <br>

				<form method ="POST">
                        <input type="submit" name="simpan" value="Klik Jika Sudah Bayar" class="btn btn-primary float-right">
                </form>

         
                  
                 

		<?php
            if (isset($_POST["simpan"])){
                $tgl_transaksi = date("Y-m-d");
			        	$biaya_dokter = $biaya_pemeriksaan_dokter;
			        	$biaya_obat = $total_belanja;
				        $total_transaksi = $total_akhir;

                $bayar = $koneksi->query("select * from tb_rekam_medis where no_rm='$norm'");
                while ($data_bayar = $bayar->fetch_assoc()){
                $statusobat=$data_bayar['statusobat'];

                if($statusobat=='Belum Bayar'){
        
                  $koneksi->query("INSERT INTO rekapitulasi_transaksi (tgl_transaksi,biaya_dokter, biaya_obat,total_transaksi,no_rm,keterangan) 
                  VALUES ('$tgl_transaksi','$biaya_dokter','$biaya_obat','$total_transaksi','$norm','Biaya Pemeriksaan')");

                  $sql=$koneksi->query("update tb_rekam_medis set statusobat='Lunas' where no_rm='$norm'");
                  $_SESSION['bayar'] = "bayar obat";
                  $_SESSION['bayar'] = "success";
                  echo "<meta http-equiv ='refresh' content='2;url=index.php?page=cetakobat'>";
              ?>
                <?php
       
                }
                else{
                  $_SESSION['sudah_bayar'] = "sudah bayar";
                  $_SESSION['sudah_bayar'] = "success";
                  echo "<meta http-equiv ='refresh' content='2;url=index.php?page=cetakobat'>";
              ?>
       <?php
        }

       }
            }

        ?>
  
            </div>
              <!-- /.card-body -->

          
          <!-- /.col -->
    </div>
        <!-- /.row -->
    </div>
      <!-- /.container-fluid -->
</section>