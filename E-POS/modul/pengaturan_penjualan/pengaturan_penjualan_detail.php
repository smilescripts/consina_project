

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Pengaturan Penjualan
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>pengaturan-penjualan">Pengaturan Penjualan</a></li>
                        <li class="active">Detail Pengaturan Penjualan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Pengaturan Penjualan</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="Parameter" class="control-label col-lg-2">Parameter</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->PARAMETER_NAME;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nilai Parameter" class="control-label col-lg-2">Nilai Parameter</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->PARAMETER_VALUE;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>pengaturan-penjualan" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
