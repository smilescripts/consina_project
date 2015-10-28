

                <!-- Content Header (Page header) -->
                <section class="content-header">
                   
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>supplier">Supplier</a></li>
                        <li class="active">Detail Supplier</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Supplier</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Kode supplier" class="control-label col-lg-2">Kode supplier</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->KODE_SUPPLIER;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama" class="control-label col-lg-2">Nama</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->NAMA_SUPPLIER;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Alamat" class="control-label col-lg-2">Alamat</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="ALAMAT" disabled="" class="editbox"><?=$data_edit->ALAMAT;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="No telepon" class="control-label col-lg-2">No telepon</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->NO_TELEPON;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
<<<<<<< HEAD
=======
                        <label for="No rekening" class="control-label col-lg-2">No rekening</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->NO_REKENING;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Npwp" class="control-label col-lg-2">Npwp</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->NPWP;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
>>>>>>> origin/master
                        <label for="Nama perusahaan" class="control-label col-lg-2">Nama perusahaan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->NAMA_PERUSAHAAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal terdaftar" class="control-label col-lg-2">Tanggal terdaftar</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=tgl_indo($data_edit->TANGGAL_TERDAFTAR);?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>supplier" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
