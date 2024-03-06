<?php

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$koneksi=new mysqli("localhost","appg4189_aay","LimauManiS2024!","appg4189_farmasi");


?>

<style>
	
	@media print{
		input.noPrint{
			display: none;
		}
	}
</style>

<table border="1" width="100%" style="border-collapse: collapse;">
	<div align="left">
	<img src="../../images/logoabc.png" width="75" height="75" style="float:left;margin:0 8px 4px 0;">
	<font size="6" color="red"><b>Praktik Dokter Umum dr. Tri Indriani</b></font><br>
	Jalan Purwodadi Ujung, Sidomulyo Barat, Tampan-Panam, Kota Pekanbaru<br>Telp:Satu xxxx</div>
	<caption>==================================================================</caption>

	<caption>Laporan Pemasukan Obat Periode: <b><?php echo $_POST['tgl_awal']?></b> s/d <b><?php echo $_POST['tgl_akhir']?></b>
		<?php

			$tgl_awal=$_POST['tgl_awal'];
			$tgl_akhir=$_POST['tgl_akhir'];

	        ?>
	</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Tgl Input</th>
			<th>Kode Obat</th>
			<th>Nama Obat</th>
			<th>Jumlah</th>
		</tr>		
	</thead>
	<tbody>
		<?php

			$tgl_awal=$_POST['tgl_awal'];
			$tgl_akhir=$_POST['tgl_akhir'];

	        $no=1;
	        $sql= $koneksi->query("select tgl,tb_obat.kd_obat,tb_obat.nm_obat,sum(jumlah)as jmlTotal 
									from tb_pembelian_detail, tb_obat 
									where tb_obat.kd_obat=tb_pembelian_detail.kd_obat and
									      tgl between '$tgl_awal' and '$tgl_akhir'
									      group by kd_obat");
	        while($data= $sql->fetch_assoc()){


	        ?>
	        
	        <tr>
	            <td align="center"><?php echo $no++;?></td>
	            <td align="center"><?php echo date ('d F Y',strtotime($data['tgl']))?></td>
	            <td align="center"><?php echo $data['kd_obat']?></td>
	            <td align="center"><?php echo $data['nm_obat']?></td>
	            <td align="center"><?php echo $data['jmlTotal']?></td>
	        </tr>
	        <?php 

	        //$total_pj=$total_pj+$data['total'];
	        //$total_profit=$total_profit+$profit;

	    	} 

	    	?>        
	</tbody>

</table>
<br>
<input type="button" class="noPrint" value="Cetak"onclick="window.print()">