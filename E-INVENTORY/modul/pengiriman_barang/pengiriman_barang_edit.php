

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Pengiriman Barang
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>pengiriman-barang">Pengiriman Barang</a></li>
                        <li class="active">Edit Pengiriman Barang</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Pengiriman Barang</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/pengiriman_barang/pengiriman_barang_action.php?act=up">
                      <div class="form-group">
                        <label for="No.Pengiriman" class="control-label col-lg-2">No.Pengiriman</label>
                        <div class="col-lg-10">
                          <input type="text" readonly name="ID_PENGIRIMAN" value="<?=$data_edit->ID_PENGIRIMAN;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
						<div class="form-group">
                        <label for="Outlet penerima" class="control-label col-lg-2">Outlet penerima</label>
                        <div class="col-lg-10">
                          <select name="OUTLET" data-placeholder="Pilih Outlet penerima..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("outlet") as $isi) {

               		if ($data_edit->OUTLET==$isi->KODE_OUTLET) {
               			echo "<option value='$isi->KODE_OUTLET' selected>$isi->NAMA_OUTLET</option>";
               		} else {
               		echo "<option value='$isi->KODE_OUTLET'>$isi->NAMA_OUTLET</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="TANGGAL_PENGIRIMAN" class="control-label col-lg-2">TANGGAL_PENGIRIMAN</label>
                        <div class="col-lg-10">
                          <input type="text" readonly name="TANGGAL_PENGIRIMAN" value="<?=$data_edit->TANGGAL_PENGIRIMAN;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="PENGIRIM" class="control-label col-lg-2">PENGIRIM</label>
                        <div class="col-lg-10">
                          <input type="text" readonly name="PENGIRIM" value="<?=$data_edit->PENGIRIM;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
						<!-- /.form-group -->
					  <div class="form-group">
                        <label for="Outlet penerima" class="control-label col-lg-2">Status pengiriman</label>
                        <div class="col-lg-10">
                          <select name="STATUS_PENGIRIMAN" data-placeholder="Pilih Outlet penerima..." class="form-control chzn-select" tabindex="2" required>
               <option value="PROSES">PROSES</option>
               <option value="DITERIMA">DITERIMA</option>
               </select>
                        </div>
                      </div>
<div class="form-group">
                        <label for="KETERANGAN" class="control-label col-lg-2">KETERANGAN</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="KETERANGAN" class="editbox"><?=$data_edit->KETERANGAN;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->ID;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>pengiriman-barang" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 