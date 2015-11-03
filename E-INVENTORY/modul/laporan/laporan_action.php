<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("BARCODE"=>$_POST["BARCODE"],"LEBAR"=>$_POST["LEBAR"],"TINGGI"=>$_POST["TINGGI"],);
  
  
  
   
		$in = $db->insert("cetak_barcode",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("cetak_barcode","ID",$_GET["id"]);
		break;
	case "up":
	 $data = array("BARCODE"=>$_POST["BARCODE"],"LEBAR"=>$_POST["LEBAR"],"TINGGI"=>$_POST["TINGGI"],);
   
   
   

    
		$up = $db->update("cetak_barcode",$data,"ID",$_POST["id"]);
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