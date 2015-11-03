<?php $data_edit=$db->fetch_single_row('sys_users','id',$_SESSION['id_user']);

?>
 
                <!-- Content Header (Page header) -->
                <section class="content-header">
                   
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                        <li><a href="<?=base_index();?>profil">Profil</a></li>
                        <li class="active">Profil</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
				<div class="row">
                        <div class="col-xs-12">
                            <div class="box" style="padding-bottom:30px;padding-left:10px">
                              
								   <h1 class="headingtable"><span><?=ucwords($data_edit->username);?></span> </h1>
                                <span class="foto_profil"><img width="200" height="200" src="<?=base_admin();?>assets/profil_foto/<?=$data_edit->foto_user;?>" class="img-thumbnail"></span>
                                <div class="box-body table-responsive no-padding" style="width:600px;margin-top:20px">
                                    <table class="table table-hover">

                                        <tbody>
                                        <tr>
                                            <th class="col-md-2">Username</th>
                                            <td><?=$data_edit->username;?></td>
                                            </tr>
                                        <tr>
                                            <th>First Name</th>
                                            <td><?=ucwords($data_edit->first_name);?></td>
                                            </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td><?=ucwords($data_edit->last_name);?></td>
                                            </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?=ucwords($data_edit->email);?></td>
                                            </tr>
                                    </tbody></table>
                                </div><!-- /.box-body -->
                                <p></p>
                                <a href="<?=base_index();?>profil/edit" class="btn btn-primary">Edit Profil</a> <a href="<?=base_index();?>profil/change-password" class="btn btn-primary">Change Password</a>
                            <p></p>
                            </div><!-- /.box -->
                        </div>
                    </div>
                  
                </section><!-- /.content -->
        
 