
<?php

include "../../inc/config.php";


$tes=$dtable->get("as_golongan", "as_golongan.kode_golongan", array('as_golongan.kode_golongan','as_golongan.nm_golongan','as_golongan.keterangan','as_golongan.persen_susut','as_golongan.masa_manfaat','as_harta_berwujud.nm_harta',"as_golongan.kode_golongan")," inner join as_harta_berwujud on as_golongan.kode_harta=as_harta_berwujud.kode_harta");


?>