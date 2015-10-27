

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Penjualan
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>penjualan">Penjualan</a></li>
                        <li class="active">Edit Penjualan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Penjualan</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/penjualan/penjualan_action.php?act=up">
                      <div class="form-group">
                        <label for="No.Nota penjualan" class="control-label col-lg-2">No.Nota penjualan</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_NOTA_PENJUALAN" value="<?=$data_edit->NO_NOTA_PENJUALAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal" class="control-label col-lg-2">Tanggal</label>
                        <div class="col-lg-10">
                          <input type="text" name="TANGGAL" value="<?=$data_edit->TANGGAL;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Operator kasir" class="control-label col-lg-2">Operator kasir</label>
                        <div class="col-lg-10">
                          <select name="OPERATOR_KASIR" data-placeholder="Pilih Operator kasir..." class="form-control chzn-select" tabindex="2" >
               <option value=""></option>
               <?php foreach ($db->fetch_all("sys_users") as $isi) {

               		if ($data_edit->OPERATOR_KASIR==$isi->id) {
               			echo "<option value='$isi->id' selected>$isi->first_name</option>";
               		} else {
               		echo "<option value='$isi->id'>$isi->first_name</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Grand total" class="control-label col-lg-2">Grand total</label>
                        <div class="col-lg-10">
                          <input type="text" name="SUB_TOTAL_PENJUALAN" value="<?=$data_edit->SUB_TOTAL_PENJUALAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tipe pembayaran" class="control-label col-lg-2">Tipe pembayaran</label>
                        <div class="col-lg-10">
                          <input type="text" name="TIPE_PEMBAYARAN" value="<?=$data_edit->TIPE_PEMBAYARAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Diskon penjualan" class="control-label col-lg-2">Diskon penjualan</label>
                        <div class="col-lg-10">
                          <input type="text" name="DISKON_PENJUALAN" value="<?=$data_edit->DISKON_PENJUALAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tax sales" class="control-label col-lg-2">Tax sales</label>
                        <div class="col-lg-10">
                          <input type="text" name="TAX_SALES" value="<?=$data_edit->TAX_SALES;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Uang bayar" class="control-label col-lg-2">Uang bayar</label>
                        <div class="col-lg-10">
                          <input type="text" name="UANG_BAYAR" value="<?=$data_edit->UANG_BAYAR;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Uang kembali" class="control-label col-lg-2">Uang kembali</label>
                        <div class="col-lg-10">
                          <input type="text" name="UANG_KEMBALI" value="<?=$data_edit->UANG_KEMBALI;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Pelanggan" class="control-label col-lg-2">Pelanggan</label>
                        <div class="col-lg-10">
                          <select name="PELANGGAN" data-placeholder="Pilih Pelanggan..." class="form-control chzn-select" tabindex="2" >
               <option value=""></option>
               <?php foreach ($db->fetch_all("pelanggan") as $isi) {

               		if ($data_edit->PELANGGAN==$isi->ID_PELANGGAN) {
               			echo "<option value='$isi->ID_PELANGGAN' selected>$isi->NAMA_PELANGGAN</option>";
               		} else {
               		echo "<option value='$isi->ID_PELANGGAN'>$isi->NAMA_PELANGGAN</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Catatan" class="control-label col-lg-2">Catatan</label>
                        <div class="col-lg-10">
                          <input type="text" name="CATATAN" value="<?=$data_edit->CATATAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Status penjualan" class="control-label col-lg-2">Status penjualan</label>
                        <div class="col-lg-10">
                          <input type="text" name="STATUS" value="<?=$data_edit->STATUS;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->ID_PENJUALAN;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>penjualan" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 