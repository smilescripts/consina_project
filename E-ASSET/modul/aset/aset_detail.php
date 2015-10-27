

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Aset
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>aset">Aset</a></li>
                        <li class="active">Detail Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Aset</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="Kode Barang" class="control-label col-lg-2">Kode Barang</label>
                        <div class="col-lg-3">
                          <input type="text" disabled="" value="<?=$data_edit->kode_barang;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group --> 
					  
					  <div class="form-group">
                        <label for="Nama Barang" class="control-label col-lg-2">Nama Barang</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->nm_barang;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Golongan" class="control-label col-lg-2">Golongan</label>
                        <div class="col-lg-3">
                          <?php foreach ($db->fetch_all("as_golongan") as $isi) {
               		if ($data_edit->kode_golongan==$isi->kode_golongan) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_golongan'>";
               		}
               } ?>
              
                        </div>
						
						<label for="Sub Golongan" class="control-label col-lg-2">Sub Golongan</label>
                        <div class="col-lg-3">
                          <?php foreach ($db->fetch_all("as_subgolongan") as $isi) {
               		if ($data_edit->sub_golongan==$isi->sub_golongan) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_subgolongan'>";
               		}
               } ?>
              
                        </div>
						
                      </div><!-- /.form-group -->

<div class="form-group">
                        <label for="Merek" class="control-label col-lg-2">Merek</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->merk;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tipe" class="control-label col-lg-2">Tipe</label>
                        <div class="col-lg-4">
                          <input type="text" disabled="" value="<?=$data_edit->tipe;?>" class="form-control">
                        </div>
						
						  <label for="Tahun" class="control-label col-lg-2">Tahun</label>
                        <div class="col-lg-3">
                          <input type="text" disabled="" value="<?=$data_edit->tahun;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
					  
<div class="form-group">
                        <label for="Jumlah Unit" class="control-label col-lg-2">Jumlah Unit</label>
                        <div class="col-lg-4">
                          <input type="text" disabled="" value="<?=$data_edit->total_unit;?>" class="form-control">
                        </div>
						
						 <label for="masa_servis" class="control-label col-lg-2">Masa Servis</label>
                        <div class="col-lg-3">
                          <input type="text" disabled="" value="<?=$data_edit->masa_servis;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

<div class="form-group">
                        <label for="tgl_entry" class="control-label col-lg-2">Tanggal Entri</label>
                        <div class="col-lg-4">
                          <input type="text" disabled="" value="<?=tgl_indo($data_edit->tgl_entry);?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->


<div class="form-group">
                        <label for="Foto" class="control-label col-lg-2">Foto</label>
                        <div class="col-lg-4">
                          <span class="foto_profil"><img width="200" height="200" src="<?=base_admin();?>../upload/aset/<?=$data_edit->poto;?>" class="img-thumbnail"></span>
                        </div>
                      </div><!-- /.form-group -->

					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>aset" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
