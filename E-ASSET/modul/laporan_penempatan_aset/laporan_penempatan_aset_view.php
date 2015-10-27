
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Laporan Penempatan Aset
                    </h1>
                        <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>laporan-penempatan-aset">Laporan Penempatan Aset</a></li>
                        <li class="active">Daftar Laporan Penempatan Aset</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                           
								
                                </div><!-- /.box-header -->
                                <hr/>
								<div class="box-body table-responsive">
                                    <table id="laporan_penempatan_aset_dtb" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>

                         
												
													<th>Barang</th>
													<th>Cabang</th>
													<th>Unit</th>
													<th>Ruangan</th>
														<th>Tanggal Posting</th>
													<th>User Posting</th>
													<th>Status</th>
													
                         
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
var dataTable = $("#laporan_penempatan_aset_dtb").dataTable({
           "fnCreatedRow": function( nRow, aData, iDataIndex ) {
           
   },
           'bProcessing': true,
            'bServerSide': true,
        'sAjaxSource': '<?=base_admin();?>modul/laporan_penempatan_aset/laporan_penempatan_aset_data.php',
         /*     'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [0]
            }]*/
        });</script>  
            