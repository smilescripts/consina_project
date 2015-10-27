

                <!-- Content Header (Page header) -->
                <section class="content-header">
                  
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>barang-pusat">Barang Gudang</a></li>
                        <li class="active">Edit Barang Gudang</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Barang Gudang</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/barang_pusat/barang_pusat_action.php?act=up" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Kode barang" class="control-label col-lg-2">Kode barang</label>
                        <div class="col-lg-10">
                          <input type="text" name="KODE_BARANG" value="<?=$data_edit->KODE_BARANG;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Barcode" class="control-label col-lg-2">Barcode</label>
                        <div class="col-lg-10">
                          <input type="text" name="BARCODE" value="<?=$data_edit->BARCODE;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama barang" class="control-label col-lg-2">Nama barang</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_BARANG" value="<?=$data_edit->NAMA_BARANG;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <input type="text" name="KETERANGAN" value="<?=$data_edit->KETERANGAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Harga modal" class="control-label col-lg-2">Harga modal</label>
                        <div class="col-lg-10">
                          <input type="text" name="HARGA_MODAL" value="<?=$data_edit->HARGA_MODAL;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Harga jual" class="control-label col-lg-2">Harga jual</label>
                        <div class="col-lg-10">
                          <input type="text" name="HARGA_JUAL" value="<?=$data_edit->HARGA_JUAL;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Stok" class="control-label col-lg-2">Stok</label>
                        <div class="col-lg-10">
                          <input type="text" name="STOK" value="<?=$data_edit->STOK;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kategori" class="control-label col-lg-2">Kategori</label>
                        <div class="col-lg-10">
                          <select name="ID_KATEGORI" data-placeholder="Pilih Kategori..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("kategori") as $isi) {

               		if ($data_edit->ID_KATEGORI==$isi->ID_KATEGORI) {
               			echo "<option value='$isi->ID_KATEGORI' selected>$isi->NAMA_KATEGORI</option>";
               		} else {
               		echo "<option value='$isi->ID_KATEGORI'>$isi->NAMA_KATEGORI</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="DISKON" class="control-label col-lg-2">DISKON</label>
                        <div class="col-lg-10">
                          <input type="text" name="DISKON" value="<?=$data_edit->DISKON;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="ID_SATUAN" class="control-label col-lg-2">ID_SATUAN</label>
                        <div class="col-lg-10">
                          <select name="ID_SATUAN" data-placeholder="Pilih ID_SATUAN..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("satuan_barang") as $isi) {

               		if ($data_edit->ID_SATUAN==$isi->KODE_SATUAN) {
               			echo "<option value='$isi->KODE_SATUAN' selected>$isi->NAMA_SATUAN</option>";
               		} else {
               		echo "<option value='$isi->KODE_SATUAN'>$isi->NAMA_SATUAN</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->ID_BARANG;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>barang-pusat" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 