

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Master Bahan
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>master-bahan">Master Bahan</a></li>
                        <li class="active">Edit Master Bahan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Master Bahan</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/master_bahan/master_bahan_action.php?act=up">
                      <div class="form-group">
                        <label for="NAMA_BAHAN" class="control-label col-lg-2">ID BAHAN</label>
                        <div class="col-lg-10">
                          <input type="text" name="ID_BAHAN" value="<?=$data_edit->ID_BAHAN;?>" class="form-control" readonly="true"> 
                        </div>
                      </div>                      <div class="form-group">
                        <label for="NAMA_BAHAN" class="control-label col-lg-2">NAMA BAHAN</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_BAHAN" value="<?=$data_edit->NAMA_BAHAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="SATUAN" class="control-label col-lg-2">SATUAN</label>
                        <div class="col-lg-10">
                          <input type="text" name="SATUAN" value="<?=$data_edit->SATUAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="STOCK" class="control-label col-lg-2">STOCK</label>
                        <div class="col-lg-10">
                          <input type="text" name="STOCK" value="<?=$data_edit->STOCK;?>" class="form-control" readonly="true" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->ID_BAHAN;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>master-bahan" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 