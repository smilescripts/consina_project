
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kelola Detail Pengadaan Aset
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>detail-pengadaan-aset">Detail Pengadaan Aset</a></li>
                        <li class="active">Daftar Detail Pengadaan Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">Daftar Detail Pengadaan Aset</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>Kode Pengadaan</th>
													<th>Kode Barang</th>
													<th>Kode Suplier</th>
													<th>No Polisi</th>
													<th>No Bpkb</th>
													<th>No Sertifikat</th>
													<th>No Faktur</th>
													<th>Tanggal Beli</th>
													<th>Harga Beli</th>
													<th>Jumlah</th>
													<th>User Posting</th>
													<th>Luas</th>
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select as_pengadaan.kode_pengadaan,as_pengadaan.kode_barang,as_pengadaan.kode_suplier,as_pengadaan.no_polisi,as_pengadaan.no_bpkb,as_pengadaan.no_sertifikat,as_pengadaan.no_faktur,as_pengadaan.tgl_beli,as_pengadaan.harga_beli,as_pengadaan.jumlah,as_pengadaan.user_posting,as_pengadaan.luas,as_pengadaan. from as_pengadaan ");
			$i=1;
			foreach ($dtb as $isi) {
				?><tr id="line_<?=$isi->;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->kode_pengadaan;?></td>
<td><?=$isi->kode_barang;?></td>
<td><?=$isi->kode_suplier;?></td>
<td><?=$isi->no_polisi;?></td>
<td><?=$isi->no_bpkb;?></td>
<td><?=$isi->no_sertifikat;?></td>
<td><?=$isi->no_faktur;?></td>
<td><?=$isi->tgl_beli;?></td>
<td><?=$isi->harga_beli;?></td>
<td><?=$isi->jumlah;?></td>
<td><?=$isi->user_posting;?></td>
<td><?=$isi->luas;?></td>

        <td>
        <a href="<?=base_index();?>detail-pengadaan-aset/detail/<?=$isi->;?>" class="btn btn-success btn-flat"><i class="fa fa-eye"></i></a> 
        <?=($role_act["up_act"]=="Y")?'<a href="'.base_index().'detail-pengadaan-aset/edit/'.$isi->.'" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></a>':"";?>  
        <?=($role_act["del_act"]=="Y")?'<button class="btn btn-danger hapus btn-flat" data-uri="'.base_admin().'modul/detail_pengadaan_aset/detail_pengadaan_aset_action.php" data-id="'.$isi->.'"><i class="fa fa-trash-o"></i></button>':"";?>
        </td>
        </tr>
				<?php
				$i++;
			}
			?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
        <?php
       foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url) {
                          if ($role_act["insert_act"]=="Y") {
                    ?>
          <a href="<?=base_index();?>detail-pengadaan-aset/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
                          <?php
                          } 
                       } 
}
?>  
                </section><!-- /.content -->
        
