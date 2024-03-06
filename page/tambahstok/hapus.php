<?php

	$id = $_GET['id'];
    $sql = $koneksi->query("delete from tb_pembelian_detail where id='$id'");

	if ($sql){
		$_SESSION['status'] = "Tambah Data Berhasil";
		$_SESSION['status_code'] = "success";
		echo "<meta http-equiv ='refresh' content='1;url=?page=tambahstok'>";
		  ?>
		 
		  <?php
	  }
  ?>