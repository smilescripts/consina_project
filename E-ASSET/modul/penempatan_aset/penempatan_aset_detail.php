

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Penempatan Aset
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>penempatan-aset">Penempatan Aset</a></li>
                        <li class="active">Detail Penempatan Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Data Penempatan Aset</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="Kode Aset" class="control-label col-lg-2">Kode Aset</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_aset") as $isi) {
               		if ($data_edit->kode_barang==$isi->kode_barang) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_barang'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Cabang" class="control-label col-lg-2">Cabang</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_cabang") as $isi) {
               		if ($data_edit->kode_cabang==$isi->kode_cabang) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_cabang'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Unit Kerja" class="control-label col-lg-2">Unit Kerja</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_unit_kerja") as $isi) {
               		if ($data_edit->kode_unit==$isi->kode_unit) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_unit'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Ruangan" class="control-label col-lg-2">Ruangan</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("as_ruangan") as $isi) {
               		if ($data_edit->kode_ruangan==$isi->kode_ruangan) {

               			echo "<input disabled class='form-control' type='text' value='$isi->nm_ruangan'>";
               		}
               } ?>
              
                        </div>
                      </div><!-- /.form-group -->


					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>penempatan-aset" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div>
                    </form>
                
          
                  </div>
                  </div>
              </div>
</div>
                  
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Penempatan Aset</h3>
                                   
                                 </div>

                  <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>Kode Inventarisasi</th>
													<th>Kondisi</th>
													<th>Tanggal Posting</th>
													<th>User Posting</th>
													<th>Status</th>
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select as_status.nm_status,as_inventarisasi.kode_inventarisasi,as_inventarisasi.kode_barang,as_inventarisasi.kondisi,as_inventarisasi.tgl_posting,as_inventarisasi.user_posting,as_inventarisasi.status,as_inventarisasi.kode_inventarisasi from as_inventarisasi 
			inner join as_status on as_inventarisasi.status=as_status.status where 
			as_inventarisasi.kode_barang='$data_edit->kode_barang' and as_inventarisasi.kode_cabang='$data_edit->kode_cabang' 
			and as_inventarisasi.kode_ruangan='$data_edit->kode_ruangan' and as_inventarisasi.kode_unit='$data_edit->kode_unit'");
			$i=1;
			foreach ($dtb as $isi) {
				?><tr id="line_<?=$isi->kode_inventarisasi;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->kode_inventarisasi;?></td>
<td><?=$isi->kondisi;?></td>
<td><?=$isi->tgl_posting;?></td>
<td><?=$isi->user_posting;?></td>
<td><?=$isi->nm_status;?></td>

        <td>
		<?php if($isi->status==0){ ?>
        <?=($role_act["del_act"]=="Y")?'<button class="btn btn-danger hapus btn-flat" data-uri="'.base_admin().'modul/penempatan_aset/penempatan_aset_action.php" data-id="'.$isi->kode_inventarisasi.'"><i class="glyphicon glyphicon-trash"></i></button>':"";?>
        <?php } ?>
		</td>
        </tr>
				<?php
				$i++;
			}
			?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
