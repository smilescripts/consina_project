<?php

include "../../inc/config.php";
$AS=$_POST["KODE_BARANG"];
		$ASKODEBARANG = $db->fetch_single_row("barang_pusat","BARCODE",$AS);
		
		$KODE_BARANG=$ASKODEBARANG->KODE_BARANG;
$data = array("ID_PENGIRIMAN"=>$_POST["ID_PENGIRIMAN"],"KODE_BARANG"=>$KODE_BARANG,"JUMLAH"=>$_POST["JUMLAH"],);
$in = $db->insert("tmp_pengiriman_barang",$data);	



?>