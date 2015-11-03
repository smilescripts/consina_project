
<?php

session_start();

include "../../inc/config.php";
session_check();

$tes=$dtable->get("head_ofname_outlet", "head_ofname_outlet.id", array('head_ofname_outlet.id','head_ofname_outlet.tanggal','head_ofname_outlet.user_posting',"head_ofname_outlet.id"),"where head_ofname_outlet.outlet='$_SESSION[OUTLET_KODE]'");


?>