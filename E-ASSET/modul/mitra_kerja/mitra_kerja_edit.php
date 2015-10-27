

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Mitra Kerja
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>mitra-kerja">Mitra Kerja</a></li>
                        <li class="active">Edit Mitra Kerja</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Mitra Kerja</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/mitra_kerja/mitra_kerja_action.php?act=up">
                      <div class="form-group">
                        <label for="Kode Mitra" class="control-label col-lg-2">Kode Mitra</label>
                        <div class="col-lg-10">
                          <input type="text" name="kode_suplier" readonly value="<?=$data_edit->kode_suplier;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group --> 
					  
					  <div class="form-group">
                        <label for="Nama Mitra" class="control-label col-lg-2">Nama Mitra</label>
                        <div class="col-lg-10">
                          <input type="text" name="nm_suplier" value="<?=$data_edit->nm_suplier;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Alamat" class="control-label col-lg-2">Alamat</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="alamat" class="editbox"required><?=$data_edit->alamat;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kota" class="control-label col-lg-2">Kota</label>
                        <div class="col-lg-10">
                          <input type="text" name="kota" value="<?=$data_edit->kota;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Telepon" class="control-label col-lg-2">Telepon</label>
                        <div class="col-lg-10">
                          <input type="text" data-rule-number="true" name="telepon" value="<?=$data_edit->telepon;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->kode_suplier;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>mitra-kerja" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 