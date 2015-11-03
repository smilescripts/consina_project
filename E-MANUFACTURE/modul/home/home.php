        <!-- Content Header (Page header) -->
     
<div style="width:100%; height:100px; background-color:#ecf0f5;">
			<table width="100%">
                <tr>
                    <td class="col-sm-1" rowspan="2"><img alt="Brand" src="<?=base_admin();?><?=$profil->logo; ?>" style="width:75px; height:75;"/></td>
                    <td class="col-sm-12" style="border-bottom:1pt solid green;">
                        <h3 style="color:<?=$profil->COLOR; ?>;"><?=$profil->NAMA_PERUSAHAAN; ?></h3>
                    </td>
		</tr>
		<tr>
                    <td class="col-sm-12">
                        <h4 style="color:<?=$profil->COLOR; ?>;">Online Sistem Point Of Sale</h4>
                    </td>
		</tr>
            </table>
		</div>
	
        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
         
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

          
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Rekap laporan bulanan</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <p class="text-center">
                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                      </p>
                      <div class="chart-responsive">
                        <!-- Sales Chart Canvas -->
                        <canvas id="salesChart" height="180"></canvas>
                      </div><!-- /.chart-responsive -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                        <h5 class="description-header">$35,210.43</h5>
                        <span class="description-text">TOTAL REVENUE</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                        <h5 class="description-header">$10,390.90</h5>
                        <span class="description-text">TOTAL COST</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                        <h5 class="description-header">$24,813.53</h5>
                        <span class="description-text">TOTAL PROFIT</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block">
                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                        <h5 class="description-header">1200</h5>
                        <span class="description-text">GOAL COMPLETIONS</span>
                      </div><!-- /.description-block -->
                    </div>
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Main row -->
       
     
          <div class="row">
            <div class="col-md-12">
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Penjualan terbaru</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                   <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode barang</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Qty</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
				<?php 
			
			$dtb=$db->fetch_custom("SELECT detail_penjualan.*,barang_pusat.* FROM detail_penjualan
		    INNER JOIN barang_pusat on barang_pusat.KODE_BARANG=detail_penjualan.KODE_BARANG");
			$i=1;
			foreach ($dtb as $isi) {
			?>
			<tr id="line_<?=$isi->KODE_BARANG;?>">
			<td align="center"><?=$i;?></td>
			<td><?=$isi->KODE_BARANG;?></td>
			<td><?=$isi->NAMA_BARANG;?></td>
			<td><?=$isi->STOK;?></td>
			<td>Rp.<?=number_format($isi->HARGA_BARANG);?></td>
			<td><?=$isi->DISKON;?> %</td>
			 <form  method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/kasir/kasir_action.php?act=ubah_scanner">
			 <input type="hidden" id="ID_TMP_PENJUALAN" name="ID_TMP_PENJUALAN[]" value="<?=$isi->ID_TMP_PENJUALAN;?>" >
			<td>X <?=$isi->JUMLAH;?></td>
			<td> 
			<?php 
			error_reporting(0);
			$diskon=$isi->DISKON/100*$isi->HARGA_BARANG;
			$jadi=($isi->HARGA_BARANG-$diskon) * $isi->JUMLAH;
			$subtotal=$jadi+$subtotal;
			
			echo 'Rp.'.number_format($jadi);
			
			?>
			</td>
			<?php
				$i++;
			}
			?>
				</tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->
 </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
    