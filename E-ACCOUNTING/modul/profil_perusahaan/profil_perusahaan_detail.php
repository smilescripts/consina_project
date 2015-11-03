

                <!-- Content Header (Page header) -->
                <section class="content-header">
                   
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                        <li><a href="<?=base_index();?>profil-perusahaan">Profil Perusahaan</a></li>
                        <li class="active">Detail Profil Perusahaan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Profil Perusahaan</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                   <form class="form-horizontal" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Nama Perusahaan" class="control-label col-lg-2">Nama Perusahaan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->NAMA_PERUSAHAAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Email" class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->EMAIL;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Phone 1" class="control-label col-lg-2">Phone 1</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->PHONE_1;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Phone 2" class="control-label col-lg-2">Phone 2</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->PHONE_2;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kota" class="control-label col-lg-2">Kota</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->KOTA;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Faximili" class="control-label col-lg-2">Faximili</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->FAXIMILI;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Alamat" class="control-label col-lg-2">Alamat</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="ALAMAT" disabled="" class="editbox"><?=$data_edit->ALAMAT;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Negara" class="control-label col-lg-2">Negara</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->NEGARA;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Logo" class="control-label col-lg-2">Logo</label>
                         <div class="col-lg-10">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                    <img src="<?=base_admin();?><?=$data_edit->logo?>"></div>
                  </div>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Lokasi" class="control-label col-lg-2">Lokasi</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("sys_state") as $isi) {
               		if ($data_edit->STATE_ID==$isi->STATE_ID) {

               			echo "<input disabled class='form-control' type='text' value='$isi->STATE_NAME'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Warna Tema" class="control-label col-lg-2">Warna Tema</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->COLOR;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

                   
                    </form>
                    <a href="<?=base_index();?>profil-perusahaan" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-step-backward"></i> Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
