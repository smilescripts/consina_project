<script>
function hitung(){
	
	var UANG_KEMBALI=document.getElementById("UANG_KEMBALI").value;
	var NOMINAL_PELUNASAN=document.getElementById("NOMINAL_PELUNASAN").value;
	var hitung=parseInt(UANG_KEMBALI-NOMINAL_PELUNASAN);
	document.getElementById("UANG_KEMBALI").value = hitung;		
	
}
</script>

                <!-- Content Header (Page header) -->
                <section class="content-header">
                  
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>piutang-grosir">Piutang Grosir</a></li>
                        <li class="active">Pelunasan Piutang Grosir</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Pelunasan Piutang Grosir</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/piutang_grosir/piutang_grosir_action.php?act=up" style="margin-top:20px">
                      <div class="form-group">
                        <label for="No.Nota Penjualan" class="control-label col-lg-2">No.Nota Penjualan</label>
                        <div class="col-lg-10">
                          <input type="text" readonly name="NO_NOTA_PENJUALAN" value="<?=$data_edit->NO_NOTA_PENJUALAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal" class="control-label col-lg-2">Tanggal Transaksi</label>
                        <div class="col-lg-10">
                          <input type="text" name="TANGGAL" readonly value="<?=$data_edit->TANGGAL;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
				
						<div class="form-group">
                        <label for="Total" class="control-label col-lg-2">Total Yang Harus Dibayar</label>
                        <div class="col-lg-10">
                          <input type="text" readonly name="SUB_TOTAL_PENJUALAN" value="Rp.<?=$data_edit->SUB_TOTAL_PENJUALAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->


<div class="form-group">
                        <label for="Uang Bayar" class="control-label col-lg-2">Telah Dibayar</label>
                        <div class="col-lg-10">
                          <input type="text" name="UANG_BAYAR" readonly value="<?=$data_edit->UANG_BAYAR;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

<div class="form-group">
                        <label for="Pelanggan" class="control-label col-lg-2">Pelanggan</label>
                        <div class="col-lg-10">
                          <input type="text" readonly name="PELANGGAN" value="<?=$data_edit->PELANGGAN;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->


<div class="form-group">
                        <label for="Jatuh Tempo" class="control-label col-lg-2">Jatuh Tempo</label>
                        <div class="col-lg-10">
                          <input type="text"  name="JATUH_TEMPO" value="<?=$data_edit->JATUH_TEMPO;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
					<div class="form-group">
                        <label for="Biaya Kirim" class="control-label col-lg-2">Biaya Kirim</label>
                        <div class="col-lg-10">
                          <input type="text" readonly name="BIAYA_KIRIM" value="<?=$data_edit->BIAYA_KIRIM;?>" class="form-control" > 
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="Sisa" class="control-label col-lg-2">Sisa</label>
                        <div class="col-lg-10">
                          <input type="text" readonly name="UANG_KEMBALI" id="UANG_KEMBALI" value="<?php echo str_replace("-","",$data_edit->UANG_KEMBALI);?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
					  <div class="form-group">
                        <label for="Biaya Kirim" class="control-label col-lg-2">Nominal Pelunasan</label>
                        <div class="col-lg-10">
                          <input type="text"  name="NOMINAL_PELUNASAN" id="NOMINAL_PELUNASAN" onchange="hitung();" value="" placeholder="Rp." class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->ID_PENJUALAN;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan">&nbsp;
						 <a href="<?=base_index();?>piutang-grosir/detail/<?php echo $data_edit->ID_PENJUALAN;?>" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 