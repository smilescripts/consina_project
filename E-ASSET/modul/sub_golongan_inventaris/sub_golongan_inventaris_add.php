
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Sub Golongan Inventaris
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>sub-golongan-inventaris">Sub Golongan Inventaris</a></li>
                        <li class="active">Tambah Sub Golongan Inventaris</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Sub Golongan Inventaris</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/sub_golongan_inventaris/sub_golongan_inventaris_action.php?act=in">
                      <div class="form-group">
                        <label for="Jenis Golongan" class="control-label col-lg-2">Jenis Golongan</label>
                        <div class="col-lg-10">
                          <select name="kode_golongan" data-placeholder="Pilih Jenis Golongan ..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_golongan") as $isi) {
               		echo "<option value='$isi->kode_golongan'>$isi->nm_golongan</option>";
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama Sub Golongan" class="control-label col-lg-2">Nama Sub Golongan</label>
                        <div class="col-lg-10">
                          <input type="text" name="nm_subgolongan" placeholder="Nama Sub Golongan" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->

					   <input type="hidden" value="<?=date("Y-m-d");?>" name="tgl_posting" placeholder="tgl_posting" class="form-control" > 
					   <input type="hidden" value="<?=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username)?>" name="user_posting" placeholder="user_posting" class="form-control" > 

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>sub-golongan-inventaris" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            