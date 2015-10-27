<?php
	include "../../inc/config.php";
	
	$data=$db->fetch_custom_single("select * from as_aset where kode_barang='$_POST[kode_barang]'");
	
	header('Content-Type: application/json');
	echo json_encode(array('nama' => $data->nm_barang, 'merk' => $data->merk, 'tipe' => $data->tipe, 'stok' => $data->total_unit));
?>