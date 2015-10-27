 <?php
	
	error_reporting(0);
 
 ?>
 
 <script language="javascript" type="text/javascript">
												function printDiv(divID) {
													//Get the HTML of div
													var divElements = document.getElementById(divID).innerHTML;
													//Get the HTML of whole page
													var oldPage = document.body.innerHTML;

												   
													document.body.innerHTML = 
													  "<html><head><title></title></head><body>" + 
													  divElements + "</body>";

													//Print Page
													window.print();

													//Restore orignal HTML
													document.body.innerHTML = oldPage;


												}
											</script>

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Cek Bahan Masuk
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>manufacturing">Cek Bahan Masuk</a></li>
                        <li class="active">Detail Cek Bahan Masuk</li>
                    </ol>
                </section>

                <!-- Main content -->
<?php
if(isset($_GET[detail])){
$detail=$_GET['detail'];
 	if($detail=='ya')	{
?>
<section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Cek Bahan Masuk</h3>
                                   
                                 </div>

                  <div class="box-body">
				  <br>
                   <form class="form-horizontal">
                      <div id="cetak">
					  <div class="form-group">
						<?php
						$man=mysql_query("SELECT * FROM head_bhn_masuk WHERE ID_BHN_MASUK = '$_GET[id]'");
						$datman=mysql_fetch_array($man);
						?>
						<center>
						<table class="table table-bordered table-striped" style="width:800px;">
						<tr>
						<th width="279px;">
						ID BAHAN MASUK
						</th>
						<td>
                        <div class="col-lg-8">
						<?php 
							$petugas = mysql_fetch_object(mysql_query("SELECT NAMA_KASIR FROM kasir WHERE KODE_KASIR = '$datman[ID_PETUGAS]'"));
						?>
						<input type="text" name="MAN_ID_MANUFACTURING" class="form-control" value="<?php echo $datman["ID_BHN_MASUK"]; ?>" readonly="true" required> 
                        </div>
						</td>
						</tr>
						
						<tr>
						<th>
						TANGGAL PEMBELIAN
                        </th>
						<td>
						<div class="col-lg-8">
						<input type="text" name="MAN_KODE_BARANG" class="form-control" value="<?php echo $datman["TGL_PEMBELIAN"]; ?>" readonly="true" required> 
                        </div>
						</td>
						</tr>
						
						<tr>
						<th>
						PETUGAS PEMBELIAN
                        </th>
						<td>
						<div class="col-lg-8">
						<input type="text" name="MAN_KODE_BARANG" class="form-control" value="<?php echo $petugas->NAMA_KASIR; ?>" readonly="true" required> 
                        </div>
						</td>
						</tr>
						
						
						<tr>
						<th>
                        TANGGAL MASUK
						</th>
						<td>
                        <div class="col-lg-8">
						<input type="text" name="TGL_MASUK_GUDANG" class="form-control" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly="true" required> 
                        </div>
						</td>
						</tr>
						
						<tr>
						<th>
						PETUGAS PENERIMA
						</th>
						<td>
                        <div class="col-lg-8">
						<input type="hidden" name="NAMA_PENERIMA" class="form-control" value="<?php echo $_SESSION['id_user']; ?>" readonly="true" required> 
                        
						<?php
							$ambil_nama = mysql_fetch_object(mysql_query("SELECT NAMA_KASIR FROM kasir WHERE KODE_KASIR='$_SESSION[id_user]'"));
						
						if ($datman["ID_PETUGAS_PENERIMA"] != ""){
						?>
						
						<input type="text" name="PENERIMA" class="form-control" value="<?php echo $ambil_nama->NAMA_KASIR; ?>" readonly="true" required> 
						
						<?php
						}
						else {
						?>	
						<input type="text" name="PENERIMA" class="form-control" value="-" readonly="true" required> 

						<?php	
						}
						?>
						</div>
						</td>
						</tr>
						
						</table>
						</div>
						</center>
						
						
                      
						
					
						<center>
						<table class="table table-bordered table-striped" style="width:800px;">
                         <thead>
                         <tr>

                          <th>NAMA BAHAN</th>
                          <th>SATUAN</th>
													
							<th>JUMLAH BAHAN</th>
							<th>SELISIH</th>
							<th>JUMLAH MASUK</th>
                         
							</tr>
                                      </thead>
                            <tbody>
                            
							
							<?php
							
							$queryTB=mysql_query("SELECT * FROM detail_bhn_masuk where DET_ID_BHN_MASUK = '$_GET[id]'");
	
								while($nTB=mysql_fetch_array($queryTB)){
									
									$ID_BAHAN = $nTB["DET_ID_BAHAN"];
									
									$ambil = mysql_fetch_object(mysql_query("SELECT * FROM bahan WHERE ID_BAHAN = '$ID_BAHAN'"));
									
									
									print '<tr>
									<td>'.$ambil->NAMA_BAHAN.'</td>
									<td>'.$ambil->SATUAN.'</td>';
									echo"
									<td>$nTB[JUMLAH_BAHAN]</td>";
									
									
									if ($datman["STATUS"] == "Proses Pembelian"){
										
										echo "<td>-</td>
											  <td>-</td>";
									}
									
									else {
										
											 if ($nTB["JUMLAH_SELISIH"] == "0"){
												 
												 echo '<td>-</td>';
											 }
											 else {
												 
												 echo'<td>'.$nTB[JUMLAH_SELISIH].'</td>';
												 
											 }
											 
											 echo '
											 <td>'.$nTB[JUMLAH_MASUK].'</td>
										
										';
										
									}
									echo "</tr>";	
										
									}
									
							?>

							</tbody>
                                    </table>
								</center>
                               
				
                      </div><!-- /.form-group -->
						
						<center>
					   <div class="form-group">
                  
                        <div class="col-lg-10">
							<a href="<?=base_index();?>cek-bahan-masuk" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
							 
							 <?Php
								$button=mysql_query("SELECT * FROM head_bhn_masuk where ID_BHN_MASUK = '$_GET[id]'");
								$buttontampung = mysql_fetch_array($button);
							
								if ($buttontampung["STATUS"] == 'Proses Pembelian') {
									
									?>
									 <a href="../../modul/cek_bahan_masuk/cek_bahan_masuk_action.php?act=acc&id=<?=$_GET["id"]?>&ptgs=<?=$_SESSION["id_user"]?>" class="btn btn-warning btn-flat"><i class="fa fa-step-backward"></i>ACC Masuk</a>
									 <a href="<?=base_index();?>cek-bahan-masuk/detail?ubah=ya&id=<?=$_GET["id"]?>" class="btn btn-danger btn-flat"><i class="fa fa-step-backward"></i>Input Selisih</a>
								<?php
								}

							
							 echo"
							
							 <input type=\"button\" class=\"btn btn-info btn-flat\" value=\"Cetak\" onclick=\"javascript:printDiv('cetak')\" />";
	 ?>
                        </div>
                      </div>
					  <center>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                
<?php
	}
}
	


