<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("NAMA_PELANGGAN"=>$_POST["NAMA_PELANGGAN"],"NO_TELEPON"=>$_POST["NO_TELEPON"],"TANGGAL_TERDAFTAR"=>$_POST["TANGGAL_TERDAFTAR"],"ALAMAT"=>$_POST["ALAMAT"],"STATUS_AKTIF"=>$_POST["STATUS_AKTIF"],"DISKON_BELANJA"=>$_POST["DISKON_BELANJA"],);
  
  
  
   
		$in = $db->insert("sys_pelanggan",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("sys_pelanggan","id",$_GET["id"]);
		break;
	case "up":
	 $data = array("NAMA_PELANGGAN"=>$_POST["NAMA_PELANGGAN"],"NO_TELEPON"=>$_POST["NO_TELEPON"],"TANGGAL_TERDAFTAR"=>$_POST["TANGGAL_TERDAFTAR"],"ALAMAT"=>$_POST["ALAMAT"],"STATUS_AKTIF"=>$_POST["STATUS_AKTIF"],"DISKON_BELANJA"=>$_POST["DISKON_BELANJA"],);
   
   
   

    
		$up = $db->update("sys_pelanggan",$data,"id",$_POST["id"]);
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