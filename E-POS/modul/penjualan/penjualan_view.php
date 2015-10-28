
                <!-- Content Header (Page header) -->
                <section class="content-header">
                
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>penjualan">Penjualan</a></li>
                        <li class="active">Daftar Penjualan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                               <h1 class="headingtable"><span>Daftar</span> Penjualan</h1>
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>No.Nota penjualan</th>
													<th>Tanggal</th>
													<th>Grand Total</th>
													<th>Tipe Pembayaran</th>
													<th>Operator Kasir</th>
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
$GETUSER = $db->fetch_single_row("outlet","KODE_OUTLET",$_SESSION["OUTLET_KODE"]);
$KODEOUTLET=$GETUSER->KODE_OUTLET;
$NAMA_OUTLET=$GETUSER->NAMA_OUTLET;
$LOKASI=$GETUSER->LOKASI;
<<<<<<< HEAD
			$dtb=$db->fetch_custom("select penjualan.NO_NOTA_PENJUALAN,penjualan.TANGGAL,penjualan.SUB_TOTAL_PENJUALAN,penjualan.TIPE_PEMBAYARAN,sys_users.first_name,penjualan.ID_PENJUALAN from penjualan  inner join sys_users on penjualan.OPERATOR_KASIR=sys_users.id where penjualan.OUTLET='$KODEOUTLET' order by date(penjualan.TANGGAL) desc");
=======
			$dtb=$db->fetch_custom("select penjualan.STATUS, penjualan.NO_NOTA_PENJUALAN,penjualan.TANGGAL,penjualan.SUB_TOTAL_PENJUALAN,penjualan.TIPE_PEMBAYARAN,sys_users.first_name,penjualan.ID_PENJUALAN from penjualan  inner join sys_users on penjualan.OPERATOR_KASIR=sys_users.id where penjualan.OUTLET='$KODEOUTLET' order by date(penjualan.TANGGAL) desc");
>>>>>>> origin/master
			$i=1;
			foreach ($dtb as $isi) {
				?><tr id="line_<?=$isi->ID_PENJUALAN;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->NO_NOTA_PENJUALAN;?></td>
<td><?=$isi->TANGGAL;?></td>
<td>Rp.<?=number_format($isi->SUB_TOTAL_PENJUALAN);?></td>
<td><?=$isi->TIPE_PEMBAYARAN;?></td>

<td><?=$isi->first_name;?></td>

        <td>
        <a href="<?=base_index();?>penjualan/detail/<?=$isi->ID_PENJUALAN;?>" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-eye-open"></i></a> 
<<<<<<< HEAD
        <?/* =($role_act["up_act"]=="Y")?'<a href="'.base_index().'penjualan/edit/'.$isi->ID_PENJUALAN.'" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></a>':""; */?>  
        <?/* =($role_act["del_act"]=="Y")?'<button class="btn btn-danger hapus btn-flat" data-uri="'.base_admin().'modul/penjualan/penjualan_action.php" data-id="'.$isi->ID_PENJUALAN.'"><i class="fa fa-trash-o"></i></button>':""; */?>
=======
        <a href="<?=base_index();?>penjualan/batal/<?=$isi->ID_PENJUALAN;?>" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-pencil"></i></a> 
>>>>>>> origin/master
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
        
