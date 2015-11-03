

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Cetak Barcode
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>cetak-barcode">Cetak Barcode</a></li>
                        <li class="active">Detail Cetak Barcode</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Cetak Barcode</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="Barcode" class="control-label col-lg-2">Barcode</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->BARCODE;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Lebar" class="control-label col-lg-2">Lebar</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->LEBAR;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tinggi" class="control-label col-lg-2">Tinggi</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->TINGGI;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>cetak-barcode" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