if(isset($_GET[ubah])){
$ubah=$_GET['ubah'];
 	if($ubah=='ya')	{

?>	

<section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Penyesuaian Selisih Bahan Masuk</h3>
                                   
                                 </div>

                  <div class="box-body">
				  <br>
                   <form class="form-horizontal" method="POST" action="../../modul/cek_bahan_masuk/cek_bahan_masuk_action.php?act=acc_selisih">
                      <div id="cetak">
					  <div class="form-group">
						<?php
						$man=mysql_query("SELECT * FROM head_bhn_masuk WHERE ID_BHN_MASUK = '$_GET[id]'");
						$datman=mysql_fetch_array($man);
						?>
						<center>
						<table class="table table-bordered table-striped" style="width:800px;">
						<tr>
						<th width="279px;">
						ID BAHAN MASUK
						</th>
						<td>
                        <div class="col-lg-8">
						<?php 
							$petugas = mysql_fetch_object(mysql_query("SELECT NAMA_KASIR FROM kasir WHERE KODE_KASIR = '$datman[ID_PETUGAS]'"));
						?>
						<input type="text" name="MAN_ID_MANUFACTURING" class="form-control" value="<?php echo $datman["ID_BHN_MASUK"]; ?>" readonly="true" required> 
                        </div>
						</td>
						</tr>
						
						<tr>
						<th>
						TANGGAL PEMBELIAN
                        </th>
						<td>
						<div class="col-lg-8">
						<input type="text" name="MAN_KODE_BARANG" class="form-control" value="<?php echo $datman["TGL_PEMBELIAN"]; ?>" readonly="true" required> 
                        </div>
						</td>
						</tr>
						
						<tr>
						<th>
						PETUGAS PEMBELIAN
                        </th>
						<td>
						<div class="col-lg-8">
						<input type="text" name="MAN_KODE_BARANG" class="form-control" value="<?php echo $petugas->NAMA_KASIR; ?>" readonly="true" required> 
                        </div>
						</td>
						</tr>
						
						
						<tr>
						<th>
                        TANGGAL MASUK
						</th>
						<td>
                        <div class="col-lg-8">
						<input type="text" name="TGL_MASUK_GUDANG" class="form-control" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly="true" required> 
                        </div>
						</td>
						</tr>
						
						<tr>
						<th>
						PETUGAS PENERIMA
						</th>
						<td>
                        <div class="col-lg-8">
						<input type="hidden" name="NAMA_PENERIMA" class="form-control" value="<?php echo $_SESSION['id_user']; ?>" readonly="true" required> 
                        
						<?php
							$ambil_nama = mysql_fetch_object(mysql_query("SELECT NAMA_KASIR FROM kasir WHERE KODE_KASIR='$_SESSION[id_user]'"));
						
						if ($datman["ID_PETUGAS_PENERIMA"] != ""){
						?>
						
						<input type="text" name="PENERIMA" class="form-control" value="<?php echo $ambil_nama->NAMA_KASIR; ?>" readonly="true" required> 
						
						<?php
						}
						else {
						?>	
						<input type="text" name="PENERIMA" class="form-control" value="-" readonly="true" required> 

						<?php	
						}
						?>
						</div>
						</td>
						</tr>
						
						</table>
						</div>
						</center>
						
						
                      
						
					
						<center>
						<table class="table table-bordered table-striped" style="width:800px;">
                         <thead>
                         <tr>

                          <th>NAMA BAHAN</th>
                          <th>SATUAN</th>
													
							<th>JUMLAH BAHAN <p>
							<i>(SURAT JALAN)</i></p></th>
							<th>JUMLAH MASUK GUDANG</th>
                         
							</tr>
                                      </thead>
                            <tbody>
                            
							
							<?php
							
							$queryTB=mysql_query("SELECT * FROM detail_bhn_masuk where DET_ID_BHN_MASUK = '$_GET[id]'");
	
								while($nTB=mysql_fetch_array($queryTB)){
									
									$KODE_SELISIH = $nTB["KODE_SELISIH"];
									$ID_BAHAN = $nTB["DET_ID_BAHAN"];
									$URUT= $nTB["URUT"];
									
									$ambil = mysql_fetch_object(mysql_query("SELECT * FROM bahan WHERE ID_BAHAN = '$ID_BAHAN'"));
									
									
									print '<tr>
									<td><input type="hidden" name="urut[]" value="'.$nTB[URUT].'">
										<input type="hidden" name="id" value="'.$_GET[id].'">
										<input type="hidden" name="petugas" value="'.$_SESSION[id_user].'">
									
										'.$ambil->NAMA_BAHAN.'</td>
									<td>'.$ambil->SATUAN.'</td>';
									echo'
									<td>'.$nTB[JUMLAH_BAHAN].'</td>
									<td> <input type="text" id="JUMLAH_BAHAN" name="JUMLAH_BAHAN[]" value="'.$nTB[JUMLAH_BAHAN].'" ></td>
										
										';
										

								}
									
							?>

							</tbody>
                                    </table>
								</center>
                               
				
                      </div><!-- /.form-group -->
						
						<center>
					   <div class="form-group">
                  
                        <div class="col-lg-10">
							<a href="<?=base_index();?>cek-bahan-masuk" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
							 
							 <?Php
								$button=mysql_query("SELECT * FROM head_bhn_masuk where ID_BHN_MASUK = '$_GET[id]'");
								$buttontampung = mysql_fetch_array($button);
							
								if ($buttontampung["STATUS"] == 'Proses Pembelian') {
									
									?>
									 <button type="submit" id="ubah_scanner" class="btn btn-warning">Sesuaikan Dan ACC Masuk</button>
								<?php
								}
			
	 ?>
                        </div>
                      </div>
					  <center>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>



<?php
	}
}
?>


                </section><!-- /.content -->
        
