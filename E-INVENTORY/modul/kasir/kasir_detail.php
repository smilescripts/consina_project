

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Kasir
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>kasir">Kasir</a></li>
                        <li class="active">Detail Kasir</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Kasir</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="No.Nota penjualan" class="control-label col-lg-2">No.Nota penjualan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->NO_NOTA_PENJUALAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal" class="control-label col-lg-2">Tanggal</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->TANGGAL;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kasir" class="control-label col-lg-2">Kasir</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->OPERATOR_KASIR;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Sub total penjualan" class="control-label col-lg-2">Sub total penjualan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->SUB_TOTAL_PENJUALAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tipe pembayaran" class="control-label col-lg-2">Tipe pembayaran</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->TIPE_PEMBAYARAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Diskon penjualan" class="control-label col-lg-2">Diskon penjualan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->DISKON_PENJUALAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Pelanggan" class="control-label col-lg-2">Pelanggan</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("pelanggan") as $isi) {
               		if ($data_edit->PELANGGAN==$isi->ID_PELANGGAN) {

               			echo "<input disabled class='form-control' type='text' value='$isi->NAMA_PELANGGAN'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Catatan" class="control-label col-lg-2">Catatan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->CATATAN;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>kasir" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
