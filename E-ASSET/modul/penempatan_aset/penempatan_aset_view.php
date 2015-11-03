
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kelola Penempatan Aset
                    </h1>
                        <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>penempatan-aset">Penempatan Aset</a></li>
                        <li class="active">Daftar Penempatan Aset</li>
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
							<a href="<?=base_index();?>penempatan-aset/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i>Tambah Data</a>
                            <?php
                            } 
							} 
							}
							?>
								
                                </div><!-- /.box-header -->
                                <hr/>
								<div class="box-body table-responsive">
                                    <table id="penempatan_aset_dtb" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>

                         
													<th>Aset</th>
													<th>Cabang</th>
													<th>Unit</th>
													<th>Ruangan</th>
													 <th>Jumlah</th>
													
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
 
                </section><!-- /.content -->
        <script type="text/javascript">
var dataTable = $("#penempatan_aset_dtb").dataTable({
           "fnCreatedRow": function( nRow, aData, iDataIndex ) {
            var indek = aData.length-1;           
     $('td:eq('+indek+')', nRow).html(' <a href="<?=base_index();?>penempatan-aset/detail/'+aData[indek]+'" alt="Detail" title="Detail" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-eye-open"></i></a>');
       $(nRow).attr('id', 'line_'+aData[indek]);
   },
           'bProcessing': true,
            'bServerSide': true,
        'sAjaxSource': '<?=base_admin();?>modul/penempatan_aset/penempatan_aset_data.php',
         /*     'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [0]
            }]*/
        });</script>  
            