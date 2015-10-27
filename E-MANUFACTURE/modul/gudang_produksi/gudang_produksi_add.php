
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Gudang Produksi
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>gudang-produksi">Gudang Produksi</a></li>
                        <li class="active">Tambah Gudang Produksi</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Gudang Produksi</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/gudang_produksi/gudang_produksi_action.php?act=in">
                      <div class="form-group">
                        <label for="PRD_KODE_BARANG" class="control-label col-lg-2">PRD_KODE_BARANG</label>
                        <div class="col-lg-10">
                          <input type="text" name="PRD_KODE_BARANG" placeholder="PRD_KODE_BARANG" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="PRD_BARCODE" class="control-label col-lg-2">PRD_BARCODE</label>
                        <div class="col-lg-10">
                          <input type="text" name="PRD_BARCODE" placeholder="PRD_BARCODE" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="PRD_NAMA_BARANG" class="control-label col-lg-2">PRD_NAMA_BARANG</label>
                        <div class="col-lg-10">
                          <input type="text" name="PRD_NAMA_BARANG" placeholder="PRD_NAMA_BARANG" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="PRD_STOCK" class="control-label col-lg-2">PRD_STOCK</label>
                        <div class="col-lg-10">
                          <input type="text" name="PRD_STOCK" placeholder="PRD_STOCK" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="STATUS" class="control-label col-lg-2">STATUS</label>
                        <div class="col-lg-10">
                          <input type="text" name="STATUS" placeholder="STATUS" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>gudang-produksi" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            