
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Pengaturan Penjualan
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>pengaturan-penjualan">Pengaturan Penjualan</a></li>
                        <li class="active">Tambah Pengaturan Penjualan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Pengaturan Penjualan</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/pengaturan_penjualan/pengaturan_penjualan_action.php?act=in">
                      <div class="form-group">
                        <label for="Parameter" class="control-label col-lg-2">Parameter</label>
                        <div class="col-lg-10">
                          <input type="text" name="PARAMETER_NAME" placeholder="Parameter" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nilai Parameter" class="control-label col-lg-2">Nilai Parameter</label>
                        <div class="col-lg-10">
                          <input type="text" name="PARAMETER_VALUE" placeholder="Nilai Parameter" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>pengaturan-penjualan" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            