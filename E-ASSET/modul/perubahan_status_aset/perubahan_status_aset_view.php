
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kelola Perubahan Status Aset
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>perubahan-status-aset">Perubahan Status Aset</a></li>
                        <li class="active">Daftar Perubahan Status Aset</li>
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
          <a href="<?=base_index();?>perubahan-status-aset/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
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
                          <th>Kode Inventarisasi</th>
						  <th>Status Sebelum</th>
													<th>Status Sesudah</th>
													<th>Tanggal Ubah</th>
													<th>Keterangan</th>
													<th>User Ubah</th>
													
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select as_history_ubah.kode_inventarisasi,as_history_ubah.status_after,as_history_ubah.tgl_ubah,as_history_ubah.keterangan_ubah,as_history_ubah.user_ubah,as_status.nm_status,as_history_ubah.id_history from as_history_ubah  inner join as_status on as_history_ubah.status_before=as_status.status");
			$i=1;
			foreach ($dtb as $isi) {
				$tstatus = $db->fetch_custom_single("select * from as_status where status='$isi->status_after'");
				?><tr id="line_<?=$isi->id_history;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->kode_inventarisasi;?></td>
		<td><?=$isi->nm_status;?></td>
<td><?=$tstatus->nm_status;?></td>
<td><?=$isi->tgl_ubah;?></td>
<td><?=$isi->keterangan_ubah;?></td>
<td><?=$isi->user_ubah;?></td>


        <td>
        <?=($role_act["del_act"]=="Y")?'<button class="btn btn-danger hapus btn-flat" data-uri="'.base_admin().'modul/perubahan_status_aset/perubahan_status_aset_action.php" data-id="'.$isi->id_history.'"><i class="glyphicon glyphicon-trash"></i></button>':"";?>
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
        
