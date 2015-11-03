
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kelola Stock Adjustment Outlet
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>stock-adjustment-outlet">Stock Adjustment Outlet</a></li>
                        <li class="active">Daftar Stock Adjustment Outlet</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                  <?php
       foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url) {
                          if ($role_act["insert_act"]=="Y") {
                    ?>
          <a href="<?=base_index();?>stock-adjustment-outlet/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
                          <?php
                          } 
                       } 
}
?>  
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>Tanggal</th>
													<th>No Penyesuaian</th>
													<th>Kode Barang</th>
													<th>Nama Barang</th>
													<th>Jumlah</th>
													<th>Jenis</th>
													<th>User Posting</th>
													
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select penyesuaian_stok_outlet.tanggal,penyesuaian_stok_outlet.no_penyesuaian,penyesuaian_stok_outlet.id_barang,penyesuaian_stok_outlet.tambah,penyesuaian_stok_outlet.kurang,penyesuaian_stok_outlet.keterangan,penyesuaian_stok_outlet.user_posting,barang_outlet.NAMA_BARANG,penyesuaian_stok_outlet.id from penyesuaian_stok_outlet  inner join barang_outlet on penyesuaian_stok_outlet.id_barang=barang_outlet.KODE_BARANG where penyesuaian_stok_outlet.outlet='$_SESSION[OUTLET_KODE]'");
			$i=1;
			foreach ($dtb as $isi) {
				?><tr id="line_<?=$isi->id;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->tanggal;?></td>
<td><?=$isi->no_penyesuaian;?></td>
<td><?=$isi->id_barang;?></td>
<td><?=$isi->NAMA_BARANG;?></td>
<?php
if($isi->kurang==0){
?>
<td><?=$isi->tambah;?></td>
<?php } 
if($isi->tambah==0){
?>
<td><?=$isi->kurang;?></td>
<?php } ?>
<td><?php
if($isi->tambah==0){
	echo 'Pengurangan';
}
if($isi->kurang==0){
	echo 'Penambahan';
}
?></td>
<td><?=$isi->user_posting;?></td>

        <td>
        <?=($role_act["del_act"]=="Y")?'<button class="btn btn-danger hapus btn-flat" data-uri="'.base_admin().'modul/stock_adjustment_outlet/stock_adjustment_outlet_action.php" data-id="'.$isi->id.'"><i class="glyphicon glyphicon-trash"></i></button>':"";?>
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
        
