
                <!-- Content Header (Page header) -->
                <section class="content-header">
                   
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>retur-penjualan">Retur Konsinyasi</a></li>
                        <li class="active">Daftar Retur Konsinyasi</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                               	<h1 class="headingtable"><span>Retur</span>  Konsinyasi</h1>
						
                                <div class="box-body table-responsive">
					<form  method="POST" class="form-horizontal foto_banyak" action="">
                      <div class="form-group">
                        <label for="NO_NOTA_KONSINYASI" class="control-label col-lg-2">No.Nota Konsinyasi</label>
                        <div class="col-lg-4">
                          <input type="text" name="NO_NOTA_KONSINYASI" placeholder="Masukan No.Nota Konsinyasi" class="form-control" > 
                        </div>
                       <input type="submit" class="btn btn-primary btn-flat" value="Cari" name="cariretur"> &nbsp;
						 
					  </div><!-- /.form-group -->
					
                     </form>
					 
					<hr/>
			 <?php if(isset($_POST["cariretur"])){
			error_reporting(0);
			date_default_timezone_set("Asia/Jakarta"); 
			
			$cek=$db->fetch_custom("select max(NO_RETUR) as idMaks from retur_konsinyasi");
			foreach ($cek as $barang) {
			$ID = $barang->idMaks;
			$noUrut = (int) substr($ID, 10, 4);
			$noUrut++;
			$w = "RK".date('m/d/y')."";
			$IDbaru =sprintf("%04s", $noUrut);
			}
			$GETUSEROUTLET = $db->fetch_single_row("outlet","KODE_OUTLET",$_SESSION["OUTLET_KODE"]);
			$KODEOUTLETUSER=$GETUSEROUTLET->KODE_OUTLET;
			$data_edit=mysql_fetch_object(mysql_query("select * from transaksi_konsinyasi where NO_NOTA_KONSINYASI='$_POST[NO_NOTA_KONSINYASI]' and OUTLET='$KODEOUTLETUSER'"));
			if($data_edit->NO_NOTA_KONSINYASI==""){
				
				echo '<script>alert("Maaf No.Nota Tidak Ditemukan");window.location=""</script>';
			}
			$kasir=mysql_fetch_object(mysql_query("select * from sys_users where id='$data_edit->OPERATOR_KASIR'"));	
			$outlet=mysql_fetch_object(mysql_query("select * from outlet where KODE_OUTLET='$data_edit->OUTLET'"));	
			?>
              <div class="row">
            <div class="col-xs-12">
          
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-8 invoice-col">
             
              <address>
                <strong></strong><br>
               No.Nota:<?=$data_edit->NO_NOTA_KONSINYASI;?><br>
               Kasir:<?=$kasir->first_name;?><br>
               Outlet:<?=$outlet->NAMA_OUTLET;?><br>
               		<?php  $SUPPLIER = $db->fetch_single_row("supplier","ID_SUPPLIER",$data_edit->SUPPLIER); ?>
               Supplier:<?=$SUPPLIER->NAMA_SUPPLIER;?><br>
              
              
              </address>
            </div>
			<div class="col-sm-4 invoice-col">
             
              <address>
                <strong></strong><br>
            
               Tanggal Transaksi:<?=$data_edit->TANGGAL;?><br>
               Tipe:<?=$data_edit->TIPE_PEMBAYARAN;?><br>
               Diskon Transaksi:Rp.<?=number_format($data_edit->DISKON_PENJUALAN);?><br>
               Tax Sales:<?=number_format($data_edit->TAX_SALES);?><br>
              
              </address>
            </div><!-- /.col -->
           
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode barang</th>
                    <th>Nama</th>
                   
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Qty</th>
                    <th>Total</th>
					<th>Jumlah Retur</th>
                  </tr>
                </thead>
                <tbody>
				<form method="POST" name="" action="">
				<?php 
			
			$dtb=$db->fetch_custom("SELECT detail_konsinyasi.*,barang_outlet.* FROM detail_konsinyasi
		    INNER JOIN barang_outlet on barang_outlet.KODE_BARANG=detail_konsinyasi.KODE_BARANG where detail_konsinyasi.NO_NOTA_KONSINYASI='$data_edit->NO_NOTA_KONSINYASI'");
			$i=1;
			foreach ($dtb as $isi) {
			?>
			<tr id="line_<?=$isi->KODE_BARANG;?>">
			<td align="center"><?=$i;?></td>
			<td><?=$isi->KODE_BARANG;?></td>
			<td><?=$isi->NAMA_BARANG;?></td>
			
			<td>Rp.<?=number_format($isi->HARGA_BARANG);?></td>
			<td><?=$isi->DISKON;?> %</td>
			 <form  method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/kasir/kasir_action.php?act=ubah_scanner">
			 <input type="hidden" id="ID_TMP_PENJUALAN" name="ID_TMP_PENJUALAN[]" value="<?=$isi->ID_TMP_PENJUALAN;?>" >
			<td>X <?=$isi->JUMLAH;?></td>
			<td> 
			<?php 
			error_reporting(0);
			$diskon=$isi->DISKON/100*$isi->HARGA_BARANG;
			$jadi=($isi->HARGA_BARANG-$diskon) * $isi->JUMLAH;
			$subtotal=$jadi+$subtotal;
			
			echo 'Rp.'.number_format($jadi);
			
			?>
			</td>
			<td>
			<input type="hidden" name="NO_RETUR" value="<?php echo $w.$IDbaru;?>">
			<input type="hidden" name="NO_NOTA_KONSINYASI" value="<?=$data_edit->NO_NOTA_KONSINYASI;?>">
			<input type="hidden" name="TANGGAL_RETUR" value="<?php echo date("Y-m-d H:i:s");?>">
			<input type="hidden" name="OPERATOR_KASIR" value="<?php echo $KODEOUTLETUSER;?>">
			<input type="hidden" name="KODE_BARANG[]" class="form-control" value="<?=$isi->KODE_BARANG;?>" style="width:100px">
			<input type="text"   name="JUMLAH_RETUR[]" class="form-control" value="" style="width:100px">
			<input type="hidden"   name="JUMLAH_BELI[]" class="form-control" value="<?=$isi->JUMLAH;?>" style="width:100px">
			</td>
			<?php
				$i++;
			}
			?>
				</tbody>
              </table>
			  <p>Catatan:Isi Kolom jumlah retur hanya pada barang yang akan di retur.</p>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">Catatan Retur:</p>
             
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
			  <textarea name="CATATAN" rows="3" cols="68"></textarea>
              </p>
            </div><!-- /.col -->
			
            <div class="col-xs-6">
              <p class="lead"></p>
              <div class="table-responsive">
                <table class="table">
                  
                  <tr>
                    <th>Sub-total</th>
                    <td><?=number_format($subtotal);?></td>
                  </tr> 
				  <tr>
                    <th>Tax sales</th>
                    <td><?=number_format($data_edit->TAX_SALES);?></td>
                  </tr> 
				  
				
				  <tr>
                    <th>Diskon penjualan</th>
                    <td><?=number_format($data_edit->DISKON_PENJUALAN);?></td>
                  </tr>
                 
                 <tr>
                    <th style="width:50%">Grand total:</th>
                    <td><?=number_format($data_edit->SUB_TOTAL_PENJUALAN);?></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
			<hr/>
          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              
              <input type="submit" value="Simpan Retur Penjualan" name="simpan_retur" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i>
            </div>
			</form>
          </div>
        </section><!-- /.content -->
     
          
                  </div>
          			
					<?php } ?>
		 <?php 
			if(isset($_POST["simpan_retur"])){
			error_reporting(0);
			mysql_query("insert into retur_konsinyasi values('$_POST[NO_RETUR]','$_POST[NO_NOTA_KONSINYASI]','$_POST[TANGGAL_RETUR]','$_POST[OPERATOR_KASIR]','$_POST[CATATAN]')") or die (mysql_error());
			foreach($_POST["KODE_BARANG"] as $key=>$value){
			$JUMLAH_RETUR=$_POST["JUMLAH_RETUR"][$key];
			$JUMLAH_BELI=$_POST["JUMLAH_BELI"][$key];
			mysql_query("insert into detail_retur_konsinyasi values(NULL,'$_POST[NO_RETUR]','$value','$JUMLAH_RETUR')") or die (mysql_error());
			}
			mysql_query("delete from detail_retur_konsinyasi where NO_RETUR='$_POST[NO_RETUR]' and JUMLAH_RETUR='0'");
			echo '<script>alert("Retur Penjualan Berhasil Tersimpan");window.location=""</script>';
			
		  }
		  ?>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
      
                </section><!-- /.content -->
        
