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
                     Kalukulasi Bahan
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>kalukulasi-bahan">Produksi Barang</a></li>
                        <li class="active">Kalukulasi Bahan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

      
		<?php	
				echo'

				
				<div class="row">
					<div class="col-lg-12"> 
						<div class="box box-solid box-primary">
												 <div class="box-header">
													<h3 class="box-title">Per Product</h3>
												   
												</div>

								  <div class="box-body">
								  <center><h3><b>Laporan Kalkulasi Produksi Barang</b></h3></center><br><br>
									 <form id="input" method="post" class="form-horizontal foto_banyak" action="?kalkulasi=save">
									 <div id="cetak">';
									  
										
											$TAM_HEAD = $_POST["TAM_HEAD"];
											
											$caridata = mysql_query ("SELECT * FROM tampung_kalkulasi WHERE TAM_HEAD = '$TAM_HEAD'");
												
													while ($tampungdata=mysql_fetch_array($caridata)) {

														echo'	
														<label class="control-label col-lg-2">Kode Barang</label>
														<div class="col-lg-10">
														<input type="text" name="TAM_KODE_BARANG" class="form-control" value="'; echo $tampungdata["TAM_KODE_BARANG"]; echo'" readonly="true" required> 
														</div>
														
														<label class="control-label col-lg-2">Nama Barang</label>
														<div class="col-lg-10">
														<input type="text" name="TAM_NAMA_BARANG" class="form-control" value="'; echo $tampungdata["TAM_NAMA_BARANG"]; echo'" readonly="true" required> 
														</div>
														
														<label class="control-label col-lg-2">Jumlah Produksi</label>
														<div class="col-lg-10">
														<input type="text" name="TAM_JML_PROD" class="form-control" value="'; echo $tampungdata["TAM_JML_PROD"]; echo'" readonly="true" required> 
														</div>
														
														<br>
														<br>
														<div class="box-body table-responsive">
														<center>
														<div align="center">
														<table class="table table-bordered table-striped" style="width:660px;">
														 <thead>
														 <tr>
															<th>NAMA BAHAN</th>					
															<th>JUMLAH BAHAN (/Pcs)</th>
															<th>SATUAN</th>
															<th>TOTAL BAHAN</th>
															</tr>
															</thead>
															<tbody>';
														
														$TAM_KAL_BAHAN = $tampungdata["TAM_KAL_BAHAN"];
														$caridatadetail = mysql_query ("SELECT * FROM tampung_kalkulasi_detail WHERE TAM_KAL_BAHAN = '$TAM_KAL_BAHAN'");
														while($tampungdatadetail=mysql_fetch_array($caridatadetail)) {
															
															print "<tr>
															<td>$tampungdatadetail[NAMA_BAHAN]</td>";

															print"
															<td>$tampungdatadetail[JML_PCS]</td>
															<td>$tampungdatadetail[SATUAN]</td>
															<td>$tampungdatadetail[JML_TOTAL]</td>
															</tr>
															
															";
														}

													
													

							echo"
							</tbody>
                                    </table>
								</div>";
							}
							echo"
							</form>
							</div>
							
							

									<br>
								 </div>
								 <input type=\"button\" class=\"btn btn-warning btn-flat\" value=\"Cetak\" onclick=\"javascript:printDiv('cetak')\" />
								
								</div></div>
							 </div>";
											
											
										
										
										
									 
							echo'
									
				<div class="row">
					<div class="col-lg-12"> 
						<div class="box box-solid box-primary">
												 <div class="box-header">
													<h3 class="box-title">Per Manufacture</h3>
												   
												</div>

								  <div class="box-body">
									 <form id="input" method="post" class="form-horizontal foto_banyak" action="?kalkulasi=save">
									  <div id="printlagi" align="center">
										<center><h3><b>Laporan Kalkulasi Produksi Barang</b></h3><center><br><br>
										<table class="table table-bordered table-striped" style="width:750px;">
										<thead>
											<tr>
											<th>KODE BARANG</th>			
											<th>JUMLAH PRODUKSI</th>
											</tr>
										</thead>
										<tbody>';
				
				$CARI_KODE_BARANG = mysql_query("SELECT * FROM `tampung_kalkulasi` WHERE TAM_HEAD ='$TAM_HEAD'");
					while($KD_DAPAT= mysql_fetch_array($CARI_KODE_BARANG)){
					
						
								
							echo"
								 <tr>
								 <td>$KD_DAPAT[TAM_KODE_BARANG]</td>
								 <td>$KD_DAPAT[TAM_JML_PROD]</td>
								 </tr>";							
					}	
							echo '
								</table>
								<table class="table table-bordered table-striped" style="width:750px;">
										<thead>
											<tr>
											<th>ID BAHAN</th>
											<th>NAMA BAHAN</th>	
											<th>SATUAN</th>
											<th>TOTAL BAHAN</th>
											<th>STOK BAHAN</th>
											<th>KURANG</th>
											</tr>
										</thead>
										<tbody>';
								
								
						$CARI_KODE_BARANG2 = mysql_query("SELECT distinct(ID_BAHAN) as haasil FROM `tampung_kalkulasi` JOIN tampung_kalkulasi_detail ON tampung_kalkulasi.TAM_KAL_BAHAN = tampung_kalkulasi_detail.TAM_KAL_BAHAN WHERE TAM_HEAD ='$TAM_HEAD'");
							while($KD_DAPAT2= mysql_fetch_array($CARI_KODE_BARANG2)){
								
								
						
			
								
								$ID_TARGET = $KD_DAPAT2["haasil"];
								
								$CEK_NAMA = mysql_query("SELECT distinct(`NAMA_BAHAN`) AS NAMA FROM `tampung_kalkulasi_detail` WHERE `ID_BAHAN` = '$ID_TARGET'");
								$AMBIL_NAMA = mysql_fetch_array($CEK_NAMA);
								
								$CEK_SATUAN = mysql_query("SELECT distinct(`SATUAN`) AS SATUAN FROM `tampung_kalkulasi_detail` WHERE `ID_BAHAN` = '$ID_TARGET'");
								$AMBIL_SATUAN = mysql_fetch_array($CEK_SATUAN);
								
								$CEK_JML = mysql_query("SELECT SUM(`JML_TOTAL`) AS JML_TOTAL FROM `tampung_kalkulasi_detail` WHERE `ID_BAHAN` = '$ID_TARGET'");
								$AMBIL_JML = mysql_fetch_array($CEK_JML);
								
								$CEK_STOK = mysql_query("SELECT (`STOCK_BAYANGAN`) AS STOK FROM `bahan` WHERE `ID_BAHAN` = '$ID_TARGET'");
								$AMBIL_STOK= mysql_fetch_array($CEK_STOK);
							
								$KURANG = $AMBIL_STOK["STOK"] - $AMBIL_JML["JML_TOTAL"] ;
							echo"
								<tr>
								<td>$ID_TARGET</td>
								<td>$AMBIL_NAMA[NAMA]</td>
								<td>$AMBIL_SATUAN[SATUAN]</td>
								<td>$AMBIL_JML[JML_TOTAL]</td>
								<td>$AMBIL_STOK[STOK]</td>
								<td>"; if ($KURANG < 0 ) {
											echo $KURANG;
										}
										else {
											echo "-";	
										}
								
								echo"</td>
								</tr>";	
							
							
							}
							
									echo"
									  </table>
									  </div>";
									  ?>
										<a href="<?=base_admin();?>modul/kalkulasi_bahan/kalkulasi_bahan_action.php?act=batal_kalkulasi&id=<?=$TAM_HEAD;?>" class="btn btn-danger ">&nbsp;&nbsp;Batal&nbsp;&nbsp;</a>

										<?php
										echo"
									 <input type=\"button\" class=\"btn btn-warning btn-flat\" value=\"Cetak\" onclick=\"javascript:printDiv('printlagi')\" />";
									 	
									 
										?>
											<a class="btn btn-success"  href="<?=base_admin();?>modul/kalkulasi_bahan/kalkulasi_bahan_action.php?act=produksi&id=<?=$TAM_HEAD;?>">Produksi</a>
									<?php
									echo"
									</form>
								 </div>
								</div>
							</div>";
																
	
		
		

	
		?>
  
                </section><!-- /.content -->
        
            