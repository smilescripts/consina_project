
<?php

include "../../inc/config.php";


$tes=$dtable->get("pengiriman_barang", "pengiriman_barang.ID", array('pengiriman_barang.ID_PENGIRIMAN','pengiriman_barang.TANGGAL_PENGIRIMAN','pengiriman_barang.TANGGAL_PENERIMAAN','pengiriman_barang.STATUS_PENGIRIMAN','pengiriman_barang.OUTLET','pengiriman_barang.TANGGAL_PENGIRIMAN',"pengiriman_barang.ID",));


?>