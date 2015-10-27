<?php
header('Content-Type: application/json');

include "../../inc/config.php";
$KODE_BARANG=$_GET["KODE_BARANG"];
session_start();
$GETUSER = $db->fetch_single_row("outlet","KODE_OUTLET",$_SESSION["OUTLET_KODE"]);
$KODEOUTLET=$GETUSER->KODE_OUTLET;
$cek=$db->fetch_custom("select * from barang_outlet where BARCODE='$KODE_BARANG' and OUTLET='$KODEOUTLET' ");
foreach ($cek as $barang) {
echo json_encode(array('databarang'=>$barang->NAMA_BARANG,'STOK' =>$barang->STOK));
}
?>