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
              <li class="breadcrumb-item active">Data Pasien Berobat</li>
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
                <h3 class="card-title">Data Pasien Yang Berobat</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
 <table id="example1" class="table table-bordered table-striped">
   
                <thead>
                                        <tr class="text-center">
                                        	  <th>No.</th>
                                            <th>Tanggal Periksa</th>
                                            <th>ID Kunjungan</th>
                                            <th>Nama</th>
                                            <th>Keluhan</th>
                                            <th>Rekam Medis</th>
                                            <th>Status Periksa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    $no=1;
                                    $sql= $koneksi->query("select tgl_pemeriksaan, tb_rekam_medis.no_rm, tb_rekam_medis.no_pasien,nm_pasien,bb,keluhan,tb_rekam_medis.status
                                    from tb_pasien,tb_rekam_medis,tb_rekam_medis_detail3
                                    where tb_pasien.no_pasien=tb_rekam_medis.no_pasien AND
                                    tb_rekam_medis.no_rm=tb_rekam_medis_detail3.no_rm
                                    order by tb_rekam_medis.id DESC");
                                    while($data= $sql->fetch_assoc()){
                                      $tgl_pemeriksaan = $data['tgl_pemeriksaan'];


                                    ?>
                                    
                                    <tr>
                                        <td class="text-center"><?php echo $no++;?></td>
                                        <td class="text-center"><?php echo date ("d-m-Y", strtotime($tgl_pemeriksaan));?></td>
                                        <td class="text-center"><?php echo $data['no_rm']?></td>

                                        <td class="text-center"><?php echo $data['nm_pasien']?></td>

                                        <td class="text-center"><?php echo $data['keluhan']?></td>
                                        <td class="text-center">
                                          <a href="?page=laprm&aksi=daftar&no_pasien=<?php echo $data['no_pasien'];?> " class="btn btn-success btn-sm"><i class="nav-icon fa fa-eye"></i> Lihat RM</a>
                                        </td>
                                        <td class="text-center"><span class="badge badge-primary"><?php echo $data['status']?></span></td>
                                        <td class="text-center">
                                                <a href="?page=pemeriksaan_dokter&aksi=pemeriksaan_dokter&no_rm=<?php echo $data['no_rm'];?> " class="btn btn-success btn-sm"><i class="nav-icon far fa-folder-open"></i> Lihat</a>
                                                <a href="?page=pemeriksaan_dokter&aksi=tambah_obat2&no_rm=<?php echo $data['no_rm'];?> " class="btn btn-info  btn-sm"><i class="nav-icon fa fa-stethoscope"></i> Periksa</a>
                                                <a href="?page=pemeriksaan_dokter&aksi=tambah_obat3&no_rm=<?php echo $data['no_rm'];?> " class="btn btn-secondary  btn-sm"><i class="nav-icon fa fa-stethoscope"></i> Resep</a>
                                        
     
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
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    
   

