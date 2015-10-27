
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage State
                    </h1>
                        <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                        <li><a href="<?=base_index();?>state">State</a></li>
                        <li class="active">State List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                <h3 class="box-title">List State</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="state_dtb" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>

                          <th>State Name</th>
													
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

          <a href="<?=base_index();?>state/tambah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
                          <?php

     
  $edit = '<a href="'.base_index()."state/edit/'+aData[indek]+'".'" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-pencil"></i></a>';

   $del = "<span data-id='+aData[indek]+' data-uri=".base_admin()."modul/state/state_action.php".' class="btn btn-danger hapus btn-flat"><i class="glyphicon glyphicon-trash"></i></span>';

  
?>  
                </section><!-- /.content -->
        <script type="text/javascript">
var dataTable = $("#state_dtb").dataTable({
           "fnCreatedRow": function( nRow, aData, iDataIndex ) {
            var indek = aData.length-1;           
     $('td:eq('+indek+')', nRow).html(' <a href="<?=base_index();?>state/detail/'+aData[indek]+'" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-eye-open"></i></a> <?=$edit;?> <?=$del;?>');
       $(nRow).attr('id', 'line_'+aData[indek]);
   },
           'bProcessing': true,
            'bServerSide': true,
        'sAjaxSource': '<?=base_admin();?>modul/state/state_data.php',
         /*     'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [0]
            }]*/
        });</script>  
            