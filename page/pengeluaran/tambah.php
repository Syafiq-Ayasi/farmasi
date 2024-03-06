 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Pengeluaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Pengeluaran</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



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
                        <input type="text" name="tglpengeluaran" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                        <label for="">Total Pengeluaran</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="jmlh_pengeluaran"class="form-control" required/>
                            </div>
                        </div>

                        <label for="">Keterangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="ket"class="form-control" required/>
                            </div>
                        </div>

                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="simpan" name="simpan" class="btn btn-primary float-right">Simpan</button>
                </div>
              </form>

<?php 
if (isset($_POST['simpan'])){
$tanggal_pengeluaran=$_POST['tglpengeluaran'];
$jumlah=$_POST['jmlh_pengeluaran'];
$keterangan=$_POST['ket'];


    $sql=$koneksi->query("insert into tb_pengeluaran values('','$tanggal_pengeluaran','$jumlah','$keterangan')");
    if ($sql){
      $_SESSION['status'] = "Tambah Data Berhasil";
      $_SESSION['status_code'] = "success";
      echo "<meta http-equiv ='refresh' content='2;url=index.php?page=pengeluaran'>";
        ?>
       
        <?php
    }
}

?>