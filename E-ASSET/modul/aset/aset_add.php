
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Aset
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>aset">Aset</a></li>
                        <li class="active">Tambah Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Aset</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/aset/aset_action.php?act=in">
                     
					  
					  <div class="form-group">
                        <label for="Nama Barang" class="control-label col-lg-2">Nama Barang</label>
                        <div class="col-lg-10">
                          <input type="text" name="nm_barang" placeholder="Nama Barang" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
					  
					  
<div class="form-group">
                        <label for="Golongan" class="control-label col-lg-2">Golongan</label>
                        <div class="col-lg-3">
                          <select name="kode_golongan" id="kode_golongan" onchange="getsubgolongan();" data-placeholder="Pilih Golongan ..." class="form-control chzn-select" tabindex="2" required>
               <option value=""></option>
               <?php foreach ($db->fetch_all("as_golongan") as $isi) {
               		echo "<option value='$isi->kode_golongan'>$isi->nm_golongan</option>";
               } ?>
              </select>
                        </div>
						
						<script type="text/javascript">
function getsubgolongan(){
	var kode_golongan = $('#kode_golongan').val();
	//alert(kode_golongan);
	$.ajax({
        url: "<?=base_admin();?>modul/aset/tsubgolongan.php",
        data: {kode_golongan: kode_golongan},
        cache: false,
		 type: 'POST',
        success: function(msg){
			//alert(msg);
            $("#tsub_golongan").html(msg);
			
        }
    });
}
</script>
						
						<label for="Sub Golongan" class="control-label col-lg-2">Sub Golongan</label>
                        <div class="tsub_golongan col-lg-3" id="tsub_golongan">
                          <select name="sub_golongan" data-placeholder="Pilih Sub Golongan ..." class="form-control chzn-select" tabindex="2" required>
             <option value="">Pilih Sub Golongan ...</option>
              </select>
                        </div>
						
                      </div><!-- /.form-group -->

<div class="form-group">
                        <label for="Merek" class="control-label col-lg-2">Merek</label>
                        <div class="col-lg-10">
                          <input type="text" name="merk" placeholder="Merek" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tipe" class="control-label col-lg-2">Tipe</label>
                        <div class="col-lg-4">
                          <input type="text" name="tipe" placeholder="Tipe" class="form-control" required> 
                        </div>
						
						<label for="Tahun" class="control-label col-lg-2">Tahun</label>
                        <div class="col-lg-3">
                          <input type="text" name="tahun" placeholder="Tahun" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
					  
					  <div class="form-group">
                        <label for="Jumlah Unit" class="control-label col-lg-2">Jumlah Unit</label>
                        <div class="col-lg-4">
                          <input type="text" data-rule-number="true" name="total_unit" placeholder="Jumlah Unit" class="form-control" required> 
                        </div>
						
						 <label for="masa_servis" class="control-label col-lg-2">Masa Servis</label>
                        <div class="col-lg-3">
                          <input type="text" data-rule-number="true" name="masa_servis" placeholder="masa_servis" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

					  <input type="hidden" name="volume" placeholder="Volume" class="form-control" > 
					  <input type="hidden" value="<?=date("Y-m-d");?>" name="tgl_entry" placeholder="tgl_entry" class="form-control" > 
					  <input type="hidden" value="<?=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username)?>" name="user_posting" placeholder="user_posting" class="form-control" > 

<div class="form-group">
                        <label for="Foto" class="control-label col-lg-2">Foto</label>
                        <div class="col-lg-6">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="input-group">
                              <div class="form-control uneditable-input span3" data-trigger="fileinput">
                                <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span> 
                              </div>
                              <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span> 
                                <input type="file" name="poto" >
                              </span> 
                              <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                            </div>
                          </div>
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>aset" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            