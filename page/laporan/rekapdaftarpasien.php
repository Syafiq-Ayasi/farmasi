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

	<caption>Rekap Pendaftaran Pasien Periode: <b><?php echo $_POST['tgl_awal']?></b> s/d <b><?php echo $_POST['tgl_akhir']?></b>

	</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Tgl Daftar</th>
			<th>Nomor Pasien</th>
			<th>Nama Pasien</th>
			<th>JK</th>
			<th>Agama</th>
			<th>Alamat</th>
			<th>Tgl Lahir</th>
			<th>Usia</th>
			<th>Telpon</th>
			<th>Status</th>
		</tr>		
	</thead>
	<tbody>
		<?php

			$tgl_awal=$_POST['tgl_awal'];
			$tgl_akhir=$_POST['tgl_akhir'];

	        $no=1;
	        $sql= $koneksi->query("select * from tb_pasien where tgldaftar between '$tgl_awal' and '$tgl_akhir' ");
	        while($data= $sql->fetch_assoc()){


	        ?>
	        
	        <tr>
	            <td align="center"><?php echo $no++;?></td>
	            <td align="center"><?php echo date ('d F Y',strtotime($data['tgldaftar']))?></td>
	            <td align="center"><?php echo $data['no_pasien']?></td>
	            <td><?php echo $data['nm_pasien']?></td>
	            <td align="center"><?php echo $data['j_kel']?></td>
	            <td align="center"><?php echo $data['agama']?></td>
	            <td><?php echo $data['alamat']?></td>
	            <td align="center"><?php echo $data['tgl_lhr']?></td>
	            <td align="center"><?php echo $data['usia']?></td>
	            <td align="center"><?php echo $data['no_tlp']?></td>
	            <td align="center"><?php echo $data['status']?></td>
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