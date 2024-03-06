<?php

	$jumlah=$_GET['jumlah'];
	$id=$_GET['id'];
	$kode_pj=$_GET['kode_pj'];
	//$harga_jual=$_GET['harga_jual'];
	$kode_b=$_GET['kode_b'];


	$sql=$koneksi->query("delete from tb_rekam_medis_detail2 where id='$id'");
	//$sql1=$koneksi->query("update tb_penjualan set total=(total-$harga_jual) where id='$id'");
	$sql2=$koneksi->query("update tb_obat set stok=(stok+$jumlah) where kd_obat='$kode_b'");

	if($sql || $sql1 || $sql2){

		?>
			<script>
				window.location.href="?page=pemeriksaan_dokter&aksi=tambah_obat3&no_rm=<?php echo $kode_pj ?>";
			</script>

		<?php
	}

?>