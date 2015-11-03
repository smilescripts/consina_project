<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("NO_NOTA_KONSINYASI"=>$_POST["NO_NOTA_KONSINYASI"],);
  
  
  
   
		$in = $db->insert("transaksi_konsinyasi",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("transaksi_konsinyasi","ID_KONSINYASI",$_GET["id"]);
		break;
	case "up":
	 $data = array("NO_NOTA_KONSINYASI"=>$_POST["NO_NOTA_KONSINYASI"],);
   
   
   

    
		$up = $db->update("transaksi_konsinyasi",$data,"ID_KONSINYASI",$_POST["id"]);
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