				

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kelola Produksi
                    </h1>
                        <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>kalkulasi-bahan">Produksi</a></li>
                        <li class="active">Daftar Produksi Barang</li>
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
							<a href="<?=base_index();?>kalkulasi-bahan/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i>Tambah Data</a>
                            <?php
                            } 
							} 
							}
							?>
								
                                </div><!-- /.box-header -->
                                <hr/>
								<div class="box-body table-responsive">
                                    <table id="kalkulasi_bahan_dtb" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>

                          <th>Kode Produksi</th>
                          <th>Tanggal Produksi</th>
                          <th>Tanggal Selesai</th>
													<th>Status</th>
													
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
  $edit = '<a href="'.base_index()."kalkulasi-bahan/angsur?ubah='+aData[indek]+'".'" alt="Ubah" title="Ubah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-pencil"></i></a>';
  } else {
    $edit ="";
  }
  if ($role_act['del_act']=='N') {
   $del = "<span data-id='+aData[indek]+' data-uri=".base_admin()."modul/kalkulasi_bahan/kalkulasi_bahan_action.php".' alt="Hapus" title="Hapus" class="btn btn-danger hapus btn-flat"><i class="glyphicon glyphicon-trash"></i></span>';
  } else {
    $del="";
  }
                   } 
  }
  
?>  
                </section><!-- /.content -->
        <script type="text/javascript">
var dataTable = $("#kalkulasi_bahan_dtb").dataTable({
           "fnCreatedRow": function( nRow, aData, iDataIndex ) {
            var indek = aData.length-1;           
     $('td:eq('+indek+')', nRow).html(' <a href="<?=base_index();?>kalkulasi-bahan/detail?detaildua=ya&ubah='+aData[indek]+'" alt="Detail" title="Detail" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-eye-open"></i></a> <?=$edit;?> <?=$del;?>');
       $(nRow).attr('id', 'line_'+aData[indek]);
   },
           'bProcessing': true,
            'bServerSide': true,
        'sAjaxSource': '<?=base_admin();?>modul/kalkulasi_bahan/kalkulasi_bahan_data.php',
         /*     'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [0]
            }]*/
        });</script>  
            