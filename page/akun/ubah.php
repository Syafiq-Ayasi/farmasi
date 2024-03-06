 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Akun Pasien</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Akun Pasien</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php

    $id_pasien = $_GET['id_pasien'];
    $sql = $koneksi->query("select * from user_antrian where id_pasien='$id_pasien'");
    $tampil = $sql->fetch_assoc();

?>
      <div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Data Akun Pasien<small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body ">

                        <label for="">NIK</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nik" value="<?php echo $tampil ['no_identitas'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Nama</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $tampil ['nama'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Telepon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="telepon" value="<?php echo $tampil ['telepone'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Username</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="username" value="<?php echo $tampil ['username'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Password</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="password" value="<?php echo $tampil ['password'];?>" class="form-control" />
                            </div>
                        </div>


                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>
<?php 
if (isset($_POST['simpan'])){
    $nik=$_POST['nik'];
    $nama=$_POST['nama'];
    $telepon=$_POST['telepon'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    

    $sql=$koneksi->query("update user_antrian set no_identitas='$nik', nama='$nama', telepone='$telepon', username='$username', 
    password='$password' where id_pasien='$id_pasien'");
    if ($sql){
      $_SESSION['status'] = "Tambah Data Berhasil";
      $_SESSION['status_code'] = "success";
      echo "<meta http-equiv ='refresh' content='2;url=index.php?page=akun'>";
      ?>
  
      <?php
     }
    }
?>