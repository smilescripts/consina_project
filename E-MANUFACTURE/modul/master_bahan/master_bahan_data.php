
<?php

include "../../inc/config.php";


$tes=$dtable->get("bahan", "bahan.ID_BAHAN", array('bahan.ID_BAHAN','bahan.NAMA_BAHAN','bahan.SATUAN','bahan.STOCK','bahan.STOCK_BAYANGAN',"bahan.ID_BAHAN"),"");


?>