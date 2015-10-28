<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
<<<<<<< HEAD
    $data = array("GOLONGAN_PELANGGAN"=>$_POST["GOLONGAN_PELANGGAN"],"JENIS_PELANGGAN"=>$_POST["JENIS_PELANGGAN"],"PRODUK_PELANGGAN"=>$_POST["PRODUK_PELANGGAN"],"KODE_PELANGGAN"=>$_POST["KODE_PELANGGAN"],"NAMA_PELANGGAN"=>$_POST["NAMA_PELANGGAN"],"ALAMAT"=>$_POST["ALAMAT"],"KOTA"=>$_POST["KOTA"],"NO_TELP"=>$_POST["NO_TELP"],"NO_TELP2"=>$_POST["NO_TELP2"],"BANK"=>$_POST["BANK"],"NO_REKENING"=>$_POST["NO_REKENING"],"PEMILIK_REKENING"=>$_POST["PEMILIK_REKENING"],"KETERANGAN"=>$_POST["KETERANGAN"],);
=======
    $data = array("GOLONGAN_PELANGGAN"=>$_POST["GOLONGAN_PELANGGAN"],"KODE_PELANGGAN"=>$_POST["KODE_PELANGGAN"],"NAMA_PELANGGAN"=>$_POST["NAMA_PELANGGAN"],"ALAMAT"=>$_POST["ALAMAT"],"KOTA"=>$_POST["KOTA"],"NO_TELP"=>$_POST["NO_TELP"],"NO_TELP2"=>$_POST["NO_TELP2"],"BANK"=>$_POST["BANK"],"NO_REKENING"=>$_POST["NO_REKENING"],"PEMILIK_REKENING"=>$_POST["PEMILIK_REKENING"],"KETERANGAN"=>$_POST["KETERANGAN"],);
>>>>>>> origin/master
	$in = $db->insert("pelanggan",$data);
	
    foreach ($_POST["ID_KATEGORI"] as $key=>$value){
	$PRESENTASE=$_POST["PRESENTASE"][$key];
	
	mysql_query("insert into diskon_mitra values(NULL,'$value','$PRESENTASE','$_POST[KODE_PELANGGAN]')");
		
		
	}
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("pelanggan","ID_PELANGGAN",$_GET["id"]);
		break;
	case "up":
<<<<<<< HEAD
	 $data = array("GOLONGAN_PELANGGAN"=>$_POST["GOLONGAN_PELANGGAN"],"JENIS_PELANGGAN"=>$_POST["JENIS_PELANGGAN"],"PRODUK_PELANGGAN"=>$_POST["PRODUK_PELANGGAN"],"KODE_PELANGGAN"=>$_POST["KODE_PELANGGAN"],"NAMA_PELANGGAN"=>$_POST["NAMA_PELANGGAN"],"ALAMAT"=>$_POST["ALAMAT"],"KOTA"=>$_POST["KOTA"],"NO_TELP"=>$_POST["NO_TELP"],"NO_TELP2"=>$_POST["NO_TELP2"],"BANK"=>$_POST["BANK"],"NO_REKENING"=>$_POST["NO_REKENING"],"PEMILIK_REKENING"=>$_POST["PEMILIK_REKENING"],"KETERANGAN"=>$_POST["KETERANGAN"],);
=======
	 $data = array("GOLONGAN_PELANGGAN"=>$_POST["GOLONGAN_PELANGGAN"],"KODE_PELANGGAN"=>$_POST["KODE_PELANGGAN"],"NAMA_PELANGGAN"=>$_POST["NAMA_PELANGGAN"],"ALAMAT"=>$_POST["ALAMAT"],"KOTA"=>$_POST["KOTA"],"NO_TELP"=>$_POST["NO_TELP"],"NO_TELP2"=>$_POST["NO_TELP2"],"BANK"=>$_POST["BANK"],"NO_REKENING"=>$_POST["NO_REKENING"],"PEMILIK_REKENING"=>$_POST["PEMILIK_REKENING"],"KETERANGAN"=>$_POST["KETERANGAN"],);
>>>>>>> origin/master
     $up = $db->update("pelanggan",$data,"ID_PELANGGAN",$_POST["id"]);
	 
	foreach ($_POST["ID_DISKON"] as $key=>$value){
	$PRESENTASE=$_POST["PRESENTASE"][$key];
	
	mysql_query("update diskon_mitra set PRESENTASE='$PRESENTASE' where ID='$value' and KODE_PELANGGAN='$_POST[KODE_PELANGGAN]'");
		
		
	}
	 
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