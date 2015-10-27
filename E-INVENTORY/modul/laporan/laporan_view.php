
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kelola Cetak Barcode
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>cetak-barcode">Cetak Barcode</a></li>
                        <li class="active">Daftar Cetak Barcode</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">Daftar Cetak Barcode</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th></th>
                          <th>Barcode</th>
													<th>Lebar</th>
													<th>Tinggi</th>
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select cetak_barcode.BARCODE,cetak_barcode.LEBAR,cetak_barcode.TINGGI,cetak_barcode.ID from cetak_barcode ");
			$i=1;
			foreach ($dtb as $isi) {
				?><tr id="line_<?=$isi->ID;?>">
				<td align="center"><?=$i;?></td>
<td align="center"><img src="../inc/barcode.php?codetype=Code128&size=40&text='<?=$isi->BARCODE;?>'"/></td>

<td><?=$isi->BARCODE;?></td>
<td><?=$isi->LEBAR;?></td>
<td><?=$isi->TINGGI;?></td>

        <td>
        <a href="<?=base_index();?>cetak-barcode/detail/<?=$isi->ID;?>" class="btn btn-success btn-flat"><i class="fa fa-eye"></i></a> 
        <?=($role_act["up_act"]=="Y")?'<a href="'.base_index().'cetak-barcode/edit/'.$isi->ID.'" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></a>':"";?>  
        <?=($role_act["del_act"]=="Y")?'<button class="btn btn-danger hapus btn-flat" data-uri="'.base_admin().'modul/cetak_barcode/cetak_barcode_action.php" data-id="'.$isi->ID.'"><i class="fa fa-trash-o"></i></button>':"";?>
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
          <a href="<?=base_index();?>cetak-barcode/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
                          <?php
                          } 
                       } 
}
?>  
                </section><!-- /.content -->
        
