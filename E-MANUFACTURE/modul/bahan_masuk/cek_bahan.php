<?php
header('Content-Type: application/json');
include "../../inc/config.php";
$ID_BAHAN=$_GET["ID_BAHAN"];
$cek=$db->fetch_custom("select * from bahan where ID_BAHAN='$ID_BAHAN' LIMIT 1");
foreach ($cek as $bahan) {
echo json_encode(array('databarang'=>$bahan->NAMA_BAHAN,'SATUAN' =>$bahan->SATUAN,'STOCK' =>$bahan->STOCK));
}
?>