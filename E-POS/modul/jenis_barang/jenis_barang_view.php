
                <!-- Content Header (Page header) -->
                <section class="content-header">
                 
                        <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>jenis-barang">Jenis Barang</a></li>
                        <li class="active">Daftar Jenis Barang</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
							 <h1 class="headingtable"><span>Kelola</span> Jenis Barang</h1>
							
                              	<?php 
								 foreach ($db->fetch_all("sys_menu") as $isi) {
							if ($path_url==$isi->url) {
							if ($role_act["insert_act"]=="Y") {
							?>
					
							<div class="btnbantuan" style="margin-top: -55px;">
							<a href="<?=base_index();?>jenis-barang/tambah" style="border-radius:20px" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i>Tambah Data</a>
							</div>
                            <?php
                            } 
							} 
							}
							?>
								
                           
								<div class="box-body table-responsive">
                                    <table id="jenis_barang_dtb" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>

                          <th>Kode</th>
													<th>Nama</th>
													<th>Keterangan</th>
													<th>Golongan</th>
													
							<th>Aksi</th>
                         
							</tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
        <?php
      
      
  foreach ($db->fetch_all("sys_menu") as $isi) {

  //jika url = url dari table menu
  if ($path_url==$isi->url) {
    //check edit permission
  if ($role_act["up_act"]=="Y") {
  $edit = '<a href="'.base_index()."jenis-barang/edit/'+aData[indek]+'".'" alt="Ubah" title="Ubah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-pencil"></i></a>';
  } else {
    $edit ="";
  }
  if ($role_act['del_act']=='Y') {
   $del = "<span data-id='+aData[indek]+' data-uri=".base_admin()."modul/jenis_barang/jenis_barang_action.php".' alt="Hapus" title="Hapus" class="btn btn-danger hapus btn-flat"><i class="glyphicon glyphicon-trash"></i></span>';
  } else {
    $del="";
  }
                   } 
  }
  
?>  
                </section><!-- /.content -->
        <script type="text/javascript">
var dataTable = $("#jenis_barang_dtb").dataTable({
           "fnCreatedRow": function( nRow, aData, iDataIndex ) {
            var indek = aData.length-1;           
     $('td:eq('+indek+')', nRow).html(' <a href="<?=base_index();?>jenis-barang/detail/'+aData[indek]+'" alt="Detail" title="Detail" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-eye-open"></i></a> <?=$edit;?> <?=$del;?>');
       $(nRow).attr('id', 'line_'+aData[indek]);
   },
           'bProcessing': true,
            'bServerSide': true,
        'sAjaxSource': '<?=base_admin();?>modul/jenis_barang/jenis_barang_data.php',
         /*     'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [0]
            }]*/
        });</script>  
            