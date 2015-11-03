
<?php

include "../../inc/config.php";


$tes=$dtable->get("outlet", "outlet.KODE_OUTLET", array('outlet.NAMA_OUTLET','outlet.ALAMAT','outlet.NO_TELEPON','sys_state.STATE_NAME',"outlet.KODE_OUTLET")," inner join sys_state on outlet.LOKASI=sys_state.STATE_ID");


?>