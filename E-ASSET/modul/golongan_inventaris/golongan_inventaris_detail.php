

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Golongan Inventaris
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>golongan-inventaris">Golongan Inventaris</a></li>
                        <li class="active">Detail Golongan Inventaris</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Golongan Inventaris</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      
<div class="form-group">
                        <label for="Nama Golongan" class="control-label col-lg-2">Nama Golongan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->nm_golongan;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Keterangan" class="control-label col-lg-2">Keterangan</label>
                        <div class="col-lg-10">
                          <textarea id="editbox" name="keterangan" disabled="" class="editbox"><?=$data_edit->keterangan;?> </textarea>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Penyusutan (%)" class="control-label col-lg-2">Penyusutan (%)</label>
                        <div class="col-lg-3">
                          <input type="text" disabled="" value="<?=$data_edit->persen_susut;?>" class="form-control">
                        </div>
						
						<label for="Masa Manfaat" class="control-label col-lg-2">Masa Manfaat(Tahun)</label>
                        <div class="col-lg-3">
                          <input type="text" disabled="" value="<?=$data_edit->masa_manfaat;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

<div class="form-group">
                        <label for="tgl_posting" class="control-label col-lg-2">Tanggal Entri</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->tgl_posting;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

					  <div class="form-group">
                        <label for="Jenis Harta" class="control-label col-lg-2">Jenis Harta</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_harta_berwujud") as $isi) {
               		if ($data_edit->kode_harta==$isi->kode_harta) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_harta'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>golongan-inventaris" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
