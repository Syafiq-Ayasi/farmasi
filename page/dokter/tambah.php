 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Dokter</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Dokter</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php
 
// menghubungkan dengan koneksi database
$koneksi=new mysqli("localhost","appg4189_aay","LimauManiS2024!","appg4189_farmasi");
 
// mengambil data pasien dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(kd_dokter) as kodeTerbesar FROM tb_dokter");
$data = mysqli_fetch_array($query);
$nodokter = $data['kodeTerbesar'];
 
// mengambil angka dari nmor pasien terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($nodokter, 1, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk nomor pasien baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "D";
$nodokter = $huruf . sprintf("%03s", $urutan);
?>
<script>
function jumlah(){
    
var hrg_beli = document.getElementById('harga_beli').value;
var hrg_jual = document.getElementById('harga_jual').value;
var rslt = parseInt(hrg_jual) - parseInt(hrg_beli);
if(!isNaN(rslt)){
    document.getElementById('profit').value = rslt;
}

}
</script>

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
                                <input type="text" name="kode" value="<?php echo $nodokter; ?>" class="form-control" readonly="" />
                            </div>
                        </div>

                        <label for="">Nama Dokter</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama"class="form-control" required/>
                            </div>
                        </div>

                        <label for="">Tempat Lahir</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="tmplahir"class="form-control" required/>
                            </div>
                        </div>

                        <label for="">Telpon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="telpon"class="form-control" maxlength="2" required/>
                            </div>
                        </div>

                        <label for="">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat"class="form-control" required/>
                            </div>
                        </div>

                         <label for="">Biaya Pemeriksaan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="biaya_pemeriksaan" class="form-control" required/>
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
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$tmplahir=$_POST['tmplahir'];
$telpon=$_POST['telpon'];
$alamat=$_POST['alamat'];
$biaya_pemeriksaan=$_POST['biaya_pemeriksaan'];

    $sql=$koneksi->query("insert into tb_dokter values('$kode','$nama','$tmplahir','$telpon','$alamat','$biaya_pemeriksaan')");
    if ($sql){
      $_SESSION['status'] = "Tambah Data Berhasil";
      $_SESSION['status_code'] = "success";
      echo "<meta http-equiv ='refresh' content='2;url=index.php?page=dokter'>";
        ?>
       
        <?php
    }
}

?>