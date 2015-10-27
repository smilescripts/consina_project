
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Penempatan Aset
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>penempatan-aset">Penempatan Aset</a></li>
                        <li class="active">Tambah Penempatan Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Penempatan Aset</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/penempatan_aset/penempatan_aset_action.php?act=in">
                      <div class="form-group">
					  <div class="col-lg-12">
                        <label for="Kode Aset" class="control-label">Kode Aset</label>
                        
                          <select name="kode_barang" data-placeholder="Pilih Kode Aset ..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_aset") as $isi) {
               		echo "<option value='$isi->kode_barang'>$isi->nm_barang</option>";
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
						<div class="col-lg-4">
                        <label for="Cabang" class="control-label">Cabang</label>
                        
                          <select name="kode_cabang" data-placeholder="Pilih Cabang ..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_cabang") as $isi) {
               		echo "<option value='$isi->kode_cabang'>$isi->nm_cabang</option>";
               } ?>
              </select>
                        </div>
						
						<div class="col-lg-4">
						 <label for="Unit Kerja" class="control-label">Unit Kerja</label>
                        
                          <select name="kode_unit" data-placeholder="Pilih Unit Kerja ..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_unit_kerja") as $isi) {
               		echo "<option value='$isi->kode_unit'>$isi->nm_unit</option>";
               } ?>
              </select>
                        </div>
						
						<div class="col-lg-4">
						<label for="Ruangan" class="control-label">Ruangan</label>
                        
                          <select name="kode_ruangan" data-placeholder="Pilih Ruangan ..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_ruangan") as $isi) {
               		echo "<option value='$isi->kode_ruangan'>$isi->nm_ruangan</option>";
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->

<div class="form-group">
						<div class="col-lg-4">
                        <label for="Jumlah" class="control-label">Jumlah</label>
                        
                          <input type="text" name="jumlah" placeholder="Jumlah" class="form-control" > 
                        </div>
						
						<div class="col-lg-4">
						<label for="Kondisi" class="control-label">Kondisi</label>
                        
                          <input type="text" name="kondisi" placeholder="Kondisi" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>penempatan-aset" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            