<?php

	$kd_dokter = $_GET['kd_dokter'];
    $sql = $koneksi->query("delete from tb_dokter where kd_dokter='$kd_dokter'");
	if ($sql){
		$_SESSION['status'] = "Tambah Data Berhasil";
		$_SESSION['status_code'] = "success";
		echo "<meta http-equiv ='refresh' content='1;url=?page=dokter'>";
		  ?>
		 
		  <?php
	  }
  ?>
