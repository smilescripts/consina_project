
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kelola Lap_jual
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>lap_jual">Lap_jual</a></li>
                        <li class="active">Daftar Lap_jual</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">Daftar Lap_jual</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>NO_NOTA_PENJUALAN</th>
													<th>TANGGAL</th>
													<th>OPERATOR_KASIR</th>
													<th>NAMA_OUTLET</th>
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select penjualan.NO_NOTA_PENJUALAN,penjualan.TANGGAL,penjualan.OPERATOR_KASIR,outlet.NAMA_OUTLET,penjualan.ID_PENJUALAN from penjualan  inner join outlet on penjualan.OUTLET=outlet.KODE_OUTLET");
			$i=1;
			foreach ($dtb as $isi) {
				?><tr id="line_<?=$isi->ID_PENJUALAN;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->NO_NOTA_PENJUALAN;?></td>
<td><?=$isi->TANGGAL;?></td>
<td><?=$isi->OPERATOR_KASIR;?></td>
<td><?=$isi->NAMA_OUTLET;?></td>

        <td>
        <a href="<?=base_index();?>lap_jual/detail/<?=$isi->ID_PENJUALAN;?>" class="btn btn-success btn-flat"><i class="fa fa-eye"></i></a> 
        <?=($role_act["up_act"]=="Y")?'<a href="'.base_index().'lap_jual/edit/'.$isi->ID_PENJUALAN.'" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></a>':"";?>  
        <?=($role_act["del_act"]=="Y")?'<button class="btn btn-danger hapus btn-flat" data-uri="'.base_admin().'modul/lap_jual/lap_jual_action.php" data-id="'.$isi->ID_PENJUALAN.'"><i class="fa fa-trash-o"></i></button>':"";?>
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
          <a href="<?=base_index();?>lap-jual/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
                          <?php
                          } 
                       } 
}
?>  
                </section><!-- /.content -->
        
