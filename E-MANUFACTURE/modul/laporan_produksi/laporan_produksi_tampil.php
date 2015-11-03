<?php
	error_reporting(0);
	include "laporan_produksi_view.php";
	$AWAL = $_POST["AWAL"];
	$AKHIR = $_POST["AKHIR"];
?>
<section class="content">

<?php
if(isset($_POST["jenis"])){
 $ubah=$_POST["jenis"];
 	if($ubah=="Laporan Terima Bahan Masuk")	{	
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Laporan Terima Bahan Masuk</h3>
                                   
                                 </div>

                  <div class="box-body">
				  <table class="table table-bordered table-striped">
                         <thead>
                         <tr>

                          <th>ID MASUK</th>
                          <th>TGL BELI</th>
													
							<th>TGL MASUK</th>
							<th>P. DIV. BELI</th>
							<th>P. DIV. PROD</th>
							<th style="width:500px;"><center>DETAIL</th>
							</tr>
                                      </thead>
                            <tbody>
							
				  <?php
						$cari = mysql_query("SELECT * FROM `head_bhn_masuk` WHERE `TGL_MASUK` BETWEEN '$AWAL' AND '$AKHIR'");
						while($tampil = mysql_fetch_array($cari)) {
							
							echo '	
									<tr>
									<td>'.$tampil[ID_BHN_MASUK].'</td>
									<td>'.substr($tampil[TGL_PEMBELIAN],0,10).'</td>
									<td>'.substr($tampil[TGL_MASUK],0,10).'</td>
									<td>'.$tampil[ID_PETUGAS].'</td>
									<td>'.$tampil[ID_PETUGAS_PENERIMA].'</td>
									<td><table width="490px">
											<tr align="center"><td>Nama Bahan</td>
												<td>Satuan</td>
												<td>Jumlah Bahan</td>
												<td>Selisih</td>
												<td>Jumlah Masuk</td>
											</tr>';
												
												$satu = mysql_query("SELECT * FROM detail_bhn_masuk WHERE DET_ID_BHN_MASUK = '".$tampil[ID_BHN_MASUK]."'");
												while ($dua = mysql_fetch_array($satu)) {
													
													$A = mysql_query("SELECT * FROM bahan WHERE ID_BAHAN = '".$dua[DET_ID_BAHAN]."'");
													$AA = mysql_fetch_array($A);
													
													echo'
											<tr align="center">
												<td>'.$AA[NAMA_BAHAN].'</td>
												<td>'.$AA[SATUAN].'</td>
												<td>'.number_format($dua[JUMLAH_BAHAN]).'</td>
												<td>'.number_format($dua[JUMLAH_SELISIH]).'</td>
												<td>'.number_format($dua[JUMLAH_MASUK]).'</td>
											</tr>';
													
													
													
													
												}
											
											echo'
										</table>

									</tr>';
	
						}
				  ?>
				  
				  </tbody>
				  </table>
				  </div>
				</div>
			</div>
	</section>
<?php
	}
}

