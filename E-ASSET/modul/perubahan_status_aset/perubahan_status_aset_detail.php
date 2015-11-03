

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Perubahan Status Aset
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>perubahan-status-aset">Perubahan Status Aset</a></li>
                        <li class="active">Detail Perubahan Status Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Perubahan Status Aset</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="Kode Inventarisasi" class="control-label col-lg-2">Kode Inventarisasi</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_inventarisasi") as $isi) {
               		if ($data_edit->kode_inventarisasi==$isi->kode_inventarisasi) {

               			echo "<input disabled class='form-control' type='text' value='$isi->kode_inventarisasi'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Status Sebelum" class="control-label col-lg-2">Status Sebelum</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_status") as $isi) {
               		if ($data_edit->status_before==$isi->status) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_status'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Status Sesudah" class="control-label col-lg-2">Status Sesudah</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_status") as $isi) {
               		if ($data_edit->status_after==$isi->status) {

               			echo "<input disabled class='form-control' type='text' value='$isi->status'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal Ubah" class="control-label col-lg-2">Tanggal Ubah</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->tgl_ubah;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->keterangan_ubah;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="User Ubah" class="control-label col-lg-2">User Ubah</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->user_ubah;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>perubahan-status-aset" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
