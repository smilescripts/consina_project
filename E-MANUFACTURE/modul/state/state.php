
<?php
switch ($path_act) {
	case "tambah":
        include "state_add.php";
		break;
	case "edit":
		$data_edit = $db->fetch_single_row("sys_state","STATE_ID",$path_id);
		include "state_edit.php";
		break;
      case "detail":
    $data_edit = $db->fetch_single_row("sys_state","STATE_ID",$path_id);
    include "state_detail.php";
    break;
	default:
		include "state_view.php";
		break;
}

?>