

                <!-- Content Header (Page header) -->
                <section class="content-header">
                 
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>satuan">Satuan</a></li>
                        <li class="active">Detail Satuan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Satuan</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Nama satuan" class="control-label col-lg-2">Nama satuan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->NAMA_SATUAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>satuan" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
