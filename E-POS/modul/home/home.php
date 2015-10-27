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
        

       
          <!-- Main row -->
       
     
          <div class="row">
            <div class="col-md-12">
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                    <h1 class="headingtable"><span>Daftar</span> Penjualan</h1>
               
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
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
    