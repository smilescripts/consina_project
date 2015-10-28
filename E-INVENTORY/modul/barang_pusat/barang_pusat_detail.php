

                <!-- Content Header (Page header) -->
                <section class="content-header">
                  
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>barang-pusat">Barang Gudang</a></li>
                        <li class="active">Detail Barang Gudang</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Barang Gudang</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Kode barang" class="control-label col-lg-2">Kode barang</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->KODE_BARANG;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Barcode" class="control-label col-lg-2">Barcode</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->BARCODE;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama barang" class="control-label col-lg-2">Nama barang</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->NAMA_BARANG;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Warna" class="control-label col-lg-2">Warna</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->WARNA;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Ukuran" class="control-label col-lg-2">Ukuran</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->UKURAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->KETERANGAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Harga modal" class="control-label col-lg-2">Harga modal</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->HARGA_MODAL;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Harga jual" class="control-label col-lg-2">Harga jual</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->HARGA_JUAL;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Stok minimal" class="control-label col-lg-2">Stok minimal</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->STOK_MINIMAL;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Stok" class="control-label col-lg-2">Stok</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->STOK;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kategori" class="control-label col-lg-2">Kategori</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("kategori") as $isi) {
               		if ($data_edit->ID_KATEGORI==$isi->ID_KATEGORI) {

               			echo "<input disabled class='form-control' type='text' value='$isi->NAMA_KATEGORI'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="DISKON" class="control-label col-lg-2">DISKON</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->DISKON;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="ID_SATUAN" class="control-label col-lg-2">ID_SATUAN</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("satuan_barang") as $isi) {
               		if ($data_edit->ID_SATUAN==$isi->KODE_SATUAN) {

               			echo "<input disabled class='form-control' type='text' value='$isi->NAMA_SATUAN'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>barang-pusat" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
