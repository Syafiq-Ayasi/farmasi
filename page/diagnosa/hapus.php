<?php

	$kd_diagnosa = $_GET['kd_diagnosa'];
    $sql = $koneksi->query("delete from tb_diagnosa where kd_diagnosa='$kd_diagnosa'");
	if ($sql){
		$_SESSION['status'] = "Tambah Data Berhasil";
		$_SESSION['status_code'] = "success";
		echo "<meta http-equiv ='refresh' content='1;url=?page=diagnosa'>";
		  ?>
		 
		  <?php
	  }
  ?>
