
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Lap_jual
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>lap_jual">Lap_jual</a></li>
                        <li class="active">Tambah Lap_jual</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Lap_jual</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/lap_jual/lap_jual_action.php?act=in">
                      <div class="form-group">
                        <label for="NO_NOTA_PENJUALAN" class="control-label col-lg-2">NO_NOTA_PENJUALAN</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_NOTA_PENJUALAN" placeholder="NO_NOTA_PENJUALAN" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="TANGGAL" class="control-label col-lg-2">TANGGAL</label>
                        <div class="col-lg-10">
                          <input type="text" id="tgl1" data-rule-date="true" name="TANGGAL" placeholder="TANGGAL" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="OPERATOR_KASIR" class="control-label col-lg-2">OPERATOR_KASIR</label>
                        <div class="col-lg-10">
                          <input type="text" id="tgl2" data-rule-date="true" name="OPERATOR_KASIR" placeholder="OPERATOR_KASIR" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>lap-jual" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            