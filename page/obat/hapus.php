<?php

	$kd_obat = $_GET['kd_obat'];
    $sql = $koneksi->query("delete from tb_obat where kd_obat='$kd_obat'");
	if ($sql){
		$_SESSION['status'] = "Tambah Data Berhasil";
		$_SESSION['status_code'] = "success";
		echo "<meta http-equiv ='refresh' content='1;url=?page=obat'>";
		  ?>
		 
		  <?php
	  }
  ?>


