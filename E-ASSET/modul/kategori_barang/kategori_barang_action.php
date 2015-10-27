<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("NAMA_KATEGORI"=>$_POST["NAMA_KATEGORI"],);
  
  
  
   
		$in = $db->insert("sys_kategori_barang",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("sys_kategori_barang","KODE_KATEGORI",$_GET["id"]);
		break;
	case "up":
	 $data = array("NAMA_KATEGORI"=>$_POST["NAMA_KATEGORI"],);
   
   
   

    
		$up = $db->update("sys_kategori_barang",$data,"KODE_KATEGORI",$_POST["id"]);
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