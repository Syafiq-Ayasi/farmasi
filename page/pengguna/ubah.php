 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Pengguna</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php

    $id = $_GET['id'];
    $sql = $koneksi->query("select * from tb_pengguna where id='$id'");
    $tampil = $sql->fetch_assoc();

?>
      <div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Data Pengguna<small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body ">

                        <label for="">Nama Pengguna</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $tampil ['nama'];?>" class="form-control" />
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

                        <label for="">Level</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="level" class="form-control show-tick">
                                <option value="">--Pilih Level--</option>
                                <option value="admin" <?php if($tampil['level']=='admin'){
                                 echo "selected";}?>>Admin</option>
                                <option value="petugas" <?php if($tampil['level']=='petugas'){
                                 echo "selected";}?>>Petugas</option>
                                <option value="dokter" <?php if($tampil['level']=='dokter'){
                                 echo "selected";}?>>Dokter</option>
                                <option value="apoteker" <?php if($tampil['level']=='apoteker'){
                                 echo "selected";}?>>Apoteker</option>
                                 </select>
                            </div>
                        </div>


                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>
<?php 
if (isset($_POST['simpan'])){
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level=$_POST['level'];
    

        $sql=$koneksi->query("update tb_pengguna set nama='$nama', username='$username',password='$password',
        level='$level' where id='$id'");
         if ($sql){
          $_SESSION['status'] = "Tambah Data Berhasil";
      $_SESSION['status_code'] = "success";
      echo "<meta http-equiv ='refresh' content='2;url=index.php?page=pengguna'>";
          ?>
         
          <?php
         }
       }


?>