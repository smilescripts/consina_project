<?php
header('Content-Type: application/json');
include "../../inc/config.php";
$KODE_BARANG=$_GET["KODE_BARANG"];
$cek=$db->fetch_custom("select * from barang_pusat where BARCODE='$KODE_BARANG'");
foreach ($cek as $barang) {
echo json_encode(array('databarang' =>$barang->NAMA_BARANG,'STOK' =>$barang->STOK));
}
?>