<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("KODE_JENIS"=>$_POST["KODE_JENIS"],"KODE_GOLONGAN"=>$_POST["KODE_GOLONGAN"],"NAMA_JENIS"=>$_POST["NAMA_JENIS"],"KETERANGAN"=>$_POST["KETERANGAN"],);
  
  
  
   
		$in = $db->insert("jenis_barang",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("jenis_barang","ID",$_GET["id"]);
		break;
	case "up":
	 $data = array("KODE_JENIS"=>$_POST["KODE_JENIS"],"KODE_GOLONGAN"=>$_POST["KODE_GOLONGAN"],"NAMA_JENIS"=>$_POST["NAMA_JENIS"],"KETERANGAN"=>$_POST["KETERANGAN"],);
   
   
   

    
		$up = $db->update("jenis_barang",$data,"ID",$_POST["id"]);
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