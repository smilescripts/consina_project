

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Sub Golongan Inventaris
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>sub-golongan-inventaris">Sub Golongan Inventaris</a></li>
                        <li class="active">Edit Sub Golongan Inventaris</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Sub Golongan Inventaris</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/sub_golongan_inventaris/sub_golongan_inventaris_action.php?act=up">
						
						<div class="form-group">
                        <label for="Kode Sub Golongan" class="control-label col-lg-2">Kode Sub Golongan</label>
                        <div class="col-lg-10">
                          <input type="text" name="sub_golongan" readonly value="<?=$data_edit->sub_golongan;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->

					 <div class="form-group">
                        <label for="Jenis Golongan" class="control-label col-lg-2">Jenis Golongan</label>
                        <div class="col-lg-10">
                          <select name="kode_golongan" data-placeholder="Pilih Jenis Golongan..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_golongan") as $isi) {

               		if ($data_edit->kode_golongan==$isi->kode_golongan) {
               			echo "<option value='$isi->kode_golongan' selected>$isi->nm_golongan</option>";
               		} else {
               		echo "<option value='$isi->kode_golongan'>$isi->nm_golongan</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama Sub Golongan" class="control-label col-lg-2">Nama Sub Golongan</label>
                        <div class="col-lg-10">
                          <input type="text" name="nm_subgolongan" value="<?=$data_edit->nm_subgolongan;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->

					  
					  <input type="hidden" name="tgl_posting" value="<?=date("Y-m-d");?>" class="form-control" >
					  <input type="hidden" name="user_posting" value="<?=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username)?>" class="form-control" >

                      <input type="hidden" name="id" value="<?=$data_edit->sub_golongan;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>sub-golongan-inventaris" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 