

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Detail Pengadaan Aset
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>pengadaan-aset/detail/<?=$path_id;?>">Detail Pengadaan Aset</a></li>
                        <li class="active">Edit Detail Pengadaan Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-6">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Ubah Detail Pengadaan Aset</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/detail_pengadaan_aset/detail_pengadaan_aset_action.php?act=up">
                     

					 <div class="form-group">
						<div class="col-lg-6">
                        <label for="Kode Pengadaan" class="control-label">Kode</label>
                        
                          <input type="text" name="kode_pengadaan" readonly value="<?=$data_edit->kode_pengadaan;?>" class="form-control" > 
                          <input type="hidden" name="kode_barang1" readonly value="<?=$data_edit->kode_barang;?>" class="form-control" > 
                         </div>
						
						<div class="col-lg-6">
                        <label for="Tanggal Beli" class="control-label">Tanggal Beli</label>
                        
                          <input type="text" id="tgl1" data-rule-date="true" name="tgl_beli" value="<?=$data_edit->tgl_beli;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
					  
					  <div class="form-group">
					  
						<div class="col-lg-6">
						<label for="Kode Suplier" class="control-label">Suplier</label>
                        
                          <select name="kode_suplier" data-placeholder="Pilih Suplier..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_suplier") as $isi) {

               		if ($data_edit->kode_suplier==$isi->kode_suplier) {
               			echo "<option value='$isi->kode_suplier' selected>$isi->nm_suplier</option>";
               		} else {
               		echo "<option value='$isi->kode_suplier'>$isi->nm_suplier</option>";
               			}
               } ?>
              </select>
                        </div>
						
                        <div class="col-lg-6">
                        <label for="No Faktur" class="control-label">No Faktur</label>
                          <input type="text" name="no_faktur" value="<?=$data_edit->no_faktur;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
					  
<div class="form-group">
						<div class="col-lg-12">
                        <label for="Kode Barang" class="control-label">Kode Aset</label>
                          <select onchange="getdetail();" id="kode_barang" name="kode_barang" data-placeholder="Pilih Kode Barang..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_aset") as $isi) {

               		if ($data_edit->kode_barang==$isi->kode_barang) {
               			echo "<option value='$isi->kode_barang' selected>$isi->nm_barang</option>";
               		} else {
               		echo "<option value='$isi->kode_barang'>$isi->nm_barang</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
					  
					    <script type="text/javascript">
function getdetail(){
	var kode_barang = $('#kode_barang').val();
	//alert(kode_barang);
	$.ajax({
        url: "<?=base_admin();?>modul/detail_pengadaan_aset/detail.php",
        data: {kode_barang: kode_barang},
        cache: false,
		 type: 'POST',
		 dataType: "json",
        success: function(msg){
			//alert(msg);
			
			$("#namaaset").val(msg['nama']);
			$("#merk").val(msg['merk']);
			$("#tipe").val(msg['tipe']);
			$("#sisa_jumlah").val(msg['stok']);
			
        }
    });
}
</script>
					  
					    <div class="form-group">
						<div class="col-lg-6">
                        <label for="Nama" class="control-label">Nama Aset</label>
                        
                          <input type="text" id="namaaset" value="<?=$data_edit1->nm_barang;?>" placeholder="Nama Aset" class="form-control" readonly> 
                        </div>
						<div class="col-lg-6">
                        <label for="merek" class="control-label">Merek</label>
                        
                          <input type="text" id="merk" value="<?=$data_edit1->merk;?>" placeholder="Merek" class="form-control" readonly> 
                        </div>
                      </div><!-- /.form-group -->
					  
					 <div class="form-group">
						<div class="col-lg-6">
                        <label for="tipe" class="control-label">Tipe</label>
                        
                          <input type="text" id="tipe" value="<?=$data_edit1->tipe;?>" placeholder="Tipe" class="form-control" readonly> 
                        </div>
						
						<div class="col-lg-3">
						<label for="No Polisi" class="control-label">No Polisi</label>
                        
                          <input type="text" name="no_polisi" value="<?=$data_edit->no_polisi;?>" class="form-control" > 
                        </div>
						
						<div class="col-lg-3">
						<label for="No Bpkb" class="control-label">No Bpkb</label>
                        
                          <input type="text" name="no_bpkb" value="<?=$data_edit->no_bpkb;?>" class="form-control" > 
                        </div>
						
                      </div><!-- /.form-group -->

<div class="form-group">
						<div class="col-lg-3">
                        <label for="No Sertifikat" class="control-label">No Sertifikat</label>
                        
                          <input type="text" name="no_sertifikat" value="<?=$data_edit->no_sertifikat;?>" class="form-control" > 
                        </div>
						
						<div class="col-lg-3">
						<label for="Luas" class="control-label">Luas</label>
                        
                          <input type="text" name="luas" value="<?=$data_edit->luas;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
					
					<div class="form-group">
						<div class="col-lg-3">
                        <label for="Jumlah" class="control-label">Jumlah Beli</label>
                        
                          <input type="text" data-rule-number="true" id="jumlah" name="jumlah" value="<?=$data_edit->jumlah;?>" class="form-control" > 
                        </div>
						
						 <div class="col-lg-3">
						 <label for="Harga Beli" class="control-label">Harga Per Unit</label>
                       
                          <input type="text" data-rule-number="true" onchange="total();" id="harga_beli" name="harga_beli" value="<?=$data_edit->harga_beli;?>" class="form-control" required> 
                        </div>
						
												<script type="text/javascript">
function total(){
	
	var jumlah = $('#jumlah').val();
	var harga_beli = $('#harga_beli').val();
	//alert(kode_barang);
	if(jumlah==""){
		alert("jumlah isi terlebih dahulu");
	}else{
		var total=parseInt(jumlah)*parseInt(harga_beli);
		$("#subtotal").val(total);
	}
	
}
</script>
						
						<div class="col-lg-3">
						<label for="sub" class="control-label">Sub Total Beli </label>
                        
                          <input type="text" id="subtotal" value="<?=$data_edit->jumlah*$data_edit->harga_beli;?>" data-rule-number="true" placeholder="Sub Total Beli " class="form-control" readonly> 
                        </div>
                      </div><!-- /.form-group -->

					
					<input type="hidden" id="sisa_jumlah" name="sisa_jumlah" value="<?=$data_edit->sisa_jumlah;?>" class="form-control" > 
					<input type="hidden" name="sisa_jumlah1" value="<?=$data_edit->sisa_jumlah;?>" class="form-control" > 


                      <input type="hidden" name="id" value="<?=$data_edit->kode_pengadaan;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Ubah">&nbsp;
						 <a href="<?=base_index();?>pengadaan-aset/detail/<?=$path_id;?>" class="btn btn-success btn-flat">Batal</a>
                        </div>
                      </div><!-- /.form-group -->
                    </form>
					
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 