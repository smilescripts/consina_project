<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("KODE_BARANG"=>$_POST["KODE_BARANG"],"BARCODE"=>$_POST["BARCODE"],"NAMA_BARANG"=>$_POST["NAMA_BARANG"],"KETERANGAN"=>$_POST["KETERANGAN"],"HARGA_MODAL"=>$_POST["HARGA_MODAL"],"HARGA_JUAL"=>$_POST["HARGA_JUAL"],"STOK"=>$_POST["STOK"],"ID_KATEGORI"=>$_POST["ID_KATEGORI"],"DISKON"=>$_POST["DISKON"],"ID_SATUAN"=>$_POST["ID_SATUAN"],);
  
  
  
   
		$in = $db->insert("barang_pusat",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("barang_pusat","ID_BARANG",$_GET["id"]);
		break;
	case "up":
	 $data = array("KODE_BARANG"=>$_POST["KODE_BARANG"],"BARCODE"=>$_POST["BARCODE"],"NAMA_BARANG"=>$_POST["NAMA_BARANG"],"KETERANGAN"=>$_POST["KETERANGAN"],"HARGA_MODAL"=>$_POST["HARGA_MODAL"],"HARGA_JUAL"=>$_POST["HARGA_JUAL"],"STOK"=>$_POST["STOK"],"ID_KATEGORI"=>$_POST["ID_KATEGORI"],"DISKON"=>$_POST["DISKON"],"ID_SATUAN"=>$_POST["ID_SATUAN"],); 
	 
		$dataoutlet = array("KODE_BARANG"=>$_POST["KODE_BARANG"],"BARCODE"=>$_POST["BARCODE"],"NAMA_BARANG"=>$_POST["NAMA_BARANG"],"HARGA_MODAL"=>$_POST["HARGA_MODAL"],"HARGA_JUAL"=>$_POST["HARGA_JUAL"],"ID_KATEGORI"=>$_POST["ID_KATEGORI"],"DISKON"=>$_POST["DISKON"],
		"ID_SATUAN"=>$_POST["ID_SATUAN"],);
		$up = $db->update("barang_pusat",$data,"ID_BARANG",$_POST["id"]);
		$upoutlet = $db->update("barang_outlet",$dataoutlet,"KODE_BARANG",$_POST["KODE_BARANG"]);
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