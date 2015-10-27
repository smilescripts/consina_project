

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Gudang Produksi
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>gudang-produksi">Gudang Produksi</a></li>
                        <li class="active">Edit Gudang Produksi</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Gudang Produksi</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/gudang_produksi/gudang_produksi_action.php?act=up">
                      <div class="form-group">
                        <label for="PRD_KODE_BARANG" class="control-label col-lg-2">PRD_KODE_BARANG</label>
                        <div class="col-lg-10">
                          <input type="text" name="PRD_KODE_BARANG" value="<?=$data_edit->PRD_KODE_BARANG;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="PRD_BARCODE" class="control-label col-lg-2">PRD_BARCODE</label>
                        <div class="col-lg-10">
                          <input type="text" name="PRD_BARCODE" value="<?=$data_edit->PRD_BARCODE;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="PRD_NAMA_BARANG" class="control-label col-lg-2">PRD_NAMA_BARANG</label>
                        <div class="col-lg-10">
                          <input type="text" name="PRD_NAMA_BARANG" value="<?=$data_edit->PRD_NAMA_BARANG;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="PRD_STOCK" class="control-label col-lg-2">PRD_STOCK</label>
                        <div class="col-lg-10">
                          <input type="text" name="PRD_STOCK" value="<?=$data_edit->PRD_STOCK;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="STATUS" class="control-label col-lg-2">STATUS</label>
                        <div class="col-lg-10">
                          <input type="text" name="STATUS" value="<?=$data_edit->STATUS;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->PRD_ID_BARANG;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>gudang-produksi" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 