<?php

	$id_pengeluaran = $_GET['id'];
    $sql = $koneksi->query("delete from tb_pengeluaran where id='$id_pengeluaran'");
	if ($sql){
		$_SESSION['status'] = "Tambah Data Berhasil";
		$_SESSION['status_code'] = "success";
		echo "<meta http-equiv ='refresh' content='1;url=?page=pengeluaran'>";
		  ?>
		 
		  <?php
	  }
  ?>


