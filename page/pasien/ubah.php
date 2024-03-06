 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Pasien</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Pasien</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php

$no_pasien = $_GET['no_pasien'];
$sql = $koneksi->query("select * from tb_pasien where no_pasien='$no_pasien'");
$tampil = $sql->fetch_assoc();

?>

<div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Data Pasien<small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body ">
                        

                        <label for="">Nama Pasien</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $tampil['nm_pasien'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">NIK</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nik" value="<?php echo $tampil['nik'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Jenis Kelamin</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="jkel" class="form-control show-tick">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="L" <?php if($tampil['j_kel']=='L'){
                                echo "selected";}?>>Laki-Laki</option>
                                <option value="P" <?php if($tampil['j_kel']=='P'){
                                echo "selected";}?>>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <label for="">Pekerjaan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="pekerjaan" value="<?php echo $tampil['pekerjaan'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Agama</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="agama" class="form-control show-tick">
                                <option value="">--Pilih Agama--</option>
                                <option value="Islam" <?php if($tampil['agama']=='Islam'){
                                echo "selected";}?>>Islam</option>
                                <option value="Kristen" <?php if($tampil['agama']=='Kristen'){
                                echo "selected";}?>>Kristen</option>
                                <option value="Hindu" <?php if($tampil['agama']=='Hindu'){
                                echo "selected";}?>>Hindu</option>
                                <option value="Budha" <?php if($tampil['agama']=='Budha'){
                                echo "selected";}?>>Budha</option>
                                </select>
                            </div>
                        </div>

                        <label for="">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat" value="<?php echo $tampil['alamat'];?>" class="form-control" />
                            </div>
                        </div>

                       

                        <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tgllahir" value="<?php echo $tampil['tgl_lhr'];?>"class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                        <label for="">Usia</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="usia" value="<?php echo $tampil['usia'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Telepon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="telepon" value="<?php echo $tampil['no_tlp'];?>" class="form-control" />
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>
<?php 
if (isset($_POST['simpan'])){
   date_default_timezone_set('Asia/Jakarta');
   $date=date("Y-m-d H:i:s");
   $nomor=$_POST['nomor'];
   $nama=$_POST['nama'];
   $nik=$_POST['nik'];
   $jkel=$_POST['jkel'];
   $pekerjaan=$_POST['pekerjaan'];
   $agama=$_POST['agama'];
   $alamat=$_POST['alamat'];
   $tgllahir=$_POST['tgllahir'];
   $usia=$_POST['usia'];
   $telepon=$_POST['telepon'];
   
   

        $sql=$koneksi->query("update tb_pasien set nm_pasien='$nama', nik='$nik', j_kel='$jkel', pekerjaan='$pekerjaan', agama='$agama',
        alamat='$alamat', tgl_lhr='$tgllahir', usia='$usia', no_tlp='$telepon' where no_pasien='$no_pasien'");
        if ($sql){
          $_SESSION['status'] = "Tambah Data Berhasil";
      $_SESSION['status_code'] = "success";
      echo "<meta http-equiv ='refresh' content='2;url=index.php?page=pasien'>";
          ?>
         
          <?php
         }
        }
?>