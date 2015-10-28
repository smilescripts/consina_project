

                <!-- Content Header (Page header) -->
                <section class="content-header">
                  
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>supplier">Supplier</a></li>
                        <li class="active">Edit Supplier</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Supplier</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/supplier/supplier_action.php?act=up" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Kode supplier" class="control-label col-lg-2">Kode supplier</label>
                        <div class="col-lg-10">
                          <input type="text" name="KODE_SUPPLIER" value="<?=$data_edit->KODE_SUPPLIER;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama" class="control-label col-lg-2">Nama</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_SUPPLIER" value="<?=$data_edit->NAMA_SUPPLIER;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Alamat" class="control-label col-lg-2">Alamat</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="ALAMAT" class="editbox"><?=$data_edit->ALAMAT;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="No telepon" class="control-label col-lg-2">No telepon</label>
                        <div class="col-lg-10">
                          <input type="text" data-rule-number="true" name="NO_TELEPON" value="<?=$data_edit->NO_TELEPON;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
<<<<<<< HEAD
=======
                        <label for="No rekening" class="control-label col-lg-2">No rekening</label>
                        <div class="col-lg-10">
                          <input type="text" data-rule-number="true" name="NO_REKENING" value="<?=$data_edit->NO_REKENING;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Npwp" class="control-label col-lg-2">Npwp</label>
                        <div class="col-lg-10">
                          <input type="text" data-rule-number="true" name="NPWP" value="<?=$data_edit->NPWP;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
>>>>>>> origin/master
                        <label for="Nama perusahaan" class="control-label col-lg-2">Nama perusahaan</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_PERUSAHAAN" value="<?=$data_edit->NAMA_PERUSAHAAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal terdaftar" class="control-label col-lg-2">Tanggal terdaftar</label>
                        <div class="col-lg-10">
                          <input type="text" id="tgl1" data-rule-date="true" name="TANGGAL_TERDAFTAR" value="<?=$data_edit->TANGGAL_TERDAFTAR;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->ID_SUPPLIER;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>supplier" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 