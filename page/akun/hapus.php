<?php

	$id_pasien = $_GET['id_pasien'];
    $sql = $koneksi->query("delete from user_antrian where id_pasien='$id_pasien'");
	if ($sql){
		$_SESSION['status'] = "Tambah Data Berhasil";
		$_SESSION['status_code'] = "success";
		echo "<meta http-equiv ='refresh' content='1;url=?page=akun'>";
		  ?>
		 
		  <?php
	  }
  ?>