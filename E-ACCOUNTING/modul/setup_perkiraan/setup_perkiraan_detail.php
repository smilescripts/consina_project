

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Setup Perkiraan
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>setup-perkiraan">Setup Perkiraan</a></li>
                        <li class="active">Detail Setup Perkiraan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Setup Perkiraan</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="Nama rekening" class="control-label col-lg-2">Nama rekening</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->nama_rekening;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Awal Debet" class="control-label col-lg-2">Awal Debet</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->awal_debet;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Awal Kredit" class="control-label col-lg-2">Awal Kredit</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->awal_kredit;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Posisi" class="control-label col-lg-2">Posisi</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->posisi;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Normal" class="control-label col-lg-2">Normal</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->normal;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>setup-perkiraan" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
