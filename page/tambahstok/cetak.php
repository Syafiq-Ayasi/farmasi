<?php

	$koneksi=new mysqli("localhost","appg4189_aay","LimauManiS2024!","appg4189_farmasi");


?>

<style>
	
	@media print{
		input.noPrint{
			display: none;
		}
	}
</style>
<br>
<table border="1" width="100%" style="border-collapse: collapse;">
	<div align="center">
	
	<font size="6" color="red"><b>Praktik Dokter Umum dr. Tri Indriani</b></font><br>
	Jalan Purwodadi Ujung, Sidomulyo Barat, Tampan-Panam, Kota Pekanbaru<br>Telp:xxxx
	<caption>==================================================================</caption>
	<caption>Laporan Data Stok Masuk</caption></div>
	
	<thead>
		<tr>
			<th>No</th>
			<th>Tgl Input</th>
			<th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Satuan</th>
            <th>Isi</th>
            <th>Jumlah</th>
			
		</tr>		
	</thead>
	<tbody>
		<?php
	        $no=1;
	        $sql= $koneksi->query("select id,tgl,tb_pembelian_detail.`kd_obat`,`nm_obat`,`satuan`,`isi`,jumlah from tb_pembelian_detail,tb_obat
                where tb_pembelian_detail.kd_obat=tb_obat.kd_obat");
	        while($data= $sql->fetch_assoc()){


	        ?>
	        
	        <tr align="center">
	            <td class="text-center"><?php echo $no++;?></td>
                <td class="text-center"><?php echo $data['tgl']?></td>
                <td class="text-center"><?php echo $data['kd_obat']?></td>
                <td class="text-center"><?php echo $data['satuan']?></td>
                <td class="text-ceter"><?php echo $data['nm_obat']?></td>
                <td class="text-center"><?php echo $data['isi']?></td>
                <td class="text-center"><?php echo $data['jumlah']?></td>
	        </tr>
	        <?php } ?>        
	</tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak"onclick="window.print()">