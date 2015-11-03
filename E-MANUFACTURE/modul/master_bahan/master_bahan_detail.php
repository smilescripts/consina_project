

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Master Bahan
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>master-bahan">Master Bahan</a></li>
                        <li class="active">Detail Master Bahan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Master Bahan</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="ID_BAHAN" class="control-label col-lg-2">ID BAHAN</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->ID_BAHAN;?>" class="form-control">
                        </div>
                      </div>                      <div class="form-group">
                        <label for="NAMA_BAHAN" class="control-label col-lg-2">NAMA BAHAN</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->NAMA_BAHAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="SATUAN" class="control-label col-lg-2">SATUAN</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->SATUAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="STOCK" class="control-label col-lg-2">STOCK</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->STOCK;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>master-bahan" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
