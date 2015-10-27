<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("PRD_KODE_BARANG"=>$_POST["PRD_KODE_BARANG"],"PRD_BARCODE"=>$_POST["PRD_BARCODE"],"PRD_NAMA_BARANG"=>$_POST["PRD_NAMA_BARANG"],"PRD_STOCK"=>$_POST["PRD_STOCK"],"STATUS"=>$_POST["STATUS"],);
  
  
  
   
		$in = $db->insert("gudang_produksi",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("gudang_produksi","PRD_ID_BARANG",$_GET["id"]);
		break;
	case "up":
	 $data = array("PRD_KODE_BARANG"=>$_POST["PRD_KODE_BARANG"],"PRD_BARCODE"=>$_POST["PRD_BARCODE"],"PRD_NAMA_BARANG"=>$_POST["PRD_NAMA_BARANG"],"PRD_STOCK"=>$_POST["PRD_STOCK"],"STATUS"=>$_POST["STATUS"],);
   
   
   

    
		$up = $db->update("gudang_produksi",$data,"PRD_ID_BARANG",$_POST["id"]);
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