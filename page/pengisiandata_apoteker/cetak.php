<?php 

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	
	$koneksi=new mysqli("localhost","appg4189_aay","LimauManiS2024!","appg4189_farmasi");

	
	$pencetak=$_GET['dokter'];

	$norm=$_GET['no_rm'];

	//$sql1=$koneksi->query("select * from view_rm where no_rm='$norm'");
		//$tampil2=$sql1->fetch_assoc();

?>
<style>
	
	@media print{
		input.noPrint{
			display: none;
		}
	}
</style>
	<?php
		$tgl_periksa=$koneksi->query("select * from tb_rekam_medis where no_rm='$norm'");
    	$data_periksa=$tgl_periksa->fetch_assoc();
    	$tanggal_pemeriksaan=$data_periksa['tgl_pemeriksaan'];
		$tanggal = 3;
		$mulai = strtotime($tanggal_pemeriksaan);
		$selesai = strtotime("+3 days", $mulai);
        $sql=$koneksi->query("select * from view_rm where no_rm='$norm'");
        $tampil=$sql->fetch_assoc();
		$tanggal_lahir = $tampil['tgl_lhr'];
    ?>
<table border="1" width="100%" style="border-collapse: collapse;">
	<div align="center">
	
	<font size="6" color="red"><b>Praktik Dokter Umum dr. Tri Indriani</b></font><br>
	Jalan Purwodadi Ujung, Sidomulyo Barat, Tampan-Panam, Kota Pekanbaru<br>Telp:xxxx
	<caption>==================================================================</caption>
	</div>
</table>
	
	<table>
		<div align="center">
			<b>SURAT KETERANGAN DOKTER</b>	
		</div>
	</table>
	<br>
<center>
	<table  width=625>
		<tr>
			<td>
				<font size="3">
				Yang bertanda tangan dibawah ini menerangkan bahwa :      
				</font>
			</td>
		</tr>
	</table>
	</center>

	<table>
		<tr>
			<td>Nama</td>
			<td width="">: <?php echo $tampil['nm_pasien'];?></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td width="">: <?php echo date ("d-m-Y", strtotime($tanggal_lahir));?></td>
		</tr>
		<tr>
			<td>Pekerjaan</td>
			<td width="">: <?php echo $tampil['pekerjaan'];?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td width="">: <?php echo $tampil['alamat'];?></td>
		</tr>
	</table>
<br>
	<table  width=595>
		
		<tr>
			<td>
				<font size="3">
				Berdasarkan hasil pemeriksaan yang telah dilakukan, pasien tersebut berada dalam keadaan sakit sehingga 
				perlu istirahat selama 3 hari, mulai dari tanggal <?php echo date ("d-m-Y", strtotime($tanggal_pemeriksaan));?> s/d <?php echo date ("d-m-Y", $selesai);?>.  
				</font>
			</td>
		</tr>
	</table>
	
	<table>
		<table>
		<tr>
			<td>Diagnosa</td>
			<td width="">: <?php echo $tampil['ket'];?></td>
		</tr>
	</table>
	<br>
	<table  width=595>
		
		<tr>
			<td>
				<font size="3">
				Demikian surat keterangan ini diberikan untuk diketahui dan dipergunakan sebagaimana mestinya. 
				</font>
			</td>
		</tr>
	</table>

	<br>
	&nbspPekanbaru, <?php echo date ("d-m-Y", strtotime($tanggal_pemeriksaan));?>
	<br><br><br><br>
	&nbspdr.Tri Indriani
	<br><br><br><br><br>
	
















<input type="button" class="noPrint" value="Cetak" onclick="window.print()">