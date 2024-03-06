<?php

    $no_pasien = $_GET['no_pasien'];
    //$sql = $koneksi->query("delete from tb_barang where kode_barcode='$kode_barcode'");

?>

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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Laporan Rekam Medis</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Rekam Medis Pasien</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Tgl Periksa</th>
                        <th>No ID</th>
                        <th>No RM</th>
                        <th>Nama Pasien</th>
                        <th>Berat Badan</th>
                        <th>Keluhan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                                    
                <?php
                    $no=1;
                    $sql= $koneksi->query("SELECT `tgl_pemeriksaan`,tb_rekam_medis.`no_rm`,tb_rekam_medis.`no_pasien`,`nm_pasien`,bb,`keluhan`,tb_rekam_medis.status FROM tb_rekam_medis, tb_pasien,tb_rekam_medis_detail3
                        WHERE tb_rekam_medis.`no_rm`=tb_rekam_medis_detail3.no_rm AND 
                              tb_pasien.`no_pasien`=tb_rekam_medis.`no_pasien` and tb_rekam_medis.no_pasien='$no_pasien' and tb_rekam_medis.status = 'selesai'
                              order by tgl_pemeriksaan DESC");
                    while($data= $sql->fetch_assoc()){
                    ?>                
                    <tr class="text-center">
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['tgl_pemeriksaan']?></td>
                        <td><?php echo $data['no_rm']?></td>
                        <td><?php echo $data['no_pasien']?></td>
                        <td><?php echo $data['nm_pasien']?></td>
                        <td><?php echo $data['bb']?></td>
                        <td><?php echo $data['keluhan']?></td>
                        <td><font color="blue"><?php echo $data['status']?></font></td>
                        <td>
                          <a href=" " class="btn btn-success btn-sm" 
                          onclick="window.open('page/laprm/cetak.php?no_rm=<?php echo $data['no_rm']; ?>','mywindow','width=600px, height=600px, left=400px;')"><i class="nav-icon fas fa-file-alt"></i> Cetak RM</a>
                          <a href=" " class="btn btn-secondary btn-sm" 
                                                onclick="window.open('page/pemeriksaan_dokter/cetak.php?no_rm=<?php echo $data['no_rm']; ?>','mywindow','width=600px, height=600px, left=400px;')"><i class="nav-icon fas fa-file-alt"></i> Surat Izin</a>

                        </td>
                    </tr>
                 <?php } ?>         
                </tbody>
            </table>
                  
            </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
          </div>
          </div>
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    
   

