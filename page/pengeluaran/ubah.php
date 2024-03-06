 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Pengeluaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Pengeluaran</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php

    $id_pengeluaran = $_GET['id'];
    $sql = $koneksi->query("select * from tb_pengeluaran where id='$id_pengeluaran'");
    $tampil = $sql->fetch_assoc();

?>
      <div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Data Pengeluaran<small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body ">
                       
                <div class="form-group">
                        <label for="">Tanggal Pengeluaran</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tglpengeluaran" value="<?php echo $tampil['tanggal_pengeluaran'];?>" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                        

                        <label for="">Jumlah Pengeluaran</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="jmlhpengeluaran" value="<?php echo $tampil['jml_pengeluaran'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Keterangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="ket" value="<?php echo $tampil['keterangan'];?>" class="form-control" />
                            </div>
                        </div>

                        


                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary float-right">
                        </form>
                        

<?php 
if (isset($_POST['simpan'])){
    $tanggal_pengeluaran=$_POST['tglpengeluaran'];
    $jumlah=$_POST['jmlhpengeluaran'];
    $keterangan=$_POST['ket'];


    $sql=$koneksi->query("update tb_pengeluaran set tanggal_pengeluaran='$tanggal_pengeluaran',jml_pengeluaran='$jumlah',keterangan='$keterangan' where id='$id_pengeluaran'");
    if ($sql){
      $_SESSION['status'] = "Tambah Data Berhasil";
      $_SESSION['status_code'] = "success";
      echo "<meta http-equiv ='refresh' content='2;url=index.php?page=pengeluaran'>";
        ?>
       
        <?php
    }
}

?>