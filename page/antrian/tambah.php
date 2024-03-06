 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Antrian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Antrian</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php
$tgl=date("Y-m-d");
 
// menghubungkan dengan koneksi database
$koneksi=new mysqli("localhost","appg4189_aay","LimauManiS2024!","appg4189_farmasi");
 
// mengambil data pasien dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(no_antrian) as kodeTerbesar FROM tb_antrian WHERE tanggal_kunjungan='$tgl'");
$data = mysqli_fetch_array($query);
// $noantrian = $data['kodeTerbesar'];
if ($data['kodeTerbesar'] !== null) {
  $noantrian = $data['kodeTerbesar'];
} else {
  // Handle ketika data tidak ditemukan atau bernilai null
  // Misalnya, mengatur nilai default atau memberikan pesan kesalahan.
  $noantrian = '0'; // Nilai default jika data tidak ditemukan.
}

// mengambil angka dari nmor pasien terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($noantrian, 1, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk nomor pasien baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 

$noantrian = sprintf("%03s", $urutan);
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
                <h3 class="card-title">Ambil Antrian<small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body ">
                   
                       <label for="">No Antrian</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode" value="<?php echo $noantrian; ?>" class="form-control" readonly="" />
                            </div>
                        </div>

                        <label for="">Nama Pasien</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama" name="nama" class="form-control" data-toggle="modal" data-target="#myModal" required="" />
                            </div>
                        </div>

                
                <div class="card-footer">
                  <button type="simpan" name="simpan" class="btn btn-primary float-right">Ambil Antrian</button>
                </div>
                </div>
                <!-- /.card-body -->
              </form>
          </div>
      </div>
  </div>
</div>

<!-- #END# Select -->
<?php 

        if (isset($_POST['simpan'])){
        $tgl_kunjung = date("Y-m-d");
        $kode=$_POST['kode'];
        $nama=$_POST['nama'];
        $user=$koneksi->query("select * from user_antrian where nama='$nama'");
        $data_user=$user->fetch_assoc();
        $user_id=$data_user['id_pasien'];
       
       // cek apakah userid sudah mendaftar dihari ini
        $cek_condition1 = $koneksi->query("SELECT user_id FROM tb_antrian WHERE user_id=$user_id AND tanggal_kunjungan='$tgl_kunjung' LIMIT 1");
        if ($cek_condition1->num_rows >= 1) {
          $_SESSION['ambil'] = "Sudah ambil antrian";
          $_SESSION['ambil'] = "error";
          echo "<meta http-equiv ='refresh' content='2;url=index.php?page=antrian'>";
      ?>
          <?php
      }else{
        $koneksi->query("insert into tb_antrian(id,user_id,no_antrian,tanggal_kunjungan,created_at,status_antrian)values('','$user_id','$kode','$tgl_kunjung', NOW(), 'Dalam Antrian')");
        $_SESSION['berhasil'] = "berhasil ambil antrian";
        $_SESSION['berhasil'] = "success";
        echo "<meta http-equiv ='refresh' content='2;url=index.php?page=antrian'>";
        ?>
           
           <?php
       }
  }
  
  ?>


<!-- Awal Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                       
                         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">
                                DATA PASIEN
                            </h4>
                            
                        </div>
                        <div class="modal-body">
                            
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <!--<th>No.</th>-->
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama Pasien</th>
                                            <th>Telepon</th>
                                            
                                           
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    //$no=1;
                                    $sql= $koneksi->query("select * from user_antrian");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr class="pilih" data-namapasien="<?php echo $data['nama']; ?>">
                                        <!--<td><?php //echo $no++;?></td>-->
                                        <td class="text-center"><?php echo $data['id_pasien']?></td>
                                        <td><?php echo $data['no_identitas']?></td>
                                        <td><?php echo $data['nama']?></td>
                                        <td><?php echo $data['telepone']?></td>
                                        
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                       
            </div>
            <script src="plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript">
                // jika dipilih, id_pasien akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("nama").value = $(this).attr('data-namapasien');
                $('#myModal').modal('hide');
            });
            

// tabel lookup pasien
            $(function () {
                $("#lookup").dataTable();
            });
        
        </script>

<!--Akhir Modal-->