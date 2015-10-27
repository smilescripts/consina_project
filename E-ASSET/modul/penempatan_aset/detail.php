<?php
	include "../../inc/config.php";
	
	$data=$db->fetch_custom_single("select * from as_inventarisasi where kode_inventarisasi='$_POST[kode_inventarisasi]'");
	$data1=$db->fetch_custom_single("select * from as_aset where kode_barang='$data->kode_barang'");
	
	header('Content-Type: application/json');
	echo json_encode(array('nm_barang' => $data1->nm_barang, 'merk' => $data1->merk, 'tipe' => $data1->tipe));
?>