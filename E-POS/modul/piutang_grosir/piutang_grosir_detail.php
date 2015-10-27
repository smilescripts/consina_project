

                <!-- Content Header (Page header) -->
                <section class="content-header">
                 
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>penjualan">Penjualan</a></li>
                        <li class="active">Detail Penjualan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row" >
    <div class="col-lg-12">
        <div class="box box-solid box-primary" >
                                   <div class="box-header">
                                    <h3 class="box-title">Sales Invoice</h3>
                                   
                                 </div>

                  <div class="box-body">
                    <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                 <i class="glyphicon glyphicon-list-alt" style="color:black"></i>&nbsp;<?=$data_edit->NO_NOTA_PENJUALAN;?>
                <small class="pull-right">Tanggal: <?=$data_edit->TANGGAL;?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
             
              <address>
                <strong></strong><br>
               Kasir:<?=$data_edit->OPERATOR_KASIR;?><br>
              
               Tipe:<?=$data_edit->TIPE_PEMBAYARAN;?><br>
               Diskon Penjualan:Rp.<?=number_format($data_edit->DISKON_PENJUALAN);?><br>
               Tax Sales:<?=number_format($data_edit->TAX_SALES);?><br>
              
              </address>
            </div><!-- /.col -->
           
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
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
			
			$dtb=$db->fetch_custom("SELECT detail_penjualan_grosir.*,barang_outlet.* FROM detail_penjualan_grosir
		    INNER JOIN barang_outlet on barang_outlet.KODE_BARANG=detail_penjualan_grosir.KODE_BARANG where detail_penjualan_grosir.NO_NOTA_PENJUALAN='$data_edit->NO_NOTA_PENJUALAN'");
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

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">Catatan Kasir:</p>
             
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
             <?=$data_edit->CATATAN;?>
              </p>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <p class="lead"></p>
              <div class="table-responsive">
                <table class="table">
                  
                  <tr>
                    <th>Sub-total</th>
                    <td><?=number_format($subtotal);?></td>
                  </tr> 
				   <tr>
                    <th>Biaya Kirim</th>
                    <td><?=number_format($data_edit->BIAYA_KIRIM);?></td>
                  </tr> 
				  <tr>
                    <th>Tax sales</th>
                    <td><?=number_format($data_edit->TAX_SALES);?></td>
                  </tr> 
				  <tr>
                    <th>Diskon penjualan</th>
                    <td><?=number_format($data_edit->DISKON_PENJUALAN);?></td>
                  </tr>
                 <tr>
                    <th style="width:50%">Grand total:</th>
                    <td><?=number_format($data_edit->SUB_TOTAL_PENJUALAN);?></td>
                  </tr>
				  <tr>
                    <th style="width:50%">Telah Dibayar:</th>
                    <td><?=number_format($data_edit->UANG_BAYAR);?></td>
                  </tr>
				  <tr>
                    <th style="width:50%">Sisa:</th>
                    <td><?=number_format($data_edit->UANG_KEMBALI);?></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              
              <button onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i>PRINT</button>
			  <?php if($data_edit->UANG_KEMBALI!='0'){?>
			  <a href="<?=base_index();?>piutang-grosir/edit/<?php echo $data_edit->ID_PENJUALAN;?>" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i>PELUNASAN</a>
			  <?php } ?>
            </div>
          </div>
        </section><!-- /.content -->
     
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
         
