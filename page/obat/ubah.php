 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Dokter</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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

<?php

    $kd_obat = $_GET['kd_obat'];
    $sql = $koneksi->query("select * from tb_obat where kd_obat='$kd_obat'");
    $tampil = $sql->fetch_assoc();

?>

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
                                <input type="text" name="kode" value="<?php echo $tampil['kd_obat'];?>" class="form-control" readonly />
                            </div>
                        </div>

                        <label for="">Nama Obat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $tampil['nm_obat'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Satuan</label>
                        <div class="form-group">
                            <div class="form-line">
                            <select name="satuan" class="form-control show-tick">
                                <option value="">---Pilih Satuan---</option>
                                <option value="AMPUL"<?php if ($tampil['satuan']=='AMPUL'){echo "selected";}?>>Ampul</option>
                                <option value="BFLS"<?php if ($tampil['satuan']=='BFLS'){echo "selected";}?>>BFLS</option>
                                <option value="BOTOL"<?php if ($tampil['satuan']=='BOTOL'){echo "selected";}?>>Botol</option>
                                <option value="BOX"<?php if ($tampil['satuan']=='BOX'){echo "selected";}?>>Box</option>
                                <option value="BTL"<?php if ($tampil['satuan']=='BTL'){echo "selected";}?>>Btl</option>
                                <option value="BUTIR"<?php if ($tampil['satuan']=='BUTIR'){echo "selected";}?>>Butir</option>
                                <option value="DUS"<?php if ($tampil['satuan']=='DUS'){echo "selected";}?>>Dus</option>
                                <option value="FLS"<?php if ($tampil['satuan']=='FLS'){echo "selected";}?>>FLS</option>
                                <option value="KALENG"<?php if ($tampil['satuan']=='KALENG'){echo "selected";}?>>Kaleng</option>
                                <option value="KRTN"<?php if ($tampil['satuan']=='KRTN'){echo "selected";}?>>Krtn</option>
                                <option value="OVULA"<?php if ($tampil['satuan']=='OVULA'){echo "selected";}?>>Ovula</option>
                                <option value="PACK"<?php if ($tampil['satuan']=='PACK'){echo "selected";}?>>Pack</option>
                                <option value="PAK"<?php if ($tampil['satuan']=='PAK'){echo "selected";}?>>Pak</option>
                                <option value="PCS"<?php if ($tampil['satuan']=='PCS'){echo "selected";}?>>Pcs</option>
                                <option value="PIECE"<?php if ($tampil['satuan']=='PIECE'){echo "selected";}?>>Piece</option>
                                <option value="POT"<?php if ($tampil['satuan']=='POT'){echo "selected";}?>>Pot</option>
                                <option value="PSC"<?php if ($tampil['satuan']=='PSC'){echo "selected";}?>>Psc</option>
                                <option value="ROL"<?php if ($tampil['satuan']=='ROL'){echo "selected";}?>>Rol</option>
                                <option value="SACHET"<?php if ($tampil['satuan']=='SACHET'){echo "selected";}?>>Sachet</option>
                                <option value="SCH"<?php if ($tampil['satuan']=='SCH'){echo "selected";}?>>Sch</option>
                                <option value="STP"<?php if ($tampil['satuan']=='STP'){echo "selected";}?>>Stp</option>
                                <option value="STR"<?php if ($tampil['satuan']=='STR'){echo "selected";}?>>Str</option>
                                <option value="STRIP"<?php if ($tampil['satuan']=='STRIP'){echo "selected";}?>>Strip</option>
                                <option value="STRP"<?php if ($tampil['satuan']=='STRP'){echo "selected";}?>>Strp</option>
                                <option value="SUPP"<?php if ($tampil['satuan']=='SUPP'){echo "selected";}?>>Supp</option>
                                <option value="TAB"<?php if ($tampil['satuan']=='TAB'){echo "selected";}?>>Tab</option>
                                <option value="TABLET"<?php if ($tampil['satuan']=='TABLET'){echo "selected";}?>>Tablet</option>
                                <option value="TES"<?php if ($tampil['satuan']=='TES'){echo "selected";}?>>Tes</option>
                                <option value="TUBE"<?php if ($tampil['satuan']=='TUBE'){echo "selected";}?>>Tube</option>
                                <option value="VIAL"<?php if ($tampil['satuan']=='VIAL'){echo "selected";}?>>Vial</option>
                            </select>
                            </div>
                        </div>

                        <label for="">Isi</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="isi" value="<?php echo $tampil['isi'];?>"class="form-control" />
                            </div>
                        </div>

                        <label for="">Stok</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="stok" value="<?php echo $tampil['stok'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Harga Beli</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="hbeli" value="<?php echo $tampil['harga_beli'];?>" id="harga_beli" onkeyup="jumlah()" class="form-control" />
                            </div>
                        </div>

                        <label for="">Harga Jual</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="hjual" value="<?php echo $tampil['harga_jual'];?>" id="harga_jual" onkeyup="jumlah()" class="form-control" />
                            </div>
                        </div>

                        <label for="">Profit</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="profit" value="<?php echo $tampil['profit'];?>" id="profit" readonly="" style="background-color: #e7e3e9;" value="0"  class="form-control" />
                            </div>
                        </div>

                        <label for="">Batas Minimum Persediaan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="batas" value="<?php echo $tampil['batas_min'];?>" class="form-control" />
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


    $sql=$koneksi->query("update tb_obat set nm_obat='$nama',satuan='$satuan',isi='$isi',stok='$stok',harga_beli='$hbeli',harga_jual='$hjual',profit='$profit',batas_min='$batas_minimum' where kd_obat='$kode'");
    if ($sql){
        $_SESSION['status'] = "Tambah Data Berhasil";
        $_SESSION['status_code'] = "success";
        echo "<meta http-equiv ='refresh' content='2;url=index.php?page=obat'>";
        ?>
        
        <?php
    }
}

?>