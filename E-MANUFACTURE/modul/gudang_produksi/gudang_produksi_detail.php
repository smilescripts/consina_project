

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Gudang Produksi
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>gudang-produksi">Gudang Produksi</a></li>
                        <li class="active">Detail Gudang Produksi</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Gudang Produksi</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="PRD_KODE_BARANG" class="control-label col-lg-2">PRD_KODE_BARANG</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->PRD_KODE_BARANG;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="PRD_BARCODE" class="control-label col-lg-2">PRD_BARCODE</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->PRD_BARCODE;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="PRD_NAMA_BARANG" class="control-label col-lg-2">PRD_NAMA_BARANG</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->PRD_NAMA_BARANG;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="PRD_STOCK" class="control-label col-lg-2">PRD_STOCK</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->PRD_STOCK;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="STATUS" class="control-label col-lg-2">STATUS</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->STATUS;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>gudang-produksi" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
