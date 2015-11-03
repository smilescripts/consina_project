
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Laporan Aset
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>laporan-aset">Laporan Aset</a></li>
                        <li class="active">Daftar Laporan Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">Daftar Laporan Aset</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>Kode Aset</th>
                          <th>Nama Aset</th>
													<th>Merek</th>
													<th>Tipe</th>
													<th>Total Unit</th>
													
                          
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select as_aset.kode_barang,as_aset.nm_barang,as_aset.merk,as_aset.tipe,as_aset.total_unit,as_aset.kode_barang from as_aset ");
			$i=1;
			$grantot=0;
			foreach ($dtb as $isi) {
				$tinven = $db->fetch_custom_single("select SUM(jumlah)as tot from as_inventarisasi where kode_barang='$isi->kode_barang' and status='0'");
				
				$grantot=$grantot+($isi->total_unit+$tinven->tot);
				?><tr id="line_<?=$isi->kode_barang;?>">
        <td align="center"><?=$i;?></td>
		<td><?=$isi->kode_barang;?></td>
		<td><?=$isi->nm_barang;?></td>
<td><?=$isi->merk;?></td>
<td><?=$isi->tipe;?></td>
<td><?=$isi->total_unit+$tinven->tot;?></td>

        
        </tr>
				<?php
				$i++;
			}
			?>
                                        </tbody>
										<tfoot>
										<tr>
										<td colspan="5" style="text-align:right;"><strong>TOTAL ASET</strong></td>
										<td><strong><?=$grantot;?></strong></td>
										</tr>
										</tfoot>
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
          <a href="<?=base_index();?>laporan-aset/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
                          <?php
                          } 
                       } 
}
?>  
                </section><!-- /.content -->
        
