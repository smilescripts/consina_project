<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array();
  
  
  
   
		$in = $db->insert("as_aset",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("as_aset","kode_barang",$_GET["id"]);
		break;
	case "up":
	 $data = array();
   
   
   

    
		$up = $db->update("as_aset",$data,"kode_barang",$_POST["id"]);
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