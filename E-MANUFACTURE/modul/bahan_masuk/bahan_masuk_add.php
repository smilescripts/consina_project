<?php 
error_reporting(0);
$GETUSEROUTLET = $db->fetch_single_row("outlet","KODE_OUTLET",$_SESSION["OUTLET_KODE"]);
$KODEOUTLETUSER=$GETUSEROUTLET->KODE_OUTLET;
$cek=$db->fetch_custom("select max(ID_BHN_MASUK) as idMaks from head_bhn_masuk");
foreach ($cek as $bahan) {
$ID = $bahan->idMaks;
$noUrut = (int) substr($ID, 10, 4);
$noUrut++;
$w = "BM".date('m/d/y')."";
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
  

<script type="text/javascript">
	$(document).ready(function () {
			$("#ID_BAHAN").change(function () {
			var ID_BAHAN = $(this).val();
				$.ajax({
				url: "<?=base_admin();?>modul/bahan-masuk/cek_bahan.php?ID_BAHAN="+ID_BAHAN
				}).done(function( data ) {
					
					var databahan=data["databahan"];
					var STOK=data["STOK"];
				
					if(databahan!=""){
					$("#bahan").val(databahan);
					$("#STOK").val(STOK);
					}
					if(databahan==""){
					alert("bahan tidak ditemukan");
						
					}
					
				});  
		
		});
	
	});
</script>				
<script type="text/javascript">
$(function() {
$("#input_scanner").click(function() {
var NO_NOTA_BAHAN = $("#NO_NOTA_BAHAN").val();
var ID_BAHAN = $("#ID_BAHAN").val();
var JUMLAH = $("#JUMLAH").val();
var HARGA = $("#HARGA").val();
var dataString = 'NO_NOTA_BAHAN='+ NO_NOTA_BAHAN+"&ID_BAHAN="+ ID_BAHAN+"&JUMLAH="+ JUMLAH+"&HARGA="+ HARGA;



if(ID_BAHAN==""){
	alert("Maaf bahan tidak ditemukan");
	$("#ID_BAHAN").focus();
}

if(JUMLAH==""){
	$("#JUMLAH").focus();
}
else if(HARGA==""){
	$("#HARGA").focus();
}
else{
$("#flash").show();
$("#flash").fadeIn(100).html('<div class="alert alert-success" style="margin-left:0"><button class="close"data-dismiss="alert">×</button><center><strong>Memasukan data</strong></center></div>');
$.ajax({
type: "POST",
url: "<?=base_admin();?>modul/bahan_masuk/bahan_masuk_action.php?act=input_scanner",
data: dataString,
cache: true,
success: function(html){
$("#show").after(html);

document.getElementById('ID_BAHAN').value='';
document.getElementById('JUMLAH').value='';
document.getElementById('HARGA').value='';


$("#flash").hide();
window.location='tambah';
$("#ID_BAHAN").focus();
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
			<?php if(isset($_GET["DAFTAR_BAHAN"])){?>		
		  
                   
					 <div class="col-lg-9" > 
                        <div class="col-xs-12">
                            <div class="box">
                              <!-- /.box-header -->
								 <div class="box-header">
                                
     
						<a href="<?=base_index();?>bahan-masuk/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-minus-sign"></i>Tutup </a>
                       
                                </div>
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>Kode bahan</th>
												
													<th>Nama</th>
													<th>Satuan</th>
													<th>Stok</th>
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("SELECT * FROM bahan");
			$i=1;
			foreach ($dtb as $isi) {
		?><tr id="line_<?=$isi->ID_BAHAN;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->ID_BAHAN;?></td>

<td><?=$isi->NAMA_BAHAN;?></td>
<td><?=$isi->SATUAN;?></td>
<td><?=$isi->STOCK;?></td>


        <td>
	
					
					
                  
                    <a href="?code=<?=$isi->ID_BAHAN;?>&name=<?=$isi->NAMA_BAHAN;?>&satuan=<?=$isi->SATUAN;?>" class="btn btn-succes"><i class="glyphicon glyphicon-chevron-left"></i></a> 
						
    
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
		<?php if(!isset($_GET["DAFTAR_BAHAN"])){?>		
	    <div class="col-lg-9" > 
		
        <div class="box box-solid box-primary" style="height:550px;">
                               
								 
				 
			<div class="row">
            <div class="col-xs-12">
              <h2 class="page-header" style="padding:10px">
                <i class="glyphicon glyphicon-list-alt"></i>&nbsp;<?php echo $w.$IDbaru.'-'.$KODEOUTLETUSER;?>
                <small class="pull-right"> <i class="glyphicon glyphicon-time"></i>&nbsp;
				<b><?php echo date('Y-m-d H:i:s');?> &nbsp; <i class="glyphicon glyphicon-user"></i>&nbsp;<?=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username);?> / <?php echo $NAMA_OUTLET;?></small>
              </h2>
            </div><!-- /.col -->
          </div>
				
                  <div class="box-body">
				  <div style="overflow-y:scroll;height:340px">
				  <div id="flash" align="left"></div>
				  <div id="show" align="left"></div>
				  <table id="bahan-masuk_dtb" class="table table-bordered table-striped" style="font-size:8pt">
                          <thead>
                          <tr>
                          <th style="width:25px" align="center">No</th>
                          <th>Kode Bahan</th>
                          <th>Nama</th>
						  <th>Satuan</th>
						  <th>Stock Gudang</th>
                          <th>Jumlah Bahan Masuk</th>
						  <th>Harga</th>
						  <th></th>
                          </tr>
                         </thead>
                         <tbody>
						
			<?php 
			
			$dtb=$db->fetch_custom("SELECT tmp_detail_bahan.*,bahan.* FROM tmp_detail_bahan
		    INNER JOIN bahan on bahan.ID_BAHAN = tmp_detail_bahan.ID_BAHAN");
			$i=1;
			foreach ($dtb as $isi) {
			?>
			<tr id="line_<?=$isi->ID_BAHAN;?>">
			<td align="center"><?=$i;?></td>
			<td><?=$isi->ID_BAHAN;?></td>
			<td><?=$isi->NAMA_BAHAN;?></td>
			<td><?=$isi->SATUAN;?></td>
			<td><?=$isi->STOCK;?></td>

			
			
			
			 <form  method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/bahan_masuk/bahan_masuk_action.php?act=ubah_scanner">
			 <input type="hidden" id="ID_TMP_BAHAN" name="ID_TMP_BAHAN[]" value="<?=$isi->ID_TMP_BAHAN;?>" >
			 <td><input type="text" onKeyPress="return goodchars(event,'0123456789',this)" value="<?=$isi->JUMLAH;?>" name="JUMLAH_UBAH[]" id="JUMLAH_UBAH" style="width:100px;margin-top:-10px;border-radius:10px;text-align:center"></td>
			 <td>Rp.<input type="text" onKeyPress="return goodchars(event,'0123456789',this)" value="<?=number_format($isi->HARGA);?>" name="HARGA_UBAH[]" id="HARGA_UBAH" style="width:100px;margin-top:-10px;border-radius:10px;text-align:center"></td>
			<td>
			<button type="submit" id="ubah_scanner" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></button>
			<a class="btn btn-danger"  href="<?=base_admin();?>modul/bahan_masuk/bahan_masuk_action.php?act=deletebahan&id=<?=$isi->ID_TMP_BAHAN;?>"><i class="glyphicon glyphicon-trash"></i></a>
			</form>
			</td>
		
			</tr>
				<?php
				$i++;
			}

			$item = mysql_fetch_object(mysql_query("SELECT count(distinct(ID_BAHAN)) as totalitem FROM `tmp_detail_bahan`"));
			$harga = mysql_fetch_object(mysql_query("SELECT SUM(HARGA) as totalharga FROM `tmp_detail_bahan`"))
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
                    <th style="width:50%">Total Item Bahan:</th>
                    <td>Rp. <?php echo number_format($item->totalitem);?></td>
                  </tr>
				    <tr>
                    <th>Total Harga</th>
                    <td>Rp. <?php echo number_format($harga->totalharga);?></td>
                  </tr>
                </table>
              </div>
            </div>
				
                
              </h2>
            </div><!-- /.col -->
          </div>
                  </div>
              </div>
	<?php } ?>
  <div class="col-lg-3" style="width:260px;height:330px" > 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h5 class="box-title">Tambah Bahan</h5>
                                 </div>

                  <div class="box-body">
                     <form  method="post" class="form-horizontal foto_banyak">
                      <div class="form-group">
                       <div class="col-lg-12">
                          <input type="hidden" name="NO_NOTA_BAHAN" id="NO_NOTA_BAHAN" value="<?php echo $w.$IDbaru.'-'.$KODEOUTLETUSER;?>" class="form-control">  
                         
						<input type="text" style="font-style:italic;" name="ID_BAHAN" id="ID_BAHAN" value="<?php echo $_GET["code"];?>" placeholder="Kode Bahan" class="form-control" required> 
                        </div>
                        </div><!-- /.form-group -->
						<div class="form-group">
                        <div class="col-lg-12">
                          <input type="text" name="NAMA_BAHAN" id="NAMA_BAHAN" value="<?php echo $_GET["name"];?>" placeholder="Nama Bahan" readonly class="form-control" required> 
                        </div>
                        </div>
						<div class="form-group">
                        <div class="col-lg-12">
                          <input type="text" name="SATUAN" id="SATUAN" value="<?php echo $_GET["satuan"];?>" placeholder="Satuan Bahan" readonly class="form-control" required> 
                        </div>
                        </div><!-- /.form-group -->
						<div class="form-group">
                         <div class="col-lg-12">
                          <input type="text" name="JUMLAH" id="JUMLAH" value="" onKeyPress="return goodchars(event,'0123456789',this)" placeholder="JUMLAH" class="form-control" required> 
						 </div>
						</div>
						<div class="form-group">
						<div class="col-lg-12">
                          <input type="text" name="HARGA" id="HARGA" value="" onKeyPress="return goodchars(event,'0123456789',this)" placeholder="HARGA" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->

                       <!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-12" style="margin-left:40px">
                           <button type="submit" class="btn btn-success" id="input_scanner"><i class="glyphicon glyphicon-chevron-left"></i></button> 
						 <a href="<?=base_index();?>bahan-masuk/tambah?DAFTAR_BAHAN" class="btn btn-success"><i class="glyphicon glyphicon-search"></i></a>
						   <a href="<?=base_index();?>bahan-masuk/tambah" class="btn btn-success "><i class="glyphicon glyphicon-refresh"></i></a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					<form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/bahan_masuk/bahan_masuk_action.php?act=simpan_bahan">
                     <!-- /.form-group -->
				
                        
                          <input type="hidden" name="NO_NOTA_BAHAN" value="<?php echo $w.$IDbaru.'-'.$KODEOUTLETUSER;?>" class="form-control">  
                          <input type="hidden" name="TANGGAL" value="<?php echo date('Y-m-d H:i:s');?>" class="form-control">  
                          <input type="hidden" name="OPERATOR_bahan_masuk" value="<?php echo $_SESSION['id_user'];?>" class="form-control">
						                         
						
               
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-12" style="margin-left:29px">
                          <input type="submit" class="btn btn-success" value="Selesai"> 
						   <a href="<?=base_admin();?>modul/bahan_masuk/bahan_masuk_action.php?act=batal_penjualan&NO_NOTA_BAHAN=<?php echo $w.$IDbaru.'-'.$KODEOUTLETUSER;?>" class="btn btn-success ">&nbsp;&nbsp;Batal&nbsp;&nbsp;</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>
          
                  </div>
                  </div>
              </div>


</div>
                  
                </section><!-- /.content -->
        
            