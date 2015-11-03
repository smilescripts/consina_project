

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Data Ruangan
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>data-ruangan">Data Ruangan</a></li>
                        <li class="active">Edit Data Ruangan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Data Ruangan</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/data_ruangan/data_ruangan_action.php?act=up">
                      <div class="form-group">
                        <label for="Kode Ruangan" class="control-label col-lg-2">Kode Ruangan</label>
                        <div class="col-lg-10">
                          <input type="text" readonly name="kode_ruangan" value="<?=$data_edit->kode_ruangan;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
					  
					  <div class="form-group">
                        <label for="Nama Ruangan" class="control-label col-lg-2">Nama Ruangan</label>
                        <div class="col-lg-10">
                          <input type="text" name="nm_ruangan" value="<?=$data_edit->nm_ruangan;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="keterangan" class="editbox"><?=$data_edit->keterangan;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->

					  
					  <input type="hidden" name="user_posting" value="<?=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username)?>" class="form-control" > 
					  <input type="hidden" name="tgl_posting" value="<?=date("Y-m-d");?>" class="form-control" > 

                      <input type="hidden" name="id" value="<?=$data_edit->kode_ruangan;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>data-ruangan" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 