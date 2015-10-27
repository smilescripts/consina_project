<?php
	include "../../inc/config.php";
	
	$data=$db->fetch_custom_single("select * from as_inventarisasi where kode_inventarisasi='$_POST[kode_inventarisasi]'");
	$data1=$db->fetch_custom_single("select * from as_aset where kode_barang='$data->kode_barang'");
	$data2=$db->fetch_custom_single("select * from as_cabang where kode_cabang='$data->kode_cabang'");
	$data3=$db->fetch_custom_single("select * from as_ruangan where kode_ruangan='$data->kode_ruangan'");
	$data4=$db->fetch_custom_single("select * from as_unit_kerja where kode_unit='$data->kode_unit'");
	
	header('Content-Type: application/json');
	echo json_encode(array('nm_barang' => $data1->nm_barang, 'merk' => $data1->merk, 'tipe' => $data1->tipe, 'kode_barang' => $data->kode_barang
	, 'kode_cabang' => $data2->kode_cabang, 'nm_cabang' => $data2->nm_cabang, 'kode_ruangan' => $data3->kode_ruangan, 'nm_ruangan' => $data3->nm_ruangan
	, 'kode_unit' => $data4->kode_unit, 'nm_unit' => $data4->nm_unit, 'status' => $data->status));
?>