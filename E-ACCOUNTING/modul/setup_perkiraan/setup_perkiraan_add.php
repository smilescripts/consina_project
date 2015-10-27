
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Setup Perkiraan
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>setup-perkiraan">Setup Perkiraan</a></li>
                        <li class="active">Tambah Setup Perkiraan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Setup Perkiraan</h3>
                                   
                                </div>

                  <div class="box-body" style="margin-top:1px">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/setup_perkiraan/setup_perkiraan_action.php?act=in">
                      <div class="form-group">
                        <label for="Kode rekening" class="control-label col-lg-2">Kode rekening</label>
                        <div class="col-lg-10">
                          <input type="text" name="kode_rekening" placeholder="Kode rekening" class="form-control" > 
                        </div>
                      </div> 
					  <div class="form-group">
                        <label for="Nama rekening" class="control-label col-lg-2">Nama rekening</label>
                        <div class="col-lg-10">
                          <input type="text" name="nama_rekening" placeholder="Nama rekening" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Awal Debet" class="control-label col-lg-2">Saldo Awal Debet</label>
                        <div class="col-lg-10">
                          <input type="text" name="awal_debet" placeholder="Awal Debet" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Awal Kredit" class="control-label col-lg-2">Saldo Awal Kredit</label>
                        <div class="col-lg-10">
                          <input type="text" name="awal_kredit" placeholder="Awal Kredit" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Posisi" class="control-label col-lg-2">Posisi</label>
                        <div class="col-lg-10">
                         <select name="posisi" placeholder="Posisi" class="form-control" > 
						 <option value="neraca">Neraca</option>
						 <option value="rugi-laba">Rugi Laba</option>
						 </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Normal" class="control-label col-lg-2">Normal</label>
                        <div class="col-lg-10">
                            <select name="normal" placeholder="Posisi" class="form-control" > 
						 <option value="debet">Debet</option>
						 <option value="kredit">Kredit</option>
						 </select>
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>setup-perkiraan" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            