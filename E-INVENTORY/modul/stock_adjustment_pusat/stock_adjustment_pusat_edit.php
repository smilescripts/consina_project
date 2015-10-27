

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Stock Adjustment Pusat
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>stock-adjustment-pusat">Stock Adjustment Pusat</a></li>
                        <li class="active">Edit Stock Adjustment Pusat</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Stock Adjustment Pusat</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/stock_adjustment_pusat/stock_adjustment_pusat_action.php?act=up">
                      <div class="form-group">
                        <label for="Tanggal" class="control-label col-lg-2">Tanggal</label>
                        <div class="col-lg-10">
                          <input type="text" id="tgl1" data-rule-date="true" name="tanggal" value="<?=$data_edit->tanggal;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="No Penyesuaian" class="control-label col-lg-2">No Penyesuaian</label>
                        <div class="col-lg-10">
                          <input type="text" name="no_penyesuaian" value="<?=$data_edit->no_penyesuaian;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Barang" class="control-label col-lg-2">Barang</label>
                        <div class="col-lg-10">
                          <select name="id_barang" data-placeholder="Pilih Barang..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("barang_pusat") as $isi) {

               		if ($data_edit->id_barang==$isi->ID_BARANG) {
               			echo "<option value='$isi->ID_BARANG' selected>$isi->NAMA_BARANG</option>";
               		} else {
               		echo "<option value='$isi->ID_BARANG'>$isi->NAMA_BARANG</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tambah" class="control-label col-lg-2">Tambah</label>
                        <div class="col-lg-10">
                          <input type="text" data-rule-number="true" name="tambah" value="<?=$data_edit->tambah;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kurang" class="control-label col-lg-2">Kurang</label>
                        <div class="col-lg-10">
                          <input type="text" name="kurang" value="<?=$data_edit->kurang;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="keterangan" class="editbox"><?=$data_edit->keterangan;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="User Posting" class="control-label col-lg-2">User Posting</label>
                        <div class="col-lg-10">
                          <input type="text" name="user_posting" value="<?=$data_edit->user_posting;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->id;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>stock-adjustment-pusat" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 