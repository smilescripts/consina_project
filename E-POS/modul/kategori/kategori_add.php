
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>kategori">Kategori</a></li>
                        <li class="active">Tambah Kategori</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Kategori</h3>
<<<<<<< HEAD
                                   
=======
>>>>>>> origin/master
                                </div>

                  <div class="box-body" >
                     <form id="input" method="post" class="form-horizontal foto_banyak"  action="<?=base_admin();?>modul/kategori/kategori_action.php?act=in" style="margin-top:20px">
                      <div class="form-group" >
                        <label for="Kode kategori" class="control-label col-lg-2">Kode kategori</label>
                        <div class="col-lg-10">
                          <input type="text" name="KODE_KATEGORI" placeholder="Kode kategori" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama Kategori" class="control-label col-lg-2">Nama Kategori</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_KATEGORI" placeholder="Nama Kategori" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>kategori" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            