 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Obat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php
 
 // https://www.malasngoding.com
 // menghubungkan dengan koneksi database
 $koneksi=new mysqli("localhost","appg4189_aay","LimauManiS2024!","appg4189_farmasi");

  
 // mengambil data pasien dengan kode paling besar
 $query = mysqli_query($koneksi, "SELECT max(kd_obat) as kodeTerbesar FROM tb_obat");
 $data = mysqli_fetch_array($query);
 $kdobat = $data['kodeTerbesar'];
  
 // mengambil angka dari nmor pasien terbesar, menggunakan fungsi substr
 // dan diubah ke integer dengan (int)
 $urutan = (int) substr($kdobat, 3, 5);
  
 // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
 $urutan++;
  
 // membentuk nomor pasien baru
 // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
 // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
 // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
 $huruf = "OBT";
 $kdobat = $huruf . sprintf("%05s", $urutan);
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
                <h3 class="card-title">Data Obat<small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body ">
                        
      
                        <label for="">Kode Obat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode" value="<?php echo $kdobat; ?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Nama Obat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama"class="form-control" required/>
                            </div>
                        </div>

                        <label for="">Satuan</label>
                        <div class="form-group">
                            <div class="form-line">
                            <select name="satuan" class="form-control show-tick" required>
                                <option value="">---Pilih Satuan---</option>
                                <option value="AMPUL">Ampul</option>
                                <option value="BFLS">BFLS</option>
                                <option value="BOTOL">Botol</option>
                                <option value="BOX">Box</option>
                                <option value="BUTIR">Butir</option>
                                <option value="DUS">Dus</option>
                                <option value="FLS">FLS</option>
                                <option value="KALENG">Kaleng</option>
                                <option value="KRTN">Krtn</option>
                                <option value="OVULA">Ovula</option>
                                <option value="PACK">Pack</option>
                                <option value="PCS">Pcs</option>
                                <option value="POT">Pot</option>
                                <option value="ROL">Rol</option>
                                <option value="SACHET">Sachet</option>
                                <option value="STRIP">Strip</option>
                                <option value="SUPP">Supp</option>
                                <option value="TABLET">Tablet</option>
                                <option value="TES">Tes</option>
                                <option value="TUBE">Tube</option>
                                <option value="VIAL">Vial</option>
                            </select>
                            </div>
                        </div>

                        <label for="">Isi</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="isi"class="form-control" required/>
                            </div>
                        </div>

                        <label for="">Stok</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="stok"class="form-control" required/>
                            </div>
                        </div>

                        <label for="">Harga Beli</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="hbeli" id="harga_beli" onkeyup="jumlah()" class="form-control" required/>
                            </div>
                        </div>

                        <label for="">Harga Jual</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="hjual" id="harga_jual" onkeyup="jumlah()" class="form-control" required/>
                            </div>
                        </div>

                        <label for="">Profit</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="profit" id="profit" readonly="" style="background-color: #e7e3e9;" value="0"  class="form-control" />
                            </div>
                        </div>

                         <label for="">Batas Minimum Persediaan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="batas" class="form-control" required/>
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

                        <?php 
if (isset($_POST['simpan'])){
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$satuan=$_POST['satuan'];
$isi=$_POST['isi'];
$stok=$_POST['stok'];
$hbeli=$_POST['hbeli'];
$hjual=$_POST['hjual'];
$profit=$_POST['profit'];
$batas_minimum=$_POST['batas'];


    $sql=$koneksi->query("insert into tb_obat values('$kode','$nama','$satuan','$isi','$stok','$hbeli','$hjual','$profit','$batas_minimum')");
    if ($sql){
        $_SESSION['status'] = "Tambah Data Berhasil";
      $_SESSION['status_code'] = "success";
      echo "<meta http-equiv ='refresh' content='2;url=index.php?page=obat'>";
        ?>
        
        <?php
    }
}

?>