
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
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active">Rekam Medis</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Bagian 1 -->
    <section class="content">
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                
                    <form method="POST">
                    <?php 
	$kode = $_GET['koderm'];
    //$kdpasie = $_GET['no_pasien'];
    //$kasir = $data['nama'];
?>
                        <div>
                            <label for="">No. ID Kunjungan</label>
                            <div class="row clearfix">
				        	<div class="col-md-2">
				            <input type="text" name="kode" value="<?php echo $kode; ?>" class="form-control" readonly="" />
					        </div>

					    	<div class="col-md-2 ">
					            <input type="text" id="no_pasien" name="no_pasien"  class="form-control" data-toggle="modal" data-target="#myModal" required="">
					        </div>
					    	<div class="col-md-2 ">
					        <input type="submit" name="simpan" value="Cari Pasien" class="btn btn-primary">
					    	</div>
                        
                        </div>
                        <br>
                            <label for="">Pilih Dokter</label>
                            <div class="row clearfix">
                            <div class="col-sm-6">             
                                <select class="form-control show-tick" name="dokter" />
                                
                                     <?php
                                        $lbl = '<option value=""> - Pilih Dokter - </option>';
                                         $dokter=$koneksi->query("select * from tb_dokter order by kd_dokter");
                                         
                                         while ($d_dokter=$dokter->fetch_assoc()) {
                                            
                                            echo "<option value='$d_dokter[kd_dokter]'>$d_dokter[nm_dokter]</option>
                                                ";
                                            }
                                       ?>
                                </select>
					           </div>
                            

                        </div>

                    </form>


                    
                </div>
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

    date_default_timezone_set('Asia/Jakarta');
    $date=date("Y-m-d H:i:s");
    $kd_st=$_POST['kode'];
    $nopasien=$_POST['no_pasien'];
    $kddokter=$_POST['dokter'];
    //$datekeluar=date("Y-m-d");
        
    $pasien=$koneksi->query("select * from tb_pasien where no_pasien='$nopasien'");
    while ($data_pasien=$pasien->fetch_assoc()){
       $status=$data_pasien['status'];

       if($status=='Belum'){
        
            $koneksi->query("insert into tb_rekam_medis(no_rm,no_pasien,diagnosa,tgl_pemeriksaan,ket,catatan,status,statusobat,kd_dokter)values('$kd_st','$nopasien','-','$date','-','-','Dalam Antrian','Belum Bayar','$kddokter')");
            $koneksi->query("update tb_pasien set status='Sudah' where no_pasien='$nopasien'");
       
        }
        else{
        	?>
            <script type="text/javascript">
             alert ("Nomor atau Nama Pasien Sudah Terdaftar");
             window.location.href="?page=rekam_medis&koderm=<?php echo $kode; ?> ";
            </script>
             <?php
        }

       }
    }
           
