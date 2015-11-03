<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("NO_NOTA_PENJUALAN"=>$_POST["NO_NOTA_PENJUALAN"],);
  
  
  
   
		$in = $db->insert("retur_penjualan",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("retur_penjualan","NO_RETUR",$_GET["id"]);
		break;
	case "up":
	 $data = array("NO_NOTA_PENJUALAN"=>$_POST["NO_NOTA_PENJUALAN"],);
   
   
   

    
		$up = $db->update("retur_penjualan",$data,"NO_RETUR",$_POST["id"]);
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