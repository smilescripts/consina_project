

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Stock Adjustment Outlet
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>stock-adjustment-outlet">Stock Adjustment Outlet</a></li>
                        <li class="active">Detail Stock Adjustment Outlet</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Stock Adjustment Outlet</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="Tanggal" class="control-label col-lg-2">Tanggal</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=tgl_indo($data_edit->tanggal);?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="No Penyesuaian" class="control-label col-lg-2">No Penyesuaian</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->no_penyesuaian;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Barang" class="control-label col-lg-2">Barang</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("barang_outlet") as $isi) {
               		if ($data_edit->id_barang==$isi->KODE_BARANG) {

               			echo "<input disabled class='form-control' type='text' value='$isi->NAMA_BARANG'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tambah" class="control-label col-lg-2">Tambah</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->tambah;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kurang" class="control-label col-lg-2">Kurang</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->kurang;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="keterangan" disabled="" class="editbox"><?=$data_edit->keterangan;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="User Posting" class="control-label col-lg-2">User Posting</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->user_posting;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Outlet" class="control-label col-lg-2">Outlet</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->outlet;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>stock-adjustment-outlet" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
