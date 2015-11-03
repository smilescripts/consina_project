
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                  
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>cetak-barcode">Cetak Barcode</a></li>
                        <li class="active">Tambah Cetak Barcode</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title"> Cetak Barcode</h3>
                                   
                                </div>

					<div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="" style="margin-top:20px">
                      <div class="form-group">
                        <label for="Barcode" class="control-label col-lg-2">Barcode</label>
                        <div class="col-lg-10">
                          <input type="text" name="BARCODE" placeholder="Barcode" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
					
					  <div class="form-group">
                        <label for="JUMLAH" class="control-label col-lg-2">Jumlah</label>
                        <div class="col-lg-10">
                          <input type="text" name="JUMLAH" placeholder="Jumlah cetak" value="30" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" name="CETAK" class="btn btn-primary btn-flat" value="Tampil cetak"> &nbsp;
						
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
 <?php if(isset($_POST["CETAK"])){
	 error_reporting(0);
$BARCODE=$_POST["BARCODE"];	 
	 
$JUMLAH=$_POST["JUMLAH"];
$HARGA = $db->fetch_single_row("barang_outlet","BARCODE",$BARCODE);
if($HARGA->KODE_BARANG==""){
	
	echo "<script>alert('Barang tidak ditemukan');window.location='../index.php/cetak-barcode'</script>";
	
}	 
?>
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 
								<div class="box-header">
                                    <a href="../inc/cetak_barcode.php?barcode=<?php echo $BARCODE;?>&jumlah=<?php echo $JUMLAH;?>" target="_blank" class="btn btn-info">Cetak barcode</a>
                                   
                                </div>
                  <div class="box-body">
				  <div class="row" style="width:100%">
				  
                  <?php 
				  for($cetak=0;$cetak<$JUMLAH;$cetak++){
					  
					echo '
					<div  class="col-md-2">
					<table border="1">
					<tr>
					<th>
					<img style="width:100%;padding-top:10px" src="../inc/barcode.php?codetype=Code128&size=40&text='.$BARCODE.'"/>
					<br/>
					 <center style="font-size:8pt">'.$BARCODE.'</center>
					
					 <center style="font-size:8pt">'.$HARGA->NAMA_BARANG.'</center>
					 <center style="font-size:8pt">Rp.'.number_format($HARGA->HARGA_JUAL).'</center>
					 </th>
					 </tr>
					 </table>
					 <br/>
					</div>';  
					  
					  
				  }
				  
				  ?>
                  </div>
                  </div>
                  </div>
              </div>
</div>
 <?php } ?> 
                </section><!-- /.content -->
        
            