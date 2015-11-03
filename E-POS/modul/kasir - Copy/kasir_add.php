
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Kasir
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>kasir">Kasir</a></li>
                        <li class="active">Tambah Kasir</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Kasir</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/kasir/kasir_action.php?act=in">
                      <div class="form-group">
                        <label for="No.Nota penjualan" class="control-label col-lg-2">No.Nota penjualan</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_NOTA_PENJUALAN" placeholder="No.Nota penjualan" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal" class="control-label col-lg-2">Tanggal</label>
                        <div class="col-lg-10">
                          <input type="text" name="TANGGAL" placeholder="Tanggal" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kasir" class="control-label col-lg-2">Kasir</label>
                        <div class="col-lg-10">
                          <input type="text" name="OPERATOR_KASIR" placeholder="Kasir" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Sub total penjualan" class="control-label col-lg-2">Sub total penjualan</label>
                        <div class="col-lg-10">
                          <input type="text" name="SUB_TOTAL_PENJUALAN" placeholder="Sub total penjualan" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tipe pembayaran" class="control-label col-lg-2">Tipe pembayaran</label>
                        <div class="col-lg-10">
                          <input type="text" name="TIPE_PEMBAYARAN" placeholder="Tipe pembayaran" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Diskon penjualan" class="control-label col-lg-2">Diskon penjualan</label>
                        <div class="col-lg-10">
                          <input type="text" name="DISKON_PENJUALAN" placeholder="Diskon penjualan" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Pelanggan" class="control-label col-lg-2">Pelanggan</label>
                        <div class="col-lg-10">
                          <select name="PELANGGAN" data-placeholder="Pilih Pelanggan ..." class="form-control chzn-select" tabindex="2" >
               <option value=""></option>
               <?php foreach ($db->fetch_all("pelanggan") as $isi) {
               		echo "<option value='$isi->ID_PELANGGAN'>$isi->NAMA_PELANGGAN</option>";
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Catatan" class="control-label col-lg-2">Catatan</label>
                        <div class="col-lg-10">
                          <input type="text" name="CATATAN" placeholder="Catatan" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>kasir" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            