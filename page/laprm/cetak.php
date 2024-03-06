<?php 

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	
	$koneksi=new mysqli("localhost","appg4189_aay","LimauManiS2024!","appg4189_farmasi");

	
	$pencetak=$_GET['petugas'];

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

<table border="1" width="100%" style="border-collapse: collapse;">
	<div align="center">
	
	<font size="6" color="red"><b>Praktik Dokter Umum dr. Tri Indriani</b></font><br>
	Jalan Purwodadi Ujung, Sidomulyo Barat, Tampan-Panam, Kota Pekanbaru<br>Telp:xxxx
	<caption>==================================================================</caption>
	</div>
</table>
<table border="0">
	<?php
		$sql2=$koneksi->query("select * from view_rm where no_rm='$norm'");
		$tampil=$sql2->fetch_assoc();
		$tanggal_lahir = $tampil['tgl_lhr'];
	?>

	<tr>
		<td>Nama Pasien</td>
		<td width="200px">: &nbsp&nbsp <?php echo $tampil['nm_pasien']; ?></td>&nbsp
		<td width="10px"></td>
		<td>Tgl Lahir</td>
		<td>: &nbsp&nbsp <?php echo date ("d-m-Y", strtotime($tanggal_lahir));?></td>
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
	<table border="1" cellspacing="0px" cellpadding="5">
	<thead>
		<tr>
			<th width="90px">Tanggal</th>
			<th width="300px">Keluhan/ Diagnosis</th>
			<th width="120px">Diagnosa</th>
			<th>Dokter</th>
		</tr>		
	</thead>

	<tbody>
		<?php
	        $no=1;
	        $sql3= $koneksi->query("select * from view_rm where no_rm='$norm'");
	        while($data= $sql3->fetch_assoc()){
				$tanggal_pemeriksaan = $data['tgl_pemeriksaan'];
	        ?>
		    <tr align="center">
	            <td><?php echo date ("d-m-Y", strtotime($tanggal_pemeriksaan));?></td>
	            <td><?php echo $data['keluhan']?><br>
	            	
	            </td>
	            <td><?php echo $data['diagnosa']?><br>
	            	<?php echo $data['ket']?>
	            </td>
	            <td><?php echo $data['nm_dokter']?></td>
	        </tr>
	        <?php } ?>        
	</tbody>
	</table>
<br>

	<b>Resep Obat :</b>
	<br>
	<table border="1" cellspacing="0px" cellpadding="5">
	<thead>
		<tr>
			<th>No</th>
			<th>Jenis Obat</th>
			<th>Jumlah</th>
            <th>Dosis</th>
		</tr>		
	</thead>
<tbody>
		<?php
	        $no=1;
	        $sql3= $koneksi->query("Select tb_rekam_medis_detail2.no_rm,tb_obat.nm_obat,jumlah,dosis
            from tb_rekam_medis_detail2,tb_obat,tb_rekam_medis where
            tb_rekam_medis_detail2.no_rm=tb_rekam_medis.no_rm and
            tb_obat.kd_obat=tb_rekam_medis_detail2.kd_obat and tb_rekam_medis_detail2.no_rm='$norm'");
	        while($data= $sql3->fetch_assoc()){
	        ?>
		    <tr align="center">
	            <td><?php echo $no++;?>.</td>
	            <td ><?php echo $data['nm_obat']?>
	            <td ><?php echo $data['jumlah']?></td>
	            <td><?php echo $data['dosis']?> x 1&nbspHari</td>
	        </tr>
	        <?php } ?>        
	</tbody>
</table>
	<br>
<input type="button" class="noPrint" value="Cetak" onclick="window.print()">