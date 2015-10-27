
<?php

include "../../inc/config.php";


$tes=$dtable->get("as_suplier", "as_suplier.kode_suplier", array('as_suplier.kode_suplier','as_suplier.nm_suplier','as_suplier.alamat','as_suplier.kota','as_suplier.telepon',"as_suplier.kode_suplier"),"");


?>