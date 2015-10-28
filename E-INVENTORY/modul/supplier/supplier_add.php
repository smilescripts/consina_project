
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>supplier">Supplier</a></li>
                        <li class="active">Tambah Supplier</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Supplier</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/supplier/supplier_action.php?act=in" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Kode supplier" class="control-label col-lg-2">Kode supplier</label>
                        <div class="col-lg-10">
                          <input type="text" name="KODE_SUPPLIER" placeholder="Kode supplier" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama" class="control-label col-lg-2">Nama</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_SUPPLIER" placeholder="Nama" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Alamat" class="control-label col-lg-2">Alamat</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="ALAMAT" class="editbox"></textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="No telepon" class="control-label col-lg-2">No telepon</label>
                        <div class="col-lg-10">
                          <input type="text" data-rule-number="true" name="NO_TELEPON" placeholder="No telepon" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="No rekening" class="control-label col-lg-2">No rekening</label>
                        <div class="col-lg-10">
                          <input type="text" data-rule-number="true" name="NO_REKENING" placeholder="No rekening" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Npwp" class="control-label col-lg-2">Npwp</label>
                        <div class="col-lg-10">
                          <input type="text" data-rule-number="true" name="NPWP" placeholder="Npwp" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama perusahaan" class="control-label col-lg-2">Nama perusahaan</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_PERUSAHAAN" placeholder="Nama perusahaan" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal terdaftar" class="control-label col-lg-2">Tanggal terdaftar</label>
                        <div class="col-lg-10">
                          <input type="text" id="tgl1" data-rule-date="true" name="TANGGAL_TERDAFTAR" placeholder="Tanggal terdaftar" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>supplier" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            