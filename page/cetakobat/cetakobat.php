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
              <li class="breadcrumb-item active">Daftar Penebusan Obat</li>
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
                <h3>Daftar Penebusan Obat</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <?php
                $ambildatastok = mysqli_query($koneksi, "select * from tb_obat where stok <  tb_obat.batas_min");

                while($fetch=mysqli_fetch_array($ambildatastok)){
                     $obat = $fetch ['nm_obat'];

                ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Danger!</strong> Stok Obat <?=$obat; ?> Sudah Menipis, Segera Lakukan Pembelian
                </div>
                <?php
                }
                ?>
                <br>
                <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Tanggal Periksa</th>
                    <th>No ID</th>
                    <th>No RM</th>
                    <th>Nama Pasien</th>
                    <th>Keluhan</th>
                    <th>Status Periksa</th>
                    <th>Status Obat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                                    
            <?php
                $no=1;
                $sql= $koneksi->query("SELECT `tgl_pemeriksaan`,tb_rekam_medis.`no_rm`,tb_rekam_medis.`no_pasien`,`nm_pasien`,bb,`keluhan`,tb_rekam_medis.status,tb_rekam_medis.statusobat FROM tb_rekam_medis, tb_pasien,tb_rekam_medis_detail3
                WHERE tb_rekam_medis.`no_rm`=tb_rekam_medis_detail3.no_rm AND 
                tb_pasien.`no_pasien`=tb_rekam_medis.`no_pasien`
                order by tb_rekam_medis.id DESC");
                while($data= $sql->fetch_assoc()){

                  $tgl_pemeriksaan = $data['tgl_pemeriksaan'];
            ?>
                                
                  <tr >
                    <td class="text-center"><?php echo $no++;?></td>
                    <td class="text-center"><?php echo date ("d-m-Y", strtotime($tgl_pemeriksaan));?></td>
                    <td class="text-center"><?php echo $data['no_rm']?></td>
                    <td class="text-center"><?php echo $data['no_pasien']?></td>
                    <td class="text-center"><?php echo $data['nm_pasien']?></td>
                    <td class="text-center"><?php echo $data['keluhan']?></td>
                    <td class="text-center"><span class="badge badge-primary"><?php echo $data['status']?></span></td>
                    <td class="text-center"><span class="badge badge-primary"><?php echo $data['statusobat']?></span></td>
                    <td class="text-center">
                            
                            <a href="?page=cetakobat&aksi=nota&no_rm=<?php echo $data['no_rm'];?> " class="btn btn-warning btn-sm"><i class="nav-icon fas fa-file-invoice"></i> Lihat Resep</a>
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