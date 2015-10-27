
                <!-- Content Header (Page header) -->
                <section class="content-header">
                  
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>transaksi-konsinyasi">Transaksi Konsinyasi</a></li>
                        <li class="active">Daftar Transaksi Konsinyasi</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                               
								  <h1 class="headingtable">Daftar Transaksi Konsinyasi</h1>
						
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>No.Nota Konsinyasi</th>
													<th>Tanggal</th>
													<th>Total Biaya</th>
													<th>Bayar</th>
													<th>Sisa</th>
													<th>Jatuh Tempo</th>
													<th>Outlet</th>
													<th>Supplier</th>
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select transaksi_konsinyasi.NO_NOTA_KONSINYASI,transaksi_konsinyasi.TANGGAL,transaksi_konsinyasi.SUB_TOTAL_PENJUALAN,transaksi_konsinyasi.UANG_BAYAR,transaksi_konsinyasi.UANG_KEMBALI,transaksi_konsinyasi.JATUH_TEMPO,outlet.NAMA_OUTLET,supplier.NAMA_SUPPLIER,transaksi_konsinyasi.ID_KONSINYASI from transaksi_konsinyasi  inner join outlet on transaksi_konsinyasi.OUTLET=outlet.KODE_OUTLET inner join supplier on transaksi_konsinyasi.SUPPLIER=supplier.ID_SUPPLIER");
			$i=1;
			foreach ($dtb as $isi) {
?><tr id="line_<?=$isi->ID_KONSINYASI;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->NO_NOTA_KONSINYASI;?></td>
<td><?=$isi->TANGGAL;?></td>
<td><?=$isi->SUB_TOTAL_PENJUALAN;?></td>
<td><?=$isi->UANG_BAYAR;?></td>
<td><?=$isi->UANG_KEMBALI;?></td>
<td><?=$isi->JATUH_TEMPO;?></td>
<td><?=$isi->NAMA_OUTLET;?></td>
<td><?=$isi->NAMA_SUPPLIER;?></td>

        <td>
        <a href="<?=base_index();?>data-transaksi-konsinyasi/detail/<?=$isi->ID_KONSINYASI;?>" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-eye-open"></i></a> 
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
     
                </section><!-- /.content -->
        
