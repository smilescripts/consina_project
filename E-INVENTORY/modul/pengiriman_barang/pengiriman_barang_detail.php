

                <!-- Content Header (Page header) -->
                <section class="content-header">
                 
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>pengiriman-barang">Pengiriman Barang</a></li>
                        <li class="active">Detail Pengiriman Barang</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Pengiriman Barang</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal" style="margin-top:20px">
                      <div class="form-group">
                        <label for="No.Pengiriman" class="control-label col-lg-2">No.Pengiriman</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->ID_PENGIRIMAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Outlet penerima" class="control-label col-lg-2">Outlet penerima</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("outlet") as $isi) {
               		if ($data_edit->OUTLET==$isi->KODE_OUTLET) {

               			echo "<input disabled class='form-control' type='text' value='$isi->NAMA_OUTLET'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="TANGGAL_PENGIRIMAN" class="control-label col-lg-2">TANGGAL_PENGIRIMAN</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->TANGGAL_PENGIRIMAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="PENGIRIM" class="control-label col-lg-2">PENGIRIM</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->PENGIRIM;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="STATUS_PENGIRIMAN" class="control-label col-lg-2">STATUS_PENGIRIMAN</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->STATUS_PENGIRIMAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="KETERANGAN" class="control-label col-lg-2">KETERANGAN</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="KETERANGAN" disabled="" class="editbox"><?=$data_edit->KETERANGAN;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>pengiriman-barang" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