if(isset($_POST["jenis"])){
 $ubah=$_POST["jenis"];
 	if($ubah=="Laporan Produksi Barang")	{	
?>
	
	
	<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Laporan Produksi Barang</h3>
                                   
                                 </div>

                  <div class="box-body">
				   <table class="table table-bordered table-striped">
                         <thead>
                         <tr>

                          <th rowspan="2">ID PRODUKSI</th>
                          <th rowspan="2">TGL KALKULASI</th>
													
							<th rowspan="2">TGL SELESAI</th>
							<th colspan="2" style="width:500px;"><center>DETAIL</th>
						</tr>
						
							<th><center>BARANG</th>
							<th><center>BAHAN</th>
							</tr>
                                      </thead>
                            <tbody>
							
				  <?php
						$cari = mysql_query("SELECT * FROM `head_kalkulasi_produksi` WHERE `TGL_BERES_PROD` BETWEEN '$AWAL' AND '$AKHIR'");
						while($tampil = mysql_fetch_array($cari)) {
							
							echo '	
									<tr>
									<td>'.$tampil[ID_KALKULASI].'</td>
									<td>'.$tampil[TGL_KALKULASI].'</td>
									<td>'.$tampil[TGL_BERES_PROD].'</td>
									<td>
										<table style="width:350px;">
											<tr><td>Kode Barang<p>
												</p></td>
												<td>Nama Barang</td>
												<td>Jumlah Produksi</td>
											</tr>';
											
											$empat = mysql_query("SELECT * FROM detail_kalkulasi_barang WHERE ID_KALKULASI = '".$tampil[ID_KALKULASI]."'");
												while ($lima = mysql_fetch_array($empat)) {
													
													$AAA = mysql_query("SELECT NAMA_BARANG,KODE_BARANG FROM barang_pusat WHERE KODE_BARANG = '".$lima[KODE_BARANG]."'");
													$AAAA = mysql_fetch_array($AAA);
													
													echo'
											<tr>
												<td>'.$AAAA[KODE_BARANG].'</td>
												<td>'.$AAAA[NAMA_BARANG].'</td>
												<td>'.$lima[JML_PROD_FINAL].'</td>
											</tr>';
												}
											
										
									
									echo'
									</table>
									</td>
									<td><table style="width:300px;">
											<tr><td>Nama Bahan<p>
												</p>
												</td>
												<td>Satuan</td>
												<td>Jumlah Bahan</td>
											</tr>';
												
												$satu = mysql_query("SELECT * FROM detail_kalkulasi_bahan WHERE ID_KALKULASI = '".$tampil[ID_KALKULASI]."'");
												while ($dua = mysql_fetch_array($satu)) {
													
													$A = mysql_query("SELECT * FROM bahan WHERE ID_BAHAN = '".$dua[ID_BAHAN]."'");
													$AA = mysql_fetch_array($A);
													
													echo'
											<tr>
												<td>'.$AA[NAMA_BAHAN].'</td>
												<td>'.$AA[SATUAN].'</td>
												<td>'.$dua[JML_FINAL].'</td>
											</tr>';
													
													
													
													
												}
											
											echo'
										</table>

									</tr>';
	
						}
				  ?>
				  
				  </tbody>
				  </table>
				  
				  
				  
				  </div>
				</div>
			</div>
	</section>
<?php
	}
}

if(isset($_POST["jenis"])){
 $ubah=$_POST["jenis"];
 	if($ubah=="Laporan Mutasi Barang")	{
?>
				  
	<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Laporan Mutasi Barang </h3>
                                   
                                 </div>

                  <div class="box-body">
				  
				  <table class="table table-bordered table-striped">
                         <thead>
                         <tr>

                          <th>KODE MUTASI</th>
                          <th>TGL MUTASI</th>
													
							<th>TGL ACC MUTASI</th>
							<th>PETUGAS DIV.PROD</th>
							<th>PETUGAS DIV. GUDANG</th>
							<th style="width:500px;"><center>DETAIL</th>
							</tr>
                                      </thead>
                            <tbody>
							
				  <?php
						$cari = mysql_query("SELECT * FROM `head_mutasi_prod` WHERE `TANGGAL_DITERIMA` BETWEEN '$AWAL' AND '$AKHIR'");
						while($tampil = mysql_fetch_array($cari)) {
							
							echo '	
									<tr>
									<td>'.$tampil[KODE_MUTASI].'</td>
									<td>'.$tampil[TANGGAL_KELUAR].'</td>
									<td>'.$tampil[TANGGAL_DITERIMA].'</td>
									<td>'.$tampil[ID_PTGS_KELUAR].'</td>
									<td>'.$tampil[ID_PTGS_TERIMA].'</td>
									<td><table width="490px">
											<tr align="center"><td>Kode Barang</td>
												<td>Nama Barang</td>
												<td>Jumlah Mutasi</td>

											</tr>';
												
												$satu = mysql_query("SELECT * FROM detail_mutasi_prod WHERE KODE_MUTASI = '".$tampil[KODE_MUTASI]."'");
												while ($dua = mysql_fetch_array($satu)) {
													
													$A = mysql_query("SELECT * FROM barang_pusat WHERE KODE_BARANG = '".$dua[KODE_BARANG]."'");
													$AA = mysql_fetch_array($A);
													
													echo'
											<tr align="center">
												<td>'.$AA[KODE_BARANG].'</td>
												<td>'.$AA[NAMA_BARANG].'</td>
												<td>'.$dua[JUMLAH].'</td>
											</tr>';
													
													
													
													
												}
											
											echo'
										</table>

									</tr>';
	
						}
				  ?>
				  
				  </tbody>
				  </table>
				  
				  
				  </div>
				</div>
			</div>
	</section>
<?php
	}
}
?>
	</section>