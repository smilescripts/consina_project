<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("NAMA_SATUAN"=>$_POST["NAMA_SATUAN"],);
  
  
  
   
		$in = $db->insert("satuan_barang",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("satuan_barang","KODE_SATUAN",$_GET["id"]);
		break;
	case "up":
	 $data = array("NAMA_SATUAN"=>$_POST["NAMA_SATUAN"],);
   
   
   

    
		$up = $db->update("satuan_barang",$data,"KODE_SATUAN",$_POST["id"]);
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