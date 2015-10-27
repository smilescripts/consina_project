

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Sub Golongan Inventaris
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>sub-golongan-inventaris">Sub Golongan Inventaris</a></li>
                        <li class="active">Detail Sub Golongan Inventaris</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Sub Golongan Inventaris</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
				   <div class="form-group">
                        <label for="Kode Sub Golongan" class="control-label col-lg-2">Kode Sub Golongan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->sub_golongan;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
					  
                      <div class="form-group">
                        <label for="Jenis Golongan" class="control-label col-lg-2">Jenis Golongan</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_golongan") as $isi) {
               		if ($data_edit->kode_golongan==$isi->kode_golongan) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_golongan'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Nama Sub Golongan" class="control-label col-lg-2">Nama Sub Golongan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->nm_subgolongan;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="tgl_posting" class="control-label col-lg-2">Tanggal Entri</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->tgl_posting;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="user_posting" class="control-label col-lg-2">User Posting</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->user_posting;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>sub-golongan-inventaris" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
