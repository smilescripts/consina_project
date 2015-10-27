<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
$query = "SELECT MAX(sub_golongan) as max FROM as_subgolongan ";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$kodeBarang = $data['max'];
$noUrut = (int) $kodeBarang ;
$noUrut++;
$newID = sprintf($noUrut);
  
	$data = array("sub_golongan"=>$newID,"kode_golongan"=>$_POST["kode_golongan"],"nm_subgolongan"=>$_POST["nm_subgolongan"],"tgl_posting"=>$_POST["tgl_posting"],"user_posting"=>$_POST["user_posting"],);
  
  
  
   
		$in = $db->insert("as_subgolongan",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("as_subgolongan","sub_golongan",$_GET["id"]);
		break;
	case "up":
	 $data = array("kode_golongan"=>$_POST["kode_golongan"],"nm_subgolongan"=>$_POST["nm_subgolongan"],"tgl_posting"=>$_POST["tgl_posting"],"user_posting"=>$_POST["user_posting"],);
   
   
   

    
		$up = $db->update("as_subgolongan",$data,"sub_golongan",$_POST["id"]);
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