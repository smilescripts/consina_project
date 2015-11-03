
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Cek Bahan Masuk
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>cek-bahan-masuk">Cek Bahan Masuk</a></li>
                        <li class="active">Tambah Cek Bahan Masuk</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Cek Bahan Masuk</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/cek_bahan_masuk/cek_bahan_masuk_action.php?act=in">
                      <div class="form-group">
                        <label for="ID_PETUGAS" class="control-label col-lg-2">ID_PETUGAS</label>
                        <div class="col-lg-10">
                          <input type="text" name="ID_PETUGAS" placeholder="ID_PETUGAS" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="TGL_MASUK" class="control-label col-lg-2">TGL_MASUK</label>
                        <div class="col-lg-10">
                          <input type="text" name="TGL_MASUK" placeholder="TGL_MASUK" class="form-control" > 
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
						   <a href="<?=base_index();?>cek-bahan-masuk" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            