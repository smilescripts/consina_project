<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("KODE_KATEGORI"=>$_POST["KODE_KATEGORI"],"NAMA_KATEGORI"=>$_POST["NAMA_KATEGORI"],);
  
  
  
   
		$in = $db->insert("kategori",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("kategori","ID_KATEGORI",$_GET["id"]);
		break;
	case "up":
	 $data = array("KODE_KATEGORI"=>$_POST["KODE_KATEGORI"],"NAMA_KATEGORI"=>$_POST["NAMA_KATEGORI"],);
   
   
   

    
		$up = $db->update("kategori",$data,"ID_KATEGORI",$_POST["id"]);
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