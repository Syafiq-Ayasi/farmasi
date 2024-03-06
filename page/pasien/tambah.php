 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Pasien</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Pasien</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <?php
 
 // menghubungkan dengan koneksi database
 $koneksi=new mysqli("localhost","appg4189_aay","LimauManiS2024!","appg4189_farmasi");

  
 // mengambil data pasien dengan kode paling besar
 $query = mysqli_query($koneksi, "SELECT max(no_pasien) as kodeTerbesar FROM tb_pasien");
 $data = mysqli_fetch_array($query);
 $nopasien = $data['kodeTerbesar'];
  
 // mengambil angka dari nmor pasien terbesar, menggunakan fungsi substr
 // dan diubah ke integer dengan (int)
 $urutan = (int) substr($nopasien, 3, 5);
  
 // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
 $urutan++;
  
 // membentuk nomor pasien baru
 // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
 // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
 // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
 $huruf = "PSN";
 $nopasien = $huruf . sprintf("%05s", $urutan);
 ?>
 



    <!-- Main content -->
 <section class="content">
    
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
                   
                        <div class="form-group">
                        <label for="">Nomor RM</label>
                                 <input type="text" name="nomor" value="<?php echo $nopasien; ?>" class="form-control" readonly="" />
                        </div>
                      
                        
                     
                        <div class="form-group">
                        <label for="">Nama Pasien</label>
                                <input type="text" name="nama" class="form-control" required />
                        </div>

                        <div class="form-group">
                        <label for="">NIK</label>
                                <input type="number" name="nik" class="form-control" required />
                        </div>

                       
                        <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <div class="form-line">
                                <select name="jkel" class="form-control show-tick" required >
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>

                   
                        <div class="form-group">
                        <label for="">Pekerjaan</label>
                                <input type="text" name="pekerjaan"class="form-control" required />
                        </div>

               
                        <div class="form-group">
                        <label for="">Agama</label>
                        <div class="form-line">
                                <select name="agama" class="form-control show-tick" required >
                                <option value="">--Pilih Agama--</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                </select>
                            </div>
                        </div>

                
                        <div class="form-group">
                        <label for="">Alamat</label>
                        <div class="form-line">
                                <input type="text" name="alamat"class="form-control" required />
                            </div>
                        </div>

                       
                        <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tgllahir" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
              
                        <div class="form-group">
                        <label for="">Usia</label>
                        <div class="form-line">
                                <input type="text" name="usia"class="form-control" required />
                            </div>
                        </div>

                 
                        <div class="form-group">
                        <label for="">Telepon</label>
                        <div class="form-line">
                                <input type="number" name="no_tlp"class="form-control" required />
                            </div>
                        </div>

                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="simpan" name="simpan" class="btn btn-primary" id="test">simpan</button>
                  
                </div>
              </form>
               <?php 
if (isset($_POST['simpan'])){

date_default_timezone_set('Asia/Jakarta');
$date=date("Y-m-d H:i:s");
$nomor=$_POST['nomor'];
$nama=$_POST['nama'];
$nik=$_POST['nik'];
$kelamin=$_POST['jkel'];
$pekerjaan=$_POST['pekerjaan'];
$agama=$_POST['agama'];
$alamat=$_POST['alamat'];
$tgllahir=$_POST['tgllahir'];
$telepon=$_POST['no_tlp'];
$usia=$_POST['usia'];



    $sql=$koneksi->query("insert into tb_pasien (no_pasien, nm_pasien, nik, j_kel, pekerjaan, agama, alamat, tgl_lhr, 
    usia, no_tlp, tgldaftar) values('$nomor','$nama', '$nik','$kelamin','$pekerjaan','$agama', '
    $alamat','$tgllahir','$usia','$telepon','$date')");
    if ($sql){
      $_SESSION['status'] = "Tambah Data Berhasil";
      $_SESSION['status_code'] = "success";
      echo "<meta http-equiv ='refresh' content='2;url=index.php?page=pasien'>";
        ?>
       
        <?php
    }
}

?>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>