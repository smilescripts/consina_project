
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kelola Pemeliharaan Aset
                    </h1>
                        <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>pemeliharaan-aset">Pemeliharaan Aset</a></li>
                        <li class="active">Daftar Pemeliharaan Aset</li>
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
							<a href="<?=base_index();?>pemeliharaan-aset/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i>Tambah Data</a>
                            <?php
                            } 
							} 
							}
							?>
								
                                </div><!-- /.box-header -->
                                <hr/>
								<div class="box-body table-responsive">
                                    <table id="pemeliharaan_aset_dtb" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>

                          <th>ID</th>
                          <th>Kode Inventarisasi</th>
													<th>Tanggal Servis</th>
													<th>Tempat Servis</th>
													<th>Keluhan</th>
													<th>Ket.</th>
													<th>Tanggal Posting</th>
													<th>User Posting</th>
													<th>Biaya Servis</th>
													
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

  if ($role_act['del_act']=='Y') {
   $del = "<span data-id='+aData[indek]+' data-uri=".base_admin()."modul/pemeliharaan_aset/pemeliharaan_aset_action.php".' alt="Hapus" title="Hapus" class="btn btn-danger hapus btn-flat"><i class="glyphicon glyphicon-trash"></i></span>';
  } else {
    $del="";
  }
                   } 
  }
  
?>  
                </section><!-- /.content -->
        <script type="text/javascript">
var dataTable = $("#pemeliharaan_aset_dtb").dataTable({
           "fnCreatedRow": function( nRow, aData, iDataIndex ) {
            var indek = aData.length-1;           
     $('td:eq('+indek+')', nRow).html(' <a href="<?=base_index();?>pemeliharaan-aset/detail/'+aData[indek]+'" alt="Detail" title="Detail" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-eye-open"></i></a> <?=$del;?>');
       $(nRow).attr('id', 'line_'+aData[indek]);
   },
           'bProcessing': true,
            'bServerSide': true,
        'sAjaxSource': '<?=base_admin();?>modul/pemeliharaan_aset/pemeliharaan_aset_data.php',
         /*     'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [0]
            }]*/
        });</script>  
            