
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Master Bahan
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>master-bahan">Master Bahan</a></li>
                        <li class="active">Tambah Master Bahan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Master Bahan</h3>
                                   
                                </div>
				  		<?php 
							$query = "SELECT max(ID_BAHAN) as idMaks FROM bahan";
							$hasil = mysql_query($query);
							$data  = mysql_fetch_array($hasil);
							$nim = $data['idMaks'];

							//mengatur 6 karakter sebagai jumalh karakter yang tetap
							//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
							$noUrut = (int) substr($nim, 8, 5);
							$noUrut++;

							//menjadikan 201353 sebagai 6 karakter yang tetap
							$char =  date('Y');
							$w = "BHN-";
							//%03s untuk mengatur 3 karakter di belakang 201353
							$IDbaru = $char . sprintf("%05s", $noUrut);
						?>
						
                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/master_bahan/master_bahan_action.php?act=in">
                      <div class="form-group">
                        <label for="ID_BAHAN" class="control-label col-lg-2">ID BAHAN</label>
                        <div class="col-lg-10">
                          <input type="text" name="ID_BAHAN" placeholder="ID_BAHAN" class="form-control" value="<?php echo $w.$IDbaru;?>" readonly="true"> 
                        </div>
                      </div>                      <div class="form-group">
                        <label for="NAMA_BAHAN" class="control-label col-lg-2">NAMA_BAHAN</label>
                        <div class="col-lg-10">
                          <input type="text" name="NAMA_BAHAN" placeholder="NAMA_BAHAN" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="SATUAN" class="control-label col-lg-2">SATUAN</label>
                        <div class="col-lg-10">
                          <input type="text" name="SATUAN" placeholder="SATUAN" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="STOCK" class="control-label col-lg-2">STOCK</label>
                        <div class="col-lg-10">
                          <input type="text" name="STOCK" placeholder="STOCK" class="form-control" value="0" readonly="true"> 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>master-bahan" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            