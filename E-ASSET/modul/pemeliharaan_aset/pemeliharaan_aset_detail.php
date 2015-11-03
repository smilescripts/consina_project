

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Pemeliharaan Aset
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>pemeliharaan-aset">Pemeliharaan Aset</a></li>
                        <li class="active">Detail Pemeliharaan Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Pemeliharaan Aset</h3>
                                   
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
                        <label for="Tanggal Servis" class="control-label col-lg-2">Tanggal Servis</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=tgl_indo($data_edit->tgl_servis);?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal Servis Berikutnya" class="control-label col-lg-2">Tanggal Servis Berikutnya</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->tgl_servis_berikutnya;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tempat Servis" class="control-label col-lg-2">Tempat Servis</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->tempat_servis;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keluhan" class="control-label col-lg-2">Keluhan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->keluhan;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->keterangan_pem;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal Posting" class="control-label col-lg-2">Tanggal Posting</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->tgl_posting;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="User Posting" class="control-label col-lg-2">User Posting</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->user_posting;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Biaya Servis" class="control-label col-lg-2">Biaya Servis</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->biaya_servis;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Flag" class="control-label col-lg-2">Flag</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->flag;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>pemeliharaan-aset" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
