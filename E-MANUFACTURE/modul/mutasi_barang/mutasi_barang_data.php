
<?php

include "../../inc/config.php";


$tes=$dtable->get("head_mutasi_prod", "head_mutasi_prod.KODE_MUTASI", array('head_mutasi_prod.KODE_MUTASI','head_mutasi_prod.TANGGAL_KELUAR','head_mutasi_prod.TANGGAL_DITERIMA','head_mutasi_prod.ID_PTGS_KELUAR','head_mutasi_prod.ID_PTGS_TERIMA','head_mutasi_prod.STATUS',"head_mutasi_prod.KODE_MUTASI"),"");


?>