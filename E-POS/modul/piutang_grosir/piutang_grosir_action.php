<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("NO_NOTA_PENJUALAN"=>$_POST["NO_NOTA_PENJUALAN"],"TANGGAL"=>$_POST["TANGGAL"],"OPERATOR_KASIR"=>$_POST["OPERATOR_KASIR"],"SUB_TOTAL_PENJUALAN"=>$_POST["SUB_TOTAL_PENJUALAN"],"TIPE_PEMBAYARAN"=>$_POST["TIPE_PEMBAYARAN"],"DISKON_PENJUALAN"=>$_POST["DISKON_PENJUALAN"],"UANG_BAYAR"=>$_POST["UANG_BAYAR"],"UANG_KEMBALI"=>$_POST["UANG_KEMBALI"],"PELANGGAN"=>$_POST["PELANGGAN"],"CATATAN"=>$_POST["CATATAN"],"OUTLET"=>$_POST["OUTLET"],"JATUH_TEMPO"=>$_POST["JATUH_TEMPO"],"BIAYA_KIRIM"=>$_POST["BIAYA_KIRIM"],);
  
  
  
   
		$in = $db->insert("penjualan_grosir",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("penjualan_grosir","ID_PENJUALAN",$_GET["id"]);
		break;
	case "up":
	 $cekpembayaran = $db->fetch_single_row("penjualan_grosir","ID_PENJUALAN",$_POST["id"]);
	 $sum=$cekpembayaran->UANG_BAYAR+$_POST["NOMINAL_PELUNASAN"];
	 $data = array("UANG_KEMBALI"=>$_POST["UANG_KEMBALI"],"UANG_BAYAR"=>$sum,);
	 $up = $db->update("penjualan_grosir",$data,"ID_PENJUALAN",$_POST["id"]);
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