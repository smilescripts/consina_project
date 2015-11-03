<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("OUTLET"=>$_POST["OUTLET"],"PRINTER_NAME"=>$_POST["PRINTER_NAME"],"IP_ADRRESS"=>$_POST["IP_ADRRESS"],);
  
  
  
   
		$in = $db->insert("printer_config",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("printer_config","ID_CONFIG",$_GET["id"]);
		break;
	case "up":
	 $data = array("OUTLET"=>$_POST["OUTLET"],"PRINTER_NAME"=>$_POST["PRINTER_NAME"],"IP_ADRRESS"=>$_POST["IP_ADRRESS"],);
   
   
   

    
		$up = $db->update("printer_config",$data,"ID_CONFIG",$_POST["id"]);
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