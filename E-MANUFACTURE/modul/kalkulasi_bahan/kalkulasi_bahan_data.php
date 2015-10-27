
<?php

include "../../inc/config.php";


$tes=$dtable->get("head_kalkulasi_produksi", "head_kalkulasi_produksi.ID_KALKULASI", array('head_kalkulasi_produksi.ID_KALKULASI','head_kalkulasi_produksi.TGL_KALKULASI','head_kalkulasi_produksi.TGL_BERES_PROD','head_kalkulasi_produksi.STATUS',"head_kalkulasi_produksi.ID_KALKULASI"),"");


?>