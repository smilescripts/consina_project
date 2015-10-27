<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("STATE_NAME"=>$_POST["STATE_NAME"],);
  
  
  
   
		$in = $db->insert("sys_state",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("sys_state","id",$_GET["id"]);
		break;
	case "up":
	 $data = array("STATE_NAME"=>$_POST["STATE_NAME"],);
   
   
   

    
		$up = $db->update("sys_state",$data,"id",$_POST["id"]);
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