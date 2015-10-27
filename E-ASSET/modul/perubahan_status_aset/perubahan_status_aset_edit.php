

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Perubahan Status Aset
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>perubahan-status-aset">Perubahan Status Aset</a></li>
                        <li class="active">Edit Perubahan Status Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Perubahan Status Aset</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/perubahan_status_aset/perubahan_status_aset_action.php?act=up">
                      <div class="form-group">
                        <label for="Kode Inventarisasi" class="control-label col-lg-2">Kode Inventarisasi</label>
                        <div class="col-lg-10">
                          <select name="kode_inventarisasi" data-placeholder="Pilih Kode Inventarisasi..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_inventarisasi") as $isi) {

               		if ($data_edit->kode_inventarisasi==$isi->kode_inventarisasi) {
               			echo "<option value='$isi->kode_inventarisasi' selected>$isi->kode_inventarisasi</option>";
               		} else {
               		echo "<option value='$isi->kode_inventarisasi'>$isi->kode_inventarisasi</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Status Sebelum" class="control-label col-lg-2">Status Sebelum</label>
                        <div class="col-lg-10">
                          <select name="status_before" data-placeholder="Pilih Status Sebelum..." class="form-control chzn-select" tabindex="2" >
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_status") as $isi) {

               		if ($data_edit->status_before==$isi->status) {
               			echo "<option value='$isi->status' selected>$isi->nm_status</option>";
               		} else {
               		echo "<option value='$isi->status'>$isi->nm_status</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Status Sesudah" class="control-label col-lg-2">Status Sesudah</label>
                        <div class="col-lg-10">
                          <select name="status_after" data-placeholder="Pilih Status Sesudah..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_status") as $isi) {

               		if ($data_edit->status_after==$isi->status) {
               			echo "<option value='$isi->status' selected>$isi->status</option>";
               		} else {
               		echo "<option value='$isi->status'>$isi->status</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal Ubah" class="control-label col-lg-2">Tanggal Ubah</label>
                        <div class="col-lg-10">
                          <input type="text" name="tgl_ubah" value="<?=$data_edit->tgl_ubah;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <input type="text" name="keterangan_ubah" value="<?=$data_edit->keterangan_ubah;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="User Ubah" class="control-label col-lg-2">User Ubah</label>
                        <div class="col-lg-10">
                          <input type="text" name="user_ubah" value="<?=$data_edit->user_ubah;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->id_history;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>perubahan-status-aset" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 