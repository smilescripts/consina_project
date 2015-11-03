
<?php

include "../../inc/config.php";


$tes=$dtable->get("as_maintenance", "as_maintenance.id_pemeliharaan", array('as_maintenance.id_pemeliharaan','as_maintenance.kode_inventarisasi','as_maintenance.tgl_servis','as_maintenance.tempat_servis','as_maintenance.keluhan','as_maintenance.keterangan_pem','as_maintenance.tgl_posting','as_maintenance.user_posting','as_maintenance.biaya_servis',"as_maintenance.id_pemeliharaan"),"");


?>