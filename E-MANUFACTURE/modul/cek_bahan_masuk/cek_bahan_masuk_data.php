
<?php

include "../../inc/config.php";


$tes=$dtable->get("head_bhn_masuk", "head_bhn_masuk.ID_BHN_MASUK", array('head_bhn_masuk.ID_BHN_MASUK','head_bhn_masuk.ID_PETUGAS','head_bhn_masuk.TGL_PEMBELIAN','head_bhn_masuk.TGL_MASUK','head_bhn_masuk.STATUS',"head_bhn_masuk.ID_BHN_MASUK"),"");


?>