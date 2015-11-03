<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("NO_NOTA_PENJUALAN"=>$_POST["NO_NOTA_PENJUALAN"],"TANGGAL"=>$_POST["TANGGAL"],"OPERATOR_KASIR"=>$_POST["OPERATOR_KASIR"],);
  
  
  
   
		$in = $db->insert("penjualan",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("penjualan","ID_PENJUALAN",$_GET["id"]);
		break;
	case "up":
	 $data = array("NO_NOTA_PENJUALAN"=>$_POST["NO_NOTA_PENJUALAN"],"TANGGAL"=>$_POST["TANGGAL"],"OPERATOR_KASIR"=>$_POST["OPERATOR_KASIR"],);
   
   
   

    
		$up = $db->update("penjualan",$data,"ID_PENJUALAN",$_POST["id"]);
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