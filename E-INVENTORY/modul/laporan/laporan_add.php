
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>laporan">Filter</a></li>
                        <li class="active">Laporan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Periode laporan penjualan</h3>
                                   
                                </div>

					<div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="" style="margin-top:20px">
                      <div class="form-group">
                        <label for="AWAL" class="control-label col-lg-2">Tanggal awal</label>
                        <div class="col-lg-10">
						   <input type="text" id="tgl1" data-rule-date="true" name="AWAL" placeholder="AWAL" class="form-control" > 
                        </div>
                      </div>

					  <div class="form-group">
                        <label for="AKHIR" class="control-label col-lg-2">Tanggal Akhir</label>
                        <div class="col-lg-10">
                          <input type="text" id="tgl2" data-rule-date="true" name="AKHIR" placeholder="AKHIR" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
					
					  <div class="form-group">
                        <label for="Outlet" class="control-label col-lg-2">Outlet</label>
                        <div class="col-lg-10">
                          <select name="OUTLET" data-placeholder="Pilih Outlet ..." class="form-control chzn-select" tabindex="2" >
                  <?php 
				  $no=0;
				  foreach ($db->fetch_all("outlet") as $outlet) {
					  $no++;
               		echo "<option value='$outlet->KODE_OUTLET'>".$no.".$outlet->NAMA_OUTLET</option>";
               } ?>
              
              </select>
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" name="CETAK" class="btn btn-primary btn-flat" value="Tampil Laporan"> &nbsp;
						
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
 <?php if(isset($_POST["CETAK"])){
	 error_reporting(0);
$AWAL=$_POST["AWAL"]; 
$AKHIR=$_POST["AKHIR"]; 
$OUTLET=$_POST["OUTLET"]; 
?>
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Hasil laporan penjualan</h3>
                                   
                                </div>
                  <div class="box-body">
				        <div class="box-body table-responsive">
                                    <table  class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
													<th style="width:25px" align="center">No</th>
													<th>Nota penjualan</th>
													<th>Tanggal jual</th>
													<th>Outlet</th>
													<th>Kasir</th>
													
													
                        
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select penjualan.NO_NOTA_PENJUALAN,penjualan.SUB_TOTAL_PENJUALAN,penjualan.TIPE_PEMBAYARAN,penjualan.DISKON_PENJUALAN,penjualan.TANGGAL,penjualan.OPERATOR_KASIR,outlet.NAMA_OUTLET,penjualan.ID_PENJUALAN,sys_users.first_name from penjualan  inner join outlet on penjualan.OUTLET=outlet.KODE_OUTLET inner join sys_users on penjualan.OPERATOR_KASIR=sys_users.id where penjualan.OUTLET='$OUTLET'");
			$i=1;
			foreach ($dtb as $isi) {
?><tr id="line_<?=$isi->ID_PENJUALAN;?>">
<td align="center"><?=$i;?></td><td><b><?=$isi->NO_NOTA_PENJUALAN;?></b></td>

<td><b><?=$isi->TANGGAL;?></b></td>
<td><b><?=$isi->NAMA_OUTLET;?></b></td>
<td><b><?=$isi->first_name;?></b></td>
			<?php 
			$detail=$db->fetch_custom("select * from detail_penjualan where NO_NOTA_PENJUALAN='$isi->NO_NOTA_PENJUALAN'");
		
			foreach ($detail as $isidetail) {
			$item = $db->fetch_single_row("barang_outlet","KODE_BARANG",$isidetail->KODE_BARANG);
			?>
<tr>
<td></td>
<td><i>&bull;<?=$item->NAMA_BARANG;?></i></td>
<td><i>Rp.<?= number_format($isidetail->HARGA_BARANG);?> -> <?= number_format($isidetail->DISKON);?>% 
(<?php
$diskon=$isidetail->DISKON/100*$isidetail->HARGA_BARANG;
$jadi=$isidetail->HARGA_BARANG-$diskon;
echo number_format($jadi);?>)

</i></td>
<td><i>X <?=$isidetail->JUMLAH;?> Item</i></td>
<td colspan="2"><i>Rp.
<?php
$total=($isidetail->HARGA_BARANG-$diskon) * $isidetail->JUMLAH;
echo number_format($total);
$subtotalfix= $total + $subtotalfix;
?></i>
 </td>

</tr> 

			<?php } 
			foreach ($db->fetch_custom("select sum(GRAND_PRICE) as grand_price_fix from detail_penjualan where NO_NOTA_PENJUALAN='$isi->NO_NOTA_PENJUALAN'") as $pricegrand) {
				 $fixvalueprice=$pricegrand->grand_price_fix;
			 }
			?>
<tr>
<td colspan="3"></td>
<td align="right">Sub-Total :<br/>Diskon Penjualan:<br/>Grand Total:</td>
<td > Rp.<?=number_format($fixvalueprice);?><br/>
Rp.<?=number_format($isi->DISKON_PENJUALAN);?><br/>
Rp.<b><u><?=number_format($fixvalueprice-$isi->DISKON_PENJUALAN);

$sebesar=$fixvalueprice-$isi->DISKON_PENJUALAN + $sebesar;
?></u></b></td>
</tr>  
<tr>
<td colspan="5" ></td>
</tr>			
        </tr>
				<?php
				$i++;
			}
			?>
			
                                        </tbody>
                                    </table>
									      <table class="table table-bordered table-striped">
                               
                                    
						    <tr>
                          <th>Total Penjualan Per tanggal <?php echo $AWAL;?> S/d <?php echo $AKHIR;?></th>
                          <th><h3>Sebesar :Rp.<?php echo number_format($sebesar);?></h3></th>
						</tr>
						 
                                    
                                    
                                          
                                       
                                    </table>
                               
                                </div><!-- /.box-body -->
                           </div>
                  </div>
              </div>
</div>
 <?php } ?> 
                </section><!-- /.content -->
        
            