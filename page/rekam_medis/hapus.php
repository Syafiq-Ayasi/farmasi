<?php
$kode=$_GET['koderm'];

$id=$_GET['id'];


$sql=$koneksi->query("delete from tb_rekam_medis where id='$id'");
   if($sql){
    ?>
    <script type="text/javascript">
      alert ("Data Berhasil di Hapus");
          window.location.href="?page=rekam_medis";
          </script>
          <?php
   }
   ?>
