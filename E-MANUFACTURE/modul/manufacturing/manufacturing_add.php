
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Manufacturing
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>manufacturing">Manufacturing</a></li>
                        <li class="active">Tambah Manufacturing</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Manufacturing</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/manufacturing/manufacturing_action.php?act=in">
                      <div class="form-group">
                        <label for="MAN_ID_BARANG" class="control-label col-lg-2">ID BARANG</label>
                        <div class="col-lg-10">
						   <select name="MAN_KODE_BARANG" data-placeholder="Pilih ID BARANG ..." class="form-control chzn-select" tabindex="2" required>
						   <option value=""></option>
						   <?php $CARIKODE = mysql_query("SELECT DISTINCT(`BARANG_PUSAT`.`KODE_BARANG`) FROM `barang_pusat`, `manufacturing` WHERE (`barang_pusat`.`KODE_BARANG` != `manufacturing`.`MAN_KODE_BARANG`)");
									while($DAPATKODE=mysql_fetch_array($CARIKODE)){
										echo '<option value="' . $DAPATKODE['KODE_BARANG'] . '">' . $DAPATKODE['KODE_BARANG'].'</option>';  
							}
							?>
						  </select>
                        </div>
                      </div><!-- /.form-group -->
					  
						<?php 
							$query = "SELECT max(MAN_ID_MANUFACTURING) as idMaks FROM manufacturing";
							$hasil = mysql_query($query);
							$data  = mysql_fetch_array($hasil);
							$nim = $data['idMaks'];

							//mengatur 6 karakter sebagai jumalh karakter yang tetap
							//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
							$noUrut = (int) substr($nim, 8, 5);
							$noUrut++;

							//menjadikan 201353 sebagai 6 karakter yang tetap
							$char =  date('Y');
							$w = "PSN-";
							//%03s untuk mengatur 3 karakter di belakang 201353
							$IDbaru = $char . sprintf("%05s", $noUrut);
						?>
					  
  
					<div class="form-group">
                        <label for="MAN_ID_BAHAN" class="control-label col-lg-2">ID BAHAN DAN JUMLAH</label>
							<div id="children" class="col-lg-10">
								<input type="hidden" name="MAN_ID_MANUFACTURING" value="<?php echo $w.$IDbaru;?>">

								<select style="height:29px;width:320px;" name="item_price[]" required="true">
								<option  value=""></option>
							
								 <?php foreach ($db->fetch_all("bahan") as $isi) {
										echo "<option value='$isi->ID_BAHAN'>$isi->NAMA_BAHAN</option>";
								   } 
								 ?>
								</select>
								<!-- <input type="text" name="item_price[]" placeholder="Child's Name" style="width:250px; margin-left:7px; margin-right:4px;"> -->
								<input type="text" name="item_name[]" style="height:29px;width:320px;" placeholder="Jumlah">
								<input type="button" id="add_field()" onClick="addField()" value="Tambah" class="btn btn-warning btn-flat">
								</div>
								</div>

                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>manufacturing" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                   

				   <script>
					function addField(){
						var div = document.createElement('div');
						div.innerHTML = "<select style='height:29px;width:320px;' name='item_price[]' required='true'><option value=''> <?php foreach ($db->fetch_all("bahan") as $isi) { echo "<option value='$isi->ID_BAHAN'>$isi->NAMA_BAHAN</option>";} ?> </option></select>&nbsp;<input type='text' name='item_name[]' placeholder='Jumlah' style='height:29px;width:320px;'>&nbsp;<input type='button' class='btn btn-primary btn-flat' style='width:79px;' onClick='removeField(this)' value='Hapus'>";
						document.getElementById('children').appendChild(div);
					}

					function removeField(div){
						document.getElementById('children').removeChild(div.parentNode);
						i--;
					}
					</script>
					</form>
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            