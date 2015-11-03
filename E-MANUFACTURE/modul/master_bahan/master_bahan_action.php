<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("ID_BAHAN"=>$_POST["ID_BAHAN"],"NAMA_BAHAN"=>$_POST["NAMA_BAHAN"],"SATUAN"=>$_POST["SATUAN"],"STOCK"=>$_POST["STOCK"],);
  
  
  
   
		$in = $db->insert("bahan",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("bahan","ID_BAHAN",$_GET["id"]);
		break;
	case "up":
	 $data = array("NAMA_BAHAN"=>$_POST["NAMA_BAHAN"],"SATUAN"=>$_POST["SATUAN"],"STOCK"=>$_POST["STOCK"],);
   
   
   

    
		$up = $db->update("bahan",$data,"ID_BAHAN",$_POST["id"]);
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