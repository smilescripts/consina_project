
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Retur Konsinyasi
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>retur-konsinyasi">Retur Konsinyasi</a></li>
                        <li class="active">Tambah Retur Konsinyasi</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Retur Konsinyasi</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/retur_konsinyasi/retur_konsinyasi_action.php?act=in">
                      <div class="form-group">
                        <label for="NO_NOTA_KONSINYASI" class="control-label col-lg-2">NO_NOTA_KONSINYASI</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_NOTA_KONSINYASI" placeholder="NO_NOTA_KONSINYASI" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>retur-konsinyasi" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            