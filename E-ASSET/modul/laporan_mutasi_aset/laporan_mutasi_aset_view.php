
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Laporan Mutasi Aset
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>laporan-mutasi-aset">Laporan Mutasi Aset</a></li>
                        <li class="active">Daftar Laporan Mutasi Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">Daftar Laporan Mutasi Aset</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>ID Mutasi</th>
                          <th>Tanggal Mutasi</th>
						  <th>Barang</th>
													<th>Ruang Lama</th>
													<th>Ruang Baru</th>
													<th>Unit Lama</th>
													<th>Unit Baru</th>
													<th>User Posting</th>
	
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select as_mutasi.id_mutasi,as_mutasi.tgl_mutasi,as_mutasi.user_posting,as_mutasi.ruang_baru,as_mutasi.unit_baru,as_cabang.nm_cabang,as_aset.nm_barang,as_ruangan.nm_ruangan,as_unit_kerja.nm_unit,as_mutasi.id_mutasi from as_mutasi  inner join as_cabang on as_mutasi.kode_cabang_lama=as_cabang.kode_cabang inner join as_aset on as_mutasi.kode_aset=as_aset.kode_barang inner join as_ruangan on as_mutasi.ruang_lama=as_ruangan.kode_ruangan inner join as_unit_kerja on as_mutasi.unit_lama=as_unit_kerja.kode_unit");
			$i=1;
			foreach ($dtb as $isi) {
				$truang = $db->fetch_custom_single("select * from as_ruangan where kode_ruangan='$isi->ruang_baru'");
				$tunit = $db->fetch_custom_single("select * from as_unit_kerja where kode_unit='$isi->unit_baru'");
				?><tr id="line_<?=$isi->id_mutasi;?>">
        <td align="center"><?=$i;?></td>
		<td><?=$isi->id_mutasi;?></td>
		<td><?=$isi->tgl_mutasi;?></td>
		<td><?=$isi->nm_barang;?></td>

<td><?=$isi->nm_ruangan;?></td>
<td><?=$truang->nm_ruangan;?></td>
<td><?=$isi->nm_unit;?></td>
<td><?=$tunit->nm_unit;?></td>
<td><?=$isi->user_posting;?></td>

       
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
    
                </section><!-- /.content -->
        
