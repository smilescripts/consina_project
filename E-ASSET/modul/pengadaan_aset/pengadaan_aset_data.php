
<?php

include "../../inc/config.php";


$tes=$dtable->get("as_head_pengadaan", "as_head_pengadaan.kode_pengadaan", array('as_head_pengadaan.kode_pengadaan','as_head_pengadaan.tanggal_pengadaan','as_head_pengadaan.user_posting',"as_head_pengadaan.kode_pengadaan"),"");


?>