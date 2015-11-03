<?php 
error_reporting(0);

	$IDD = $_GET['ubah'];

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
					$TAM_HEAD = $_GET["ubah"];
				?>		
		  
                   
					 <div class="col-lg-9" > 
                        <div class="col-xs-12">
                            <div class="box">
                              <!-- /.box-header -->
								 <div class="box-header">
                                
     
						<a href="<?=base_index();?>bahan-masuk/edit?ubah=<?=$TAM_HEAD;?>" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-minus-sign"></i>Tutup </a>
                       
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

                    <a href="?code=<?=$isi->ID_BAHAN;?>&name=<?=$isi->NAMA_BAHAN;?>&satuan=<?=$isi->SATUAN;?>&ubah=<?=$TAM_HEAD;?>" class="btn btn-succes"><i class="glyphicon glyphicon-chevron-left"></i></a> 
						
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
                <i class="glyphicon glyphicon-list-alt"></i>&nbsp;<?php echo $IDD; ?>
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
						  <th>ID Bahan</th>
						  <th>Nama Bahan</th>
						  <th>Satuan</th>
						  <th>Jumlah Beli</th>
						  <th>Harga Beli</th>
						  
						  <th></th>
                          </tr>
                         </thead>
                         <tbody>
						
			<?php 
			
			$dtb= mysql_query("SELECT * FROM head_bhn_masuk JOIN detail_bhn_masuk ON detail_bhn_masuk.DET_ID_BHN_MASUK = head_bhn_masuk.ID_BHN_MASUK WHERE head_bhn_masuk.ID_BHN_MASUK = '$IDD' AND head_bhn_masuk.STATUS = 'Proses Pembelian'");
			$i=1;
			while($isi=mysql_fetch_array($dtb)) {
				$namasatuan = mysql_fetch_object(mysql_query ("SELECT * FROM bahan JOIN detail_bhn_masuk ON bahan.ID_BAHAN = detail_bhn_masuk.DET_ID_BAHAN WHERE detail_bhn_masuk.DET_ID_BAHAN = '".$isi[DET_ID_BAHAN]."'" ));
			?>
			<tr id="line_<?=$isi->URUT;?>">
			<td align="center"><?=$i;?></td>
			<td><?=$isi[DET_ID_BAHAN];?></td>
			<td><?=$namasatuan->NAMA_BAHAN;?></td>
			<td><?=$namasatuan->SATUAN;?></td>
			
			
			
			 <form  method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/bahan_masuk/bahan_masuk_action.php?act=ubahbahanedit">
			 <input type="hidden" id="ID" name="ID[]" value="<?=$isi[URUT];?>" >
			 <input type="hidden" id="kembali" name="kembali" value="<?=$IDD;?>" >
			 <td><input type="text" onKeyPress="return goodchars(event,'0123456789',this)" value="<?=number_format($isi[JUMLAH_BAHAN]);?>" name="JUMLAH_UBAH[]" id="JUMLAH_UBAH" style="width:100px;margin-top:-10px;border-radius:10px;text-align:center"></td>
			 <td>Rp. <input type="text" onKeyPress="return goodchars(event,'0123456789',this)" value="<?=number_format($isi[HARGA_BAHAN]);?>" name="HARGA_UBAH[]" id="HARGA_UBAH" style="width:100px;margin-top:-10px;border-radius:10px;text-align:center"></td><td>
			<button type="submit" id="ubah_scanner" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></button>
			<a class="btn btn-danger"  href="<?=base_admin();?>modul/bahan_masuk/bahan_masuk_action.php?act=deletebahanedit&id=<?=$isi["URUT"];?>&tampil=<?=$isi["DET_ID_BHN_MASUK"];?>"><i class="glyphicon glyphicon-trash"></i></a>
			</form>
			</td>
		
			</tr>
				<?php
				$i++;
			}

			$item = mysql_fetch_object(mysql_query("SELECT count(distinct(DET_ID_BAHAN)) as totalitem FROM `detail_bhn_masuk` WHERE DET_ID_BHN_MASUK = '$IDD'"));
			$hargaa = mysql_fetch_object(mysql_query("SELECT SUM(HARGA_BAHAN) as totalbahan FROM `detail_bhn_masuk` WHERE DET_ID_BHN_MASUK = '$IDD'"));
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
                    <td><?php echo number_format($item->totalitem);?></td>
                  </tr>
				  <tr>
                    <th style="width:50%">Total Harga Beli:</th>
                    <td>Rp. <?php echo number_format($hargaa->totalbahan);?></td>
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
                     <form  method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/bahan_masuk/bahan_masuk_action.php?act=tambahedit">
					 
					 <?php
							$kode2 = $_GET['ubah'];
		
					  ?>
						
                      <div class="">
                       <div class="">
                          <input type="hidden" name="HEAD_ID" id="HEAD_ID" value="<?php echo $IDD;?>" class="form-control">  
                         
							<input type="text" style="font-style:italic;height:31px;width:160px;" name="ID_BAHAN" id="ID_BAHAN" value="<?php echo $_GET["code"];?>" placeholder="Kode Bahan" required readonly="true">
							<a href="<?=base_index();?>bahan-masuk/edit?DAFTAR_BAHAN&ubah=<?=$kode2?>" class="btn btn-success"><i class="glyphicon glyphicon-search"></i></a>
						 <br><br>
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

                       <!-- /.form-group -->
					   	<div class="form-group">
                         <div class="col-lg-12">
                          <input type="text" name="HARGA" id="HARGA" value="" onKeyPress="return goodchars(event,'0123456789',this)" placeholder="HARGA" class="form-control" required> 
						 </div>
						</div>

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-12" style="margin-left:40px">
                           <button type="submit" class="btn btn-success" id="input_scanner"><i class="glyphicon glyphicon-chevron-left"></i></button> 
						   <a href="<?=base_index();?>bahan-masuk/edit?ubah=<?=$kode2?>" class="btn btn-success "><i class="glyphicon glyphicon-refresh"></i></a>
						   <a href="<?=base_index();?>bahan-masuk" class="btn btn-success "><i class="glyphicon glyphicon-log-out"></i></a>
					   </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>


    
</div>
                  
                </section><!-- /.content -->
        
            