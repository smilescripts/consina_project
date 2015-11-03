

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Lap_jual
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>lap_jual">Lap_jual</a></li>
                        <li class="active">Edit Lap_jual</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Lap_jual</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/lap_jual/lap_jual_action.php?act=up">
                      <div class="form-group">
                        <label for="NO_NOTA_PENJUALAN" class="control-label col-lg-2">NO_NOTA_PENJUALAN</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_NOTA_PENJUALAN" value="<?=$data_edit->NO_NOTA_PENJUALAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="TANGGAL" class="control-label col-lg-2">TANGGAL</label>
                        <div class="col-lg-10">
                          <input type="text" id="tgl1" data-rule-date="true" name="TANGGAL" value="<?=$data_edit->TANGGAL;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="OPERATOR_KASIR" class="control-label col-lg-2">OPERATOR_KASIR</label>
                        <div class="col-lg-10">
                          <input type="text" id="tgl2" data-rule-date="true" name="OPERATOR_KASIR" value="<?=$data_edit->OPERATOR_KASIR;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->ID_PENJUALAN;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>lap-jual" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 