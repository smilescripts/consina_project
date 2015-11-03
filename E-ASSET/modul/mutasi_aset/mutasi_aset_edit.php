

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Mutasi Aset
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>mutasi-aset">Mutasi Aset</a></li>
                        <li class="active">Edit Mutasi Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Mutasi Aset</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/mutasi_aset/mutasi_aset_action.php?act=up">
                      <div class="form-group">
                        <label for="Tanggal Mutasi" class="control-label col-lg-2">Tanggal Mutasi</label>
                        <div class="col-lg-10">
                          <input type="text" name="tgl_mutasi" value="<?=$data_edit->tgl_mutasi;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Cabang Lama" class="control-label col-lg-2">Cabang Lama</label>
                        <div class="col-lg-10">
                          <input type="text" name="kode_cabang_lama" value="<?=$data_edit->kode_cabang_lama;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Cabang Baru" class="control-label col-lg-2">Cabang Baru</label>
                        <div class="col-lg-10">
                          <select name="kode_cabang_baru" data-placeholder="Pilih Cabang Baru..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_cabang") as $isi) {

               		if ($data_edit->kode_cabang_baru==$isi->kode_cabang) {
               			echo "<option value='$isi->kode_cabang' selected>$isi->nm_cabang</option>";
               		} else {
               		echo "<option value='$isi->kode_cabang'>$isi->nm_cabang</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
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
                        <label for="Kode Inventarisasi Baru" class="control-label col-lg-2">Kode Inventarisasi Baru</label>
                        <div class="col-lg-10">
                          <input type="text" name="kode_inventarisasi_baru" value="<?=$data_edit->kode_inventarisasi_baru;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kode Aset" class="control-label col-lg-2">Kode Aset</label>
                        <div class="col-lg-10">
                          <input type="text" name="kode_aset" value="<?=$data_edit->kode_aset;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Ruang Lama" class="control-label col-lg-2">Ruang Lama</label>
                        <div class="col-lg-10">
                          <input type="text" name="ruang_lama" value="<?=$data_edit->ruang_lama;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Ruang Baru" class="control-label col-lg-2">Ruang Baru</label>
                        <div class="col-lg-10">
                          <select name="ruang_baru" data-placeholder="Pilih Ruang Baru..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_ruangan") as $isi) {

               		if ($data_edit->ruang_baru==$isi->kode_ruangan) {
               			echo "<option value='$isi->kode_ruangan' selected>$isi->nm_ruangan</option>";
               		} else {
               		echo "<option value='$isi->kode_ruangan'>$isi->nm_ruangan</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Unit Lama" class="control-label col-lg-2">Unit Lama</label>
                        <div class="col-lg-10">
                          <input type="text" name="unit_lama" value="<?=$data_edit->unit_lama;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Unit Baru" class="control-label col-lg-2">Unit Baru</label>
                        <div class="col-lg-10">
                          <select name="unit_baru" data-placeholder="Pilih Unit Baru..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_unit_kerja") as $isi) {

               		if ($data_edit->unit_baru==$isi->kode_unit) {
               			echo "<option value='$isi->kode_unit' selected>$isi->nm_unit</option>";
               		} else {
               		echo "<option value='$isi->kode_unit'>$isi->nm_unit</option>";
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
                        <label for="User Posting" class="control-label col-lg-2">User Posting</label>
                        <div class="col-lg-10">
                          <input type="text" name="user_posting" value="<?=$data_edit->user_posting;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <input type="text" name="keterangan" value="<?=$data_edit->keterangan;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->id_mutasi;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>mutasi-aset" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 