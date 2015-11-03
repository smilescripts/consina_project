

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Detail Pengadaan Aset
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>pengadaan-aset/detail/<?=$path_id;?>"">Detail Pengadaan Aset</a></li>
                        <li class="active">Detail Detail Pengadaan Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-6">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Detail Pengadaan Aset</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
						<div class="col-lg-6">
                        <label for="Kode Pengadaan" class="control-label">Kode</label>
                        
                          <input type="text" disabled="" value="<?=$data_edit->kode_pengadaan;?>" class="form-control">
                        </div>
						
						<div class="col-lg-6">
						 <label for="Tanggal Beli" class="control-label">Tanggal Beli</label>
                        
                          <input type="text" disabled="" value="<?=tgl_indo($data_edit->tgl_beli);?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
					  
					  <div class="form-group">
					  <div class="col-lg-6">
                        <label for="Kode Suplier" class="control-label">Kode Suplier</label>
                        
                          <?php foreach ($db->fetch_all("as_suplier") as $isi) {
               		if ($data_edit->kode_suplier==$isi->kode_suplier) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_suplier'>";
               		}
               } ?>
              
                        </div>
						
						<div class="col-lg-6">
						<label for="No Faktur" class="control-label">No Faktur</label>
                        
                          <input type="text" disabled="" value="<?=$data_edit->no_faktur;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
					  
<div class="form-group">
						<div class="col-lg-12">
                        <label for="Kode Barang" class="control-label">Kode Aset</label>
                        
                          <?php foreach ($db->fetch_all("as_aset") as $isi) {
               		if ($data_edit->kode_barang==$isi->kode_barang) {

               			echo "<input disabled class='form-control' type='text' value='$isi->kode_barang'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
					  
					    <div class="form-group">
						<div class="col-lg-6">
                        <label for="Nama" class="control-label">Nama Aset</label>
                        
                          <input type="text" value="<?=$data_edit1->nm_barang;?>" placeholder="Nama Aset" class="form-control" readonly> 
                        </div>
						<div class="col-lg-6">
                        <label for="merek" class="control-label">Merek</label>
                        
                          <input type="text" value="<?=$data_edit1->merk;?>" placeholder="Merek" class="form-control" readonly> 
                        </div>
                      </div><!-- /.form-group -->
					  
					   <div class="form-group">
						<div class="col-lg-6">
                        <label for="tipe" class="control-label">Tipe</label>
                        
                          <input type="text" value="<?=$data_edit1->tipe;?>" placeholder="Tipe" class="form-control" readonly> 
                        </div>
						
						 <div class="col-lg-3">
						<label for="No Polisi" class="control-label">No Polisi</label>
                       
                          <input type="text" disabled="" value="<?=$data_edit->no_polisi;?>" class="form-control">
                        </div>
						
						<div class="col-lg-3">
						<label for="No Bpkb" class="control-label">No Bpkb</label>
                        
                          <input type="text" disabled="" value="<?=$data_edit->no_bpkb;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

<div class="form-group">
						<div class="col-lg-3">
                        <label for="No Sertifikat" class="control-label">No Sertifikat</label>
                        
                          <input type="text" disabled="" value="<?=$data_edit->no_sertifikat;?>" class="form-control">
                        </div>
						
						<div class="col-lg-3">
						<label for="Luas" class="control-label">Luas</label>
                        
                          <input type="text" disabled="" value="<?=$data_edit->luas;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
					  
					  <div class="form-group">
					  <div class="col-lg-3">
                        <label for="Jumlah" class="control-label">Jumlah Beli</label>
                        
                          <input type="text" disabled="" value="<?=$data_edit->jumlah;?>" class="form-control">
                        </div>
						
						<div class="col-lg-3">
						<label for="Harga Beli" class="control-label">Harga Per Unit</label>
                        
                          <input type="text" disabled="" value="<?=$data_edit->harga_beli;?>" class="form-control">
                        </div>
						
						<div class="col-lg-3">
						<label for="sub" class="control-label">Sub Total Beli </label>
                        
                          <input type="text" value="<?=$data_edit->jumlah*$data_edit->harga_beli;?>" data-rule-number="true" placeholder="Sub Total Beli " class="form-control" readonly> 
                        </div>
                      </div><!-- /.form-group -->

					<input type="hidden" disabled="" value="<?=$data_edit->sisa_jumlah;?>" class="form-control">
					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>pengadaan-aset/detail/<?=$data_edit->kode_pengadaan;?>" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
