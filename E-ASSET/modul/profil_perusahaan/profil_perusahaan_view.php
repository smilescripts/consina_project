
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Profil Perusahaan
                    </h1>
                        <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                        <li><a href="<?=base_index();?>profil-perusahaan">Profil Perusahaan</a></li>
                        <li class="active">Profil Perusahaan List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                <h3 class="box-title">List Profil Perusahaan</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="profil_perusahaan_dtb" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>

                          <th>Nama Perusahaan</th>
													<th>Email</th>
													<th>Phone 1</th>
													<th>Phone 2</th>
													<th>Kota</th>
													<th>Faximili</th>
													<th>Alamat</th>
													<th>Negara</th>
													<th>Logo</th>
													<th>Warna Tema</th>
													<th>Lokasi</th>
													
                          <th>Action</th>
                         
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
     
  $edit = '<a href="'.base_index()."profil-perusahaan/edit/'+aData[indek]+'".'" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-pencil"></i></a>';
?>  
                </section><!-- /.content -->
        <script type="text/javascript">
var dataTable = $("#profil_perusahaan_dtb").dataTable({
           "fnCreatedRow": function( nRow, aData, iDataIndex ) {
            var indek = aData.length-1;           
     $('td:eq('+indek+')', nRow).html(' <a href="<?=base_index();?>profil-perusahaan/detail/'+aData[indek]+'" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-eye-open"></i></a> <?=$edit;?>');
       $(nRow).attr('id', 'line_'+aData[indek]);
   },
           'bProcessing': true,
            'bServerSide': true,
        'sAjaxSource': '<?=base_admin();?>modul/profil_perusahaan/profil_perusahaan_data.php',
         /*     'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [0]
            }]*/
        });</script>  
            