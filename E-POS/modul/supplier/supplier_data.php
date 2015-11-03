
<?php

include "../../inc/config.php";


$tes=$dtable->get("supplier", "supplier.ID_SUPPLIER", array('supplier.KODE_SUPPLIER','supplier.NAMA_SUPPLIER','supplier.TANGGAL_TERDAFTAR',"supplier.ID_SUPPLIER"),"");


?>