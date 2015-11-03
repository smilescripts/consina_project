<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("ID_SO"=>$_POST["ID_SO"],"NO_SO"=>$_POST["NO_SO"],);
  
  
  
   
		$in = $db->insert("sales_order",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("sales_order","",$_GET["id"]);
		break;
	case "up":
	 $data = array("ID_SO"=>$_POST["ID_SO"],"NO_SO"=>$_POST["NO_SO"],);
   
   
   

    
		$up = $db->update("sales_order",$data,"",$_POST["id"]);
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