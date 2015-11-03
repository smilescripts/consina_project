

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Mutasi Barang
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>mutasi-barang">Mutasi Barang</a></li>
                        <li class="active">Edit Mutasi Barang</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Mutasi Barang</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/mutasi_barang/mutasi_barang_action.php?act=up">
                      <div class="form-group">
                        <label for="TANGGAL_KELUAR" class="control-label col-lg-2">TANGGAL_KELUAR</label>
                        <div class="col-lg-10">
                          <input type="text" name="TANGGAL_KELUAR" value="<?=$data_edit->TANGGAL_KELUAR;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="TANGGAL_DITERIMA" class="control-label col-lg-2">TANGGAL_DITERIMA</label>
                        <div class="col-lg-10">
                          <input type="text" name="TANGGAL_DITERIMA" value="<?=$data_edit->TANGGAL_DITERIMA;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="ID_PTGS_KELUAR" class="control-label col-lg-2">ID_PTGS_KELUAR</label>
                        <div class="col-lg-10">
                          <input type="text" name="ID_PTGS_KELUAR" value="<?=$data_edit->ID_PTGS_KELUAR;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="ID_PTGS_TERIMA" class="control-label col-lg-2">ID_PTGS_TERIMA</label>
                        <div class="col-lg-10">
                          <input type="text" name="ID_PTGS_TERIMA" value="<?=$data_edit->ID_PTGS_TERIMA;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="STATUS" class="control-label col-lg-2">STATUS</label>
                        <div class="col-lg-10">
                          <input type="text" name="STATUS" value="<?=$data_edit->STATUS;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->KODE_MUTASI;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>mutasi-barang" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 