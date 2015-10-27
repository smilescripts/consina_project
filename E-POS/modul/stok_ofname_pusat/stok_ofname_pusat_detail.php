

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Stok Ofname Pusat
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>stok-ofname-pusat">Stok Ofname Pusat</a></li>
                        <li class="active">Detail Stok Ofname Pusat</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Stok Ofname Pusat</h3>
                                   
                                 </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="tanggal" class="control-label col-lg-2">ID</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->id;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
					  <div class="form-group">
                        <label for="tanggal" class="control-label col-lg-2">tanggal</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->tanggal;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="user_posting" class="control-label col-lg-2">user_posting</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->user_posting;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->


					  
					   <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                             <a href="<?=base_index();?>stok-ofname-pusat" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
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
                                    <h3 class="box-title">Data Barang Stok Offname</h3>
                                   
                                 </div>

								<div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>Kode Barang</th>
						  <th>Nama Barang</th>
													<th>Stok Aplikasi</th>
													<th>Stok Fisik</th>
													<th>Selisih</th>
													
											
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select detail_ofname_pusat.id_barang,detail_ofname_pusat.stok_apl,detail_ofname_pusat.stok_fisik,detail_ofname_pusat.selisih,barang_pusat.KODE_BARANG,barang_pusat.NAMA_BARANG from detail_ofname_pusat  inner join barang_pusat on detail_ofname_pusat.id_barang=barang_pusat.ID_BARANG where detail_ofname_pusat.id_head='$path_id'");
			$i=1;
			foreach ($dtb as $isi) {
				?><tr id="line_<?=$isi->id_head;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->KODE_BARANG;?></td>
		<td><?=$isi->NAMA_BARANG;?></td>
<td><?=$isi->stok_apl;?></td>
<td><?=$isi->stok_fisik;?></td>
<td><?=$isi->selisih;?></td>


       
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
        
