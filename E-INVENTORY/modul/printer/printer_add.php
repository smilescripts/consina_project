
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                  
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>printer">Printer</a></li>
                        <li class="active">Tambah Printer</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Konfigurasi Printer</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/printer/printer_action.php?act=in" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Outlet" class="control-label col-lg-2">Outlet</label>
                        <div class="col-lg-10">
                          <select name="OUTLET" data-placeholder="Pilih Outlet ..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("outlet") as $isi) {
               		echo "<option value='$isi->KODE_OUTLET'>$isi->NAMA_OUTLET</option>";
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Host Printer" class="control-label col-lg-2">Host Printer</label>
                        <div class="col-lg-10">
                          <input type="text" name="PRINTER_NAME" placeholder="Host Printer" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Ip Address" class="control-label col-lg-2">Ip Address</label>
                        <div class="col-lg-10">
                          <input type="text" name="IP_ADRRESS" placeholder="Ip Address" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>printer" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            