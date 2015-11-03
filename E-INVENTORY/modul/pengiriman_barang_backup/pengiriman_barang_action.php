<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array();
  
  
  
   
		$in = $db->insert("pengiriman_barang",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("pengiriman_barang","ID",$_GET["id"]);
		break;
	case "up":
	 $data = array();
   
   
   

    
		$up = $db->update("pengiriman_barang",$data,"ID",$_POST["id"]);
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