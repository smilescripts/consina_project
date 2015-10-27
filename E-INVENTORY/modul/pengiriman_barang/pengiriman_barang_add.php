<?php 
error_reporting(0);
$cek=$db->fetch_custom("select max(ID_PENGIRIMAN) as idMaks from pengiriman_barang");
foreach ($cek as $barang) {
$ID = $barang->idMaks;
$noUrut = (int) substr($ID, 9, 6);
$noUrut++;
$w = "".date('d/m')."/JB-";
$IDbaru =sprintf("%06s", $noUrut);
}
$TAXSALES = $db->fetch_single_row("pengaturan_penjualan","PARAMETER_ID",1);
$VALUETAXSALES=$TAXSALES->PARAMETER_VALUE;

if($_POST["outlet"]!=""){
$OUTLETNYA = $db->fetch_single_row("outlet","KODE_OUTLET",$_POST["outlet"]);
$OUTLET=$OUTLETNYA->KODE_OUTLET;
}
?>
<script language="javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function goodchars(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;

keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();

// check goodkeys
if (goods.indexOf(keychar) != -1)
	return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
   
if (key == 13) {
	var i;
	for (i = 0; i < field.form.elements.length; i++)
		if (field == field.form.elements[i])
			break;
	i = (i + 1) % field.form.elements.length;
	field.form.elements[i].focus();
	return false;
	};
// else return false
return false;
}

function hitung(){
	
	var UANG_BAYAR=document.getElementById("UANG_BAYAR").value;
	var DIBAYAR=document.getElementById("DIBAYAR").value;
	var hitung=parseInt(UANG_BAYAR-DIBAYAR);
	document.getElementById("UANG_KEMBALI").value = hitung;		
	
}

function isi_pelanggan(){
	
	var pelanggan_diskon=document.getElementById("pelanggan_diskon").value;
	document.getElementById("isi_diskon_pelanggan").value = pelanggan_diskon;		
	
}

</script>
<style>
   
    .green{color: green;}
    .red{color: red;}
  </style>
  
<script type="text/javascript" src="jquery-1.10.2.js"></script>
 <script type="text/javascript">
  $(document).ready(function () {

    $("#TANGGAL").blur(function () {
      var TANGGAL = $(this).val();
      if (TANGGAL == '') {
        $("#availability").html("");
      }
      else{
        $.ajax({
          url: "cektanggal.php?tanggalinput="+TANGGAL
        }).done(function( data ) {
          $("#availability").html(data);
		  var verifikasi=data["verifikasi"];
		  if(verifikasi!="yes"){
					
					document.getElementById("simpan").disabled = true;		
					
				}
        });  
		
      } 
    });
  });
</script>
<script type="text/javascript">
	$(document).ready(function () {
			$("#KODE_BARANG").change(function () {
			var KODE_BARANG = $(this).val();
				$.ajax({
				url: "<?=base_admin();?>modul/pengiriman_barang/cek_barang.php?KODE_BARANG="+KODE_BARANG
				}).done(function( data ) {
					
					var databarang=data["databarang"];
					var STOK=data["STOK"];
				
					if(databarang!=""){
					$("#BARANG").val(databarang);
					$("#STOK").val(STOK);
					}
					if(databarang==""){
					alert("Barang tidak ditemukan");
						
					}
					
				});  
		
		});
	
	});
</script>				
<script type="text/javascript">
$(function() {
$("#input_scanner").click(function() {
var NO_NOTA_PENJUALAN = $("#NO_NOTA_PENJUALAN").val();
var BARANG = $("#BARANG").val();
var KODE_BARANG = $("#KODE_BARANG").val();
var JUMLAH = $("#JUMLAH").val();
var STOK = $("#STOK").val();
var dataString = 'NO_NOTA_PENJUALAN='+ NO_NOTA_PENJUALAN+"&KODE_BARANG="+ KODE_BARANG+"&JUMLAH="+ JUMLAH+"&STOK="+ STOK;



if(BARANG==""){
	alert("Maaf barang tidak ditemukan");
	$("#KODE_BARANG").focus();
}

if(JUMLAH==""){
	$("#JUMLAH").focus();
}
else if(KODE_BARANG==""){
	$("#KODE_BARANG").focus();
}
else{
$("#flash").show();
$("#flash").fadeIn(100).html('<div class="alert alert-success" style="margin-left:0"><button class="close"data-dismiss="alert">×</button><center><strong>Memasukan data</strong></center></div>');
$.ajax({
type: "POST",
url: "<?=base_admin();?>modul/pengiriman_barang/pengiriman_barang_action.php?act=input_scanner",
data: dataString,
cache: true,
success: function(html){
$("#show").after(html);

document.getElementById('KODE_BARANG').value='';
document.getElementById('BARANG').value='';
document.getElementById('JUMLAH').value='';


$("#flash").hide();
window.location='tambah';
$("#KODE_BARANG").focus();
}  
});

return false;
}
});

});
</script>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Pengiriman Barang
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>pengiriman-barang">Pengiriman Barang</a></li>
                        <li class="active">Tambah Pengiriman Barang</li>
                    </ol>
                </section>
