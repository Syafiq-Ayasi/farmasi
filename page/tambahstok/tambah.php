 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Stok Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Stok Obat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    

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
                        <div class="row clearfix">
                            <div class="col-md-3">
                                <input type="text" id="kode" name="kode" class="form-control" data-toggle="modal" data-target="#myModalobat" placeholder="Kode Obat" required/>
                            </div>
                       
                            <div class="col-md-5">
                                <input type="text" id="nama" name="nama" class="form-control" readonly="" placeholder="Nama Obat"/>
                            </div>

                            <div class="col-md-2">
                                <input type="text" id="satuan" name="satuan" class="form-control" readonly="" placeholder="Satuan Obat"/>
                            </div>

                            <div class="col-md-2">
                                <input type="text" id="isi" name="isi" class="form-control" readonly="" placeholder="Isi"/>
                            </div>
                        </div>

                        <label for="">Jumlah</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Obat" required/>
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

                        
                        </form>

                        <?php 
                            if (isset($_POST['simpan'])){

                            date_default_timezone_set('Asia/Jakarta');
                            $date=date("Y-m-d H:i:s");
                            $kode=$_POST['kode'];
                            $jumlah=$_POST['jumlah'];

                            $sql=$koneksi->query("insert into tb_pembelian_detail(id,tgl,kd_obat,jumlah) values('','$date','$kode','$jumlah')");
                            if ($sql){
                                $_SESSION['status'] = "Tambah Data Berhasil";
                                $_SESSION['status_code'] = "success";
                                echo "<meta http-equiv ='refresh' content='2;url=index.php?page=tambahstok'>";
                                  ?>
                                 
                                  <?php
                              }
                          }
                          
                          ?>

<!-- Modal -->
<div class="modal fade" id="myModalobat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                    
                                    <tr class="pilih" data-kdobat="<?php echo $data['kd_obat']; ?>" data-nama="<?php echo $data['nm_obat']; ?>" data-satuan="<?php echo $data['satuan']; ?>" data-isi="<?php echo $data['isi']; ?>">
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
                //            jika dipilih, kd_obat akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("kode").value = $(this).attr('data-kdobat');
                document.getElementById("nama").value = $(this).attr('data-nama');
                document.getElementById("satuan").value = $(this).attr('data-satuan');
                document.getElementById("isi").value = $(this).attr('data-isi');
                $('#myModalobat').modal('hide');
            });
            

//            tabel lookup obat
            $(function () {
                $("#lookup").dataTable();
            });

            
        
        </script>
        <!--modal obat--> 