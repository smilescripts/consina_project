

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Pemeliharaan Aset
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>pemeliharaan-aset">Pemeliharaan Aset</a></li>
                        <li class="active">Edit Pemeliharaan Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Pemeliharaan Aset</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/pemeliharaan_aset/pemeliharaan_aset_action.php?act=up">
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
                        <label for="Tanggal Servis" class="control-label col-lg-2">Tanggal Servis</label>
                        <div class="col-lg-10">
                          <input type="text" id="tgl1" data-rule-date="true" name="tgl_servis" value="<?=$data_edit->tgl_servis;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal Servis Berikutnya" class="control-label col-lg-2">Tanggal Servis Berikutnya</label>
                        <div class="col-lg-10">
                          <input type="text" name="tgl_servis_berikutnya" value="<?=$data_edit->tgl_servis_berikutnya;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tempat Servis" class="control-label col-lg-2">Tempat Servis</label>
                        <div class="col-lg-10">
                          <input type="text" name="tempat_servis" value="<?=$data_edit->tempat_servis;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keluhan" class="control-label col-lg-2">Keluhan</label>
                        <div class="col-lg-10">
                          <input type="text" name="keluhan" value="<?=$data_edit->keluhan;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <input type="text" name="keterangan_pem" value="<?=$data_edit->keterangan_pem;?>" class="form-control" > 
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
                        <label for="Biaya Servis" class="control-label col-lg-2">Biaya Servis</label>
                        <div class="col-lg-10">
                          <input type="text" data-rule-number="true" name="biaya_servis" value="<?=$data_edit->biaya_servis;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Flag" class="control-label col-lg-2">Flag</label>
                        <div class="col-lg-10">
                          <input type="text" name="flag" value="<?=$data_edit->flag;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->id_pemeliharaan;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>pemeliharaan-aset" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 