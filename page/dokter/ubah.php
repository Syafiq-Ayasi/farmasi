 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Dokter</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Dokter</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php

    $kd_dokter = $_GET['kd_dokter'];
    $sql = $koneksi->query("select * from tb_dokter where kd_dokter='$kd_dokter'");
    $tampil = $sql->fetch_assoc();

?>
      <div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Data Dokter<small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body ">
                       
                        
                        <label for="">Kode Dokter</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode" value="<?php echo $tampil['kd_dokter'];?>" class="form-control" readonly />
                            </div>
                        </div>

                        <label for="">Nama Dokter</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $tampil['nm_dokter'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Tempat Lahir</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="tmplahir" value="<?php echo $tampil['tmp_lhr'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Telpon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="tlp" value="<?php echo $tampil['tlp'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat" value="<?php echo $tampil['alamat'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Biaya Pemeriksaan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="biaya_pemerik" value="<?php echo $tampil['biaya_pemeriksaan'];?>" class="form-control" />
                            </div>
                        </div>


                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary float-right">
                        </form>
                        

<?php 
if (isset($_POST['simpan'])){
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$tmplahir=$_POST['tmplahir'];
$tlp=$_POST['tlp'];
$alamat=$_POST['alamat'];
$biaya_pemeriksaan=$_POST['biaya_pemerik'];


    $sql=$koneksi->query("update tb_dokter set nm_dokter='$nama',tmp_lhr='$tmplahir',tlp='$tlp',alamat='$alamat',biaya_pemeriksaan='$biaya_pemeriksaan' where kd_dokter='$kode'");
    if ($sql){
      $_SESSION['ubah'] = "Tambah Data Berhasil";
      $_SESSION['status_code'] = "success";
      echo "<meta http-equiv ='refresh' content='2;url=index.php?page=dokter'>";
        ?>
       
        <?php
    }
}

?>