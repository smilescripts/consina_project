<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array();
  
  
  
   
		$in = $db->insert("tabel_master",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("tabel_master","kode_rekening",$_GET["id"]);
		break;
	case "up":
	 $data = array();
   
   
   

    
		$up = $db->update("tabel_master",$data,"kode_rekening",$_POST["id"]);
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