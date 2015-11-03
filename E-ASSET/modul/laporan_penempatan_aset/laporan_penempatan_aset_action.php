<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array();
  
  
  
   
		$in = $db->insert("as_inventarisasi",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("as_inventarisasi","kode_inventarisasi",$_GET["id"]);
		break;
	case "up":
	 $data = array();
   
   
   

    
		$up = $db->update("as_inventarisasi",$data,"kode_inventarisasi",$_POST["id"]);
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