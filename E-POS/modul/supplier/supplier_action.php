<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("KODE_SUPPLIER"=>$_POST["KODE_SUPPLIER"],"NAMA_SUPPLIER"=>$_POST["NAMA_SUPPLIER"],"ALAMAT"=>$_POST["ALAMAT"],"NO_TELEPON"=>$_POST["NO_TELEPON"],"NAMA_PERUSAHAAN"=>$_POST["NAMA_PERUSAHAAN"],"TANGGAL_TERDAFTAR"=>$_POST["TANGGAL_TERDAFTAR"],);
  
  
  
   
		$in = $db->insert("supplier",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("supplier","ID_SUPPLIER",$_GET["id"]);
		break;
	case "up":
	 $data = array("KODE_SUPPLIER"=>$_POST["KODE_SUPPLIER"],"NAMA_SUPPLIER"=>$_POST["NAMA_SUPPLIER"],"ALAMAT"=>$_POST["ALAMAT"],"NO_TELEPON"=>$_POST["NO_TELEPON"],"NAMA_PERUSAHAAN"=>$_POST["NAMA_PERUSAHAAN"],"TANGGAL_TERDAFTAR"=>$_POST["TANGGAL_TERDAFTAR"],);
   
   
   

    
		$up = $db->update("supplier",$data,"ID_SUPPLIER",$_POST["id"]);
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