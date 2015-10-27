

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Mutasi Aset
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>mutasi-aset">Mutasi Aset</a></li>
                        <li class="active">Detail Mutasi Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Mutasi Aset</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="ID Mutasi" class="control-label col-lg-2">ID Mutasi</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->id_mutasi;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group --> 
					  
					  <div class="form-group">
                        <label for="Tanggal Mutasi" class="control-label col-lg-2">Tanggal Mutasi</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->tgl_mutasi;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Cabang Lama" class="control-label col-lg-2">Cabang Lama</label>
						<div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_cabang") as $isi) {
               		if ($data_edit->kode_cabang_lama==$isi->kode_cabang) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_cabang'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Cabang Baru" class="control-label col-lg-2">Cabang Baru</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_cabang") as $isi) {
               		if ($data_edit->kode_cabang_baru==$isi->kode_cabang) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_cabang'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kode Inventarisasi" class="control-label col-lg-2">Kode Inventarisasi</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->kode_inventarisasi;?>" class="form-control">
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kode Inventarisasi Baru" class="control-label col-lg-2">Kode Inventarisasi Baru</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->kode_inventarisasi_baru;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kode Aset" class="control-label col-lg-2">Kode Aset</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->kode_aset;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
					  
					  <div class="form-group">
                        <label for="Kode Aset" class="control-label col-lg-2">Nama Aset</label>
                        
						
						<div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_aset") as $isi) {
               		if ($data_edit->kode_aset==$isi->kode_barang) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_barang'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Ruang Lama" class="control-label col-lg-2">Ruang Lama</label>
						<div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_ruangan") as $isi) {
               		if ($data_edit->ruang_lama==$isi->kode_ruangan) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_ruangan'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Ruang Baru" class="control-label col-lg-2">Ruang Baru</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_ruangan") as $isi) {
               		if ($data_edit->ruang_baru==$isi->kode_ruangan) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_ruangan'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Unit Lama" class="control-label col-lg-2">Unit Lama</label>
						
						<div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_unit_kerja") as $isi) {
               		if ($data_edit->unit_lama==$isi->kode_unit) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_unit'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Unit Baru" class="control-label col-lg-2">Unit Baru</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_unit_kerja") as $isi) {
               		if ($data_edit->unit_baru==$isi->kode_unit) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_unit'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Jumlah" class="control-label col-lg-2">Jumlah</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->jumlah;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="User Posting" class="control-label col-lg-2">User Posting</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->user_posting;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->keterangan;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>mutasi-aset" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
