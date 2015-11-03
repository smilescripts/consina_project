
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Sales Order
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>sales-order">Sales Order</a></li>
                        <li class="active">Tambah Sales Order</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Sales Order</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/sales_order/sales_order_action.php?act=in">
                      <div class="form-group">
                        <label for="ID_SO" class="control-label col-lg-2">ID_SO</label>
                        <div class="col-lg-10">
                          <input type="text" name="ID_SO" placeholder="ID_SO" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="NO_SO" class="control-label col-lg-2">NO_SO</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_SO" placeholder="NO_SO" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>sales-order" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            