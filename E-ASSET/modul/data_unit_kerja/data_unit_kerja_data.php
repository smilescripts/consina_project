
<?php

include "../../inc/config.php";


$tes=$dtable->get("as_unit_kerja", "as_unit_kerja.kode_unit", array('as_unit_kerja.kode_unit','as_unit_kerja.nm_unit','as_unit_kerja.keterangan','as_unit_kerja.user_posting','as_unit_kerja.tgl_posting',"as_unit_kerja.kode_unit"),"");


?>