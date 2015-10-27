
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Penjualan
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>penjualan">Penjualan</a></li>
                        <li class="active">Tambah Penjualan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Penjualan</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/penjualan/penjualan_action.php?act=in">
                      <div class="form-group">
                        <label for="No.Nota penjualan" class="control-label col-lg-2">No.Nota penjualan</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_NOTA_PENJUALAN" placeholder="No.Nota penjualan" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal" class="control-label col-lg-2">Tanggal</label>
                        <div class="col-lg-10">
                          <input type="text" name="TANGGAL" placeholder="Tanggal" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Operator kasir" class="control-label col-lg-2">Operator kasir</label>
                        <div class="col-lg-10">
                          <select name="OPERATOR_KASIR" data-placeholder="Pilih Operator kasir ..." class="form-control chzn-select" tabindex="2" >
               <option value=""></option>
               <?php foreach ($db->fetch_all("sys_users") as $isi) {
               		echo "<option value='$isi->id'>$isi->first_name</option>";
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Grand total" class="control-label col-lg-2">Grand total</label>
                        <div class="col-lg-10">
                          <input type="text" name="SUB_TOTAL_PENJUALAN" placeholder="Grand total" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tipe pembayaran" class="control-label col-lg-2">Tipe pembayaran</label>
                        <div class="col-lg-10">
                          <input type="text" name="TIPE_PEMBAYARAN" placeholder="Tipe pembayaran" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Diskon penjualan" class="control-label col-lg-2">Diskon penjualan</label>
                        <div class="col-lg-10">
                          <input type="text" name="DISKON_PENJUALAN" placeholder="Diskon penjualan" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tax sales" class="control-label col-lg-2">Tax sales</label>
                        <div class="col-lg-10">
                          <input type="text" name="TAX_SALES" placeholder="Tax sales" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Uang bayar" class="control-label col-lg-2">Uang bayar</label>
                        <div class="col-lg-10">
                          <input type="text" name="UANG_BAYAR" placeholder="Uang bayar" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Uang kembali" class="control-label col-lg-2">Uang kembali</label>
                        <div class="col-lg-10">
                          <input type="text" name="UANG_KEMBALI" placeholder="Uang kembali" class="form-control" > 
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
                        <label for="Status penjualan" class="control-label col-lg-2">Status penjualan</label>
                        <div class="col-lg-10">
                          <input type="text" name="STATUS" placeholder="Status penjualan" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>penjualan" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            