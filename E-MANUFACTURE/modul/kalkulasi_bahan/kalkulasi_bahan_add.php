<?php 
error_reporting(0);
$GETUSEROUTLET = $db->fetch_single_row("outlet","KODE_OUTLET",$_SESSION["OUTLET_KODE"]);
$KODEOUTLETUSER=$GETUSEROUTLET->KODE_OUTLET;
$cek=$db->fetch_custom("select max(ID_KALKULASI) as idMaks from head_kalkulasi_produksi");
foreach ($cek as $bahan) {
$ID = $bahan->idMaks;
$noUrut = (int) substr($ID, 10, 4);
$noUrut++;
$char =  date('Y');
$char2 =  date('m');
$w = "PRD-";
$IDbaru =$char2 . $char . sprintf("%04s", $noUrut);
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
  
<script type="text/javascript" src="jquery-1.10.2.js"></script>
 <script type="text/javascript">
  function disableTextBox()
{
document.getElementById("tampil_bank").style.display='none';
document.getElementById("tampil_no").style.display='none';

}
 
  $(document).ready(function () {  
  $("#TIPE_PEMBAYARAN").change(function() { 

    if ( $(this).val() == "DEBET") {

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


     <body onload="disableTextBox();">           <!-- Main content -->
                <section class="content">
				
	
			
				
		<div class="row">
			<?php if(isset($_GET["DAFTAR_BAHAN"])){
					$ID_BARANG = $_GET["ID_BARANG"];
					$KODE_BARANG = $_GET["KODE_BARANG"];
				?>		
		  
                   
					 <div class="col-lg-9" > 
                        <div class="col-xs-12">
                            <div class="box">
                              <!-- /.box-header -->
								 <div class="box-header">
                                
     
						<a href="<?=base_index();?>kalkulasi-bahan/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-minus-sign"></i>Tutup </a>
                       
                                </div>
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>Kode Bahan</th>
												
													<th>Nama Bahan</th>
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
	
					
					
                  
                    <a href="?code=<?=$isi->ID_BAHAN;?>&name=<?=$isi->NAMA_BAHAN;?>&satuan=<?=$isi->SATUAN;?>&idbarang=<?=$ID_BARANG;?>&kodebarang=<?=$KODE_BARANG;?>" class="btn btn-succes"><i class="glyphicon glyphicon-chevron-left"></i></a> 
						
    
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
		
		<?php if(isset($_GET["DAFTAR_BARANG"])){?>		
		  
                   
					 <div class="col-lg-9" > 
                        <div class="col-xs-12">
                            <div class="box">
                              <!-- /.box-header -->
								 <div class="box-header">
                                
     
						<a href="<?=base_index();?>kalkulasi-bahan/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-minus-sign"></i>Tutup </a>
                       
                                </div>
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>Kode Barang</th>
												
													<th>Barcode</th>
													<th>Nama Barang</th>
													<th>Stok</th>
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
											$dtb=$db->fetch_custom("SELECT barang_pusat.* FROM barang_pusat join manufacturing ON barang_pusat.KODE_BARANG = manufacturing.MAN_KODE_BARANG");
											$i=1;
											foreach ($dtb as $isi) {
										?><tr id="line_<?=$isi->ID_BARANG;?>">
										<td align="center"><?=$i;?></td><td><?=$isi->KODE_BARANG;?></td>

											<td><?=$isi->BARCODE;?></td>
											<td><?=$isi->NAMA_BARANG;?></td>
											<td><?=$isi->STOK;?></td>


										<td>
									
													
													
												  
													<a href="?idbarang=<?=$isi->ID_BARANG;?>&kodebarang=<?=$isi->KODE_BARANG;?>&namabarang=<?=$isi->NAMA_BARANG;?>" class="btn btn-succes"><i class="glyphicon glyphicon-chevron-left"></i></a> 
														
									
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
                <i class="glyphicon glyphicon-list-alt"></i>&nbsp;<?php echo $w.$IDbaru;?>
                <small class="pull-right"> <i class="glyphicon glyphicon-time"></i>&nbsp;
				<b><?php echo date('Y-m-d H:i:s');?> &nbsp; <i class="glyphicon glyphicon-user"></i>&nbsp;<?=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username);?> / <?php echo $NAMA_OUTLET;?></small>
              </h2>
            </div><!-- /.col -->
          </div>
				
                  <div class="box-body">
				  <div style="overflow-y:scroll;height:340px">
				  <div id="flash" align="left"></div>
				  <div id="show" align="left"></div>

	
 				  </p>
				
				  
				  <table id="bahan-masuk_dtb" class="table table-bordered table-striped" style="font-size:8pt">
                          <thead>
                          <tr>
                          <th style="width:25px" align="center">No</th>
						  <th>Kode Barang</th>
						  <th>Nama Barang</th>
						  <th>Jumlah Produksi(pcs)</i></th>
						  
						  <th></th>
                          </tr>
                         </thead>
                         <tbody>
						
			<?php 
			$kd =  $w.$IDbaru;
			$dtb=$db->fetch_custom("SELECT * FROM tampung_kalkulasi where TAM_HEAD = '$kd'");
			$i=1;
			foreach ($dtb as $isi) {
			?>
			<tr id="line_<?=$isi->URUT;?>">
			<td align="center"><?=$i;?></td>
			<td><?=$isi->TAM_KODE_BARANG;?></td>
			<td><?=$isi->TAM_NAMA_BARANG;?></td>

			
			
			
			 <form  method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/kalkulasi_bahan/kalkulasi_bahan_action.php?act=ubah">
			 <input type="hidden" id="ID" name="ID" value="<?=$isi->URUT;?>" >
			 <td><input type="text" onKeyPress="return goodchars(event,'0123456789',this)" value="<?=$isi->TAM_JML_PROD;?>" name="JUMLAH_UBAH[]" id="JUMLAH_UBAH" style="width:100px;margin-top:-10px;border-radius:10px;text-align:center"></td>
			<td>
			<button type="submit" id="ubah_scanner" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></button>
			<a class="btn btn-danger"  href="<?=base_admin();?>modul/kalkulasi_bahan/kalkulasi_bahan_action.php?act=deletetampung&id=<?=$isi->URUT;?>"><i class="glyphicon glyphicon-trash"></i></a>
			</form>
			</td>
		
			</tr>
				<?php
				$i++;
			}

			$item = mysql_fetch_object(mysql_query("SELECT count(distinct(TAM_KODE_BARANG)) as totalitem FROM `tampung_kalkulasi`"));
			$item2 = mysql_fetch_object(mysql_query("SELECT SUM(TAM_JML_PROD) as total FROM `tampung_kalkulasi`"));
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
                    <th style="width:50%">Total Item Barang:</th>
                    <td><?php echo number_format($item->totalitem);?></td>
                  </tr>
				  <tr>
                    <th style="width:50%">Total Produksi Barang (Pcs):</th>
                    <td><?php echo number_format($item2->total);?></td>
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
                                    <h5 class="box-title">Tambah Barang</h5>
                                 </div>

                  <div class="box-body">
                     <form  method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/kalkulasi_bahan/kalkulasi_bahan_action.php?act=input_scanner">
					 
					<?php
					 $ID_BARANG = $_GET["idbarang"];
					  $KODE_BARANG = $_GET["kodebarang"];
					?>
                      <div class="">
                       <div class="">
                          <input type="hidden" name="TAM_HEAD" id="TAM_HEAD" value="<?php echo $w.$IDbaru;?>" class="form-control">  
                         
						<input type="text" style="font-style:italic;height:31px;width:160px;" name="KODE_BARANG" id="KODE_BARANG" value="<?php echo $_GET["kodebarang"];?>" placeholder="Kode Barang" readonly="true" required>
                        <a href="<?=base_index();?>kalkulasi-bahan/tambah?DAFTAR_BARANG&ID_BARANG=<?=$ID_BARANG?>&KODE_BARANG=<?=$KODE_BARANG?>" class="btn btn-success"><i class="glyphicon glyphicon-search"></i></a>
						 <br><br>
						</div>
                        </div><!-- /.form-group -->
						<div class="form-group">
                         <div class="col-lg-12">
                          <input type="text" name="NAMA_BARANG" id="NAMA_BARANG" value="<?php echo $_GET["namabarang"];?>"  placeholder="Nama Barang" class="form-control" readonly="true" required> 
						  <input type="hidden" name="KAL_ID_BARANG" id="KAL_ID_BARANG" value="<?php echo $w.$IDbaru.$ID_BARANG;?>"  placeholder="Nama Barang" class="form-control" readonly="true" required>
						 </div>
						</div>
						<div class="form-group">
                         <div class="col-lg-12">
                          <input type="text" name="JUMLAH" id="JUMLAH" value="" onKeyPress="return goodchars(event,'0123456789',this)" placeholder="JUMLAH" class="form-control" required> 
						 </div>
						</div>

                       <!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-12" style="margin-left:60px">
                           <button type="submit" class="btn btn-success" id="input_scanner"><i class="glyphicon glyphicon-chevron-left"></i></button> 
						   <a href="<?=base_index();?>kalkulasi-bahan/tambah" class="btn btn-success "><i class="glyphicon glyphicon-refresh"></i></a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>

						 <form method="post" class="form-horizontal foto_banyak" action="<?=base_index();?>kalkulasi-bahan/tampil">
                     <!-- /.form-group -->
					 <?php $kode4 =  $w.$IDbaru;
							 $cekbarang4 = mysql_fetch_object(mysql_query("SELECT distinct(KODE_BARANG) as hasilnya FROM tampung_manufacturing where ID_MAN = '$kode4'"));
							 $hasilnya4 = $cekbarang4->hasilnya;
                      ?>
                          <input type="hidden" name="TAM_HEAD" value="<?php echo $w.$IDbaru;?>" class="form-control">  
                          <input type="hidden" name="MAN_KODE_BARANG" value="<?php echo $hasilnya4;?>" class="form-control">  
					
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-12" style="margin-left:25px">
                          <input type="submit" class="btn btn-success" value="Selesai"> &nbsp;
						   <a href="<?=base_admin();?>modul/kalkulasi_bahan/kalkulasi_bahan_action.php?act=batal_kalkulasi&TAM_HEAD=<?=$kode4;?>" class="btn btn-success ">&nbsp;&nbsp;Batal&nbsp;&nbsp;</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

					
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            