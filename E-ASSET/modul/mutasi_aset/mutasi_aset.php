
<?php
switch ($path_act) {
	case "tambah":
          foreach ($db->fetch_all("sys_menu") as $isi) {
               if ($path_url==$isi->url&&$path_act=="tambah") {
                          if ($role_act["insert_act"]=="Y") {
                             include "mutasi_aset_add.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }
		break;
	case "edit":
		$data_edit = $db->fetch_single_row("as_mutasi","id_mutasi",$path_id);
		    foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url&&$path_act=="edit") {
                          if ($role_act["up_act"]=="Y") {
                             include "mutasi_aset_edit.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }

		break;
      case "detail":
    $data_edit = $db->fetch_single_row("as_mutasi","id_mutasi",$path_id);
    include "mutasi_aset_detail.php";
    break;
	default:
		include "mutasi_aset_view.php";
		break;
}

?>