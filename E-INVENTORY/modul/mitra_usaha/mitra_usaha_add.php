
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                   .
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>mitra-usaha">Mitra Usaha</a></li>
                        <li class="active">Tambah Mitra Usaha</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Mitra Usaha</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/mitra_usaha/mitra_usaha_action.php?act=in" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Golongan Pelanggan" class="control-label col-lg-2">Golongan Pelanggan</label>
                        <div class="col-lg-10">
                          <input type="text" name="GOLONGAN_PELANGGAN" placeholder="Golongan Pelanggan" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Jenis Pelanggan" class="control-label col-lg-2">Jenis Pelanggan</label>
                        <div class="col-lg-10">
                          <input type="text" name="JENIS_PELANGGAN" placeholder="Jenis Pelanggan" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Produk Pelanggan" class="control-label col-lg-2">Produk Pelanggan</label>
                        <div class="col-lg-10">
                          <input type="text" name="PRODUK_PELANGGAN" placeholder="Produk Pelanggan" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kode Pelanggan" class="control-label col-lg-2">Kode Pelanggan</label>
                        <div class="col-lg-10">
                          <input type="text" name="KODE_PELANGGAN" placeholder="Kode Pelanggan" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama Pelanggan" class="control-label col-lg-2">Nama Pelanggan</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_PELANGGAN" placeholder="Nama Pelanggan" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Alamat" class="control-label col-lg-2">Alamat</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="ALAMAT" class="editbox"></textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kota" class="control-label col-lg-2">Kota</label>
                        <div class="col-lg-10">
                          <input type="text" name="KOTA" placeholder="Kota" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="No.Telepon 1" class="control-label col-lg-2">No.Telepon 1</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_TELP" placeholder="No.Telepon 1" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="No.Telepon 2" class="control-label col-lg-2">No.Telepon 2</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_TELP2" placeholder="No.Telepon 2" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama Bank" class="control-label col-lg-2">Nama Bank</label>
                        <div class="col-lg-10">
                          <input type="text" name="BANK" placeholder="Nama Bank" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="No.Rekening" class="control-label col-lg-2">No.Rekening</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_REKENING" placeholder="No.Rekening" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
						<div class="form-group">
                        <label for="Pemilik Rekening" class="control-label col-lg-2">Pemilik Rekening</label>
                        <div class="col-lg-10">
                          <input type="text" name="PEMILIK_REKENING" placeholder="Pemilik Rekening" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
						<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="KETERANGAN" class="editbox"></textarea>
                        </div>
                      </div><!-- /.form-group -->
					<?php 
					$diskon=mysql_query("select * from kategori"); 
					$no=0;
					while($datadiskon=mysql_fetch_object($diskon)){
				    $no++;
					?>
					  <div class="form-group">
                        <label for="Pemilik Rekening" class="control-label col-lg-2">Diskon <?php echo $no;?> (%)</label>
                        <div class="col-lg-1">
                          <input type="hidden" name="ID_KATEGORI[]" value="<?php echo $datadiskon->ID_KATEGORI;?>" class="form-control">
                          <input type="text" name="PRESENTASE[]" placeholder="Masukan Presentase" class="form-control">
                        </div>Untuk diskon <?php echo $datadiskon->NAMA_KATEGORI;?> (<?php echo $datadiskon->KODE_KATEGORI;?>)
                      </div>
					
					<?php } ?>
                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>mitra-usaha" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    
					
					
					</form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            