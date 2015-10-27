

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     .
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>mitra-usaha">Mitra Usaha</a></li>
                        <li class="active">Edit Mitra Usaha</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Mitra Usaha</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/mitra_usaha/mitra_usaha_action.php?act=up">
                      <div class="form-group">
                        <label for="Golongan Pelanggan" class="control-label col-lg-2">Golongan Pelanggan</label>
                        <div class="col-lg-10">
                          <input type="text" name="GOLONGAN_PELANGGAN" value="<?=$data_edit->GOLONGAN_PELANGGAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Jenis Pelanggan" class="control-label col-lg-2">Jenis Pelanggan</label>
                        <div class="col-lg-10">
                          <input type="text" name="JENIS_PELANGGAN" value="<?=$data_edit->JENIS_PELANGGAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Produk Pelanggan" class="control-label col-lg-2">Produk Pelanggan</label>
                        <div class="col-lg-10">
                          <input type="text" name="PRODUK_PELANGGAN" value="<?=$data_edit->PRODUK_PELANGGAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kode Pelanggan" class="control-label col-lg-2">Kode Pelanggan</label>
                        <div class="col-lg-10">
                          <input type="text" name="KODE_PELANGGAN" value="<?=$data_edit->KODE_PELANGGAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama Pelanggan" class="control-label col-lg-2">Nama Pelanggan</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_PELANGGAN" value="<?=$data_edit->NAMA_PELANGGAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Alamat" class="control-label col-lg-2">Alamat</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="ALAMAT" class="editbox"><?=$data_edit->ALAMAT;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kota" class="control-label col-lg-2">Kota</label>
                        <div class="col-lg-10">
                          <input type="text" name="KOTA" value="<?=$data_edit->KOTA;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="No.Telepon 1" class="control-label col-lg-2">No.Telepon 1</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_TELP" value="<?=$data_edit->NO_TELP;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="No.Telepon 2" class="control-label col-lg-2">No.Telepon 2</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_TELP2" value="<?=$data_edit->NO_TELP2;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama Bank" class="control-label col-lg-2">Nama Bank</label>
                        <div class="col-lg-10">
                          <input type="text" name="BANK" value="<?=$data_edit->BANK;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="No.Rekening" class="control-label col-lg-2">No.Rekening</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_REKENING" value="<?=$data_edit->NO_REKENING;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Pemilik Rekening" class="control-label col-lg-2">Pemilik Rekening</label>
                        <div class="col-lg-10">
                          <input type="text" name="PEMILIK_REKENING" value="<?=$data_edit->PEMILIK_REKENING;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="KETERANGAN" class="editbox"><?=$data_edit->KETERANGAN;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->ID_PELANGGAN;?>">
					 <?php 
					$diskon=mysql_query("select * from kategori"); 
					$no=0;
					while($datadiskon=mysql_fetch_object($diskon)){
					$diskonmitra=mysql_query("select * from diskon_mitra where ID_KATEGORI='$datadiskon->ID_KATEGORI' and  KODE_PELANGGAN='$data_edit->KODE_PELANGGAN' ");
					$detaildiskon=mysql_fetch_object($diskonmitra);
				    $no++;
					?>
					  <div class="form-group">
                        <label for="Pemilik Rekening" class="control-label col-lg-2">Diskon <?php echo $no;?> (%)</label>
                        <div class="col-lg-1">
                          <input type="hidden" name="ID_DISKON[]" readonly value="<?php echo $detaildiskon->ID;?>" class="form-control"> 
						  <input type="text" name="PRESENTASE[]"  value="<?php echo $detaildiskon->PRESENTASE;?>" class="form-control">
                        </div>Untuk diskon <?php echo $datadiskon->NAMA_KATEGORI;?> (<?php echo $datadiskon->KODE_KATEGORI;?>)
                      </div>
					
					<?php } ?>
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>mitra-usaha" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 