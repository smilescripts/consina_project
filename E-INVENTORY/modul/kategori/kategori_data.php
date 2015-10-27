
<?php

include "../../inc/config.php";


$tes=$dtable->get("kategori", "kategori.ID_KATEGORI", array('kategori.KODE_KATEGORI','kategori.NAMA_KATEGORI',"kategori.ID_KATEGORI"),"");


?>