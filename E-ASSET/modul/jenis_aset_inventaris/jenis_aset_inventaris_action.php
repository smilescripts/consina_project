<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
		$query = "SELECT MAX(kode_harta) as max FROM as_harta_berwujud ";
		$hasil = mysql_query($query);
		$data  = mysql_fetch_array($hasil);
		$kodeBarang = $data['max'];
		$noUrut = (int) substr($kodeBarang, 2, 3);
		$noUrut++;
		$newID = sprintf("%03s", $noUrut);
  
  
	$data = array("kode_harta"=>$newID,"nm_harta"=>$_POST["nm_harta"],"ket"=>$_POST["ket"],"tgl_posting"=>$_POST["tgl_posting"],"user_posting"=>$_POST["user_posting"],);
  
  
  
   
		$in = $db->insert("as_harta_berwujud",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("as_harta_berwujud","kode_harta",$_GET["id"]);
		break;
	case "up":
	 $data = array("nm_harta"=>$_POST["nm_harta"],"ket"=>$_POST["ket"],"tgl_posting"=>$_POST["tgl_posting"],"user_posting"=>$_POST["user_posting"],);
   
   
   

    
		$up = $db->update("as_harta_berwujud",$data,"kode_harta",$_POST["id"]);
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