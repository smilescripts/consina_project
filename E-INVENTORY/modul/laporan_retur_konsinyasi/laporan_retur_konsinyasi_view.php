
           
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
                                    <h3 class="box-title">Periode laporan Retur Konsinyasi</h3>
                                   
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
                                    <h3 class="box-title">Hasil laporan Retur Konsinyasi</h3>
                                 </div>
                  <div class="box-body">
				        <div class="box-body table-responsive">
                                    <table  class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
													<th style="width:25px" align="center">No</th>
													<th>Nota Konsinyasi</th>
													<th>Tanggal transaksi</th>
													<th>Tanggal retur</th>
													<th>Outlet</th>
													<th>Kasir</th>
													<th>Supplier</th>
													
													
                        
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select retur_konsinyasi.*,detail_retur_konsinyasi.*,transaksi_konsinyasi.*,detail_konsinyasi.*,outlet.*,sys_users.*,supplier.* from retur_konsinyasi 
			
			inner join detail_retur_konsinyasi on retur_konsinyasi.NO_RETUR=detail_retur_konsinyasi.NO_RETUR 
			inner join transaksi_konsinyasi on retur_konsinyasi.NO_NOTA_KONSINYASI=transaksi_konsinyasi.NO_NOTA_KONSINYASI 
			inner join detail_konsinyasi on transaksi_konsinyasi.NO_NOTA_KONSINYASI=detail_konsinyasi.NO_NOTA_KONSINYASI 
			inner join outlet on transaksi_konsinyasi.OUTLET=outlet.KODE_OUTLET 
			inner join sys_users on transaksi_konsinyasi.OPERATOR_KASIR=sys_users.id 
			inner join supplier on transaksi_konsinyasi.SUPPLIER=supplier.ID_SUPPLIER 
			where transaksi_konsinyasi.OUTLET='$OUTLET' and retur_konsinyasi.NO_RETUR!=''  group by retur_konsinyasi.NO_NOTA_KONSINYASI");
			$i=1;
			foreach ($dtb as $isi) {
?><tr id="line_<?=$isi->ID_PENJUALAN;?>">
<td align="center"><?=$i;?></td><td><b><?=$isi->NO_NOTA_KONSINYASI;?></b></td>

<td><b><?=$isi->TANGGAL;?></b></td>
<td><b><?=$isi->TANGGAL_RETUR;?></b></td>
<td><b><?=$isi->NAMA_OUTLET;?></b></td>
<td><b><?=$isi->first_name;?></b></td>
<td><b><?=$isi->NAMA_SUPPLIER;?></b></td>
			<?php 
			$detail=$db->fetch_custom("select * from detail_konsinyasi where NO_NOTA_KONSINYASI='$isi->NO_NOTA_KONSINYASI'");
		
			foreach ($detail as $isidetail) {
			$item = $db->fetch_single_row("barang_outlet","KODE_BARANG",$isidetail->KODE_BARANG);
			$jretur = $db->fetch_single_row("detail_retur_konsinyasi","KODE_BARANG",$isidetail->KODE_BARANG);
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
<td><i>X <?=$isidetail->JUMLAH;?> Item  </i></td>
<td><i>Jumlah Retur  <?=$jretur->JUMLAH_RETUR;?> Item  </i></td>
<td align="right" colspan="3"><i>Rp.
<?php
$total=($isidetail->HARGA_BARANG-$diskon) * $isidetail->JUMLAH;
echo number_format($total);
$subtotalfix= $total + $subtotalfix;
?></i>
 </td>

</tr> 

			<?php } 
			foreach ($db->fetch_custom("select sum(GRAND_PRICE) as grand_price_fix from detail_konsinyasi where NO_NOTA_KONSINYASI='$isi->NO_NOTA_KONSINYASI'") as $pricegrand) {
				 $fixvalueprice=$pricegrand->grand_price_fix;
			 }
			?>
<tr>
<td colspan="5"></td>
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
									     
                               
                                </div><!-- /.box-body -->
                           </div>
                  </div>
              </div>
</div>
 <?php } ?> 
                </section><!-- /.content -->
        
            