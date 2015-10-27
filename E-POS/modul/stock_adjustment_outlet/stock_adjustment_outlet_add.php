
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Stock Adjustment Outlet
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>stock-adjustment-outlet">Stock Adjustment Outlet</a></li>
                        <li class="active">Tambah Stock Adjustment Outlet</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Stock Adjustment Outlet</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/stock_adjustment_outlet/stock_adjustment_outlet_action.php?act=in">
                     
<div class="form-group">
                        <label for="No Penyesuaian" class="control-label col-lg-2">No Penyesuaian</label>
                        <div class="col-lg-10">
                          <input type="text" name="no_penyesuaian" placeholder="No Penyesuaian" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Barang" class="control-label col-lg-2">Barang</label>
                        <div class="col-lg-10">
                          <select name="id_barang" data-placeholder="Pilih Barang ..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_custom("select * from barang_outlet where outlet='$_SESSION[OUTLET_KODE]'") as $isi) {
               		echo "<option value='$isi->KODE_BARANG'>".$isi->KODE_BARANG."-".$isi->NAMA_BARANG."</option>";
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
					  
					  <div class="form-group">
                        <label for="Jenis Penyesuaian" class="control-label col-lg-2">Jenis Penyesuaian</label>
                        <div class="col-lg-10">
                          <select name="jenis" data-placeholder="Pilih Jenis Penyesuaian ..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <option value="Penambahan">Penambahan</option>
               <option value="Pengurangan">Pengurangan</option>
              
              </select>
                        </div>
                      </div><!-- /.form-group -->

<div class="form-group">
                        <label for="jumlah" class="control-label col-lg-2">Jumlah</label>
                        <div class="col-lg-10">
                          <input type="text" data-rule-number="true" name="jumlah" placeholder="Jumlah" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->					  

<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="keterangan" class="editbox"></textarea>
                        </div>
                      </div><!-- /.form-group -->


                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>stock-adjustment-outlet" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            