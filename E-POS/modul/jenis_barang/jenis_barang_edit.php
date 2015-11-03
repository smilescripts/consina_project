

                <!-- Content Header (Page header) -->
                <section class="content-header">
               
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>jenis-barang">Jenis Barang</a></li>
                        <li class="active">Edit Jenis Barang</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Jenis Barang</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/jenis_barang/jenis_barang_action.php?act=up" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Kode" class="control-label col-lg-2">Kode</label>
                        <div class="col-lg-10">
                          <input type="text" name="KODE_JENIS" value="<?=$data_edit->KODE_JENIS;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Golongan" class="control-label col-lg-2">Golongan</label>
                        <div class="col-lg-10">
                          <select name="KODE_GOLONGAN" data-placeholder="Pilih Golongan..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("kategori") as $isi) {

               		if ($data_edit->KODE_GOLONGAN==$isi->ID_KATEGORI) {
               			echo "<option value='$isi->ID_KATEGORI' selected>$isi->NAMA_KATEGORI</option>";
               		} else {
               		echo "<option value='$isi->ID_KATEGORI'>$isi->NAMA_KATEGORI</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama" class="control-label col-lg-2">Nama</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_JENIS" value="<?=$data_edit->NAMA_JENIS;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <input type="text" name="KETERANGAN" value="<?=$data_edit->KETERANGAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->ID;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>jenis-barang" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 