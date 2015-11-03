
                <!-- Content Header (Page header) -->
                <section class="content-header">
                  
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>piutang-grosir">Transaksi Grosir</a></li>
                        <li class="active">Daftar Transaksi Grosir</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                 <h1 class="headingtable"><span>Data</span> Transaksi Grosir</h1>
								
								
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>Nota</th>
													<th>Tanggal</th>
													<th>Total Tagihan</th>
													<th>Sisa</th>
													<th>Jatuh Tempo</th>
													<th>Pelanggan</th>
													<th>Outlet</th>
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select penjualan_grosir.NO_NOTA_PENJUALAN,penjualan_grosir.TANGGAL,penjualan_grosir.SUB_TOTAL_PENJUALAN,penjualan_grosir.UANG_KEMBALI,penjualan_grosir.JATUH_TEMPO,pelanggan.NAMA_PELANGGAN,outlet.NAMA_OUTLET,penjualan_grosir.ID_PENJUALAN from penjualan_grosir  inner join pelanggan on penjualan_grosir.PELANGGAN=pelanggan.KODE_PELANGGAN inner join outlet on penjualan_grosir.OUTLET=outlet.KODE_OUTLET");
			$i=1;
			foreach ($dtb as $isi) {
				?><tr id="line_<?=$isi->ID_PENJUALAN;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->NO_NOTA_PENJUALAN;?></td>
<td><?=$isi->TANGGAL;?></td>
<td><?=$isi->SUB_TOTAL_PENJUALAN;?></td>
<td><?=$isi->UANG_KEMBALI;?></td>
<td><?=$isi->JATUH_TEMPO;?></td>
<td><?=$isi->NAMA_PELANGGAN;?></td>
<td><?=$isi->NAMA_OUTLET;?></td>

        <td>
        <a href="<?=base_index();?>piutang-grosir/detail/<?=$isi->ID_PENJUALAN;?>" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-eye-open"></i></a> 
    
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
        
