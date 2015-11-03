

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     User
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>user">User</a></li>
                        <li class="active">Detail User</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail User</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="NAMA_PELANGGAN" class="control-label col-lg-2">NAMA_PELANGGAN</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->NAMA_PELANGGAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="NO_TELEPON" class="control-label col-lg-2">NO_TELEPON</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->NO_TELEPON;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="TANGGAL_TERDAFTAR" class="control-label col-lg-2">TANGGAL_TERDAFTAR</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->TANGGAL_TERDAFTAR;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="ALAMAT" class="control-label col-lg-2">ALAMAT</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="ALAMAT" disabled="" class="editbox"><?=$data_edit->ALAMAT;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="STATUS_AKTIF" class="control-label col-lg-2">STATUS_AKTIF</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->STATUS_AKTIF;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="DISKON_BELANJA" class="control-label col-lg-2">DISKON_BELANJA</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->DISKON_BELANJA;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

                   
                    </form>
                    <a href="<?=base_index();?>user" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i> Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
