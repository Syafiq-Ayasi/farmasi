 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Akun Pasien</li>
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
                <h3 class="card-title">Daftar Akun Pasien<small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body ">

                        <label for="">NIK</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="nik"class="form-control" required/>
                            </div>
                        </div>

                        <label for="">Nama</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama"class="form-control" required/>
                            </div>
                        </div>

                        <label for="">Telepon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="telepon" class="form-control" required/>
                            </div>
                        </div>

                        <label for="">Username</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="username" class="form-control" required/>
                            </div>
                        </div>

                        <label for="">Password</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="password" class="form-control" required />
                            </div>
                        </div>

                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="simpan" name="simpan" class="btn btn-primary float-right">Tambah Akun</button>
                </div>
              </form>

<?php 
if (isset($_POST['simpan'])){
$nik=$_POST['nik'];
$nama=$_POST['nama'];
$telepon=$_POST['telepon'];
$username=$_POST['username'];
$password=$_POST['password'];

 //pengecekan pasien sudah punya akun atau belum
 $query_cek_user = mysqli_query($koneksi, "SELECT * FROM user_antrian WHERE no_identitas='$nik'" );
 $cek_user_result = mysqli_fetch_array($query_cek_user);

    if ($cek_user_result){
      $_SESSION['nik_terdaftar'] = "nik sudah terdaftar";
      $_SESSION['nik_terdaftar'] = "error";
      echo "<meta http-equiv ='refresh' content='2;url=index.php?page=antrian'>";
  ?>
        <?php
    }else{
        $sql = $koneksi->query("insert into user_antrian (id_pasien,no_identitas,nama,telepone,username,password,created_ad,status_) values ('','$nik','$nama','$telepon', '$username', '$password', NOW(), 1)");
        $_SESSION['terdaftar'] = "akun terdaftar";
        $_SESSION['terdaftar'] = "success";
        echo "<meta http-equiv ='refresh' content='2;url=index.php?page=antrian'>";
    ?>
         
         <?php
     }
}

?>