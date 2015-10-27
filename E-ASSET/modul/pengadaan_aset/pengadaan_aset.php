
<?php
switch ($path_act) {
	case "tambah":
	
          foreach ($db->fetch_all("sys_menu") as $isi) {
               if ($path_url==$isi->url&&$path_act=="tambah") {
                          if ($role_act["insert_act"]=="Y") {
                             include "pengadaan_aset_add.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }
		break;
	case "edit":
		$data_edit = $db->fetch_single_row("as_head_pengadaan","kode_pengadaan",$path_id);
		    foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url&&$path_act=="edit") {
                          if ($role_act["up_act"]=="Y") {
                             include "pengadaan_aset_edit.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }

		break;
      case "detail":
    $data_edit = $db->fetch_single_row("as_head_pengadaan","kode_pengadaan",$path_id);
    include "pengadaan_aset_detail.php";
    break;
	default:
		include "pengadaan_aset_view.php";
		break;
}

?>