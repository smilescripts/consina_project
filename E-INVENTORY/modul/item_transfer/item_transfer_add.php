<?php 
date_default_timezone_set("Asia/Jakarta"); 
error_reporting(0);
$GETUSEROUTLET = $db->fetch_single_row("outlet","KODE_OUTLET",$_SESSION["OUTLET_KODE"]);
$KODEOUTLETUSER=$GETUSEROUTLET->KODE_OUTLET;
$cek=$db->fetch_custom("select max(NO_TRANSFER) as idMaks from item_transfer");
foreach ($cek as $barang) {
$ID = $barang->idMaks;
$noUrut = (int) substr($ID, 10, 4);
$noUrut++;
$w = "TR".date('m/d/y')."";
$IDbaru =sprintf("%04s", $noUrut);
}
$TAXSALES = $db->fetch_single_row("pengaturan_penjualan","PARAMETER_ID",1);
$VALUETAXSALES=$TAXSALES->PARAMETER_VALUE;

$GETUSER = $db->fetch_single_row("outlet","KODE_OUTLET",$_SESSION["OUTLET_KODE"]);
$KODEOUTLET=$GETUSER->KODE_OUTLET;
$NAMA_OUTLET=$GETUSER->NAMA_OUTLET;
$LOKASI=$GETUSER->LOKASI;
$ALAMAT=$GETUSER->ALAMAT;
$NO_TELEPON=$GETUSER->NO_TELEPON;

if($_POST["PELANGGAN_INPUT"]!=""){
$DISKON_PELANGGAN = $db->fetch_single_row("pelanggan","KODE_PELANGGAN",$_POST["PELANGGAN_INPUT"]);
$VALUEDISKON_PELANGGAN=$DISKON_PELANGGAN->DISKON;
$KODE_PELANGGAN=$DISKON_PELANGGAN->KODE_PELANGGAN;
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
	var DIBAYAR=document.getElementById("UANG_KEMBALI").value;
	var hitung=parseInt(UANG_BAYAR-DIBAYAR);
	document.getElementById("UANG_KEMBALI").value = hitung;		
	
}
function hitung_kirim(){
	
	var TOTAL_TAGIHAN=parseFloat(document.getElementById("TOTAL_TAGIHAN").value);
	var BIAYA_KIRIM=parseFloat(document.getElementById("BIAYA_KIRIM").value);
	var pluskirim=TOTAL_TAGIHAN + BIAYA_KIRIM; 
	document.getElementById("TOTAL_TAGIHAN").value = pluskirim;		
	document.getElementById("UANG_KEMBALI").value = pluskirim;	
	
}

function isi_pelanggan(){
	
	var pelanggan_diskon=document.getElementById("pelanggan_diskon").value;
	document.getElementById("isi_diskon_pelanggan").value = pelanggan_diskon;		
	
}
//diskon
shortcut.add("F6",function() {
$("#global_discount").focus();
});
//Bayar
shortcut.add("F3",function() {
$("#UANG_BAYAR").focus();
});
//tipe Bayar
shortcut.add("F4",function() {
$("#TIPE_PEMBAYARAN").focus();
});
//cari barang
shortcut.add("F1",function() {
window.location = "?DAFTAR_BARANG";
});
//tutup cari barang
shortcut.add("F5",function() {
window.location = "<?=base_index();?>sales-order";
});
//batal penjualan
shortcut.add("F2",function() {
var result = confirm("Anda Yakin Membatalkan penjualan?");
if (result) {
 window.location = "<?=base_admin();?>modul/item_transfer/item_transfer_action.php?act=batal_penjualan&NO_NOTA_PENJUALAN=<?php echo $w.$IDbaru.'-'.$KODEOUTLETUSER;?>";
}
});

</script>
<style>
   
    .green{color: green;}
    .red{color: red;}
  </style>
  
