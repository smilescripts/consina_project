

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Manufacturing
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>manufacturing">Manufacturing</a></li>
                        <li class="active">Detail Manufacturing</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Manufacturing</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
						<?php
						$man=mysql_query("SELECT * FROM manufacturing WHERE MAN_ID_MANUFACTURING = '$_GET[id]'");
						$datman=mysql_fetch_array($man);
						?>
						
					  
						<label class="control-label col-lg-2">ID  MANUFACTURING</label>
                        <div class="col-lg-10">
						<input type="text" name="MAN_ID_MANUFACTURING" class="form-control" value="<?php echo $datman["MAN_ID_MANUFACTURING"]; ?>" readonly="true" required> 
                        </div>
						
			
						<label class="control-label col-lg-2">KODE BARANG</label>
                        <div class="col-lg-10">
						<input type="text" name="MAN_KODE_BARANG" class="form-control" value="<?php echo $datman["MAN_KODE_BARANG"]; ?>" readonly="true" required> 
                        </div>
                        
                        <br>
						<br>
						<div class="box-body table-responsive">
						<label class="control-label col-lg-2">&nbsp;</label>
						<table class="table table-bordered table-striped" style="width:800px;">
                         <thead>
                         <tr>

                          <th>NAMA BAHAN</th>
                          <th>SATUAN</th>
													
							<th>JUMLAH BAHAN</th>
                         
							</tr>
                                      </thead>
                            <tbody>
                            
							
							<?php
							
							$queryTB=mysql_query("SELECT * FROM detail_manufacturing where DET_MAN_ID_MAN = '$_GET[id]'");
	
								while($nTB=mysql_fetch_array($queryTB)){
									
									$ambil = mysql_fetch_object(mysql_query("SELECT * FROM bahan WHERE ID_BAHAN = '$nTB[DET_ID_BAHAN]'"));
									
									print '<tr>
									<td>'.$ambil->NAMA_BAHAN.'</td>
									<td>'.$ambil->SATUAN.'</td>';
									echo"
									<td>$nTB[DET_JUMLAH_BAHAN]</td>";
									}
							
							?>

							</tbody>
                                    </table>
                                </div><!-- /.box-body -->
				
                      </div><!-- /.form-group -->

					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>manufacturing" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
