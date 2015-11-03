
<?php
switch ($path_act) {
	case "edit":
		$data_edit = $db->fetch_single_row("sys_profil_perusahaan","id",$path_id);
		include "profil_perusahaan_edit.php";
		break;
      case "detail":
    $data_edit = $db->fetch_single_row("sys_profil_perusahaan","id",$path_id);
    include "profil_perusahaan_detail.php";
    break;
	default:
		include "profil_perusahaan_view.php";
		break;
}

?>