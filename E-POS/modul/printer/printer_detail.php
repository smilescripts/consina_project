

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Printer
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>printer">Printer</a></li>
                        <li class="active">Detail Printer</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Printer</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="Outlet" class="control-label col-lg-2">Outlet</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("outlet") as $isi) {
               		if ($data_edit->OUTLET==$isi->KODE_OUTLET) {

               			echo "<input disabled class='form-control' type='text' value='$isi->NAMA_OUTLET'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Host Printer" class="control-label col-lg-2">Host Printer</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->PRINTER_NAME;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Ip Address" class="control-label col-lg-2">Ip Address</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->IP_ADRRESS;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>printer" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
