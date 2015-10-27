<?php
	error_reporting(0);
	$TAM_HEAD = $_GET["ubah"];	
?>

 <section class="content-header">
                    <h1>
                     Kalukulasi Bahan
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>kalukulasi-bahan">Kalukulasi Bahan</a></li>
                        <li class="active">Kalukulasi</li>
                    </ol>
                </section>
				<section class="content">
				
				<div class="row">
					<div class="col-lg-12"> 
						<div class="box box-solid box-primary">
												 <div class="box-header">
													<h3 class="box-title"></h3>
												   
												</div>
				
				<center><h3><b>Angsur Bahan Produksi</h3></b></center>
										<br/><br/><br/>
							
					
							
							<form method="post" class="form-horizontal foto_banyak" action="../../modul/kalkulasi_bahan/kalkulasi_bahan_action.php?act=angsur_bahan">
									  <div align="center">
										
										<table class="table table-bordered table-striped" style="width:850px;">
										<tbody>
										
										<tr><th>ID PRODUKSI</th><td><?php echo $TAM_HEAD; ?></td></tr>
										<tr><th>TANGGAL ANGSUR BAHAN</th><td><?php echo date('Y-m-d');?></td></tr>
										<tr><th>PETUGAS</th><td><?php echo $_SESSION['id_user'];?></td></tr>
										</tbody>
										</table>

								<?php
									
									echo'		
										<table class="table table-bordered table-striped" style="width:850px;">
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
								 <td>'.$KD_DAPAT[JML_PROD].'</td>
								 </tr>';						
					}	
							echo '
								</table>
								<table class="table table-bordered table-striped" style="width:850px;">
										<thead>
											<tr>
											<th>ID BAHAN</th>
											<th>NAMA BAHAN</th>	
											<th>SATUAN</th>
											<th>PERKIRAAN BAHAN</th>
											<th>BAHAN YANG SUDAH DIPAKAI</th>
											<th>JUMLAH ANGSUR BAHAN</th>
											
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
								<td><input type="hidden" name="ID_BAHAN[]" value="'.$KD_DAPAT2[ID_BAHAN].'" style="width:50px;">
								<input type="hidden" name="PETUGAS" value="'.$_SESSION['id_user'].'" style="width:50px;">
								'.$ID_TARGET.'</td>
								<td>'.$AMBIL_NAMA[NAMA].'</td>
								<td>'.$AMBIL_SATUAN[SATUAN].'</td>
								<td>'.$KD_DAPAT2[JML_TOTAL].'</td>
								<td>'.$KD_DAPAT2[JML_DIPAKAI].'</td>
								<td><input type="text" name="JML_ANGSUR[]" value="" style="width:50px;" required="true"></td>

								</tr>';	
							
							
							}
							
									echo "
									  </table>";
									?>
							<a href="<?=base_index();?>kalkulasi-bahan" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
							<?php
							
							echo"
							<button type=\"submit\" id=\"ubah_scanner\" class=\"btn btn-danger\">Simpan</button>
							</form>

									
								
							<br>&nbsp;
						</div></div></div>	";

						?>
							
					    </section><!-- /.content -->		