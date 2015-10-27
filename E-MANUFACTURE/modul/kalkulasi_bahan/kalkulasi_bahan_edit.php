

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Kalkulasi Bahan
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>kalkulasi-bahan">Kalkulasi Bahan</a></li>
                        <li class="active">Edit Kalkulasi Bahan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Kalkulasi Bahan</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/kalkulasi_bahan/kalkulasi_bahan_action.php?act=up">
                      <div class="form-group">
                        <label for="TGL_KALKULASI" class="control-label col-lg-2">TGL_KALKULASI</label>
                        <div class="col-lg-10">
                          <input type="text" name="TGL_KALKULASI" value="<?=$data_edit->TGL_KALKULASI;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="STATUS" class="control-label col-lg-2">STATUS</label>
                        <div class="col-lg-10">
                          <input type="text" name="STATUS" value="<?=$data_edit->STATUS;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="KETERANGAN" class="control-label col-lg-2">KETERANGAN</label>
                        <div class="col-lg-10">
                          <input type="text" name="KETERANGAN" value="<?=$data_edit->KETERANGAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->ID_KALKULASI;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>kalkulasi-bahan" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 