<section class="content">
				
	
			
				
		<div class="row">
			<?php if(isset($_GET["DAFTAR_BARANG"])){?>		
		  
                   
					 <div class="col-lg-9" > 
                        <div class="col-xs-12">
                            <div class="box">
                              <!-- /.box-header -->
								 <div class="box-header">
                                
     
            <a href="<?=base_index();?>pengiriman_barang/" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-minus-sign"></i>Tutup </a>
                       
                                </div>
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>Kode barang</th>
												
													<th>Nama</th>
													<th>Harga jual</th>
													<th>Stok</th>
													<th>Diskon</th>
													<th>Satuan</th>
													<th>Kategori</th>
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select barang_pusat.KODE_BARANG,barang_pusat.BARCODE,barang_pusat.NAMA_BARANG,barang_pusat.HARGA_JUAL,barang_pusat.STOK,barang_pusat.DISKON,satuan_barang.NAMA_SATUAN,kategori.NAMA_KATEGORI,barang_pusat.ID_BARANG from barang_pusat  inner join satuan_barang on barang_pusat.ID_SATUAN=satuan_barang.KODE_SATUAN inner join kategori on barang_pusat.ID_KATEGORI=kategori.ID_KATEGORI");
			$i=1;
			foreach ($dtb as $isi) {
		?><tr id="line_<?=$isi->ID_BARANG;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->KODE_BARANG;?></td>

<td><?=$isi->NAMA_BARANG;?></td>
<td>Rp.<?=number_format($isi->HARGA_JUAL);?></td>
<td><?=$isi->STOK;?></td>
<td><?=$isi->DISKON;?>%</td>
<td><?=$isi->NAMA_SATUAN;?></td>
<td><?=$isi->NAMA_KATEGORI;?></td>

        <td>
	
					
					
                  
                    <a href="pengiriman_barang?code=<?=$isi->KODE_BARANG;?>&stok=<?=$isi->STOK;?>&name=<?=$isi->NAMA_BARANG;?>" class="btn btn-succes"><i class="glyphicon glyphicon-chevron-left"></i></a> 
						
    
        </td>
        </tr>
				<?php
				$i++;
			}
			?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        </div>
                
       
             
        
		<?php } ?>
		<?php if(!isset($_GET["DAFTAR_BARANG"])){?>		
	    <div class="col-lg-9" > 
		
        <div class="box box-solid box-primary" style="height:635px;">
                               
								 
				 
			<div class="row">
            <div class="col-xs-12">
              <h2 class="page-header" style="padding:10px">
                <i class="glyphicon glyphicon-list-alt"></i>&nbsp;<?php echo $w.$IDbaru;?>
                <small class="pull-right"> <i class="glyphicon glyphicon-time"></i>&nbsp;
				<b><?php echo date('Y-m-d H:i:s');?> &nbsp; <i class="glyphicon glyphicon-user"></i>&nbsp;<?=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username);?></small>
              </h2>
            </div><!-- /.col -->
          </div>
				
                  <div class="box-body">
				  <div style="overflow-y:scroll;height:340px">
				  <div id="flash" align="left"></div>
				  <div id="show" align="left"></div>
				  <table id="pengiriman_barang_dtb" class="table table-bordered table-striped" style="font-size:8pt">
                          <thead>
                          <tr>
                          <th style="width:25px" align="center">No</th>
                          <th>Kode barang</th>
                          <th>Nama</th>
                          <th>Stok</th>
						  <th>Harga</th>
						 
						  <th>Jumlah</th>
						  <th>Total</th>
						  <th></th>
                          </tr>
                         </thead>
                         <tbody>
						
			<?php 
			
			$dtb=$db->fetch_custom("SELECT tmp_pengiriman_barang.*,barang_pusat.* FROM tmp_pengiriman_barang
		    INNER JOIN barang_pusat on barang_pusat.KODE_BARANG=tmp_pengiriman_barang.KODE_BARANG");
			$i=1;
			foreach ($dtb as $isi) {
			?>
			<tr id="line_<?=$isi->KODE_BARANG;?>">
			<td align="center"><?=$i;?></td>
			<td><?=$isi->KODE_BARANG;?></td>
			<td><?=$isi->NAMA_BARANG;?></td>
			<td><?=$isi->STOK;?></td>
			<td>Rp.<?=number_format($isi->HARGA_BARANG);?></td>
		
			 <form  method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/pengiriman_barang/pengiriman_barang_action.php?act=ubah_scanner">
			 <input type="hidden" id="ID_TMP_PENGIRIMAN" name="ID_TMP_PENGIRIMAN[]" value="<?=$isi->ID_TMP_PENGIRIMAN;?>" >
			<input type="hidden"  value="<?=$isi->STOK;?>" name="STOK_UBAH[]"  style="width:30px;margin-top:-10px;border-radius:10px;text-align:center">
			<td>X <input type="text" onKeyPress="return goodchars(event,'0123456789',this)" value="<?=$isi->JUMLAH;?>" name="JUMLAH_UBAH[]" id="JUMLAH_UBAH" style="width:30px;margin-top:-10px;border-radius:10px;text-align:center"></td>
			<td> 
			<?php 
		/* 	$diskon=$isi->DISKON/100*$isi->HARGA_BARANG; */
			$jadi=($isi->HARGA_BARANG) * $isi->JUMLAH;
			
			$subtotal=$jadi+$subtotal;
			
			echo 'Rp.'.number_format($jadi);
			
			?>
			</td>
			<td>
			
			<button type="submit" id="ubah_scanner" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></button>
			<a class="btn btn-danger"  href="<?=base_admin();?>modul/pengiriman_barang/pengiriman_barang_action.php?act=delete&id=<?=$isi->ID_TMP_PENGIRIMAN;?>"><i class="glyphicon glyphicon-trash"></i></a>
			</form>
			
		
			</td>
		
			</tr>
				<?php
				$i++;
			}
			if(isset($_POST["global_discount"])){
				
				$global_discount=$_POST["global_discount"];
			}
			if($_POST["global_discount"]==""){
				
				$global_discount=0;
			}
			/* $GETSALESTAX=$VALUETAXSALES/100*$subtotal; */
			
			$GRANDTOTAL=$subtotal/* +$GETSALESTAX */;
			$GETGLOBALDISCOUNT=$global_discount/100*$GRANDTOTAL;
			$GRANDTOTALFIX=$GRANDTOTAL-$GETGLOBALDISCOUNT;
			?>
						 </tbody>
                          
						 </table>
                 
                  </div>
					
                  </div>
				  <hr/>
				 <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header" style="padding:10px">
               
				<div class="col-xs-6">
           
              <div class="table-responsive">
                <table class="table" style="font-size:10pt;position:absolute;margin-top:-40px">
                  <tr>
                    <th style="width:50%">Total:</th>
                    <td>Rp.<?php echo number_format($subtotal);?></td>
                  </tr>
				   
                 <?php if($_POST["outlet"]!=""){?>
				  <tr>
                    <th>Outlet penerima </th>
                    <td><?php
					 foreach ($db->fetch_custom("select * from outlet where KODE_OUTLET='$_POST[outlet]'") as $isinama) {
					echo $isinama->NAMA_OUTLET;
					 } 
					
					?></td>
                  </tr> 
				 <?php } ?>
				
                 <tr>
                    <th>Global Discount (<?php echo $global_discount;?>%)</th>
                    <td>Rp.<?php echo number_format($GETGLOBALDISCOUNT);?></td>
                  </tr> 
                  <tr>
                    <th>Grand Total:</th>
                    <td>Rp.<b><?php echo number_format($GRANDTOTALFIX);?></b></td>
                  </tr>
                </table>
              </div>
            </div>
				
                <small class="pull-right" style="margin-top:-20px">
					<form action="#" method="POST" >
					<div class="input-group input-group-sm" style="margin-left:-30px">
					
                    <input type="text" name="global_discount"  value="<?php 
					if($global_discount==0){
						
						echo "";
					}
					if($global_discount!=0){
						
						echo $global_discount;
					}
					
					
					
					
					?>" class="form-control" placeholder="Global Discount %">
                    <span class="input-group-btn">
                     
                    </span>
					
                  </div>
				 <div class="input-group input-group-sm" style="margin-top:-30px;margin-left:-200px">
				
                    <select style="height:29px;width:166px"  name="outlet"  class="form-control "  required>
               <option value="">Pilih Outlet penerima</option>
			   
               <?php 
			   $nop=0;
			   foreach ($db->fetch_custom("select * from outlet where NAMA_OUTLET!='PUSAT'") as $isi) {
				    $nop++;
               		echo "<option value='$isi->KODE_OUTLET'
					";
					if($isi->KODE_OUTLET==$OUTLET){echo "selected";}
					echo "
					>$nop. $isi->NAMA_OUTLET</option>";
               } ?>
              </select><br/>
			 <button type="submit" style="background-color:white"value="."></button> 
			  </form>
                  </div>
				</small>
              </h2>
            </div><!-- /.col -->
          </div>
                  </div>
              </div>
	<?php } ?>
  <div class="col-lg-3" style="width:260px;height:260px" > 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Scanner Item</h3>
                                 </div>

                  <div class="box-body">
                     <form  method="post" class="form-horizontal foto_banyak" action="#">
                      <div class="form-group">
                       <div class="col-lg-12">
                          <input type="hidden" name="NO_NOTA_PENJUALAN" id="NO_NOTA_PENJUALAN" value="<?php echo $w.$IDbaru;?>" class="form-control">  
                         
						<input type="text" style="font-style:italic;" name="KODE_BARANG" id="KODE_BARANG" value="<?php echo $_GET["code"];?>" placeholder="Kode barang / barcode " class="form-control" required> 
                        </div>
                        </div><!-- /.form-group -->
						<div class="form-group">
                        <div class="col-lg-12">
                          <input type="text" name="BARANG" id="BARANG" value="<?php echo $_GET["name"];?>" readonly class="form-control" required> 
                        </div>
                        </div>
						<div class="form-group">
                        <div class="col-lg-12">
                          <input type="text" name="STOK" id="STOK" value="<?php echo $_GET["stok"];?>" placeholder="Stok Saat ini" readonly class="form-control" required> 
                        </div>
                        </div><!-- /.form-group -->
						<div class="form-group">
                         <div class="col-lg-12">
                          <input type="text" name="JUMLAH" id="JUMLAH" value="" onKeyPress="return goodchars(event,'0123456789',this)" placeholder="QTY" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->

                       <!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-12" style="margin-left:35px">
                           <button type="submit" class="btn btn-success" id="input_scanner"><i class="glyphicon glyphicon-chevron-left"></i></button> 
						   <a href="<?=base_index();?>pengiriman_barang/?DAFTAR_BARANG" class="btn btn-success"><i class="glyphicon glyphicon-search"></i></a>
						   <a href="<?=base_index();?>pengiriman_barang" class="btn btn-success "><i class="glyphicon glyphicon-refresh"></i></a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>


    <div class="col-lg-3" style="width:260px;margin-top:190px"> 
        <div class="box box-solid box-primary">
                               

                  <div class="box-body">
                     <form  method="POST" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/pengiriman_barang/pengiriman_barang_action.php?act=simpan_pengiriman">
                     <!-- /.form-group -->
						<div class="form-group">
                        <div class="col-lg-12">
						<center>Total RP.<?php echo number_format($GRANDTOTALFIX);?></center>
                          <input type="hidden" name="ID_PENGIRIMAN" value="<?php echo $w.$IDbaru;?>" class="form-control">  
                          <input type="hidden" name="OUTLET" value="<?php echo $_POST["outlet"];?>" class="form-control">  
                          <input type="hidden" name="TANGGAL_PENGIRIMAN" value="<?php echo date('Y-m-d H:i:s');?>" class="form-control">  
                          <input type="hidden" name="TANGGAL_PENERIMAAN" value="0000-00-00" class="form-control">
						  <input type="hidden" name="SUB_TOTAL_PENJUALAN" value="<?php echo $GRANDTOTALFIX;?>" class="form-control">  
						  <input type="hidden" name="PENERIMA" value="" class="form-control">  
						  <input type="hidden" name="PENGIRIM" value="<?php echo $_SESSION['id_user'];?>" class="form-control">  
						  <input type="hidden" name="STATUS_PENGIRIMAN" value="PROSES" class="form-control">  
						  <input type="hidden" name="DISKON"  value="<?php echo $GETGLOBALDISCOUNT;?>" class="form-control">  
						  </div>
                      </div><hr/><!-- /.form-group -->
						
					  
					 <!-- /.form-group -->
<!-- /.form-group -->
<!-- /.form-group -->
						<div class="form-group">
                       <div class="col-lg-12">
                          <input type="text" name="KETERANGAN" placeholder="KETERANGAN " class="form-control" > 
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-success" value="Selesai"> &nbsp;
						   <a href="<?=base_admin();?>modul/pengiriman_barang/pengiriman_barang_action.php?act=batal_penjualan&NO_NOTA_PENJUALAN=<?php echo $w.$IDbaru;?>" class="btn btn-success ">Batal</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
                <!-- Main content -->
             