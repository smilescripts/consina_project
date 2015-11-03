

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Jenis Aset Inventaris
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>jenis-aset-inventaris">Jenis Aset Inventaris</a></li>
                        <li class="active">Edit Jenis Aset Inventaris</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Jenis Aset Inventaris</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/jenis_aset_inventaris/jenis_aset_inventaris_action.php?act=up">
                      <div class="form-group">
                        <label for="Kode Harta" class="control-label col-lg-2">Kode Harta</label>
                        <div class="col-lg-10">
                          <input type="text" name="kode_harta" value="<?=$data_edit->kode_harta;?>" class="form-control" readonly required> 
                        </div>
                      </div><!-- /.form-group --> 
					  
					  <div class="form-group">
                        <label for="Nama Harta" class="control-label col-lg-2">Nama Harta</label>
                        <div class="col-lg-10">
                          <input type="text" name="nm_harta" value="<?=$data_edit->nm_harta;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="ket" class="editbox"><?=$data_edit->ket;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->
					  
  <input type="hidden" value="<?=date("Y-m-d");?>" name="tgl_posting" placeholder="tgl_posting" class="form-control" > 
					  <input type="hidden" value="<?=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username)?>" name="user_posting" placeholder="user_posting" class="form-control" > 


                      <input type="hidden" name="id" value="<?=$data_edit->kode_harta;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>jenis-aset-inventaris" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 