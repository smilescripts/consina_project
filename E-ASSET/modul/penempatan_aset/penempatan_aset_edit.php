

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Penempatan Aset
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>penempatan-aset">Penempatan Aset</a></li>
                        <li class="active">Edit Penempatan Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Penempatan Aset</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/penempatan_aset/penempatan_aset_action.php?act=up">
                      <div class="form-group">
                        <label for="Kode Aset" class="control-label col-lg-2">Kode Aset</label>
                        <div class="col-lg-10">
                          <select name="kode_barang" data-placeholder="Pilih Kode Aset..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_aset") as $isi) {

               		if ($data_edit->kode_barang==$isi->kode_barang) {
               			echo "<option value='$isi->kode_barang' selected>$isi->nm_barang</option>";
               		} else {
               		echo "<option value='$isi->kode_barang'>$isi->nm_barang</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Cabang" class="control-label col-lg-2">Cabang</label>
                        <div class="col-lg-10">
                          <select name="kode_cabang" data-placeholder="Pilih Cabang..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_cabang") as $isi) {

               		if ($data_edit->kode_cabang==$isi->kode_cabang) {
               			echo "<option value='$isi->kode_cabang' selected>$isi->nm_cabang</option>";
               		} else {
               		echo "<option value='$isi->kode_cabang'>$isi->nm_cabang</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Unit Kerja" class="control-label col-lg-2">Unit Kerja</label>
                        <div class="col-lg-10">
                          <select name="kode_unit" data-placeholder="Pilih Unit Kerja..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_unit_kerja") as $isi) {

               		if ($data_edit->kode_unit==$isi->kode_unit) {
               			echo "<option value='$isi->kode_unit' selected>$isi->nm_unit</option>";
               		} else {
               		echo "<option value='$isi->kode_unit'>$isi->nm_unit</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Ruangan" class="control-label col-lg-2">Ruangan</label>
                        <div class="col-lg-10">
                          <select name="kode_ruangan" data-placeholder="Pilih Ruangan..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_ruangan") as $isi) {

               		if ($data_edit->kode_ruangan==$isi->kode_ruangan) {
               			echo "<option value='$isi->kode_ruangan' selected>$isi->nm_ruangan</option>";
               		} else {
               		echo "<option value='$isi->kode_ruangan'>$isi->nm_ruangan</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Jumlah" class="control-label col-lg-2">Jumlah</label>
                        <div class="col-lg-10">
                          <input type="text" name="jumlah" value="<?=$data_edit->jumlah;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kondisi" class="control-label col-lg-2">Kondisi</label>
                        <div class="col-lg-10">
                          <input type="text" name="kondisi" value="<?=$data_edit->kondisi;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal Posting" class="control-label col-lg-2">Tanggal Posting</label>
                        <div class="col-lg-10">
                          <input type="text" name="tgl_posting" value="<?=$data_edit->tgl_posting;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="User Posting" class="control-label col-lg-2">User Posting</label>
                        <div class="col-lg-10">
                          <input type="text" name="user_posting" value="<?=$data_edit->user_posting;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Status" class="control-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                          <input type="text" name="status" value="<?=$data_edit->status;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->kode_inventarisasi;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>penempatan-aset" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 