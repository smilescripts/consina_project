

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Golongan Inventaris
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>golongan-inventaris">Golongan Inventaris</a></li>
                        <li class="active">Edit Golongan Inventaris</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Golongan Inventaris</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/golongan_inventaris/golongan_inventaris_action.php?act=up">
                      
<div class="form-group">
                        <label for="Kode Golongan" class="control-label col-lg-2">Kode Golongan</label>
                        <div class="col-lg-10">
                          <input type="text" name="kode_golongan" readonly value="<?=$data_edit->kode_golongan;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
					  
					  <div class="form-group">
                        <label for="Nama Golongan" class="control-label col-lg-2">Nama Golongan</label>
                        <div class="col-lg-10">
                          <input type="text" name="nm_golongan" value="<?=$data_edit->nm_golongan;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="keterangan" class="editbox"><?=$data_edit->keterangan;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Penyusutan (%)" class="control-label col-lg-2">Penyusutan (%)</label>
                        <div class="col-lg-3">
                          <input type="text" data-rule-number="true" name="persen_susut" value="<?=$data_edit->persen_susut;?>" class="form-control" > 
                        </div>
						
						 <label for="Masa Manfaat" class="control-label col-lg-2">Masa Manfaat(Tahun)</label>
                        <div class="col-lg-3">
                          <input type="text" data-rule-number="true" name="masa_manfaat" value="<?=$data_edit->masa_manfaat;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

					  <input type="hidden" name="tgl_posting" value="<?=date("Y-m-d");?>" class="form-control" >
					  <input type="hidden" name="user_posting" value="<?=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username)?>" class="form-control" >
					  
					  <div class="form-group">
                        <label for="Jenis Harta" class="control-label col-lg-2">Jenis Harta</label>
                        <div class="col-lg-5">
                          <select name="kode_harta" data-placeholder="Pilih Jenis Harta..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_harta_berwujud") as $isi) {

               		if ($data_edit->kode_harta==$isi->kode_harta) {
               			echo "<option value='$isi->kode_harta' selected>$isi->nm_harta</option>";
               		} else {
               		echo "<option value='$isi->kode_harta'>$isi->nm_harta</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->kode_golongan;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>golongan-inventaris" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 