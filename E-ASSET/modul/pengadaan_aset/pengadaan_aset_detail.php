

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Pengadaan Aset
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>pengadaan-aset">Pengadaan Aset</a></li>
                        <li class="active">Detail Pengadaan Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Data Pengadaan Aset</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="kode_pengadaan" class="control-label col-lg-2">Kode Pengadaan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->kode_pengadaan;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
					  <div class="form-group">
                        <label for="tanggal_pengadaan" class="control-label col-lg-2">Tanggal Pengadaan</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=tgl_indo($data_edit->tanggal_pengadaan);?>" class="form-control">
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
                             <a href="<?=base_index();?>pengadaan-aset" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
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
                                    <h3 class="box-title">Detail Pengadaan Aset</h3>
                                   
                                 </div>

                  <div class="box-body">
				    <?php
       foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url) {
                          if ($role_act["insert_act"]=="Y") {
                    ?>
          <a href="<?=base_index();?>detail-pengadaan-aset/tambah/<?=$data_edit->kode_pengadaan?>" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
                                                   <?php
                          } 
                       } 
}
?>
				  <div class="box-body table-responsive">
                   <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
													<th>Kode Barang</th>
													<th>Nama Barang</th>
													<th>Suplier</th>
													<th>Jumlah</th>
													<th>Harga Beli</th>
													<th>No Faktur</th>
													<th>SubTotal</th>
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select as_pengadaan.kode_pengadaan,as_pengadaan.kode_barang,as_pengadaan.kode_suplier,as_pengadaan.no_polisi,as_pengadaan.no_bpkb,as_pengadaan.no_sertifikat,as_pengadaan.no_faktur,as_pengadaan.tgl_beli,as_pengadaan.harga_beli,as_pengadaan.jumlah,as_pengadaan.user_posting,as_pengadaan.luas,as_pengadaan.kode_pengadaan from as_pengadaan where kode_pengadaan='$path_id'");
			$i=1;
			foreach ($dtb as $isi) {
				$taset=$db->fetch_custom_single("select * from as_aset where kode_barang='$isi->kode_barang'");
				$tsuplier=$db->fetch_custom_single("select * from as_suplier where kode_suplier='$isi->kode_suplier'");
				?><tr id="line_<?=$isi->kode_pengadaan;?>_<?=$isi->kode_barang;?>">
        <td align="center"><?=$i;?></td>
<td><?=$isi->kode_barang;?></td>
<td><?=$taset->nm_barang;?></td>
<td><?=$tsuplier->nm_suplier;?></td>
<td><?=$isi->jumlah;?></td>
<td><?=$isi->harga_beli;?></td>
<td><?=$isi->no_faktur;?></td>
<td><?=$isi->jumlah*$isi->harga_beli;?></td>

        <td>
        <a href="<?=base_index();?>detail-pengadaan-aset/detail/<?=$path_id;?>/<?=$isi->kode_barang;?>" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-eye-open"></i></a> 
        <?=($role_act["up_act"]=="Y")?'<a href="'.base_index().'detail-pengadaan-aset/edit/'.$path_id.'/'.$isi->kode_barang.'" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-pencil"></i></a>':"";?>  
        </td>
        </tr>
				<?php
				$i++;
			}
			?>
                                        </tbody>
                                    </table>
                                
                </div>
          
                  </div>
                  </div>
              </div>
</div>

			   </section><!-- /.content -->
        
