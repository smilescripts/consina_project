

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Profil Perusahaan
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                        <li><a href="<?=base_index();?>profil-perusahaan">Profil Perusahaan</a></li>
                        <li class="active">Edit Profil Perusahaan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Edit Profil Perusahaan</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/profil_perusahaan/profil_perusahaan_action.php?act=up">
                      <div class="form-group">
                        <label for="Nama Perusahaan" class="control-label col-lg-2">Nama Perusahaan</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_PERUSAHAAN" value="<?=$data_edit->NAMA_PERUSAHAAN;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Email" class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                          <input type="text"  data-rule-email="true" name="EMAIL" value="<?=$data_edit->EMAIL;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Phone 1" class="control-label col-lg-2">Phone 1</label>
                        <div class="col-lg-10">
                          <input type="text" name="PHONE_1" value="<?=$data_edit->PHONE_1;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Phone 2" class="control-label col-lg-2">Phone 2</label>
                        <div class="col-lg-10">
                          <input type="text" name="PHONE_2" value="<?=$data_edit->PHONE_2;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kota" class="control-label col-lg-2">Kota</label>
                        <div class="col-lg-10">
                          <input type="text" name="KOTA" value="<?=$data_edit->KOTA;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Faximili" class="control-label col-lg-2">Faximili</label>
                        <div class="col-lg-10">
                          <input type="text" name="FAXIMILI" value="<?=$data_edit->FAXIMILI;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Alamat" class="control-label col-lg-2">Alamat</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="ALAMAT" class="editbox"><?=$data_edit->ALAMAT;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Negara" class="control-label col-lg-2">Negara</label>
                        <div class="col-lg-10">
                          <input type="text" name="NEGARA" value="<?=$data_edit->NEGARA;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Logo" class="control-label col-lg-2">Logo</label>
                        <div class="col-lg-10">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="input-group">
                              <div class="form-control uneditable-input span3" data-trigger="fileinput">
                                <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span> 
                              </div>
                              <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span> 
                                <input type="file" name="logo">
                              </span> 
                              <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 

                            </div>
                             <a href="../../../../upload/profil_perusahaan/<?=$data_edit->logo?>"><?=$data_edit->logo?></a>
                          </div>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Lokasi" class="control-label col-lg-2">Lokasi</label>
                        <div class="col-lg-10">
                          <select name="STATE_ID" data-placeholder="Pilih Lokasi..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("sys_state") as $isi) {

               		if ($data_edit->STATE_ID==$isi->STATE_ID) {
               			echo "<option value='$isi->STATE_ID' selected>$isi->STATE_NAME</option>";
               		} else {
               		echo "<option value='$isi->STATE_ID'>$isi->STATE_NAME</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Warna Tema" class="control-label col-lg-2">Warna Tema</label>
                        <div class="col-lg-2">
                          <input type="text" name="COLOR" value="<?=$data_edit->COLOR;?>" class="form-control demo1"  > 
						  <script>
$(function(){
    $('.demo1').colorpicker();
});
</script>
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->id;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="submit">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
                    <a href="<?=base_index();?>profil-perusahaan" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-step-backward"></i> Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 