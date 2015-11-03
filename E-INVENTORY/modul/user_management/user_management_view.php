                <!-- Content Header (Page header) -->
                <section class="content-header">
                 
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>user-management">User Management</a></li>
                        <li class="active">User Management List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                    <h1 class="headingtable"><span>Daftar</span> Pengguna</h1>
						<div class="btnbantuan" style="margin-top:-55px;">
							<a href="<?=base_index();?>user-management/tambah" style="border-radius:20px" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i>Tambah</a>
							</div>
                                    <!--   <form action="" method="get" class="form_cari" >
                        <div class="input-group col-lg-6">
                 <span class="input-group-btn">
        <button class="btn btn-deglyphiconult" type="button">Pencarian !</button>
      </span>
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type="submit" id="search-btn" class="btn btn-flat"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>
                    </form>-->
                                <div class="box-body table-responsive">
                                    <table  class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          <th>Username</th>
							<th>Email</th>
							<th>level</th>
							<th>Parameter</th>

                          <th>Action</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         <?php 
      $limit =10;
        $search ="";
        if (isset($_GET["q"])) {
          $search_condition = $db->getRawWhereFilterForColumns
          ($_GET["q"], array("username","email","level",));
          $search = "where $search_condition";
        }

      $dtb=$pg->myquery("select sys_users.username,sys_users.outlet,outlet.NAMA_OUTLET,sys_users.email,sys_group_users.level,sys_users.id from sys_users 
	  inner join sys_group_users on sys_users.id_group=sys_group_users.id
	  inner join outlet on sys_users.outlet=outlet.KODE_OUTLET $search",$limit);
       $no=$pg->Num($limit);
        $count=$pg->Num($limit);
      if ($dtb->rowCount()<1) {
        echo "<tr><td colspan='5'>No matching records found</td></tr>";
      }
      foreach ($dtb as $isi) {
?><tr id="line_<?=$isi->id;?>"><td align="center"><?=$no;?></td><td><?=$isi->username;?></td>
<td><?=$isi->email;?></td>
<td><?=$isi->level;?></td>
<td><?=$isi->NAMA_OUTLET;?></td>
<td>
<a href="<?=base_index();?>user-management/detail/<?=$isi->id;?>" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i></a> 
<a href="<?=base_index();?>user-management/edit/<?=$isi->id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
<a href="<?=base_index();?>user-management/reset/<?=$isi->id;?>" class="btn btn-danger">Reset</a>
<button class="btn btn-danger hapus" data-uri="<?=base_admin();?>modul/user_management/user_management_action.php" data-id="<?=$isi->id;?>"><i class="glyphicon glyphicon-trash"></i></button>
</td></tr>
        <?php
        $no++;
      }
      ?>
                                        </tbody>
                                    </table>
                                    <div class="col-xs-6" style="margin-top:10px">
    Showing <?=$count;?> to <?=$no-1;?> of <?=$pg->total_record;?> entries
                        
                        </div>

                        <div class="col-xs-6">
                          
                                    <?php
                                  if (isset($_GET['q'])) {
$pg->url=base_index()."user-management?q=".$_GET['q']."&page=";
                                  }
                                    $pg->setParameter(array(
                                      'range'=>$limit,
                                      ));
                                      ?>

                                    <div class="dataTables_paginate paging_bootstrap">
                                    <ul class="pagination">
                                    <?=$pg->create();?>
                                    </ul>
                                    </div>
                        </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
    