<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("PARAMETER_NAME"=>$_POST["PARAMETER_NAME"],"PARAMETER_VALUE"=>$_POST["PARAMETER_VALUE"],);
  
  
  
   
		$in = $db->insert("pengaturan_penjualan",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("pengaturan_penjualan","PARAMETER_ID",$_GET["id"]);
		break;
	case "up":
	 $data = array("PARAMETER_NAME"=>$_POST["PARAMETER_NAME"],"PARAMETER_VALUE"=>$_POST["PARAMETER_VALUE"],);
   
   
   

    
		$up = $db->update("pengaturan_penjualan",$data,"PARAMETER_ID",$_POST["id"]);
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