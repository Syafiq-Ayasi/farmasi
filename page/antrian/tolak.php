<?php

$id = $_GET['id_pasien'];
    $nik=$koneksi->query("select * from user_antrian where id_pasien='$id'");
    $data_nik=$nik->fetch_assoc();
    $nik_user=$data_nik['no_identitas'];
    $tgl=date("Y-m-d");


    $status = $koneksi->query("select * from tb_antrian where user_id='$id'");
    while ($data_status = $status->fetch_assoc()){
    $statusantrian=$data_status['status_antrian'];

    if($statusantrian=='Dalam Antrian' ){
        $sql = $koneksi->query("update tb_antrian set status_antrian='Tidak Datang' where user_id='$id' and tanggal_kunjungan='$tgl'");
        $sql = $koneksi->query("update tb_pasien set status='Sudah' where nik='$nik_user'");
            $_SESSION['verifikasi'] = "verifikasi dilakukan";
            $_SESSION['verifikasi'] = "success";
            echo "<meta http-equiv ='refresh' content='2;url=index.php?page=antrian'>";
?>
    <?php

    }
    else{
      $_SESSION['sudah_verifikasi'] = "sudah verifikasi";
      $_SESSION['sudah_verifikasi'] = "Error";
      echo "<meta http-equiv ='refresh' content='2;url=index.php?page=antrian'>";
  ?>
<?php
}
    }

    

?>



