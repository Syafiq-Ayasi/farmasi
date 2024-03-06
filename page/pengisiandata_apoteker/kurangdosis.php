<?php

	$id=$_GET['id'];
	$kode_pj=$_GET['kode_pj'];
	//$dosis=$_POST['dosis'];
	$kode_b=$_GET['kode_b'];


	$sql=$koneksi->query("update tb_rekam_medis_detail2 set dosis=(dosis-1) where id='$id'");
	//$sql1=$koneksi->query("update tb_rekam_medis_detail2 set total=(total+$harga_jual) where id='$id'");
	//$sql2=$koneksi->query("update tb_obat set stok=(stok-1) where kd_obat='$kode_b'");

	if($sql){

		?>
			<script>
				window.location.href="?page=pemeriksaan_dokter&aksi=tambah_obat3&no_rm=<?php echo $kode_pj ?>";
			</script>

		<?php
	}

?>