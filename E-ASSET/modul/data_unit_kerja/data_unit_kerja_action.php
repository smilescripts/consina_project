<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
		$query = "SELECT MAX(kode_unit) as max FROM as_unit_kerja ";
		$hasil = mysql_query($query);
		$data  = mysql_fetch_array($hasil);
		$kodeBarang = $data['max'];
		$noUrut = (int) substr($kodeBarang, 3, 3);
		$noUrut++;
		$char = "UN";
		$newID = $char . sprintf("%03s", $noUrut);
  
	$data = array("kode_unit"=>$newID,"nm_unit"=>$_POST["nm_unit"],"keterangan"=>$_POST["keterangan"],"user_posting"=>$_POST["user_posting"],"tgl_posting"=>$_POST["tgl_posting"],);
  
  
  
   
		$in = $db->insert("as_unit_kerja",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("as_unit_kerja","kode_unit",$_GET["id"]);
		break;
	case "up":
	 $data = array("nm_unit"=>$_POST["nm_unit"],"keterangan"=>$_POST["keterangan"],"user_posting"=>$_POST["user_posting"],"tgl_posting"=>$_POST["tgl_posting"],);
   
   
   

    
		$up = $db->update("as_unit_kerja",$data,"kode_unit",$_POST["id"]);
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