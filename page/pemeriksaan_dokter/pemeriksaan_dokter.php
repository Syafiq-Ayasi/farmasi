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
  
    <?php 
    $kode = $_GET['no_rm'];
    $sql = $koneksi->query("SELECT tb_rekam_medis.`no_rm`,tb_rekam_medis.`no_pasien`,`nm_pasien`,`tgl_pemeriksaan`,`tb_rekam_medis_detail3`.`keluhan`,bb,tb,lp,suhu,td,ao,kol,glu,au,hb
FROM tb_rekam_medis, tb_pasien,tb_rekam_medis_detail3
WHERE tb_rekam_medis.`no_rm`=tb_rekam_medis_detail3.no_rm AND 
      tb_pasien.`no_pasien`=tb_rekam_medis.`no_pasien` and  tb_rekam_medis.no_rm='$kode'");
    $tampil = $sql->fetch_assoc();
    //$kasir = $data['nama'];
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
                            <label for="">No. ID</label>
                            <div class="row clearfix">
                            <div class="col-md-2">
                                <input type="text" name="kode" value="<?php
                                echo $kode;?>"; class="form-control" readonly="" readonly=""/>
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
              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                  <tr class="text-center" >
                    <th>No.</th>
                    <th>Nomor Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Tgl Lahir</th>
                    <th>Usia</th>
                    <th>Agama</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    
                    
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    $no=1;
                    $sql=$koneksi->query("SELECT tb_pasien.no_pasien
                    ,nm_pasien,j_kel,tgl_lhr,usia,agama,no_tlp,alamat FROM tb_pasien, 
                    tb_rekam_medis where tb_rekam_medis.no_pasien=tb_pasien.no_pasien
                    AND no_rm='$kode'");
                    
                    while($data=$sql->fetch_assoc()){
                      ?>

                  <tr class="text-center">
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data['no_pasien']?></td>
                    <td><?php echo $data['nm_pasien']?></td>
                    <td><?php echo $data['j_kel']?></td>
                    <td><?php echo $data['tgl_lhr']?></td>
                    <td><?php echo $data['usia']?></td>
                    <td><?php echo $data['agama']?></td>
                    <td><?php echo $data['no_tlp']?></td>
                    <td><?php echo $data['alamat']?></td>
                      
                    
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
                <form method ="POST">
                <label for="">Berat Badan, Tinggi Badan, Suhu Badan dan Tekanan Darah</label>
                <div class="row clearfix">
                    <div class="col-sm-1">
                        <input type="text" name="txtbb" value="<?php echo $tampil['bb']?> Kg" class="form-control" placeholder="BB"  readonly="" />
                    </div>
                    <div class="col-sm-1">
                        <input type="text" name="txttb" value="<?php echo $tampil['tb']?> Cm" class="form-control" placeholder="TB"  readonly=""/>
                    </div>
                    <div class="col-sm-1">
                        <input type="text" name="txtsuhu" value="<?php echo $tampil['suhu']?> Celcius" class="form-control" placeholder="Suhu"  readonly=""/>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="txttd" value="<?php echo $tampil['td']?> mmHg" class="form-control" placeholder="TD" readonly="" />
                    </div>
                </div>
                <br>
                 <label for="">Alergi Obat</label>
                 <div class="row clearfix">
                    <div class="col-sm-1">
                        <input type="text" name="txtao" value="<?php echo $tampil['ao']?>" class="form-control" placeholder="AO" readonly="" />
                    </div>  
               </div>  

                <br>

                <label for="">Keluhan-Keluhan</label>
                <div class="row clearfix">
                            <div class="col-md-4">
                    <div class="form-group">
                      <div class="form">
                        <textarea rows="3" class="form-control text-center"
                        readonly="">
                          <?php echo $tampil['keluhan'];?>
                        </textarea>

                      </div>
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

    