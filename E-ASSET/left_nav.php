 
   <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=base_admin();?><?=$profil->logo; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?=$profil->NAMA_PERUSAHAAN; ?></p>

              <a href="<?=base_index();?>profil"><i class="fa fa-circle text-success"></i>Online point of sale</a>
            </div>
          </div>
         <!--  search form
         <form action="#" method="get" class="sidebar-form">
           <div class="input-group">
             <input type="text" name="q" class="form-control" placeholder="Search..."/>
             <span class="input-group-btn">
               <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
             </span>
           </div>
         </form>
         /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">NAVIGASI UTAMA</li>
             <li class="<?=($path_url=='')?'active':'';?>">
                            <a href="<?=base_index();?>">
                                <i class="glyphicon glyphicon-home"></i> <span>Beranda</span>
                            </a>
                        </li>
              <?php 
              //show only if user is admin 
              if ($_SESSION['level']==1) {
                ?>
             
              <li class="treeview <?=($path_url=='install'||$path_url=='state'||$path_url=='user-management'||$path_url=='page'||$path_url=='modul'||$path_url=='menu-management'||$path_url=='group-user'||$path_url=='profil-perusahaan')?'active':'';?>">
                        <a href="#">
                        <i class="glyphicon glyphicon-wrench"></i>
                        <span>Pengaturan sistem</span>
                        <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">

                          <li class="<?=($path_url=='install')?'active':'';?>">
                            <a href="<?=base_index();?>install">
                                <i class="fa fa-circle-o"></i> <span>Install</span>
                            </a>
                        </li>
                        <li class="<?=($path_url=='modul')?'active':'';?>">
                            <a href="<?=base_index();?>modul">
                                <i class="fa fa-circle-o"></i> <span>Modul</span>
                            </a>
                        </li>
                         <li class="<?=($path_url=='page')?'active':'';?>">
                            <a href="<?=base_index();?>page">
                                <i class="fa fa-circle-o"></i> <span>Page / Menu</span>
                            </a>
                        </li>
                           <li class="<?=($path_url=='menu-management')?'active':'';?>">
                            <a href="<?=base_index();?>menu-management">
                                <i class="fa fa-circle-o"></i> <span>Menu Management</span>
                            </a>
                        </li>
                        <li class="<?=($path_url=='group-user')?'active':'';?>">
                            <a href="<?=base_index();?>group-user">
                                <i class="fa fa-circle-o"></i> <span>Group User</span>
                            </a>
                        </li>
                          <li class="<?=($path_url=='user-management')?'active':'';?>">
                            <a href="<?=base_index();?>user-management">
                                <i class="fa fa-circle-o"></i> <span>User Management</span>
                            </a>
                        </li>
						<li class="<?=($path_url=='state')?'active':'';?>">
                            <a href="<?=base_index();?>state">
                                <i class="fa fa-circle-o"></i> <span>Management State</span>
                            </a>
                        </li>
						 <li class="<?=($path_url=='profil-perusahaan')?'active':'';?>">
                            <a href="<?=base_index();?>profil-perusahaan">
                                <i class="fa fa-circle-o"></i> <span>Profil Perusahaan</span>
                            </a>
                        </li>
                        </ul>
                        </li>
                        
                           <?php 
                         }
          //ambil semua modul yang tampil
          $modul = $db->fetch_custom('select * from sys_modul where tampil=? and application=? order by urutan asc',array('tampil'=>'Y','application'=>'ASSET'));

          foreach ($modul as $main_menu) {

 $dt = $db->fetch_custom("select sys_modul.modul_name,sys_modul.icon,sys_menu.page_name from sys_modul 
inner join sys_menu on sys_modul.id=sys_menu.modul_id
inner join sys_menu_role on sys_menu.id=sys_menu_role.id_menu
where sys_modul.id=? and sys_menu_role.group_id=? and sys_menu_role.read_act=?",array('sys_modul.id'=>$main_menu->id,'sys_menu_role.group_id'=>$_SESSION['level'],'sys_menu_role.read_act'=>'Y'));
                if ($dt->rowCount()>0) {

    
            ?>
               <li class="<?=$db->terpilih($path_url,$main_menu->id);?>">


                        <li class="treeview <?=$db->terpilih($path_url,$main_menu->id);?>">
                            <a href="#">
                                <i class="<?=$main_menu->icon;?>"></i>
                                <span><?=ucwords($main_menu->modul_name);?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php 
$sub= $db->fetch_custom("select * from sys_menu where modul_id=? order by urutan_menu asc",array('modul_id'=>$main_menu->id));
            foreach ($sub as $sub_menu) {
               if (in_array($sub_menu->url, $role_user)) {
                ?>
   <li class="<?=($path_url==$sub_menu->url)?'active':'';?>">
                <a href="<?=base_index().$sub_menu->url;?>">
                  <i class="fa fa-circle-o"></i> <?=ucwords($sub_menu->page_name);?></a> 
              </li>
                <?php
              } 
              
            }
            ?>

                                </ul>
                        </li>

<?php 

}
}


?>

           </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

       