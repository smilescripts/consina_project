<?php
error_reporting(0);
?>

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Bahan Masuk
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>manufacturing">Bahan Masuk</a></li>
                        <li class="active">Detail Bahan Masuk</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Bahan Masuk</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
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
						<input type="text" name="TGL_MASUK_GUDANG" class="form-control" value="<?php echo $datman["TGL_MASUK"]; ?>" readonly="true" required> 
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


						<br>

						<?php
							
							if ($datman["STATUS"] == "Selisih (ACC Masuk)") {
							
						?>
						<!-- Kondisi 2 -->	
						<table class="table table-bordered table-striped" style="width:800px;">
                         
						 <thead>
                         <tr>

                          <th><center>NAMA BAHAN</th>
                          <th><center>SATUAN</th>
													
							<th><center>JUMLAH BAHAN</th>
							<th><center>HARGA PEMBELIAN</th>
							<th><center>SELISIH</th>
							<th><center>JUMLAH BAHAN MASUK</th>
							<th><center>KERUGIAN</th>
                         
							</tr>
                                      </thead>
                            <tbody>
                            
							
							<?php
							
							$queryTB=mysql_query("SELECT * FROM detail_bhn_masuk where DET_ID_BHN_MASUK = '$_GET[id]'");
	
								while($nTB=mysql_fetch_array($queryTB)){
									
									$KODE_SELISIH = $nTB["KODE_SELISIH"];
									$IDNYA = $nTB["DET_ID_BAHAN"];
									
									$ambil = mysql_fetch_object(mysql_query("SELECT * FROM bahan WHERE ID_BAHAN = '$IDNYA'"));
									
									print '<tr>
									<td>'.$ambil->NAMA_BAHAN.'</td>
									<td>'.$ambil->SATUAN.'</td>';
									echo'
									<td><center>'.$nTB[JUMLAH_BAHAN].'</td>
									<td><center>'.$nTB[HARGA_BAHAN].'</td>
									<td><center>'.$nTB[JUMLAH_SELISIH].'</td>
									<td><center>'.$nTB[JUMLAH_MASUK].'</td>
									<td><center>'.number_format($nTB[KERUGIAN]).'</td>
									</tr>';
									}
								echo "	
									<tr>
									<th colspan=\"3\">Total Pembelian</th>
									<th><center>$datman[TOTAL_HARGA]</th>
									<td colspan=\"3\"></td>
									</tr>";
								
								
								$caritotalrugi=mysql_fetch_object(mysql_query("SELECT SUM(KERUGIAN) as TOTAL_RUGI FROM detail_bhn_masuk where DET_ID_BHN_MASUK = '$_GET[id]'"));
								
								echo '	
									<tr>
									<th colspan="6">Total Kerugian</th>
									<th><center>'.$caritotalrugi->TOTAL_RUGI.'</th>
									</tr>
							

							</tbody>
                                    </table>';
							}

						else {
							
						?>	
						<!-- Kondisi 2 -->			
						<table class="table table-bordered table-striped" style="width:800px;">
                         <thead>
                         <tr>

                          <th>NAMA BAHAN</th>
                          <th>SATUAN</th>
													
							<th>JUMLAH BAHAN</th>
							<th>HARGA PEMBELIAN</th>
                         
							</tr>
                                      </thead>
                            <tbody>
                            
							
							<?php
							
							$queryTB=mysql_query("SELECT * FROM detail_bhn_masuk where DET_ID_BHN_MASUK = '$_GET[id]'");
	
								while($nTB=mysql_fetch_array($queryTB)){
									
									$ambil = mysql_fetch_object(mysql_query("SELECT * FROM bahan WHERE ID_BAHAN = '$nTB[DET_ID_BAHAN]'"));
									
									print '<tr>
									<td>'.$ambil->NAMA_BAHAN.'</td>
									<td>'.$ambil->SATUAN.'</td>
									<td>'.number_format($nTB[JUMLAH_BAHAN]).'</td>
									<td>Rp. '.number_format($nTB[HARGA_BAHAN]).'</td>';
									}
								echo '	
									<tr>
									<th colspan="3">Total Pembelian</th>
									<th>Rp. '.number_format($datman[TOTAL_HARGA]).'</th>
									</tr>
							

							</tbody>
                                    </table>';
						}
							?>
									</center>

				
                      </div><!-- /.form-group -->

					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>bahan-masuk" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>

                  
                </section><!-- /.content -->
        
