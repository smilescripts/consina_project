<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("NAMA_OUTLET"=>$_POST["NAMA_OUTLET"],"LOKASI"=>$_POST["LOKASI"],"ALAMAT"=>$_POST["ALAMAT"],"NO_TELEPON"=>$_POST["NO_TELEPON"],);
  
  
  
   
		$in = $db->insert("outlet",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("outlet","KODE_OUTLET",$_GET["id"]);
		break;
	case "up":
	 $data = array("NAMA_OUTLET"=>$_POST["NAMA_OUTLET"],"LOKASI"=>$_POST["LOKASI"],"ALAMAT"=>$_POST["ALAMAT"],"NO_TELEPON"=>$_POST["NO_TELEPON"],);
   
   
   

    
		$up = $db->update("outlet",$data,"KODE_OUTLET",$_POST["id"]);
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