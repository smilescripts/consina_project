<?php
	error_reporting(0);
?>

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Mutasi Barang Produksi
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>mutasi-barang">Mutasi Barang Produksi</a></li>
                        <li class="active">Detail Mutasi Barang Produksi</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Mutasi Barang </h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
						<?php
						$man=mysql_query("SELECT * FROM head_mutasi_prod WHERE KODE_MUTASI = '$_GET[id]'");
						$datman=mysql_fetch_array($man);
						?>
						
					  
						<label class="control-label col-lg-3">ID  MUTASI</label>
                        <div class="col-lg-9">
						<input type="text" name="MAN_ID_MANUFACTURING" class="form-control" value="<?php echo $datman["KODE_MUTASI"]; ?>" readonly="true" required> 
                        </div>
						
			
						<label class="control-label col-lg-3">TANGGAL MUTASI</label>
                        <div class="col-lg-9">
						<input type="text" name="TANGGAL_KELUAR" class="form-control" value="<?php echo $datman["TANGGAL_KELUAR"]; ?>" readonly="true" required> 
                        </div>

					
						<label class="control-label col-lg-3">TANGGAL ACC DI GUDANG BARANG</label>
                        <div class="col-lg-9">
						<input type="text" name="TANGGAL_DITERIMA" class="form-control" value="<?php echo $datman["TANGGAL_DITERIMA"]; ?>" readonly="true" required> <br>
                        </div>
						
						<label class="control-label col-lg-3">PETUGAS DIV. PRODUKSI</label>
                        <div class="col-lg-9">
						<input type="text" name="ID_PTGS_KELUAR" class="form-control" value="<?php echo $datman["ID_PTGS_KELUAR"]; ?>" readonly="true" required> 
                        </div>
						
						<label class="control-label col-lg-3">PETUGAS DIV. GUDANG BARANG</label>
                        <div class="col-lg-9">
						<input type="text" name="ID_PTGS_TERIMA" class="form-control" value="<?php echo $datman["ID_PTGS_TERIMA"]; ?>" readonly="true" required> 
                        </div>
                        
                        <br>
						<br>
						<div class="box-body table-responsive">
						<br>
						<br>
						<label class="control-label col-lg-2">&nbsp;</label>
						
						<table class="table table-bordered table-striped" style="width:800px;">
                         <thead>
                         <tr>

                          <th>KODE BARANG</th>
                          <th>NAMA BARANG</th>
													
							<th>JUMLAH MUTASI</th>
                         
							</tr>
                                      </thead>
                            <tbody>
                            
							
							<?php
							
							$queryTB=mysql_query("SELECT * FROM detail_mutasi_prod where KODE_MUTASI = '$_GET[id]'");
	
								while($nTB=mysql_fetch_array($queryTB)){
									
									$ambil = mysql_fetch_object(mysql_query("SELECT * FROM barang_pusat WHERE KODE_BARANG = '$nTB[KODE_BARANG]'"));
									
									print '<tr>
									<td>'.$ambil->KODE_BARANG.'</td>
									<td>'.$ambil->NAMA_BARANG.'</td>
									<td>'.number_format($nTB[JUMLAH]).'</td>';
									}
							
							?>

							</tbody>
                                    </table>
                                </div><!-- /.box-body -->
				
                      </div><!-- /.form-group -->

					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>mutasi-barang" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
