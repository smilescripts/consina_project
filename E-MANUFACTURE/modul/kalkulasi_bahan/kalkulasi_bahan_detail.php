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
                     Detail Produksi Barang
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>kalukulasi-bahan">Produksi</a></li>
                        <li class="active">Detail Produksi Barang</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
				
		
		
		<?php	
				
			// Kondisi Detail

			if(isset($_GET[detaildua])){
				$detaildua=$_GET['detaildua'];
					if($detaildua=='ya')	{
					$TAM_HEAD = $_GET["ubah"];		
				echo'
				
				<div class="row">
					<div class="col-lg-12"> 
						<div class="box box-solid box-primary">
												 <div class="box-header">
													<h3 class="box-title"></h3>
												   
												</div>

								  <div class="box-body">
								  <div id="cetak">
									 <form id="input" method="post" class="form-horizontal foto_banyak" action="?kalkulasi=save">
									  <div align="center">
										<center><h3><b>Produksi Barang</b></h3><center><br><br>
										<table class="table table-bordered table-striped" style="width:750px;">
										<thead>
											<tr>
											<th>KODE BARANG</th>			
											<th>JUMLAH PRODUKSI</th>
											</tr>
										</thead>
										<tbody>';
				
				$CARI_KODE_BARANG = mysql_query("SELECT * FROM `detail_kalkulasi_barang` WHERE ID_KALKULASI ='$TAM_HEAD'");
					while($KD_DAPAT= mysql_fetch_array($CARI_KODE_BARANG)){
					
						
								
							echo"
								 <tr>
								 <td>$KD_DAPAT[KODE_BARANG]</td>
								 <td>$KD_DAPAT[JML_PROD]</td>
								 </tr>";							
					}	
							echo '
								</table>
								<table class="table table-bordered table-striped" style="width:900px;">
										<thead>
											<tr>
											<th>ID BAHAN</th>
											<th>NAMA BAHAN</th>	
											<th>SATUAN</th>
											<th>PERKIRAAN BAHAN</th>
											<th>BAHAN YANG SUDAH DIPAKAI</th>
											<th>TOTAL BAHAN FINAL</th>
											</tr>
										</thead>
										<tbody>';
								
								
						$CARI_KODE_BARANG2 = mysql_query("SELECT * FROM detail_kalkulasi_bahan WHERE ID_KALKULASI ='$TAM_HEAD'");
							while($KD_DAPAT2= mysql_fetch_array($CARI_KODE_BARANG2)){
								

								$ID_TARGET = $KD_DAPAT2["ID_BAHAN"];
								
								$CEK_NAMA = mysql_query("SELECT `NAMA_BAHAN` AS NAMA FROM `bahan` WHERE `ID_BAHAN` = '$ID_TARGET'");
								$AMBIL_NAMA = mysql_fetch_array($CEK_NAMA);
								
								$CEK_SATUAN = mysql_query("SELECT `SATUAN` AS SATUAN FROM `bahan` WHERE `ID_BAHAN` = '$ID_TARGET'");
								$AMBIL_SATUAN = mysql_fetch_array($CEK_SATUAN);
								
								

							echo"
								<tr>
								<td>$ID_TARGET</td>
								<td>$AMBIL_NAMA[NAMA]</td>
								<td>$AMBIL_SATUAN[SATUAN]</td>
								<td>$KD_DAPAT2[JML_TOTAL]</td>
								<td>$KD_DAPAT2[JML_DIPAKAI]</td>
								<td>$KD_DAPAT2[JML_FINAL]</td>
								</tr>";	
							
							
							}
							
									echo ';
									  </table>';
									  
								
									  
									  
									  $angsur = mysql_query("SELECT distinct(ANGSUR_KE) as TAMPIL FROM detail_kalkulasi_angsur WHERE ID_KALKULASI = '$TAM_HEAD'");
									  while($loopangsur=mysql_fetch_array($angsur)) {
										  
										  $ANGSURRR = $loopangsur["TAMPIL"];
										  echo '
										<table class="table table-bordered table-striped" style="width:900px;">
										<thead>
											<tr>
											<th colspan ="3">ANGSURAN KE</th>
											<th>'.$ANGSURRR.'</th><tr>
											<tr>
											<th>TANGGAL</th>	
											<th>ID PETUGAS</th>
											<th>ID BAHAN</th>
											<th>JUMLAH ANGSUR</th>
			
											</tr>
										</thead>
										<tbody>';
										
										  
										  $angsurdua = mysql_query("SELECT * FROM detail_kalkulasi_angsur WHERE ID_KALKULASI='$TAM_HEAD' AND ANGSUR_KE = '$ANGSURRR'");
											while($tampilangsur = mysql_fetch_array($angsurdua)){
											
											$ANGSURID = $tampilangsur["ANGSUR"];
											$IDNYA = mysql_fetch_object(mysql_query("SELECT ID_BAHAN FROM detail_kalkulasi_bahan WHERE ANGSUR = '$ANGSURID'"));
											$HASILID = $IDNYA->ID_BAHAN;
											
										  	echo"
												<tr>
												
												<td>$tampilangsur[TANGGAL]</td>
												<td>$tampilangsur[ID_PETUGAS]</td>
												<td>$HASILID</td>
												<td>$tampilangsur[JUMLAH_ANGSUR]</td>
												</tr>";
							
										
											}
									  }
									   echo '
									    </table>';

									 $angsurdua = mysql_query("SELECT * FROM detail_kalkulasi_penyesuaian WHERE ID_KALKULASI = '$TAM_HEAD'");
									  while($loopangsurdua=mysql_fetch_array($angsurdua)) {
										  
										 
										  echo '
										<table class="table table-bordered table-striped" style="width:900px;">
										<thead>
											<tr>
											<th colspan ="3">ANGSURAN KE</th>
											<th>Penyesuaian</th><tr>
											<tr>
											<th>TANGGAL</th>	
											<th>ID PETUGAS</th>
											<th>ID BAHAN</th>
											<th>JUMLAH ANGSUR</th>
			
											</tr>
										</thead>
										<tbody>';
										
										  
										  $angsurdua = mysql_query("SELECT * FROM detail_kalkulasi_penyesuaian WHERE ID_KALKULASI='$TAM_HEAD'");
											while($tampilangsurdua = mysql_fetch_array($angsurdua)){
											
											$ANGSURIDD = $tampilangsurdua["PENYESUAIAN"];
											$IDNYAA = mysql_query("SELECT * FROM bahan JOIN detail_kalkulasi_bahan ON bahan.ID_BAHAN = detail_kalkulasi_bahan.ID_BAHAN WHERE detail_kalkulasi_bahan.ANGSUR = '$ANGSURID'");
											$AMBILLL = mysql_fetch_array($IDNYAA);
											
										  	echo"
												<tr>
												
												<td>$loopangsurdua[TANGGAL]</td>
												<td>$loopangsurdua[ID_PETUGAS]</td>
												<td>$AMBILLL[ID_BAHAN]</td>
												<td>$loopangsurdua[JUMLAH_PENYESUAIAN]</td>
												</tr>";
							
										
											}
									  }
									   echo '
									    </table>';
										
								echo'	</form>
								  
								    
								</div>
							</div>';
							echo"
								 <input type=\"button\" class=\"btn btn-warning btn-flat\" value=\"Cetak\" onclick=\"javascript:printDiv('cetak')\" />";
								 ?>&nbsp;<a href="<?=base_index();?>kalkulasi-bahan" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
								 <?php
									$lihatt = mysql_fetch_object(mysql_query("SELECT STATUS FROM head_kalkulasi_produksi WHERE ID_KALKULASI = '$TAM_HEAD'"));
									
									if ($lihatt->STATUS == "PRODUKSI"){ ?>
								         <a href="<?=base_index();?>kalkulasi-bahan/detail?sesuaikan=ya&id=<?=$_GET["ubah"]?>" class="btn btn-danger btn-flat"><i class="fa fa-step-backward"></i>Sesuaikan Hasil Produksi</a>
									<?php } ?>
								</div>
							 </div>
							</div>

							
					
					<br/>
									


				
				<?php 
				
				}
			}
				// Kondisi Penyesuaian 
				
				if(isset($_GET[sesuaikan])){
					$sesuaikan=$_GET['sesuaikan'];
						if($sesuaikan=='ya')	{
							$TAM_HEAD = $_GET["id"];	
				?>
				<div class="row">
					<div class="col-lg-12"> 
						<div class="box box-solid box-primary">
												 <div class="box-header">
													<h3 class="box-title"></h3>
												   
												</div>
				
				<center><h3><b>Penyesuaian Hasil Produksi</h3></b></center>
										<br/><br/><br/>
							
							
							
							<form method="post" class="form-horizontal foto_banyak" action="../../modul/kalkulasi_bahan/kalkulasi_bahan_action.php?act=acc_selisih">
									  <div align="center">
								<?php
									echo'		
										<table class="table table-bordered table-striped" style="width:750px;">
										<thead>
											<tr>
											<th>KODE BARANG</th>			
											<th>NAMA BARANG</th>			
											<th>JUMLAH PRODUKSI</th>
											</tr>
										</thead>
										<tbody>';
				
				$CARI_KODE_BARANG = mysql_query("SELECT * FROM `detail_kalkulasi_barang` WHERE ID_KALKULASI ='$TAM_HEAD'");
					while($KD_DAPAT= mysql_fetch_array($CARI_KODE_BARANG)){
					
						
								
							echo'
								 <tr>
								 <td><input type="hidden" name="KODE_BARANG[]" value="'.$KD_DAPAT[KODE_BARANG].'">
									<input type="hidden" name="ID_PROD" value="'.$TAM_HEAD.'">
									'.$KD_DAPAT[KODE_BARANG].'</td>
								 <td>-</td>
								 <td><input type="text" name="JML_PROD[]" value="'.$KD_DAPAT[JML_PROD].'"></td>
								 </tr>';						
					}	
							echo '
								</table>
								<table class="table table-bordered table-striped" style="width:1000px;">
										<thead>
											<tr>
											<th>ID BAHAN</th>
											<th>NAMA BAHAN</th>	
											<th>SATUAN</th>
											<th>PERKIRAAN BAHAN</th>
											<th>BAHAN YANG SUDAH DIPAKAI</th>
											<th>TOTAL BAHAN FINAL</th>
											<th>HAPUS BAHAN</th>
											</tr>
										</thead>
										<tbody>';
								
								
						$CARI_KODE_BARANG2 = mysql_query("SELECT * FROM detail_kalkulasi_bahan WHERE ID_KALKULASI ='$TAM_HEAD'");
							while($KD_DAPAT2= mysql_fetch_array($CARI_KODE_BARANG2)){
								

								$ID_TARGET = $KD_DAPAT2["ID_BAHAN"];
								
								$CEK_NAMA = mysql_query("SELECT `NAMA_BAHAN` AS NAMA FROM `bahan` WHERE `ID_BAHAN` = '$ID_TARGET'");
								$AMBIL_NAMA = mysql_fetch_array($CEK_NAMA);
								
								$CEK_SATUAN = mysql_query("SELECT `SATUAN` AS SATUAN FROM `bahan` WHERE `ID_BAHAN` = '$ID_TARGET'");
								$AMBIL_SATUAN = mysql_fetch_array($CEK_SATUAN);
								
								

							echo'
								<tr>
								<td><input type="hidden" name="ID_BAHAN[]" value="'.$KD_DAPAT2[ID_BAHAN].'" style="width:50px;">'.$ID_TARGET.'</td>
								<td>'.$AMBIL_NAMA[NAMA].'</td>
								<td>'.$AMBIL_SATUAN[SATUAN].'</td>
								<td><input type="text" name="JML_TOTAL[]" value="'.$KD_DAPAT2[JML_TOTAL].'" style="width:50px;" readonly="true"></td>
								<td><input type="text" name="JML_PAKAI[]" value="'.$KD_DAPAT2[JML_DIPAKAI].'" style="width:50px;" readonly="true"></td>
								<td><input type="text" name="JML_FINAL[]" value="'.$KD_DAPAT2[JML_DIPAKAI].'" style="width:50px;">
									<input type="hidden" name="ANGSUR[]" value="'.$KD_DAPAT2[ANGSUR].'" style="width:50px;">
									 <input type="hidden" name="PETUGAS" value="'.$_SESSION[id_user].'" class="form-control">
								</td>
								<td><center>';?>						
										<a href="<?=base_index();?>kalkulasi-bahan" class="btn btn-danger btn-flat"><i class="glyphicon glyphicon-trash"></i></a>
									  <?php
									  echo'</td>
								</tr>';	
							
							
							}
							
									echo ";
									  </table>";
									
									
									?>
							<a href="<?=base_index();?>kalkulasi-bahan" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
							<?php
							
							echo"
							<button type=\"submit\" id=\"ubah_scanner\" class=\"btn btn-danger\">Simpan Produksi</button>
							</form>

									
								
							<br>&nbsp;
						</div></div></div>	";
					}
				}
						?>
							
							
							
                </section><!-- /.content -->
        
            