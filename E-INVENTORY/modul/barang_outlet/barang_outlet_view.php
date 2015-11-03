
                <!-- Content Header (Page header) -->
                <section class="content-header">
                  
                        <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>barang-outlet">Barang outlet</a></li>
                        <li class="active">Daftar Barang outlet</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                 <h1 class="headingtable"><span>Kelola</span> Barang Outlet</h1>
							
								<?php 
								 foreach ($db->fetch_all("sys_menu") as $isi) {
							if ($path_url==$isi->url) {
							if ($role_act["insert_act"]=="Y") {
							?>
						
							<div class="btnbantuan" style="margin-top: -55px;">
							<a href="<?=base_index();?>barang-outlet/tambah" style="border-radius:20px" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i>Tambah Data</a>
							</div>
                            <?php
                            } 
							} 
							}
							?>
								
                             
								<div class="box-body table-responsive">
                                    <table id="barang_outlet_dtb" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>

                          <th>Kode barang</th>
													<th>Barcode</th>
													<th>Nama barang</th>
													<th>Harga jual</th>
													<th>Stok</th>
													<th>Kategori</th>
													<th>Satuan</th>
													
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
  $edit = '<a href="'.base_index()."barang-outlet/edit/'+aData[indek]+'".'" alt="Ubah" title="Ubah" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-pencil"></i></a>';
  } else {
    $edit ="";
  }
  if ($role_act['del_act']=='Y') {
   $del = "<span data-id='+aData[indek]+' data-uri=".base_admin()."modul/barang_outlet/barang_outlet_action.php".' alt="Hapus" title="Hapus" class="btn btn-danger hapus btn-flat"><i class="glyphicon glyphicon-trash"></i></span>';
  } else {
    $del="";
  }
                   } 
  }
  
?>  
                </section><!-- /.content -->
        <script type="text/javascript">
var dataTable = $("#barang_outlet_dtb").dataTable({
           "fnCreatedRow": function( nRow, aData, iDataIndex ) {
            var indek = aData.length-1;           
     $('td:eq('+indek+')', nRow).html(' <a href="<?=base_index();?>barang-outlet/detail/'+aData[indek]+'" alt="Detail" title="Detail" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-eye-open"></i></a> <?=$edit;?> <?=$del;?>');
       $(nRow).attr('id', 'line_'+aData[indek]);
   },
           'bProcessing': true,
            'bServerSide': true,
        'sAjaxSource': '<?=base_admin();?>modul/barang_outlet/barang_outlet_data.php',
         /*     'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [0]
            }]*/
        });</script>  
            