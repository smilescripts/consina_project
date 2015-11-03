
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>item-transfer">Item Transfer</a></li>
                        <li class="active">Daftar Item Transfer</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                               <h1 class="headingtable"><span>Daftar</span> Item Transfer</h1>
							
                              	<?php 
								 foreach ($db->fetch_all("sys_menu") as $isi) {
							if ($path_url==$isi->url) {
							if ($role_act["insert_act"]=="Y") {
							?>
					
							<div class="btnbantuan" style="margin-top: -55px;">
							<a href="<?=base_index();?>item-transfer/tambah" style="border-radius:20px" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i>Tambah Transfer</a>
							</div>
                            <?php
                            } 
							} 
							}
							?>
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>No.Transfer</th>
													<th>Tanggal</th>
													<th>Kasir</th>
													<th>Total</th>
													<th>Outlet</th>
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select * from item_transfer");
			$i=1;
			foreach ($dtb as $isi) {
				?><tr id="line_<?=$isi->ID_TRANSFER;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->NO_TRANSFER;?></td>
<td><?=$isi->TANGGAL;?></td>
<td><?=$isi->OPERATOR_KASIR;?></td>
<td><?=$isi->SUB_TOTAL_PENJUALAN;?></td>
<td><?=$isi->OUTLET;?></td>

        <td>
        <a href="<?=base_index();?>item-transfer/detail/<?=$isi->ID_TRANSFER;?>" class="btn btn-success btn-flat"><i class="fa fa-eye"></i></a> 
        <?=($role_act["up_act"]=="Y")?'<a href="'.base_index().'item-transfer/edit/'.$isi->ID_TRANSFER.'" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></a>':"";?>  
        <?=($role_act["del_act"]=="Y")?'<button class="btn btn-danger hapus btn-flat" data-uri="'.base_admin().'modul/item_transfer/item_transfer_action.php" data-id="'.$isi->ID_TRANSFER.'"><i class="fa fa-trash-o"></i></button>':"";?>
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
          <a href="<?=base_index();?>item-transfer/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
                          <?php
                          } 
                       } 
}
?>  
                </section><!-- /.content -->
        
