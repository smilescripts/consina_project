
<?php
switch ($path_act) {
	case "tambah":
          foreach ($db->fetch_all("sys_menu") as $isi) {
               if ($path_url==$isi->url&&$path_act=="tambah") {
                          if ($role_act["insert_act"]=="Y") {
                             include "detail_pengadaan_aset_add.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }
		break;
	case "edit":
		$data_edit = $db->fetch_custom_single("select * from as_pengadaan where kode_pengadaan='$path_id' and kode_barang='$path_id2'");
		$data_edit1 = $db->fetch_custom_single("select * from as_aset where kode_barang='$path_id2'");
		    foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url&&$path_act=="edit") {
                          if ($role_act["up_act"]=="Y") {
                             include "detail_pengadaan_aset_edit.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }

		break;
      case "detail":
    $data_edit = $db->fetch_custom_single("select * from as_pengadaan where kode_pengadaan='$path_id' and kode_barang='$path_id2'");
    $data_edit1 = $db->fetch_custom_single("select * from as_aset where kode_barang='$path_id2'");
	include "detail_pengadaan_aset_detail.php";
    break;
	default:
		include "detail_pengadaan_aset_view.php";
		break;
}

?>