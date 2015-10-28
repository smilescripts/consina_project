
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        .
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>mitra-usaha">Mitra Usaha</a></li>
                        <li class="active">Daftar Mitra Usaha</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                             <h1 class="headingtable">Mitra Usaha / Pelanggan</h1>
						
					
                           
								<?php 
								 foreach ($db->fetch_all("sys_menu") as $isi) {
							if ($path_url==$isi->url) {
							if ($role_act["insert_act"]=="Y") {
							?>
							<div class="btnbantuan" style="margin-top: -55px;">
							<a href="<?=base_index();?>mitra-usaha/tambah" style="border-radius:20px" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i>Tambah Data</a>
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
                          <th>Golongan</th>
													<th>Kode Pelanggan</th>
													<th>Nama</th>
													<th>Alamat</th>
													<th>Kota</th>
													
                          <th>Aksi</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
			$dtb=$db->fetch_custom("select pelanggan.GOLONGAN_PELANGGAN,pelanggan.KODE_PELANGGAN,pelanggan.NAMA_PELANGGAN,pelanggan.ALAMAT,pelanggan.KOTA,pelanggan.ID_PELANGGAN from pelanggan ");
			$i=1;
			foreach ($dtb as $isi) {
				?><tr id="line_<?=$isi->ID_PELANGGAN;?>">
        <td align="center"><?=$i;?></td><td><?=$isi->GOLONGAN_PELANGGAN;?></td>
<td><?=$isi->KODE_PELANGGAN;?></td>
<td><?=$isi->NAMA_PELANGGAN;?></td>
<td><?=$isi->ALAMAT;?></td>
<td><?=$isi->KOTA;?></td>

        <td>
        <a href="<?=base_index();?>mitra-usaha/detail/<?=$isi->ID_PELANGGAN;?>" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-eye-open"></i></a> 
        <?=($role_act["up_act"]=="Y")?'<a href="'.base_index().'mitra-usaha/edit/'.$isi->ID_PELANGGAN.'" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-pencil"></i></a>':"";?>  
        <?=($role_act["del_act"]=="Y")?'<button class="btn btn-danger hapus btn-flat" data-uri="'.base_admin().'modul/mitra_usaha/mitra_usaha_action.php" data-id="'.$isi->ID_PELANGGAN.'"><i class="glyphicon glyphicon-trash"></i></button>':"";?>
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
        
