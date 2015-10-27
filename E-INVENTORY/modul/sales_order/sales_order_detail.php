

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Sales Order
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>sales-order">Sales Order</a></li>
                        <li class="active">Detail Sales Order</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Sales Order</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="ID_SO" class="control-label col-lg-2">ID_SO</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->ID_SO;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="NO_SO" class="control-label col-lg-2">NO_SO</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->NO_SO;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>sales-order" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