<script type="text/javascript" src="jquery-1.10.2.js"></script>
 <script type="text/javascript">
  function disableTextBox()
{
document.getElementById("tampil_bank").style.display='none';
document.getElementById("tampil_no").style.display='none';
$("#KODE_BARANG").focus();
}
 
  $(document).ready(function () {  
  $("#TIPE_PEMBAYARAN").change(function() { 

    if ( $(this).val() == "HUTANG") {

    $("#NAMA_BANK").show();
	$("#NO_KARTU").show();
	document.getElementById("tampil_bank").style.display='block';
	document.getElementById("tampil_no").style.display='block';

	}
    else{
	document.getElementById("tampil_bank").style.display='none';
	document.getElementById("tampil_no").style.display='none';
    }

});
  });
  
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
				url: "<?=base_admin();?>modul/sales-order/cek_barang.php?KODE_BARANG="+KODE_BARANG
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
var CEKJUMLAH = $("#JUMLAH").val();
if(CEKJUMLAH==""){
var JUMLAH = 1;	
	
}
if(CEKJUMLAH!=""){
var JUMLAH = $("#JUMLAH").val();	
	
}
var STOK = $("#STOK").val();
var dataString = 'NO_NOTA_PENJUALAN='+ NO_NOTA_PENJUALAN+"&KODE_BARANG="+ KODE_BARANG+"&JUMLAH="+ JUMLAH+"&STOK="+ STOK;



/* if(BARANG==""){
	alert("Maaf barang tidak ditemukan");
	$("#KODE_BARANG").focus();
} */

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
url: "<?=base_admin();?>modul/item_transfer/item_transfer_action.php?act=input_scanner",
data: dataString,
cache: true,
success: function(html){
$("#show").after(html);

document.getElementById('KODE_BARANG').value='';
document.getElementById('BARANG').value='';
document.getElementById('JUMLAH').value='';


$("#flash").hide();
window.location='sales-order';
$("#KODE_BARANG").focus();
}  
});

