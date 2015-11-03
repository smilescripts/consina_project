
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Pemeliharaan Aset
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>pemeliharaan-aset">Pemeliharaan Aset</a></li>
                        <li class="active">Tambah Pemeliharaan Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Pemeliharaan Aset</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/pemeliharaan_aset/pemeliharaan_aset_action.php?act=in">
                      <div class="form-group">
					  <div class="col-lg-12">
                        <label for="Kode Inventarisasi" class="control-label">Kode Inventarisasi</label>
                        
                          <select onchange="getdetail();" id="kode_inventarisasi" name="kode_inventarisasi" data-placeholder="Pilih Kode Inventarisasi ..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_inventarisasi") as $isi) {
               		echo "<option value='$isi->kode_inventarisasi'>$isi->kode_inventarisasi</option>";
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
					  
					   <script type="text/javascript">
function getdetail(){
	var kode_inventarisasi = $('#kode_inventarisasi').val();
	//alert(kode_barang);
	$.ajax({
        url: "<?=base_admin();?>modul/pemeliharaan_aset/detail.php",
        data: {kode_inventarisasi: kode_inventarisasi},
        cache: false,
		 type: 'POST',
		 dataType: "json",
        success: function(msg){
			//alert(msg);
			
			$("#namaaset").val(msg['nm_barang']);
			$("#merk").val(msg['merk']);
			$("#tipe").val(msg['tipe']);
			$("#kode_aset").val(msg['kode_barang']);
			$("#kode_cabang_lama").val(msg['kode_cabang']);
			$("#nama_cabang_lama").val(msg['nm_cabang']);
			$("#ruang_lama").val(msg['kode_ruangan']);
			$("#nm_ruang_lama").val(msg['nm_ruangan']);
			$("#unit_lama").val(msg['kode_unit']);
			$("#nm_unit_lama").val(msg['nm_unit']);
			
        }
    });
}
</script>

<div class="form-group">
					  <div class="col-lg-4">
                        <label for="Nama" class="control-label">Nama Aset</label>
                        
                          <input readonly type="text" id="namaaset" placeholder="Nama Aset" class="form-control" > 
                        </div> 
						
						<div class="col-lg-4">
                        <label for="Merk" class="control-label">Merek</label>
                        
                          <input Readonly type="text" id="merk" placeholder="Merek" class="form-control" > 
                        </div>
						
						<div class="col-lg-4">
                        <label for="tipe" class="control-label">Tipe</label>
                        
                          <input Readonly type="text" id="tipe" placeholder="Tipe" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
					  
					  <div class="form-group">
					   <div class="col-lg-3">
                        <label for="Kode Aset" class="control-label">Kode Aset</label>
                       
                          <input readonly type="text" id="kode_aset" name="kode_aset" placeholder="Kode Aset" class="form-control" > 
                        </div>
						
						<div class="col-lg-3">
						<label for="Cabang Lama" class="control-label">Cabang Lama</label>
                        
                          <input readonly type="text" id="nama_cabang_lama" placeholder="Cabang Lama" class="form-control" > 
                          <input type="hidden" id="kode_cabang_lama" name="kode_cabang_lama" placeholder="Cabang Lama" class="form-control" > 
                        </div>
						
						<div class="col-lg-3">
                        <label for="Ruang Lama" class="control-label">Ruang Lama</label>
                        
                          <input readonly type="text" id="nm_ruang_lama" placeholder="Ruang Lama" class="form-control" > 
                          <input type="hidden" id="ruang_lama" name="ruang_lama" placeholder="Ruang Lama" class="form-control" > 
                        </div>
						
						<div class="col-lg-3">
                        <label for="Unit Lama" class="control-label">Unit Lama</label>
                        
                          <input readonly type="text" id="nm_unit_lama" placeholder="Unit Lama" class="form-control" > 
                          <input type="hidden" id="unit_lama" name="unit_lama" placeholder="Unit Lama" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
					  
<div class="form-group">
						
                        <div class="col-lg-3">
						<label for="Tempat Servis" class="control-label">Tempat Servis</label>
                          <input type="text" name="tempat_servis" placeholder="Tempat Servis" class="form-control" required> 
                        </div>
						
                        <div class="col-lg-3">
						 <label for="Keluhan" class="control-label">Keluhan</label>
                          <input type="text" name="keluhan" placeholder="Keluhan" class="form-control" > 
                        </div>
						
                        <div class="col-lg-3">
						 <label for="Keterangan" class="control-label">Keterangan</label>
                          <input type="text" name="keterangan_pem" placeholder="Keterangan" class="form-control" > 
                        </div>
						
						 <div class="col-lg-3">
                        <label for="Tanggal Servis" class="control-label">Tanggal Servis</label>
                       
                          <input type="text" id="tgl1" data-rule-date="true" name="tgl_servis" placeholder="Tanggal Servis" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->


<div class="form-group">
<div class="col-lg-3">
                        <label for="Biaya Servis" class="control-label">Biaya Servis</label>
                        
                          <input type="text" data-rule-number="true" name="biaya_servis" placeholder="Biaya Servis" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->

					  
					  <input type="hidden" name="flag" placeholder="Flag" class="form-control" > 
					  <input type="hidden" name="tgl_servis_berikutnya" placeholder="Tanggal Servis Berikutnya" class="form-control" > 

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>pemeliharaan-aset" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            