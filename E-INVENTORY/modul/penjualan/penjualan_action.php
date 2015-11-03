<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("NO_NOTA_PENJUALAN"=>$_POST["NO_NOTA_PENJUALAN"],"TANGGAL"=>$_POST["TANGGAL"],"OPERATOR_KASIR"=>$_POST["OPERATOR_KASIR"],"SUB_TOTAL_PENJUALAN"=>$_POST["SUB_TOTAL_PENJUALAN"],"TIPE_PEMBAYARAN"=>$_POST["TIPE_PEMBAYARAN"],"DISKON_PENJUALAN"=>$_POST["DISKON_PENJUALAN"],"TAX_SALES"=>$_POST["TAX_SALES"],"UANG_BAYAR"=>$_POST["UANG_BAYAR"],"UANG_KEMBALI"=>$_POST["UANG_KEMBALI"],"PELANGGAN"=>$_POST["PELANGGAN"],"CATATAN"=>$_POST["CATATAN"],"STATUS"=>$_POST["STATUS"],);
  
  
  
   
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
	 $data = array("NO_NOTA_PENJUALAN"=>$_POST["NO_NOTA_PENJUALAN"],"TANGGAL"=>$_POST["TANGGAL"],"OPERATOR_KASIR"=>$_POST["OPERATOR_KASIR"],"SUB_TOTAL_PENJUALAN"=>$_POST["SUB_TOTAL_PENJUALAN"],"TIPE_PEMBAYARAN"=>$_POST["TIPE_PEMBAYARAN"],"DISKON_PENJUALAN"=>$_POST["DISKON_PENJUALAN"],"TAX_SALES"=>$_POST["TAX_SALES"],"UANG_BAYAR"=>$_POST["UANG_BAYAR"],"UANG_KEMBALI"=>$_POST["UANG_KEMBALI"],"PELANGGAN"=>$_POST["PELANGGAN"],"CATATAN"=>$_POST["CATATAN"],"STATUS"=>$_POST["STATUS"],);
   
   
   

    
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