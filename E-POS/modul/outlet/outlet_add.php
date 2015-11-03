
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                  
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>outlet">Outlet</a></li>
                        <li class="active">Tambah Outlet</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Outlet</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/outlet/outlet_action.php?act=in" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Nama outlet" class="control-label col-lg-2">Nama outlet</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_OUTLET" placeholder="Nama outlet" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Lokasi" class="control-label col-lg-2">Lokasi</label>
                        <div class="col-lg-10">
                          <select name="LOKASI" data-placeholder="Pilih Lokasi ..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("sys_state") as $isi) {
               		echo "<option value='$isi->STATE_ID'>$isi->STATE_NAME</option>";
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Alamat" class="control-label col-lg-2">Alamat</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="ALAMAT" class="editbox"></textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="No telepon" class="control-label col-lg-2">No telepon</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_TELEPON" placeholder="No telepon" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>outlet" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            