
<table  class="table table-bordered table-striped" id="tabledata">
                                    <thead>
                                     <tr>
                          <th style="width:25px" align="center">No</th>
                          <th>Kode barang</th>
                          <th>Nama</th>
						  <th>Jumlah</th>
						  <th>Aksi</th>
                          </tr>
                         </thead>
                         <tbody>
			<?php 
			session_start();
			include "../../inc/config.php";
			$dtb=$db->fetch_custom("select sum(tmp_pengiriman_barang.JUMLAH) as jumlahtotal,tmp_pengiriman_barang.ID_DETAIL_PENGIRIMAN,tmp_pengiriman_barang.KODE_BARANG,tmp_pengiriman_barang.JUMLAH,barang_pusat.NAMA_BARANG from tmp_pengiriman_barang  inner join barang_pusat on tmp_pengiriman_barang.KODE_BARANG=barang_pusat.KODE_BARANG group by tmp_pengiriman_barang.KODE_BARANG ");
			$i=1;
			foreach ($dtb as $isi) {
			?>
<tr id="line_<?=$isi->KODE_BARANG;?>">
<td align="center"><?=$i;?></td>
<td><?=$isi->KODE_BARANG;?></td>
<td><?=$isi->NAMA_BARANG;?></td>
<form method="post">
<td>
<input type="text" value="<?=$isi->jumlahtotal;?>" name="JUMLAH_UBAH" id="JUMLAH_UBAH" style="width:50px">
<input type="hidden" value="<?=$isi->ID_DETAIL_PENGIRIMAN;?>" name="ID_DETAIL_PENGIRIMAN_UBAH" id="ID_DETAIL_PENGIRIMAN_UBAH" style="width:50px">
</td>
<td>
<button type="submit" id="ubah_scanner" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-pencil"></i></button>
</form>
<a href="" class="btn btn-danger btn-flat"><i class="glyphicon glyphicon-trash"></i></a>
</td>
</tr>
				<?php
				$i++;
			}
			?>
						 </tbody>
                          
						 </table>
						