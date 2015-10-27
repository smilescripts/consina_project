<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("kode_transaksi"=>$_POST["kode_transaksi"],);
  
  
  
   
		$in = $db->insert("tabel_transaksi",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("tabel_transaksi","id_transaksi",$_GET["id"]);
		break;
	case "up":
	 $data = array("kode_transaksi"=>$_POST["kode_transaksi"],);
   
   
   

    
		$up = $db->update("tabel_transaksi",$data,"id_transaksi",$_POST["id"]);
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