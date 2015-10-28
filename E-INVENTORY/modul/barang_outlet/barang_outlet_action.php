<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
<<<<<<< HEAD
	$data = array("KODE_BARANG"=>$_POST["KODE_BARANG"],"BARCODE"=>$_POST["BARCODE"],"NAMA_BARANG"=>$_POST["NAMA_BARANG"],"KETERANGAN"=>$_POST["KETERANGAN"],"HARGA_MODAL"=>$_POST["HARGA_MODAL"],"HARGA_JUAL"=>$_POST["HARGA_JUAL"],"STOK"=>$_POST["STOK"],"ID_KATEGORI"=>$_POST["ID_KATEGORI"],"DISKON"=>$_POST["DISKON"],"ID_SATUAN"=>$_POST["ID_SATUAN"],"OUTLET"=>$_POST["OUTLET"],);
=======
	$data = array("KODE_BARANG"=>$_POST["KODE_BARANG"],"BARCODE"=>$_POST["BARCODE"],"NAMA_BARANG"=>$_POST["NAMA_BARANG"],"WARNA"=>$_POST["WARNA"],"UKURAN"=>$_POST["UKURAN"],"KETERANGAN"=>$_POST["KETERANGAN"],"HARGA_MODAL"=>$_POST["HARGA_MODAL"],"HARGA_JUAL"=>$_POST["HARGA_JUAL"],"STOK_MINIMAL"=>$_POST["STOK_MINIMAL"],"STOK"=>$_POST["STOK"],"ID_KATEGORI"=>$_POST["ID_KATEGORI"],"DISKON"=>$_POST["DISKON"],"ID_SATUAN"=>$_POST["ID_SATUAN"],"OUTLET"=>$_POST["OUTLET"],);
>>>>>>> origin/master
  
  
  
   
		$in = $db->insert("barang_outlet",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("barang_outlet","KODE_BARANG",$_GET["id"]);
		break;
	case "up":
<<<<<<< HEAD
	 $data = array("KODE_BARANG"=>$_POST["KODE_BARANG"],"BARCODE"=>$_POST["BARCODE"],"NAMA_BARANG"=>$_POST["NAMA_BARANG"],"KETERANGAN"=>$_POST["KETERANGAN"],"HARGA_MODAL"=>$_POST["HARGA_MODAL"],"HARGA_JUAL"=>$_POST["HARGA_JUAL"],"STOK"=>$_POST["STOK"],"ID_KATEGORI"=>$_POST["ID_KATEGORI"],"DISKON"=>$_POST["DISKON"],"ID_SATUAN"=>$_POST["ID_SATUAN"],"OUTLET"=>$_POST["OUTLET"],);
=======
	 $data = array("KODE_BARANG"=>$_POST["KODE_BARANG"],"BARCODE"=>$_POST["BARCODE"],"NAMA_BARANG"=>$_POST["NAMA_BARANG"],"WARNA"=>$_POST["WARNA"],"UKURAN"=>$_POST["UKURAN"],"KETERANGAN"=>$_POST["KETERANGAN"],"HARGA_MODAL"=>$_POST["HARGA_MODAL"],"HARGA_JUAL"=>$_POST["HARGA_JUAL"],"STOK_MINIMAL"=>$_POST["STOK_MINIMAL"],"STOK"=>$_POST["STOK"],"ID_KATEGORI"=>$_POST["ID_KATEGORI"],"DISKON"=>$_POST["DISKON"],"ID_SATUAN"=>$_POST["ID_SATUAN"],"OUTLET"=>$_POST["OUTLET"],);
>>>>>>> origin/master
		$up = $db->update("barang_outlet",$data,"KODE_BARANG",$_POST["KODE_BARANG"]);
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