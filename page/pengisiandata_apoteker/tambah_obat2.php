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
                 <input type="submit" name="simpan1" value="Simpan" class="btn btn-warning float-left">
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
