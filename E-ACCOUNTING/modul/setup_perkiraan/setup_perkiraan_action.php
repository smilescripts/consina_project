<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("kode_rekening"=>$_POST["kode_rekening"],"nama_rekening"=>$_POST["nama_rekening"],"awal_debet"=>$_POST["awal_debet"],"awal_kredit"=>$_POST["awal_kredit"],"posisi"=>$_POST["posisi"],"normal"=>$_POST["normal"],);
  
  
  
   
		$in = $db->insert("tabel_master",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("tabel_master","kode_rekening",$_GET["id"]);
		break;
	case "up":
	 $data = array("nama_rekening"=>$_POST["nama_rekening"],"awal_debet"=>$_POST["awal_debet"],"awal_kredit"=>$_POST["awal_kredit"],"posisi"=>$_POST["posisi"],"normal"=>$_POST["normal"],);
   
   
   

    
		$up = $db->update("tabel_master",$data,"kode_rekening",$_POST["id"]);
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