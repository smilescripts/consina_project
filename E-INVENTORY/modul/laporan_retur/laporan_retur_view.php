
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kelola Laporan Retur
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>laporan-retur">Laporan Retur</a></li>
                        <li class="active">Daftar Laporan Retur</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">Daftar Laporan Retur</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>NO_NOTA_PENJUALAN</th>
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select retur_penjualan.NO_NOTA_PENJUALAN,retur_penjualan.NO_RETUR from retur_penjualan ");
			$i=1;
			foreach ($dtb as $isi) {
				?><tr id="line_<?=$isi->NO_RETUR;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->NO_NOTA_PENJUALAN;?></td>

        <td>
        <a href="<?=base_index();?>laporan-retur/detail/<?=$isi->NO_RETUR;?>" class="btn btn-success btn-flat"><i class="fa fa-eye"></i></a> 
        <?=($role_act["up_act"]=="Y")?'<a href="'.base_index().'laporan-retur/edit/'.$isi->NO_RETUR.'" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></a>':"";?>  
        <?=($role_act["del_act"]=="Y")?'<button class="btn btn-danger hapus btn-flat" data-uri="'.base_admin().'modul/laporan_retur/laporan_retur_action.php" data-id="'.$isi->NO_RETUR.'"><i class="fa fa-trash-o"></i></button>':"";?>
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
          <a href="<?=base_index();?>laporan-retur/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
                          <?php
                          } 
                       } 
}
?>  
                </section><!-- /.content -->
        
