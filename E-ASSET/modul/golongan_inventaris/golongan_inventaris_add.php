
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Golongan Inventaris
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>golongan-inventaris">Golongan Inventaris</a></li>
                        <li class="active">Tambah Golongan Inventaris</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Golongan Inventaris</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/golongan_inventaris/golongan_inventaris_action.php?act=in">
                      
<div class="form-group">
                        <label for="Nama Golongan" class="control-label col-lg-2">Nama Golongan</label>
                        <div class="col-lg-10">
                          <input type="text" name="nm_golongan" placeholder="Nama Golongan" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="keterangan" class="editbox"></textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Penyusutan (%)" class="control-label col-lg-2">Penyusutan (%)</label>
                        <div class="col-lg-3">
                          <input type="text" data-rule-number="true" name="persen_susut" placeholder="Penyusutan (%)" class="form-control" > 
                        </div>
						
						<label for="Masa Manfaat" class="control-label col-lg-2">Masa Manfaat (Tahun)</label>
                        <div class="col-lg-3">
                          <input type="text" data-rule-number="true" name="masa_manfaat" placeholder="Masa Manfaat" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

					  
					  <input type="hidden" name="tgl_posting" value="<?=date("Y-m-d");?>" placeholder="tgl_posting" class="form-control" > 
					  <input type="hidden" name="user_posting" value="<?=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username)?>" placeholder="user_posting" class="form-control" > 
					  
					  <div class="form-group">
                        <label for="Jenis Harta" class="control-label col-lg-2">Jenis Harta</label>
                        <div class="col-lg-5">
                          <select name="kode_harta" data-placeholder="Pilih Jenis Harta ..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_harta_berwujud") as $isi) {
               		echo "<option value='$isi->kode_harta'>$isi->nm_harta</option>";
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>golongan-inventaris" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            