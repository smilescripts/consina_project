
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                  
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>barang-outlet">Barang Outlet</a></li>
                        <li class="active">Tambah Barang Outlet</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Barang Outlet</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/barang_outlet/barang_outlet_action.php?act=in" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Kode barang" class="control-label col-lg-2">Kode barang</label>
                        <div class="col-lg-10">
                          <input type="text" name="KODE_BARANG" placeholder="Kode barang" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Barcode" class="control-label col-lg-2">Barcode</label>
                        <div class="col-lg-10">
                          <input type="text" name="BARCODE" placeholder="Kode Barcode" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama barang" class="control-label col-lg-2">Nama barang</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_BARANG" placeholder="Nama barang" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
<<<<<<< HEAD
=======
                        <label for="Warna" class="control-label col-lg-2">Warna</label>
                        <div class="col-lg-10">
                          <input type="text" name="WARNA" placeholder="Warna" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Ukuran" class="control-label col-lg-2">Ukuran</label>
                        <div class="col-lg-10">
                          <input type="text" name="UKURAN" placeholder="Ukuran" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
>>>>>>> origin/master
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <input type="text" name="KETERANGAN" placeholder="Keterangan barang" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Harga modal" class="control-label col-lg-2">Harga modal</label>
                        <div class="col-lg-10">
                          <input type="text" name="HARGA_MODAL" placeholder="Harga modal Rp." class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Harga jual" class="control-label col-lg-2">Harga jual</label>
                        <div class="col-lg-10">
                          <input type="text" name="HARGA_JUAL" placeholder="Harga jual Rp." class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
<<<<<<< HEAD
=======
                        <label for="Stok minimal" class="control-label col-lg-2">Stok minimal</label>
                        <div class="col-lg-10">
                          <input type="text" name="STOK_MINIMAL" placeholder="Masukan stok minimal" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
>>>>>>> origin/master
                        <label for="Stok" class="control-label col-lg-2">Stok</label>
                        <div class="col-lg-10">
                          <input type="text" name="STOK" placeholder="Masukan stok saat ini" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kategori" class="control-label col-lg-2">Kategori</label>
                        <div class="col-lg-10">
                          <select name="ID_KATEGORI" data-placeholder="Pilih Kategori ..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php 
			   $no=0;
			   foreach ($db->fetch_all("kategori") as $isi) {
				   $no++;
               		echo "<option value='$isi->ID_KATEGORI'>".$no.".$isi->NAMA_KATEGORI</option>";
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Diskon" class="control-label col-lg-2">Diskon</label>
                        <div class="col-lg-10">
                          <input type="text" name="DISKON" placeholder="Diskon" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Satuan" class="control-label col-lg-2">Satuan</label>
                        <div class="col-lg-10">
                          <select name="ID_SATUAN" data-placeholder="Pilih Satuan ..." class="form-control chzn-select" tabindex="2" >
               <option value=""></option>
               <?php 
					$no=0;
					foreach ($db->fetch_all("satuan_barang") as $isi) {
               		$no++;
					echo "<option value='$isi->KODE_SATUAN'>".$no.".$isi->NAMA_SATUAN</option>";
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Outlet" class="control-label col-lg-2">Outlet</label>
                        <div class="col-lg-10">
                          <select name="OUTLET" data-placeholder="Pilih Outlet ..." class="form-control chzn-select" tabindex="2" >
                  <?php 
				  
				  $no=0;
				  $GETUSER = $db->fetch_single_row("outlet","KODE_OUTLET",$_SESSION["OUTLET_KODE"]);
				  $KODEOUTLET=$GETUSER->KODE_OUTLET;
				  
				  foreach ($db->fetch_custom("select * from outlet where KODE_OUTLET='$KODEOUTLET'") as $outlet) {
					  $no++;
               		echo "<option value='$outlet->KODE_OUTLET'>".$no.".$outlet->NAMA_OUTLET</option>";
				  } ?>
              
              </select>
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>barang-outlet" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            