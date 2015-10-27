<?php
session_start();
include "../../inc/config.php";
session_check();
$userpost=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username);
switch ($_GET["act"]) {
	case "in":
  
	$iduser=$_SESSION['id_user'];
		$noUser=sprintf("%03s", $iduser);
		$query1 = "SELECT MAX(id_history) as max FROM as_history_ubah where  SUBSTRING(`id_history`,4,3)='$noUser'";
		$hasil1 = mysql_query($query1);
		$data1  = mysql_fetch_array($hasil1);
		$kodeMutasi = $data1['max'];
		$noUrut1 = (int) substr($kodeMutasi, 7, 16);
		$noUrut1++;
		$char="PRB";
		$newID1 = $char . $noUser .sprintf("%010s", $noUrut1);
  
	$data = array("id_history"=>$newID1,"kode_inventarisasi"=>$_POST["kode_inventarisasi"],"status_before"=>$_POST["status_before"],"status_after"=>$_POST["status_after"],"tgl_ubah"=>date("Y-m-d"),"keterangan_ubah"=>$_POST["keterangan_ubah"],"user_ubah"=>$userpost,);
  
  
  
   
		$in = $db->insert("as_history_ubah",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("as_history_ubah","id_history",$_GET["id"]);
		break;
	case "up":
	 $data = array("kode_inventarisasi"=>$_POST["kode_inventarisasi"],"status_before"=>$_POST["status_before"],"status_after"=>$_POST["status_after"],"tgl_ubah"=>$_POST["tgl_ubah"],"keterangan_ubah"=>$_POST["keterangan_ubah"],"user_ubah"=>$_POST["user_ubah"],);
   
   
   

    
		$up = $db->update("as_history_ubah",$data,"id_history",$_POST["id"]);
		if ($up=true) {
			echo "good";
		} else {
			return false; 
		}
		break;
	default:
		# code...
		break;
}

?>