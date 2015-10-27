
<?php
switch ($path_act) {
	case "tambah":
          foreach ($db->fetch_all("sys_menu") as $isi) {
               if ($path_url==$isi->url&&$path_act=="tambah") {
                          if ($role_act["insert_act"]=="Y") {
                             include "kalkulasi_bahan_add.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }
		break;
	case "tampil":
		$data_edit = $db->fetch_single_row("head_kalkulasi_produksi","ID_KALKULASI",$path_id);
		    foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url&&$path_act=="tampil") {
                          if ($role_act["up_act"]=="Y") {
                             include "tampil_kalkulasi.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }
	  
	case "angsur":
		$data_edit = $db->fetch_single_row("head_kalkulasi_produksi","ID_KALKULASI",$path_id);
		    foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url&&$path_act=="angsur") {
                          if ($role_act["up_act"]=="Y") {
                             include "angsur_bahan.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }

		break;
      case "detail":
    $data_edit = $db->fetch_single_row("head_kalkulasi_produksi","ID_KALKULASI",$path_id);
    include "kalkulasi_bahan_detail.php";
    break;
	default:
		include "kalkulasi_bahan_view.php";
		break;
}

?>