return false;
}
});

});
</script>
     <body onload="disableTextBox();">           <!-- Main content -->
                <section class="content">
				
	
			
				
		<div class="row">
			<?php if(isset($_GET["DAFTAR_BARANG"])){?>		
		  
                   
					 <div class="col-lg-9" > 
                        <div class="col-xs-12">
                            <div class="box">
                              <!-- /.box-header -->
								
     
						<h1 class="headingtable"><span>Daftar</span> Barang</h1>
						
						<div class="btnbantuan" style="margin-top:-55px;">
							<a href="<?=base_index();?>sales-order" style="border-radius:20px" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-minus-sign"></i>Tutup Pencarian (F5)</a>
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
										 $GETUSER = $db->fetch_single_row("outlet","KODE_OUTLET",$_SESSION["OUTLET_KODE"]);
$KODEOUTLET=$GETUSER->KODE_OUTLET;
$NAMA_OUTLET=$GETUSER->NAMA_OUTLET;
$LOKASI=$GETUSER->LOKASI;
			$dtb=$db->fetch_custom("select barang_outlet.KODE_BARANG,barang_outlet.BARCODE,barang_outlet.NAMA_BARANG,barang_outlet.HARGA_JUAL,barang_outlet.STOK,barang_outlet.DISKON,satuan_barang.NAMA_SATUAN,kategori.NAMA_KATEGORI from barang_outlet  inner join satuan_barang on barang_outlet.ID_SATUAN=satuan_barang.KODE_SATUAN inner join kategori on barang_outlet.ID_KATEGORI=kategori.ID_KATEGORI where barang_outlet.OUTLET='$KODEOUTLET'");
			$i=1;
			foreach ($dtb as $isi) {
		?><tr id="line_<?=$isi->KODE_BARANG;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->KODE_BARANG;?></td>

<td><?=$isi->NAMA_BARANG;?></td>
<td>Rp.<?=number_format($isi->HARGA_JUAL);?></td>
<td><?=$isi->STOK;?></td>
<td><?=$isi->DISKON;?>%</td>
<td><?=$isi->NAMA_SATUAN;?></td>
<td><?=$isi->NAMA_KATEGORI;?></td>

        <td>
	
					
					
                  
                    <a href="?code=<?=$isi->BARCODE;?>&stok=<?=$isi->STOK;?>&name=<?=$isi->NAMA_BARANG;?>" class="btn btn-succes"><i class="glyphicon glyphicon-chevron-left" style="color:grey"></i></a> 
						
    
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
		
        <div class="box box-solid box-primary" style="height:640px;">
                               
								 
				 
			<div class="row">
            <div class="col-xs-12">
             <h1 class="headingtable" style="margin-top:-4px" >
                <i class="glyphicon glyphicon-list-alt"></i>&nbsp;<?php echo $w.$IDbaru.'-'.$KODEOUTLETUSER;?>
                <small class="pull-right"> <i class="glyphicon glyphicon-time" style="color:white"></i>&nbsp;
				<b style="color:white"><?php echo date('Y-m-d H:i:s');?> &nbsp; <i class="glyphicon glyphicon-user"></i>&nbsp;<?=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username);?> / <?php echo $NAMA_OUTLET;?></small></b>
              </h1>
            </div><!-- /.col -->
          </div>
				
                  <div class="box-body">
				
				  <div style="overflow-y:scroll;height:200px">
				  <div id="flash" align="left"></div>
				  <div id="show" align="left"></div>
				  <table id="sales-order_dtb" class="table table-bordered table-striped" style="font-size:8pt">
                          <thead>
                          <tr>
                          <th style="width:25px" align="center">No</th>
                          <th>Kode barang</th>
                          <th>Nama</th>
                          <th>Stok</th>
						  <th>Harga</th>
						  <th>Diskon</th>
						  <th>Jumlah</th>
						  <th>Total</th>
						  <th></th>
                          </tr>
                         </thead>
                         <tbody>
						
			<?php 
			
			$dtb=$db->fetch_custom("SELECT tmp_detail_item_transfer.*,barang_outlet.* FROM tmp_detail_item_transfer
		    INNER JOIN barang_outlet on barang_outlet.KODE_BARANG=tmp_detail_item_transfer.KODE_BARANG");
			$i=1;
			foreach ($dtb as $isi) {
			?>
			<tr id="line_<?=$isi->KODE_BARANG;?>">
			<td align="center"><?=$i;?></td>
			<td><?=$isi->KODE_BARANG;?></td>
			<td><?=$isi->NAMA_BARANG;?></td>
			<td><?=$isi->STOK;?></td>
			<td>Rp.<?=number_format($isi->HARGA_BARANG);?></td>
			<td><?=$isi->DISKON;?> %</td>
			 <form  method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/item_transfer/item_transfer_action.php?act=ubah_scanner">
			 <input type="hidden" id="ID_TMP_PENJUALAN" name="ID_TMP_PENJUALAN[]" value="<?=$isi->ID_TMP_PENJUALAN;?>" >
			<input type="hidden"  value="<?=$isi->STOK;?>" name="STOK_UBAH[]"  style="width:30px;margin-top:-10px;border-radius:10px;text-align:center">
			<td>X <input type="text" onKeyPress="return goodchars(event,'0123456789',this)" value="<?=$isi->JUMLAH;?>" name="JUMLAH_UBAH[]" id="JUMLAH_UBAH" style="width:30px;margin-top:-10px;border-radius:10px;text-align:center"></td>
			<td> 
			<?php 
			$diskon=$isi->DISKON/100*$isi->HARGA_BARANG;
			$jadi=($isi->HARGA_BARANG-$diskon) * $isi->JUMLAH;
			
			$subtotal=$jadi+$subtotal;
			
			echo 'Rp.'.number_format($jadi);
			
			?>
			</td>
			<td>
			
			<button type="submit" id="ubah_scanner" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></button>
			<a class="btn btn-danger"  href="<?=base_admin();?>modul/item_transfer/item_transfer_action.php?act=delete&id=<?=$isi->ID_TMP_PENJUALAN;?>"><i class="glyphicon glyphicon-trash"></i></a>
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
			$GETSALESTAX=$VALUETAXSALES/100*$subtotal;
			
			$GRANDTOTAL=$subtotal+$GETSALESTAX;
			$GETDISKONPELANGGAN=$VALUEDISKON_PELANGGAN/100*$GRANDTOTAL;
			$GETGLOBALDISCOUNT=$global_discount/100*$GRANDTOTAL;
			$GRANDTOTALFIX=$GRANDTOTAL-$GETGLOBALDISCOUNT-$GETDISKONPELANGGAN;
			?>
						 </tbody>
                          
						 </table>
                 
                  </div>
				  <hr/>
					  <p><i>Keyboard Shortcut:<b>F1</b>(Pencarian Barang),<b>F2</b>(Batal Penjualan),<b>F3</b>(Bayar),<b>F4</b>(Tipe Bayar),<b>F6</b>(Diskon)</i></p>
                  </div>
				  <hr/>
			<div class="row">
            <div class="col-xs-12">
               
				<div class="col-xs-6">
           
              <div class="table-responsive">
                <table class="table" style="font-size:10pt;margin-top:-40px">
                  <tr>
                    <th>Total:</th>
                    <td>Rp.<?php echo number_format($subtotal);?></td>
                  </tr> 
				  <tr>
                    <th>Total:</th>
                    <td>Rp.<?php echo number_format($subtotal);?></td>
                  </tr>
				    <tr>
                    <th>Sales Tax (<?php echo $VALUETAXSALES;?>%)</th>
                    <td>Rp.<?php echo number_format($GETSALESTAX);?></td>
                  </tr>
                
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
				
                <small class="pull-right" >
					<form method="POST" >
					<div class="input-group input-group-sm" style="margin-left:-30px">
					
                    <input type="text" name="global_discount" id="global_discount"  value="<?php 
					if($global_discount==0){
						
						echo "";
					}
					if($global_discount!=0){
						
						echo $global_discount;
					}
					
					
					
					
					?>" class="form-control" placeholder="Global Discount %" >
                    <span class="input-group-btn">
                     
                    </span>
					
                  </div>
				 <div class="input-group input-group-sm" style="margin-top:-30px;margin-left:-200px">
				
                    <select style="height:29px;width:166px"  name="PELANGGAN_INPUT" data-placeholder="Pilih Outlet penerima ..." class="form-control" onChange="this.form.submit()"  >
               <option value="">Tujuan</option>
			   
               <?php 
			   $nop=0;
			   foreach ($db->fetch_all("outlet") as $isi) {
				    $nop++;
               		echo "<option value='$isi->KODE_PELANGGAN'
					";
					if($isi->KODE_PELANGGAN==$KODE_PELANGGAN){echo "selected";}
					echo "
					>$nop. $isi->NAMA_OUTLET</option>";
               } ?>
              </select><br/>
			
			  </form>
                  </div>
				</small>
    
			
            </div><!-- /.col -->
		
          </div>
		  <br/>
		   <?php if($_POST["PELANGGAN_INPUT"]!=""){?>
		
		<div class="row" style="margin-left:440px;margin-top:-120px">
            <div class="col-xs-12" >
               
		
				<div class="col-xs-12">
				 
				Informasi Diskon Pelanggan
            <div style="overflow-y:scroll;height:100px">
              <div class="table-responsive">
                <table class="table table-bordered" >
                  <tr>
                    <th>No</th>
                    <th>Diskon</th>
                    <th>Keterangan</th>
                  </tr> 
				 
				  	<?php 
					$diskon=mysql_query("select * from kategori"); 
					$no=0;
					while($datadiskon=mysql_fetch_object($diskon)){
					$diskonmitra=mysql_query("select * from diskon_mitra where ID_KATEGORI='$datadiskon->ID_KATEGORI' and  KODE_PELANGGAN='$_POST[PELANGGAN_INPUT]' ");
					$detaildiskon=mysql_fetch_object($diskonmitra);
				    $no++;
					?>
					 <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $detaildiskon->PRESENTASE;?> %</td>
                    <td><?php echo $datadiskon->NAMA_KATEGORI;?> (<?php echo $datadiskon->KODE_KATEGORI;?>)</td>
					 </tr>
					<?php } ?>
                 
				
                </table>
              </div>
              </div>
            </div>
            
            </div><!-- /.col -->
		
          </div>
		   <?php } ?>
		          </div>
			
			
              </div>
			
	<?php } ?>
  <div class="col-lg-3" style="width:260px;height:260px" > 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Scanner Item</h3>
                                 </div>

                  <div class="box-body">
                     <form  method="post" class="form-horizontal foto_banyak"  style="margin-top:20px" >
					 <div class="form-group">
                         <div class="col-lg-12">
                          <input type="text" name="JUMLAH" id="JUMLAH" value="" onKeyPress="return goodchars(event,'0123456789',this)" placeholder="QTY" class="form-control" > 
                        </div>
                      </div>
                      <div class="form-group">
                       <div class="col-lg-12">
                          <input type="hidden" name="NO_NOTA_PENJUALAN" id="NO_NOTA_PENJUALAN" value="<?php echo $w.$IDbaru.'-'.$KODEOUTLETUSER;?>" class="form-control">  
                         
						<input type="text" style="font-style:italic;" name="KODE_BARANG" id="KODE_BARANG" value="<?php echo $_GET["code"];?>" placeholder="Kode barcode " class="form-control" required> 
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
						<!-- /.form-group -->

                       <!-- /.form-group -->

                      
                      <div class="form-group" style="margin-top:-30px">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-12" style="margin-left:35px">
                           <button type="submit" class="btn btn-success btn-flat" id="input_scanner"><i class="glyphicon glyphicon-chevron-left"></i></button> 
						 <a href="<?=base_index();?>sales-order?DAFTAR_BARANG" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-search"></i></a>
						   <a href="<?=base_index();?>sales-order" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-refresh"></i></a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>


    <div class="col-lg-3" style="width:260px;margin-top:60px"> 
        <div class="box box-solid box-primary">
                               

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/item_transfer/item_transfer_action.php?act=simpan_penjualan" >
                     <!-- /.form-group -->
						<div class="form-group">
                        <div class="col-lg-12">
					       <input type="hidden" name="NO_NOTA_PENJUALAN" value="<?php echo $w.$IDbaru.'-'.$KODEOUTLETUSER;?>" class="form-control">  
                          <input type="hidden" name="TANGGAL" value="<?php echo date('Y-m-d H:i:s');?>" class="form-control">  
                          <input type="hidden" name="OPERATOR_sales-order" value="<?php echo $_SESSION['id_user'];?>" class="form-control">
						  <input type="hidden" name="OPERATOR_KASIR" value="<?php echo $_SESSION['id_user'];?>" class="form-control">
						  <input type="hidden" name="SUB_TOTAL_PENJUALAN" value="<?php echo $GRANDTOTALFIX;?>" class="form-control">  
						  <input type="hidden" name="DISKON_PENJUALAN" value="<?php echo $GETGLOBALDISCOUNT;?>" class="form-control">  
						  <input type="hidden" name="TAX_SALES" value="<?php echo $GETSALESTAX;?>" class="form-control">  
						  <input type="hidden" name="STATUS" value="LUNAS" class="form-control">  
						  <input type="hidden" name="PELANGGAN"  value="<?php echo $KODE_PELANGGAN;?>" class="form-control">  
						  <input type="hidden" name="DISKON_PELANGGAN"  value="<?php echo $GETDISKONPELANGGAN;?>" class="form-control">  
						  
						  <input type="hidden" name="DIBAYAR" id="DIBAYAR" placeholder="Sub-Total" readonly value="<?php echo $GRANDTOTALFIX;?>" class="form-control" required> 
                        </div>
                      </div><hr/><!-- /.form-group -->
						<div class="form-group">
                         <div class="col-lg-12">
							<select id="TIPE_PEMBAYARAN" name="TIPE_PEMBAYARAN" data-placeholder="Pilih Outlet penerima ..." class="form-control "  required>
						  <option value="TUNAI">1.TUNAI</option>
						  <option value="HUTANG">2.HUTANG</option>
							</select>
                        </div>
                      </div>
					  <div class="form-group" id="tampil_bank" >
                        <div class="col-lg-12">
                          <input type="text" name="JATUH_TEMPO" id="JATUH_TEMPO"  placeholder="Tanggal Jatuh Tempo" class="form-control" > 
                        </div>
                      </div>
					      <input type="hidden" name="NO_KARTU" id="NO_KARTU"  placeholder="No Kartu" class="form-control" > 
                      <div class="form-group">
                       <div class="col-lg-12">
                          <input type="text" readonly value="<?php echo $GRANDTOTALFIX;?>" id="TOTAL_TAGIHAN" name="TOTAL_TAGIHAN" class="form-control" > 
                        </div>
                      </div>
					 
					  <div class="form-group">
                         <div class="col-lg-12">
						
                          <input type="text" name="BIAYA_KIRIM" id="BIAYA_KIRIM"  placeholder="Biaya Kirim..." onKeyPress="return goodchars(event,'0123456789',this)" onChange="hitung_kirim();"  class="form-control" required> 
                        </div>
                      </div> 
					  <div class="form-group">
                         <div class="col-lg-12">
						
                          <input type="text" name="UANG_BAYAR" id="UANG_BAYAR" placeholder="Nominal Bayar..." onKeyPress="return goodchars(event,'0123456789',this)" onchange="hitung();" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
						<div class="form-group">
                        <div class="col-lg-12">
                          <input type="text" name="UANG_KEMBALI" id="UANG_KEMBALI" readonly placeholder="Sisa" class="form-control" required> 
                        </div>
                      </div>
					 
						
						<div class="form-group">
                       <div class="col-lg-12">
                          <input type="text" name="CATATAN" placeholder="Catatan (Optional)" class="form-control" > 
                        </div>
                      </div>
					 
                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-success btn-flat" value="Selesai"> &nbsp;
						   <a href="<?=base_admin();?>modul/sales-order/sales-order_action.php?act=batal_penjualan&NO_NOTA_PENJUALAN=<?php echo $w.$IDbaru.'-'.$KODEOUTLETUSER;?>" class="btn btn-success btn-flat ">Batal</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                </section><!-- /.content -->
        
            