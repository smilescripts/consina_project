
<?php

include "../../inc/config.php";


$tes=$dtable->get("printer_config", "printer_config.ID_CONFIG", array('outlet.NAMA_OUTLET','PRINTER_NAME','IP_ADRRESS',"printer_config.ID_CONFIG")," inner join outlet on printer_config.OUTLET=outlet.KODE_OUTLET");


?>