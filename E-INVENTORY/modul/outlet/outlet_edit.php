

                <!-- Content Header (Page header) -->
                <section class="content-header">
                  
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>outlet">Outlet</a></li>
                        <li class="active">Edit Outlet</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Outlet</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/outlet/outlet_action.php?act=up" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Nama outlet" class="control-label col-lg-2">Nama outlet</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_OUTLET" value="<?=$data_edit->NAMA_OUTLET;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Lokasi" class="control-label col-lg-2">Lokasi</label>
                        <div class="col-lg-10">
                          <select name="LOKASI" data-placeholder="Pilih Lokasi..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("sys_state") as $isi) {

               		if ($data_edit->LOKASI==$isi->STATE_ID) {
               			echo "<option value='$isi->STATE_ID' selected>$isi->STATE_NAME</option>";
               		} else {
               		echo "<option value='$isi->STATE_ID'>$isi->STATE_NAME</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Alamat" class="control-label col-lg-2">Alamat</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="ALAMAT" class="editbox"><?=$data_edit->ALAMAT;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="No telepon" class="control-label col-lg-2">No telepon</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_TELEPON" value="<?=$data_edit->NO_TELEPON;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->KODE_OUTLET;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>outlet" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 