?>
    
    <!-- Bagian 2 -->
    <form method="POST">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pasien</h3>
              </div>
              <!-- /.card-header -->
              <div class="body">
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>No Pasien</th>
                            <th>Nama Pasien</th>
                            <th>Kelamin</th>
                            <th>Tgl Lahir</th>
                            <th>Usia</th>
                            <th>Agama</th>
                            <th>Telpon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    
                    <?php
                    $no=1;
                    $sql= $koneksi->query("SELECT tb_pasien.no_pasien,nm_pasien,j_kel,tgl_lhr,usia,agama,no_tlp,alamat,id FROM tb_pasien, tb_rekam_medis where tb_rekam_medis.no_pasien=tb_pasien.no_pasien AND no_rm='$kode'");
                    while($data= $sql->fetch_assoc()){

                    ?>
                    
                    <tr class="text-center">
                        <td ><?php echo $no++;?></td>
                        <td><?php echo $data['no_pasien'];?></td>
                        <td><?php echo $data['nm_pasien']?></td>
                        <td><?php echo $data['j_kel']?></td>
                        <td><?php echo $data['tgl_lhr']?></td>
                        <td><?php echo $data['usia']?></td>
                        <td><?php echo $data['agama']?></td>
                        <td><?php echo $data['no_tlp']?></td>
                        <td><?php echo $data['alamat']?></td>
                        <td>
                            <a href="?page=rekam_medis&aksi=hapus&id=<?php echo $data['id'];?>&no_rm=<?php echo $data['no_rm'];?>" class="btn btn-danger"><i class="nav-icon fas fa-trash" style="float:left;margin:0;"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
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
                  </form>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pemeriksaan Awal</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form method="POST">

              
                  <div class="row clearfix">
                      <label for="">&nbsp;&nbsp;Status Pasien : &nbsp;&nbsp;</label>
                     
                      <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="customRadio1" name="status_pasien" value="Pasien Baru">
                      <label for="customRadio1" class="custom-control-label">Pasien Baru</label>
                      </div>
                      &nbsp;&nbsp;&nbsp;&nbsp;<div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="customRadio2" name="status_pasien" value="Pasien Lama">
                      <label for="customRadio2" class="custom-control-label">Pasien Lama</label>
                      </div>
                  
                  </div>
				    
<br>
				    <!--<label for="">Berat Badan, Tinggi Badan, Suhu Badan dan Tekanan Darah</label>-->
				    <div class="row clearfix">
				        <div class="col-sm-2"> <label for="berat">Berat (kg):</label> 
				        <input type="number" name="txtbb" class="form-control" placeholder="Berat Badan (kg)" id="txtbb" oninput="hitungBMI()" required >
				        </div>
				        <div class="col-sm-2"> <label for="tinggi">Tinggi (cm):</label>           
				        <input type="number" name="txttb" class="form-control" placeholder="Tinggi Badan (cm)" id="txttb" oninput="hitungBMI()" required >
				        </div>
				        <div class="col-sm-2"> <label for="tinggi">Hitung BMI:</label> 
				        <input type="text" name="txtbmi" class="form-control" placeholder="BMI" readonly id="txtbmi" >
				        </div>
				        <div class="col-sm-2"> <label for="suhu">Suhu (C):</label> 
				        <input type="text" name="txtsuhu" class="form-control" placeholder="Suhu" />
				        </div>
				        <div class="col-sm-2"> <label for="td">Tekanan Darah:</label>           
				        <input type="text" name="txttd" class="form-control" placeholder="Tekanan Darah" />
				        </div>
				    </div>
				    <br>

            
                        <label for="">Alergi Obat</label>
                        <div class="row clearfix">
                        <div class="col-sm-2">
           
                                <select name="ao" class="form-control show-tick">
                                <option value="">--Alergi Obat--</option>
                                <option value="Iya">Iya</option>
                                <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
				    <br>

				    <label for="">Keluhan-Keluhan</label>
				    <div class="demo-checkbox">
                        <!--awal tanpa database
                        
                        <input type="checkbox" class="checkbox" id="keluhan[]" name="keluhan[]" value="Batuk" />BATUK
                        <input type="checkbox" name="keluhan[]" value="Flu" />FLU
                        <input type="checkbox" name="keluhan[]" value="Demam" />DEMAM
                        <input type="checkbox" name="keluhan[]" value="Pusing" />PUSING
                        <input type="checkbox" name="keluhan[]" value="Mual" />MUAL
                        <input type="checkbox" name="keluhan[]" value="Muntah" />MUNTAH
                        <br>
                        <input type="submit" name="simpanawal" value="Simpan">-->
                        <!--awal tanpa database-->
                         
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="batuk" name="keluhan[]" value="Batuk" class="custom-control-input" />
                        <label for="batuk"  class="custom-control-label">BATUK</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="flu" name="keluhan[]" value="Flu" class="custom-control-input"  />
                        <label for="flu"  class="custom-control-label">FLU</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="demam" name="keluhan[]" value="Demam" class="custom-control-input"  />
                        <label for="demam" class="custom-control-label">DEMAM</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="pusing" name="keluhan[]" value="Pusing" class="custom-control-input"  />
                        <label for="pusing" class="custom-control-label">PUSING</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="mual" name="keluhan[]" value="Mual" class="custom-control-input"  />
                        <label for="mual" class="custom-control-label">MUAL</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="muntah" name="keluhan[]" value="Muntah" class="custom-control-input"  />
                        <label for="muntah" class="custom-control-label">MUNTAH</label>
                        </div>
                        <br>
                        <div class="row clearfix">
				                <div class="col-sm-2">  
				                  <input type="text" id="" name="keluhan[]" class="form-control" placeholder="Keluhan Lain" />
				                </div>
				        
				                </div>

                        <br>
                        <input type="submit" name="simpanawal" value="Simpan" class="btn btn-primary">
                       <!--end tanpa database-->
						<!--awal dengan database
						//<?php 
						//  $keluhan=$koneksi->query("select * from tb_keluhan order by kd_keluhan");
				        //         while ($d_keluhan=$keluhan->fetch_assoc()) {
						// ?>
						  
						   <input type="checkbox" name="keluhan[]" id="keluhan[]" class="filled-in" value="<?=$d_keluhan['kd_keluhan']?>">
						   
						//  <label for="keluhan[]"><?=$d_keluhan['[nm_keluhan']?></label>
						// <?php
						//  }
						// ?>
						//  <input type="submit" name="simpan" value="Simpan">
						  end dengan database-->
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
    if (isset($_POST['simpanawal'])){

    $keluhan = implode(",", $_POST['keluhan']);
    $bb=$_POST['txtbb'];
    $tb=$_POST['txttb'];
    $lp=$_POST['txtlp'];
    $suhu=$_POST['txtsuhu'];
    $td=$_POST['txttd'];
    $ao=$_POST['ao'];
    $kol=$_POST['txtkol'];
    $au=$_POST['txtau'];
    $glu=$_POST['txtglu'];
    $hb=$_POST['txthb'];
    $status_pasien=$_POST['status_pasien'];


    $sql=$koneksi->query("insert into tb_rekam_medis_detail3(no_rm,bb,tb,lp,suhu,td,ao,kol,au,glu,hb,keluhan,status_pasien)values('$kode','$bb','$tb','$lp','$suhu','$td','$ao','$kol','$au','$glu','$hb','".$keluhan."','$status_pasien')");
    //$koneksi->query("update tb_pasien set status='A' where no_pasien='$nopasien'");
    if ($sql){
      $_SESSION['periksa_awal'] = "periksa siap";
      $_SESSION['periksa_awal'] = "success";
      echo "<meta http-equiv ='refresh' content='2;url=index.php?page=rekam_medis'>";
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
                                            <th>Nomor Pasien</th>
                                            <th>Nama Pasien</th>
                                            <th>NIK</th>
                                            <th>Alamat</th>
                                            
                                           
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    //$no=1;
                                    $sql= $koneksi->query("select * from tb_pasien where status='Belum'");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr class="pilih" data-nopasien="<?php echo $data['no_pasien']; ?>">
                                        <!--<td><?php //echo $no++;?></td>-->
                                        <td><?php echo $data['no_pasien']?></td>
                                        <td><?php echo $data['nm_pasien']?></td>
                                        <td><?php echo $data['nik']?></td>
                                        <td><?php echo $data['alamat']?></td>
                                        
                                        
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
                // jika dipilih, no_pasien akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("no_pasien").value = $(this).attr('data-nopasien');
                $('#myModal').modal('hide');
            });
            

// tabel lookup pasien
            $(function () {
                $("#lookup").dataTable();
            });
        
        </script>
<script>
    function hitungBMI() {
        // Ambil nilai dari input tinggi dan berat
        var tinggi = document.getElementById("txttb").value / 100; // konversi cm ke meter
        var berat = document.getElementById("txtbb").value;

        // Lakukan perhitungan BMI
        var bmi = berat / (tinggi * tinggi);

        // Tampilkan hasil di input dengan id "bmi"
        document.getElementById("txtbmi").value = isNaN(txtbmi) ? '' : bmi.toFixed(2);
    }
</script>

<!--Akhir Modal-->