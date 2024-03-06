<?php

	$no_pasien = $_GET['no_pasien'];
    $sql = $koneksi->query("delete from tb_pasien where no_pasien='$no_pasien'");

	if ($sql){
		$_SESSION['status'] = "Tambah Data Berhasil";
		$_SESSION['status_code'] = "success";
		echo "<meta http-equiv ='refresh' content='1;url=?page=pasien'>";
		  ?>
		 
		  <?php
	  }
  ?>