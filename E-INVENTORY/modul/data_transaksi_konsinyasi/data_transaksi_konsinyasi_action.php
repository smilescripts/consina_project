<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("NO_NOTA_KONSINYASI"=>$_POST["NO_NOTA_KONSINYASI"],"TANGGAL"=>$_POST["TANGGAL"],"OPERATOR_KASIR"=>$_POST["OPERATOR_KASIR"],"SUB_TOTAL_PENJUALAN"=>$_POST["SUB_TOTAL_PENJUALAN"],"TIPE_PEMBAYARAN"=>$_POST["TIPE_PEMBAYARAN"],"DISKON_PENJUALAN"=>$_POST["DISKON_PENJUALAN"],"UANG_BAYAR"=>$_POST["UANG_BAYAR"],"UANG_KEMBALI"=>$_POST["UANG_KEMBALI"],"CATATAN"=>$_POST["CATATAN"],"OUTLET"=>$_POST["OUTLET"],"JATUH_TEMPO"=>$_POST["JATUH_TEMPO"],"BIAYA_KIRIM"=>$_POST["BIAYA_KIRIM"],);
  
  
  
   
		$in = $db->insert("transaksi_konsinyasi",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("transaksi_konsinyasi","ID_KONSINYASI",$_GET["id"]);
		break;
	case "up":
	 $data = array("NO_NOTA_KONSINYASI"=>$_POST["NO_NOTA_KONSINYASI"],"TANGGAL"=>$_POST["TANGGAL"],"OPERATOR_KASIR"=>$_POST["OPERATOR_KASIR"],"SUB_TOTAL_PENJUALAN"=>$_POST["SUB_TOTAL_PENJUALAN"],"TIPE_PEMBAYARAN"=>$_POST["TIPE_PEMBAYARAN"],"DISKON_PENJUALAN"=>$_POST["DISKON_PENJUALAN"],"UANG_BAYAR"=>$_POST["UANG_BAYAR"],"UANG_KEMBALI"=>$_POST["UANG_KEMBALI"],"CATATAN"=>$_POST["CATATAN"],"OUTLET"=>$_POST["OUTLET"],"JATUH_TEMPO"=>$_POST["JATUH_TEMPO"],"BIAYA_KIRIM"=>$_POST["BIAYA_KIRIM"],);
   
   
   

    
		$up = $db->update("transaksi_konsinyasi",$data,"ID_KONSINYASI",$_POST["id"]);
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