

                <!-- Content Header (Page header) -->
                <section class="content-header">
                  
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>printer">Printer</a></li>
                        <li class="active">Edit Printer</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Printer</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/printer/printer_action.php?act=up" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Outlet" class="control-label col-lg-2">Outlet</label>
                        <div class="col-lg-10">
                          <select name="OUTLET" data-placeholder="Pilih Outlet..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("outlet") as $isi) {

               		if ($data_edit->OUTLET==$isi->KODE_OUTLET) {
               			echo "<option value='$isi->KODE_OUTLET' selected>$isi->NAMA_OUTLET</option>";
               		} else {
               		echo "<option value='$isi->KODE_OUTLET'>$isi->NAMA_OUTLET</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Host Printer" class="control-label col-lg-2">Host Printer</label>
                        <div class="col-lg-10">
                          <input type="text" name="PRINTER_NAME" value="<?=$data_edit->PRINTER_NAME;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Ip Address" class="control-label col-lg-2">Ip Address</label>
                        <div class="col-lg-10">
                          <input type="text" name="IP_ADRRESS" value="<?=$data_edit->IP_ADRRESS;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->ID_CONFIG;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>printer" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 