
<?php

include "../../inc/config.php";


$tes=$dtable->get("gudang_produksi", "gudang_produksi.PRD_ID_BARANG", array('gudang_produksi.PRD_KODE_BARANG','gudang_produksi.PRD_BARCODE','gudang_produksi.PRD_NAMA_BARANG','gudang_produksi.PRD_STOCK','gudang_produksi.PRD_STOCK_BAYANGAN','gudang_produksi.STATUS',"gudang_produksi.PRD_ID_BARANG"),"");


?>