<?php
include "../../inc/config.php";
$data = array("JUMLAH"=>$_POST["JUMLAH"],);
$up = $db->update("tmp_pengiriman_barang",$data,"ID_DETAIL_PENGIRIMAN",$_POST["ID_DETAIL_PENGIRIMAN"]);

?>