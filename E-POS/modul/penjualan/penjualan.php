
<?php
switch ($path_act) {
	case "tambah":
          foreach ($db->fetch_all("sys_menu") as $isi) {
               if ($path_url==$isi->url&&$path_act=="tambah") {
                          if ($role_act["insert_act"]=="Y") {
                             include "penjualan_add.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }
		break;
	case "edit":
		$data_edit = $db->fetch_single_row("penjualan","ID_PENJUALAN",$path_id);
		    foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url&&$path_act=="edit") {
                          if ($role_act["up_act"]=="Y") {
                             include "penjualan_edit.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }

   break;
   case "detail":
    $data_edit = $db->fetch_single_row("penjualan","ID_PENJUALAN",$path_id);
    include "penjualan_detail.php";
    break;
	 case "batal":
    $data_edit = $db->fetch_single_row("penjualan","ID_PENJUALAN",$path_id);
    include "penjualan_batal.php";
    break;
	default:
		include "penjualan_view.php";
		break;
}

?>