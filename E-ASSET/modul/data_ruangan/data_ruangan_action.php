<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
$query = "SELECT MAX(kode_ruangan) as max FROM as_ruangan ";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$kodeBarang = $data['max'];
$noUrut = (int) substr($kodeBarang, 3, 3);
$noUrut++;
$char = "RNG";
$newID = $char . sprintf("%03s", $noUrut);
  
	$data = array("kode_ruangan"=>$newID,"nm_ruangan"=>$_POST["nm_ruangan"],"keterangan"=>$_POST["keterangan"],"user_posting"=>$_POST["user_posting"],"tgl_posting"=>$_POST["tgl_posting"],);
  
  
  
   
		$in = $db->insert("as_ruangan",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("as_ruangan","kode_ruangan",$_GET["id"]);
		break;
	case "up":
	 $data = array("nm_ruangan"=>$_POST["nm_ruangan"],"keterangan"=>$_POST["keterangan"],"user_posting"=>$_POST["user_posting"],"tgl_posting"=>$_POST["tgl_posting"],);
   
   
   

    
		$up = $db->update("as_ruangan",$data,"kode_ruangan",$_POST["id"]);
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