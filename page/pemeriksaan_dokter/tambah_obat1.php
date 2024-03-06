<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pemeriksaan Dokter</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pemeriksaan Dokter</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
    <?php 
        $kode = $_GET['no_rm'];
        $sql = $koneksi->query("SELECT tb_rekam_medis.`no_rm`,tb_rekam_medis.`no_pasien`,`nm_pasien`,`tgl_pemeriksaan`,`tb_rekam_medis_detail3`.`keluhan`,bb,tb,lp,suhu,td,ao,kol,glu,au,hb
        FROM tb_rekam_medis, tb_pasien,tb_rekam_medis_detail3
        WHERE tb_rekam_medis.`no_rm`=tb_rekam_medis_detail3.no_rm AND 
        tb_pasien.`no_pasien`=tb_rekam_medis.`no_pasien` and  tb_rekam_medis.no_rm='$kode'");
        $tampil = $sql->fetch_assoc();
        //$kasir = $data['nama'];
        $tgl_pemeriksaan = $tampil['tgl_pemeriksaan'];
    ?>

    <!-- Bagian 1 -->
    <section class="content">
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                
                    <form method="POST">
                    <div>
                        <label for="">No. ID Kunjungan -------------- Nomor RM ----------------------- Nama Pasien ----------------- Tanggal Pemeriksaan --------------- </label>
                        <div class="row clearfix">
                            <div class="col-md-2">
                            <input type="text" name="kode" value="<?php echo $tampil['no_rm']; ?>" class="form-control" readonly="" />
                            </div>

                           <div class="col-md-2 ">
                                <input type="text" name="no_pasien" value="<?php echo $tampil['no_pasien']; ?>" class="form-control" readonly="" />
                            </div>
                            <div class="col-md-2 ">
                                <input type="text" name="nm_pasien" value="<?php echo $tampil['nm_pasien']; ?>" class="form-control" readonly="" />
                            </div>
                            <div class="col-md-2 ">
                                <input type="text" name="tgl_pemeriksaan" value="<?php echo date ("d-m-Y", strtotime($tgl_pemeriksaan));?>" class="form-control" readonly="" />
                            </div>
                        </div>
                    </div>

                    </form>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
          </div>
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
             <div class="card-body">
                	<form method="POST">
            
                    <label for="">Hasil Pemeriksaan</label>
                   
                    <div class="row clearfix">
                
                        <div class="col-md-3 ">
                            <input type="text" id="diagnosa" name="diagnosa" class="form-control" data-toggle="modal" data-target="#myModaldiag" placeholder="Kode Diagnosa" />
                        </div>
                        <div class="col-md-3 ">
                             <input type="text" id="keterangan" name="keterangan" value="" class="form-control"  placeholder="Keterangan"  readonly="" />
                        </div>
                        
                  </div>
                  <br>
                  <label for="">Anamnesis :</label>
                        <div class="row clearfix">
                        <div class="col-md-5 ">
                            <input type="text" name="catatan" class="form-control" >
                        </div>
                        <div class="col-md-3 ">
                        <input type="submit" name="simpanakhir" value="Tambahkan Diagnosa" class="btn btn-primary">
                        </div>
                </form>
                  

                  </div>    
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
          </div>
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- #END# Select -->
<?php 

        if (isset($_POST['simpanakhir'])){
         
        $dosis=$_POST['dosis'];
        $diagnosa=$_POST['diagnosa'];
        $keterangan=$_POST['keterangan'];
        $catatan=$_POST['catatan'];
       

        //$koneksi->query("update tb_rekam_medis_detail2 set dosis='$dosis' where no_rm='$kode'");
        $sql=$koneksi->query("update tb_rekam_medis set diagnosa='$diagnosa', ket='$keterangan', catatan='$catatan', status='Selesai',statusobat='Belum Bayar' where no_rm='$kode'");

        if($sql){
          $_SESSION['tambah_diagnosa'] = "tambah_diagnosa";
          $_SESSION['tambah_diagnosa'] = "success";
          echo "<meta http-equiv ='refresh' content='2;url='>";
      ?>
		<?php
	}
    }

    ?>

<form method="POST">
  
     <div class="container-fluid">
       <div class="row">
         <div class="col-12">
           <div class="card">
             <div class="card-header">
               
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <div class="table-responsive">
               <table id="example2" class="table table-bordered table-hover">
                 <thead>
                 <tr class="text-center">
                   <th>No.</th>
                   <th>Kode Diagnosa</th>
                   <th>Diagnosa</th>
                  
                </tr>
                 </thead>

                 <tbody>
                 <?php
                   $no=1;
                   $sql= $koneksi->query("select * from tb_rekam_medis where no_rm='$kode'");
                   while($data= $sql->fetch_assoc()){

                   ?>
                   
                   <tr class="text-center">
                       <td><?php echo $no++;?></td>
                       <td><?php echo $data['diagnosa'];?></td>
                       <td><?php echo $data['ket']?></td>
                   </tr>
                   <tfoot>
                        <th class ="text-center" colspan="2">Anamnesis :</th>
                        <th class ="text-center"><?php echo $data['catatan'];?></th>
            </tfoot> 
                   <?php
                   }
                   ?>
                 </tbody>
                 
                 </table>
                 </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
          </div>
        
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   
</form>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method ="POST">
                <label for="">Kode Obat</label>
                    <div class="row clearfix">
                        <div class="col-md-2 ">
                            <input type="text" id="kd_obat" name="kd_obat" class="form-control" data-toggle="modal" data-target="#myModal">
                        </div>
                        <div class="col-md-2 ">
                        <input type="submit" name="simpan" value="Tambahkan" class="btn btn-primary">
                        </div>

                 </div>
               
                </form>

              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
          </div>
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <?php 
    if (isset($_POST['simpan'])){

    //$date=date("Y-m-d");
    //$kd_rm=$_POST['kode'];
    date_default_timezone_set('Asia/Jakarta');
    $date=date("Y-m-d H:i:s");
    $kdobat=$_POST['kd_obat'];
    $obat=$koneksi->query("select * from tb_obat where kd_obat='$kdobat'");
    $data_obat=$obat->fetch_assoc();
    $harga=$data_obat['harga'];
    $jumlah=1;
    $total=$jumlah*$harga;
  
    
    $obat2=$koneksi->query("select * from tb_obat where kd_obat='$kdobat'");
    while ($data_obat2=$obat2->fetch_assoc()){
       $sisa=$data_obat2['stok'];

       if($sisa==0){
        ?>
            <script type="text/javascript">
             alert ("Stok Obat Habis..Tidak Dapat Dipilih");
             window.location.href="";
            </script>
        <?php
        }
        else{
            $koneksi->query("insert into tb_rekam_medis_detail2 (no_rm,kd_obat,jumlah,dosis,tgl_pembelian)values('$kode','$kdobat','$jumlah','1','$date')");
        }

       }
    }
           
?>

<form method="POST">
     
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center">
                    <th>No.</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Satuan</th>
                    <th>Isi</th>
                    <th>Jumlah Obat</th>
                    <th>Dosis Per Hari</th>
                    <th>Aksi</th>
                 </tr>
                  </thead>

                  <tbody>
                  <?php
                    $no=1;
                    $sql= $koneksi->query("SELECT id,no_rm,tb_obat.kd_obat,nm_obat,satuan,isi,jumlah,dosis FROM tb_obat,tb_rekam_medis_detail2 where tb_obat.kd_obat=tb_rekam_medis_detail2.kd_obat AND 
                    	      no_rm='$kode'");
                    while($data= $sql->fetch_assoc()){

                    ?>
                    
                    <tr class="text-center">
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['kd_obat'];?></td>
                        <td><?php echo $data['nm_obat']?></td>
                        <td><?php echo $data['satuan']?></td>
                        <td><?php echo $data['isi']?></td>
                        <td><?php echo $data['jumlah']?></td>
                        <td><?php echo $data['dosis']?></td>
                        <!--<td><input type="number" name="jmlobat" value="<?php echo $data['jumlah']?>" style="width:80px;"></td>
                        <td>
                        	<input type="text" name="jmldosis" value="<?php echo $data['dosis']?>" style="width:80px;">
                        </td>-->
                        <td>
                        
                        <a href="?page=pemeriksaan_dokter&aksi=tambah&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['no_rm']?>&kode_b=<?php echo $data['kd_obat'] ?>" title="Tambah Obat" class="btn btn-success">[+obat]</i></a>

                        <a href="?page=pemeriksaan_dokter&aksi=kurang&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['no_rm']?>&kode_b=<?php echo $data['kd_obat'] ?>" title="Kurangi Obat" class="btn btn-success">[-obat]</a>

                        <a href="?page=pemeriksaan_dokter&aksi=tambahdosis&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['no_rm']?>&kode_b=<?php echo $data['kd_obat'] ?>" title="Tambah Dosis" class="btn btn-primary">[+dosis]</a>

                        <a href="?page=pemeriksaan_dokter&aksi=kurangdosis&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['no_rm']?>&kode_b=<?php echo $data['kd_obat'] ?>" title="Kurangi Dosis" class="btn btn-primary">[-dosis]</a>

                        <a onclick="return confirm('Anda Yakin akan menghapus Data Ini...???')" href="?page=pemeriksaan_dokter&aksi=hapus&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['no_rm']?>&kode_b=<?php echo $data['kd_obat'] ?>&jumlah=<?php echo $data['jumlah']; ?>" title="Hapus" class="btn btn-danger">Hapus</a>
                            </td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                  </table>

                  <form method ="POST">
                        <input type="submit" name="simpan1" value="Simpan" class="btn btn-warning float-right">
                </form>
                 
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
          </div>
        
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    
</form>

<?php 

        if (isset($_POST['simpan1'])){
          
          $_SESSION['tambah_rm'] = "rekam medis ditambahkan";
          $_SESSION['tambah_rma'] = "success";
          echo "<meta http-equiv ='refresh' content='2;url=index.php?page=pemeriksaan_dokter'>";
      ?>

		<?php
	
    }

    ?>




     












     <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                       
                         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title" id="myModalLabel">
                                DATA OBAT
                            </h2>
                            
                        </div>
                        <div class="modal-body">
                            
                                <table id="lookup" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <!--<th>No.</th>-->
                                            <th>Kode Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Satuan</th>
                                            <th>Isi</th>
                                            <th>Stok</th>
                                           
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    //$no=1;
                                    $sql= $koneksi->query("select * from tb_obat");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr class="pilih" data-kdobat="<?php echo $data['kd_obat']; ?>">
                                        <!--<td><?php //echo $no++;?></td>-->
                                        <td><?php echo $data['kd_obat']?></td>
                                        <td><?php echo $data['nm_obat']?></td>
                                        <td><?php echo $data['satuan']?></td>
                                        <td><?php echo $data['isi']?></td>
                                        <td><?php echo $data['stok']?></td>
                                                                                
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
                //            jika dipilih, no_pasien akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("kd_obat").value = $(this).attr('data-kdobat');
                $('#myModal').modal('hide');
            });
            

//            tabel lookup obat
            $(function () {
                $("#lookup").dataTable();
            });

            
        
        </script>
        <!--modal obat-->

        <!-- Modal Diagnosa-->
<div class="modal fade" id="myModaldiag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                       
                         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title" id="myModalLabel">
                                DATA DIAGNOSA
                            </h2>
                            
                        </div>
                        <div class="modal-body">
                            
                                <table id="lookupdiag" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <!--<th>No.</th>-->
                                            <th>Kode </th>
                                            <th>Diagnosa ICD 10</th>
                                           
                                           
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    //$no=1;
                                    $sql= $koneksi->query("select * from tb_diagnosa");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr class="pilihdiag" data-kddiag="<?php echo $data['kd_diagnosa']; ?>" data-diag="<?php echo $data['nm_diagnosa']; ?>">
                                        <!--<td><?php //echo $no++;?></td>-->
                                        <td><?php echo $data['kd_diagnosa']?></td>
                                        <td><?php echo $data['nm_diagnosa']?></td>
                                        
                                                                                
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                       
            </div>
        
        <script type="text/javascript">
                //            jika dipilih, no_pasien akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilihdiag', function (e) {
                document.getElementById("diagnosa").value = $(this).attr('data-kddiag');
                document.getElementById("keterangan").value = $(this).attr('data-diag');
                $('#myModaldiag').modal('hide');
            });
            

//            tabel lookup diagnosa
            $(function () {
                $("#lookupdiag").dataTable();
            });

            
        
        </script>