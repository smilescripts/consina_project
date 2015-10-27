
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Data Unit Kerja
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>data-unit-kerja">Data Unit Kerja</a></li>
                        <li class="active">Tambah Data Unit Kerja</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Data Unit Kerja</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/data_unit_kerja/data_unit_kerja_action.php?act=in">
                      <div class="form-group">
                        <label for="Nama Unit" class="control-label col-lg-2">Nama Unit</label>
                        <div class="col-lg-10">
                          <input type="text" name="nm_unit" placeholder="Nama Unit" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="keterangan" class="editbox"></textarea>
                        </div>
                      </div><!-- /.form-group -->

					  
					  <input type="hidden" name="user_posting" value="<?=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username)?>" placeholder="user_posting" class="form-control" >
					  <input type="hidden" name="tgl_posting" value="<?=date("Y-m-d");?>" placeholder="tgl_posting" class="form-control" > 

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>data-unit-kerja" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            