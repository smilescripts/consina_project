
<?php
switch ($path_act) {
	case "tambah":
          foreach ($db->fetch_all("sys_menu") as $isi) {
               if ($path_url==$isi->url&&$path_act=="tambah") {
                          if ($role_act["insert_act"]=="Y") {
                             include "sales_order_add.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }
		break;
	case "edit":
		$data_edit = $db->fetch_single_row("sales_order","",$path_id);
		    foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url&&$path_act=="edit") {
                          if ($role_act["up_act"]=="Y") {
                             include "sales_order_edit.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }

		break;
      case "detail":
    $data_edit = $db->fetch_single_row("sales_order","",$path_id);
    include "sales_order_detail.php";
    break;
	default:
		include "sales_order_view.php";
		break;
}

?>