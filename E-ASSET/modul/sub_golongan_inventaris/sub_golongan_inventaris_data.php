
<?php

include "../../inc/config.php";


$tes=$dtable->get("as_subgolongan", "as_subgolongan.sub_golongan", array('as_subgolongan.sub_golongan','as_subgolongan.nm_subgolongan','as_subgolongan.tgl_posting','as_subgolongan.user_posting','as_golongan.nm_golongan',"as_subgolongan.sub_golongan")," inner join as_golongan on as_subgolongan.kode_golongan=as_golongan.kode_golongan");


?>