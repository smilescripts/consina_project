
<?php

include "../../inc/config.php";


$tes=$dtable->get("as_ruangan", "as_ruangan.kode_ruangan", array('as_ruangan.kode_ruangan','as_ruangan.nm_ruangan','as_ruangan.keterangan','as_ruangan.user_posting','as_ruangan.tgl_posting',"as_ruangan.kode_ruangan"),"");


?>